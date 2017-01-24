const smule= require('smule-api');
var url="https://smule.com/recording/titanium-acoustic/664072227_604510719";
smule.type(url)
    .then(response => {console.log(response)});
