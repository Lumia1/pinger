<?php

include 'pinger.php';

include 'connect.php';

require_once 'config.inc.php';

require_once 'lib/swift_required.php';

foreach ($result as $server) {
	
	if (ping($server['address'])) {
		
		echo "Website " . $server['name'] . " is Up <br />";
		
		} else {		
			
			// email the admin and tell them your server in down
			$downSites = array();
			
			$downSites[] = "Website \"" . $server['address'] . "\" Seems Down";
			
			echo "Website " . $server['name'] . " is Down <br />";
			
			}
	
	}			
				if(isset($downSites)) {
				//Implode array
				$list = implode("\n", $downSites);
				
				// Create the message
				$message = Swift_Message::newInstance()
				
				// Give the message a subject
				->setSubject('One Or More of Your Websites Are Down')
				
				// Set the From address with an associative array
				->setFrom(array(Config::MAIL_RECV => 'Websites Down'))
				
				// Set the To addresses with an associative array
				->setTo(array(Config::MAIL_1, Config::MAIL_2 => 'Mails'))
				
				// Give it a body
				->setBody('<p>One Or More Of Your Websites Are Down</p><br />', 'text/html')
				
				// And optionally an alternative body
				->addPart('<h2>Webistes :</h2><br />' . '<p>' . $list . '</p>', 'text/html')
				
				// Optionally add any attachments
				//->attach(Swift_Attachment::fromPath('my-document.pdf'))
				;
				
				}


?>