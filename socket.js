var server = require('http').Server();

var io = require('socket.io')(server);

var Redis = require('ioredis');

//ioredis returns a class so we are simply instantiating it to an object
var redis = new Redis();

redis.subscribe('test-channel');

redis.on('message', function(channel, message){
	message = JSON.parse(message);
	// console.log(channel, message);

	// step 3 emit event to all client
	io.emit(channel + ";" + message.event, message.data);
});

server.listen(4000);