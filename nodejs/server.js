var app = require('express')();
var server = require('http').Server(app);
var io = require('socket.io')(server);
var redis = require('redis');
var mysql=require('mysql');

server.listen(8899);

var connection = mysql.createConnection({
  host     : 'localhost',
  user     : 'akshay',
  password : 'abcd',
  database : 'notification'
});

var username;
var text;
var redisClient = redis.createClient();
redisClient.subscribe('m');
redisClient.on("message", function(channel, message) {

  json = JSON.parse(message);
  console.log(channel + json.text);
  username=json.uid_source;
  text=json.message;
  json.uid_target.forEach(function (target) {
    // connection.query('INSERT into `notifications`(`uid_source`,`message`,`uid_target`) values ("' + json.uid_source + '","' + json.message + '","' + target + '")', function (err, rows, fields) {
      //console.log('here');

      // if (err) {
      //   console.log(err);
      // }
      // else {
        connection.query('SELECT `message`,`type`,`created_at` FROM `notifications` WHERE uid_target= "' + target + '"  AND status="un_read"' , function (err, results) {

          if (err) {
            console.log(err);
          }
          else {
              // console.log(JSON.stringify(results[0]).substring(0));
              if (results.length == 1) {
                  var rows = "[";
                  var i;

                  for (i = 0; i <= results.length - 1; i++) {
                      var final = rows.concat(JSON.stringify(results[i]).substring(0) + "]");
                  }
              }
              else if (results.length > 1) {
                  rows = "[";


                  for (i = 0; i < results.length - 1; i++) {
                      rows = rows.concat(JSON.stringify(results[i]).substring(0) + ",");
                  }
                   final = rows.concat(JSON.stringify(results[i]).substring(0) + "]");
              }

              var response = JSON.parse('{' +
                  '"text":' + final + ',' +
                  '"count":' + '"' + results.length + '"' +
                  '}');

              console.log(response);
              io.emit(target, response);


          }

        });


      // }
    // });
  });
});


// io.on('connection', function (socket) {
//
//
//   console.log("new client connected");
//   socket.emit(username, text);
//
//
//   // redisClient.subscribe('message');
//
//   //connection.connect();
//
//
//   // connection.query('SELECT * from messages', function(err,results) {
//   //   if (!err) {
//   //     console.log('The solution is: ', results);
//   //     console.log("mew message in queue " + message + "channel");
//   //     var response={
//   //         length:results.length,
//   //         data:results
//   //     };
//   //     socket.emit(channel, response);
//   //   }
//   //   else
//   //     console.log('Error while performing Query.');
//   //   //connection.end();
//   // });
//
//
//
//
//   socket.on('disconnect', function() {
//     redisClient.quit();
//   });
//
// });
