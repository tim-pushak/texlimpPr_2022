<?php
  $name = $_POST['name'];
  $visitor_email = $_POST['email'];
  $message = $_POST['message'];

	$email_subject = "Enviado desde web Texlimp";

	$email_body = "Has recibido un nuevo mensaje de $name.\n \n \n".
                            "Mensaje:\n \n $message";

  $to = "progartt@gmail.com";

  $headers = "From: $visitor_email \r\n";

  $headers .= "Reply-To: $visitor_email \r\n";

  mail($to,$email_subject,$email_body,$headers);

  function IsInjected($str)
  {
      $injections = array('(\n+)',
            '(\r+)',
            '(\t+)',
            '(%0A+)',
            '(%0D+)',
            '(%08+)',
            '(%09+)'
            );
                
      $inject = join('|', $injections);
      $inject = "/$inject/i";
      
      if(preg_match($inject,$str))
      {
        return true;
      }
      else
      {
        return false;
      }
  }

  if(IsInjected($visitor_email))
  {
      echo "Bad email value!";
      exit;
  }
?>
