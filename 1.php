<?php 

// This is your webhook. You must configure it in the number settings section. 

$data = json_decode($_GET["data"]); 

// When you receive a message an INBOX event is created 
if ($data->event=="INBOX") 
{ 
  // Default answer 
  $my_answer = "This is an autoreply from APIWHA!. You (". $data->from .") wrote: ". $data->text; 

  // You can evaluate the received message and prepare your new answer. 
  if(!(strpos(strtoupper($data->text), "PRICING")===false)){	
    $my_answer = "Sing up in our platform and you will get our pricing list!"; 

  }else if(!(strpos(strtoupper($data->text), "INFORMATION")===false)){	
    $my_answer = "Of course! For more information you can access to our website http://www.apiwha.com!"; 

  } 

  $response = new StdClass(); 
  $response->apiwha_autoreply = $my_answer; // Attribute "apiwha_autoreply" is very important! 

  echo json_encode($response); // Don't forget to reply in JSON format 

  /* You don't need any APIKEY to answer to your customer from a webhook */ 

} 

?>

