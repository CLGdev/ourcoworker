#!/usr/bin/env node
var WebSocketServer = require('websocket').server;
var http = require('http');
 
var server = http.createServer(function(request, response) {
    console.log((new Date()) + ' Received request for ' + request.url);
    response.writeHead(202);
    response.end();
});
server.listen(3000, function() {
    console.log((new Date()) + ' Server is listening on port 3000');
});
 
wsServer = new WebSocketServer({
    httpServer: server,
    // You should not use autoAcceptConnections for production
    // applications, as it defeats all standard cross-origin protection
    // facilities built into the protocol and the browser.  You should
    // *always* verify the connection's origin and decide whether or not
    // to accept it.
    autoAcceptConnections: false
});
 
//function originIsAllowed(origin) {
//  // put logic here to detect whether the specified origin is allowed.
//  console.log(origin);
//  return true;
//}
 
wsServer.on('request', function(request) {
//    if (!originIsAllowed(request.origin)) {
//     // Make sure we only accept requests from an allowed origin
//      request.reject();
//      console.log((new Date()) + ' Connection from origin ' + request.origin + ' rejected.');
//      return;
//    }
    
    var connection = request.accept('echo-protocol', request.origin);
    var count = 0;
    var clients = {};
    // Specific id for this client & increment count
    var id = count++;
    // Store the connection method so we can loop through & contact all clients
    clients[id] = connection;
    console.log((new Date()) + ' Connection accepted [' + id + ']');

    console.log((new Date()) + ' Connection accepted.');
connection.on('message', function(message) {

    // The string message that was sent to us
    var msgString = message.utf8Data;

    // Loop through all clients
    for(var i in clients){
        // Send a message to the client with the message
        clients[i].sendUTF(msgString);
    }

});
    connection.on('close', function(reasonCode, description) {
        console.log((new Date()) + ' Peer ' + connection.remoteAddress + ' disconnected.');
    });
});
