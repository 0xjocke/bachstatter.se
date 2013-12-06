<?php 
class Email
{
		public $email;

		function validate($email){
			//Save my email array in $email variable
	        // setting result and error to zero so I dont get error msg if its not created
	       	$this->email = $email;
	        $error = 0;

	        // I already check if its set or not with HTML5 this is backup plus Sanitize
	        //if name not is empty Sanitize it from html, else error msg
	        if ($email['name'] != '') {
	            $email['name'] = filter_var($email['name'], FILTER_SANITIZE_STRING);  
	        }else{
	            $error = "<p class='error'>Du måste fylla i ditt namn.</p>";
	        }
	        //if email is set Sanitize it, else error msg
	        // check emial with php
	        if ($email['email_adress'] != '') {
	            $email['email_adress'] = filter_var($email['email_adress'], FILTER_SANITIZE_EMAIL);
	            if(!filter_var($email['email_adress'], FILTER_VALIDATE_EMAIL)){
	                $error .= "<p class='error'>Fyll i en riktig email.</p>";
	            }
	        }else{
	            $error .= "<p class='error'>Fyll i en  email.</p>";

	        }
	        if ($email['message'] != '') {
	            $email['message'] = filter_var($email['message'], FILTER_SANITIZE_STRING);  
	        }else{
	            $error .= "<p class='error'>Du måste skriva något meddelande.</p>";
	        }
	        if (!$error == 0) {
	        	return $error;
	        }else{
	        	return true;
	        }
    	}

        // function that return the email message
        private function bodyMessage($email){
            $txt = "Name: " . $email['name'] . "\n";
            $txt .= "Email: " . $email['email_adress'] . "\n";
            $txt .= $email['message'];
            return $txt;
        }

        function send(){
        // If no $error start usins SWift lib
        // Else echo out the error msg
            $email = $this->email;
            $transport = Swift_SmtpTransport::newInstance(SMTP_ADRESS, SMTP_PORT, SMTP_ENCRYPT_PROTOCOL)
            ->setUsername(SMTP_USER)
            ->setPassword(SMTP_PASS);

            $mailer = Swift_Mailer::newInstance($transport);

            $message = Swift_Message::newInstance('Nytt mail ifrån bachstatter.se')
            ->setFrom(array($email['email_adress'] => $email['name']))
            ->setTo(array(ADMIN_EMAIL => ADMIN_NAME))
            ->setBody($this->bodyMessage($email));

            $result = $mailer->send($message);
            return $result;
    }
}

?>