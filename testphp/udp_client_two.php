<?php
 
/*
    Simple php udp socket client, uses two ports and asks for computer to send to.
	from: http://www.binarytides.com/udp-socket-programming-in-php/
*/
 
//Reduce errors
error_reporting(~E_WARNING);

// client ports
$porttx = 5420;	 // client to server port
$portrx = 5421;  // server to client port

$serverrx = '0.0.0.0';		// receive from all

// Enter computer or ip address 
echo 'Enter name or ip addr of computer to talk to : ';
$servertx = trim(fgets(STDIN));
echo "Servertx is $servertx\n";

// create the socket for receive	
if(!($sockrx = socket_create(AF_INET, SOCK_DGRAM, 0)))
{
    $errorcode = socket_last_error();
    $errormsg = socket_strerror($errorcode);
     
    die("Couldn't create socket rx: [$errorcode] $errormsg \n");
}
 
echo "Socket created rx\n";
 
// Bind the source address for receive
if( !socket_bind($sockrx, $serverrx , $portrx) )
{
    $errorcode = socket_last_error();
    $errormsg = socket_strerror($errorcode);
     
    die("Could not bind socket : [$errorcode] $errormsg \n");
}
 
echo "Socket bind rx OK \n";
 
// create the socket for transmit
if(!($socktx = socket_create(AF_INET, SOCK_DGRAM, 0)))
{
    $errorcode = socket_last_error();
    $errormsg = socket_strerror($errorcode);
     
    die("Couldn't create socket tx: [$errorcode] $errormsg \n");
}
 
echo "Socket created tx\n";


//Communication loop
while(1)
{
    //Take some input to send
    echo 'Enter a message to send : ';
    $input = fgets(STDIN);
     
    //Send the message to the server
    if( ! socket_sendto($socktx, $input , strlen($input) , 0 , $servertx , $porttx))
    {
        $errorcode = socket_last_error();
        $errormsg = socket_strerror($errorcode);
         
        die("Could not send data: [$errorcode] $errormsg \n");
    }
         
    //Now receive reply from server and print it
    if(socket_recvfrom ( $sockrx , $reply , 2045 , 0, $from, $port ) === FALSE)
    {
        $errorcode = socket_last_error();
        $errormsg = socket_strerror($errorcode);
         
        die("Could not receive data: [$errorcode] $errormsg \n");
    }
     
	// show the received data on the console 
    echo "Reply from $from port $port : $reply";
}
