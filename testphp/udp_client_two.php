<?php
 
/*
    Simple php udp socket client
	from: http://www.binarytides.com/udp-socket-programming-in-php/
*/
 
//Reduce errors
error_reporting(~E_WARNING);
 
$server = '127.0.0.1';
//$server = '0.0.0.0';

$porttx = 5420;
$portrx = 5421;

 
if(!($sockrx = socket_create(AF_INET, SOCK_DGRAM, 0)))
{
    $errorcode = socket_last_error();
    $errormsg = socket_strerror($errorcode);
     
    die("Couldn't create socket rx: [$errorcode] $errormsg \n");
}
 
echo "Socket created rx\n";
 
// Bind the source address
if( !socket_bind($sockrx, $server , $portrx) )
{
    $errorcode = socket_last_error();
    $errormsg = socket_strerror($errorcode);
     
    die("Could not bind socket : [$errorcode] $errormsg \n");
}
 
echo "Socket bind rx OK \n";
 
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
    if( ! socket_sendto($socktx, $input , strlen($input) , 0 , $server , $porttx))
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
     
    echo "Reply : $reply";
}
