
<?php

if(isset($_GET['send_notification'])){
   send_notification ();
}
else{
    echo "Please enter token in url like ='localhost/Push-Notificatiom/?send_notification&token=Token_here'";
}

function send_notification()
{
	echo 'Hello';
define( 'API_ACCESS_KEY', 'AAAAHsu9p9U:APA91bFF0prev1jQHy6pkwLw5dXV-PkHf1tUzcMLMT99g5E89qGNRfcU2INboSXQLRq3YjzVeGt4BFdA-jHwQMWDzDOjpKOdijN7l1--T6joPVDP5nkPFuuUdeHKKTYsraShY154sZIe');
 //   $registrationIds = ;
#prep the bundle
     $msg = array
          (
		'body' 	=> 'This is Whatsapp Notification',
		'title'	=> 'Whatsapp Notification',
             	
          );
	$fields = array
			(
				'to'		=> $_REQUEST['token'],
				'notification'	=> $msg
			);
	
	
	$headers = array
			(
				'Authorization: key=' . API_ACCESS_KEY,
				'Content-Type: application/json'
			);
#Send Reponse To FireBase Server	
		$ch = curl_init();
		curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
		curl_setopt( $ch,CURLOPT_POST, true );
		curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
		curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
		curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
		$result = curl_exec($ch );
		echo $result;
		curl_close( $ch );
}
?>