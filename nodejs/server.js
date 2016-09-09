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
  connection.query('INSERT into `notifications`(`uid_source`,`message`) values ("' + json.uid_source + '","' + json.message + '")', function (err, rows, fields) {
    //console.log('here');

    if (err) {
      console.log(err);
    }
    else {
      connection.query('SELECT `message` FROM `notifications` WHERE uid_source= "'+username+'" ',function (err,results) {

        if (err) {
          console.log(err);
        }
        else {
          var response=JSON.parse('{'+
            '"message":'+'"'+text+'"'+','+
            '"count":'+'"'+results.length+'"'+
          '}');
          io.emit(username, response);
        }

      } );



    }
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
