<?php
 
//Reduce errors
error_reporting(~E_WARNING);

$portrx = 5420;
$porttx = 5421;
 
//Create a UDP socket
if(!($sockrx = socket_create(AF_INET, SOCK_DGRAM, 0)))
{
    $errorcode = socket_last_error();
    $errormsg = socket_strerror($errorcode);
     
    die("Couldn't create socket: [$errorcode] $errormsg \n");
}
 
echo "Socket created rx\n";
 
// Bind the source address
if( !socket_bind($sockrx, "0.0.0.0" , $portrx) )
{
    $errorcode = socket_last_error();
    $errormsg = socket_strerror($errorcode);
     
    die("Could not bind socket : [$errorcode] $errormsg \n");
}
 
echo "Socket bind rx OK \n";
 

//Create a UDP socket for tx
if(!($socktx = socket_create(AF_INET, SOCK_DGRAM, 0)))
{
    $errorcode = socket_last_error();
    $errormsg = socket_strerror($errorcode);
     
    die("Couldn't create socket: [$errorcode] $errormsg \n");
}
 
echo "Socket created tx\n";
 
// Don't bind the tx, only rx
 
$count = 0;
 
//Do some communication, this loop can handle multiple clients
while(1)
{
    echo "Waiting for data ... \n";
     
    //Receive some data
    $r = socket_recvfrom($sockrx, $buf, 512, 0, $remote_ip, $remote_port);
    echo "$remote_ip : $remote_port -- " . $buf;
     
    //Send back the data to the client
    socket_sendto($socktx, "OK Count = " . $count . " --- " . $buf , 100 , 0 , $remote_ip , $porttx);
	$count = $count + 1;
}
 
socket_close($sock);
