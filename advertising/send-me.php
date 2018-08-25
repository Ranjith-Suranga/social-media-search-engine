<?php

	//Filtering spams
	if ( !isset($_POST["send-by"]) ){
		header('Location: ./?page=contact-us');
		exit();
	}else{
		if ( $_POST["send-by"] !== "sura-boy" ){
			header('Location: ./?page=contact-us');
			exit();			
		}else{
			if ( (!isset($_POST["name"])) || (!isset($_POST["name"])) || (!isset($_POST["name"])) ){
				header('Location: ./?page=contact-us');
				exit();		
			}
		}
	}

	require('../recaptcha-master/src/autoload.php');
	$secret = "6Lc4gBgTAAAAAEgbY6RyKbX14uBvFVxhzE_I5O-3";
	$recaptcha = new \ReCaptcha\ReCaptcha($secret);
	$resp = $recaptcha->verify($_POST["g-recaptcha-response"], $_SERVER["REMOTE_ADDR"]);
	if ( !($resp->isSuccess()) ) {
		header('Location: ./?page=contact-us');
		exit();		
	}

    $to = "d.m.ranjith.sura@gmail.com,helpsofts@gmail.com,infoobweb@gmail.com";
    $headers = "From: Sura-Boy <d.m.ranjith.sura@gmail.com>";

    // Removing g-recaptcha-response parameter from the message
    $temp = array();
    $temp = $_POST;
    array_splice($temp,count($temp)-1,1);

    $message = print_r($temp, true);

    $result = mail($to, "Infoob Contact Us", $message, $headers);	

    if ($result){
    	echo "<p style='text-align:center;'>Thank you. Your message has been sent successfully.<br/><a href='../advertising/'>Go to Advertising</p>";
    }else{
  		echo "<p style='text-align:center;'>Oops! Something went wrong. Please try again!<br/><a href='./?page=contact-us'>Try Again</p>";    	
    }