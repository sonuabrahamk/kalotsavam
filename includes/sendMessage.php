<?php

    $name = $_POST["name"];
    $from = $_POST["email"];
    $umsg = $_POST["message"];

//    echo "Name :".$name." Email:".$uemail." Address:".$umsg;


    $message = "Dear sir/Madam, \n\nYou have received an enquire from ".$name." on Shells website. The details of the person have been give bellow. Please get back to him/her as soon as possible.\n\n Name : ".$name."\n\n Email ID : ".$from.".\n\n Enquiry from ".$name." :\n\n ".$umsg;

    $sub = "Message from ".$name." on Shells Website.";

    $headers = 'From: '.$name;
//    $headers .= ' Bcc: 15cs40118@kristujayanti.com,arunadevi@kristujayanti.com \r\n';
//
//    $headers .= "Content-Type: multipart/mixed; boundary=\"PHP-mixed-".$random_hash."\"";

if(mail("15cs40125@kristujayanti.com, 15cs40118@kristujayanti.com",$sub,$message,$headers))
    {
        echo "1";
    }
    else
    {
        echo "0";
    }
?>
