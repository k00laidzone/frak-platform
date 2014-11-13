<!--This is a blade template that goes in email message to site administrator-->
<?php
//get the first name
$name = Input::get ('inputName');
$email = Input::get ('inputEmail');
$subject = 'Mail from the Frag.tv website';
$message = Input::get ('inputMessage');
$date_time = date("F j, Y, g:i a");
$userIpAddress = Request::getClientIp();
?> 

<h1>We been contacted by.... </h1>

<p>
Name: <?php echo($name);?> <br>
Email address: <?php echo ($email);?> <br>
Subject: <?php echo ($subject); ?><br>
Message: <?php echo ($message);?><br>
Date: <?php echo($date_time);?><br>
User IP address: <?php echo($userIpAddress);?><br>

</p>