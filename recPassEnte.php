<?php

if(isset($_POST['username'])) {
	
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "my_civic_sense";
					
    // Crea e controlla connessione
	if (!($mysqli = mysqli_connect($servername, $username, $password, $dbname))) 
		die("Could not connect to database");
			        
    // seleziona database
    if(!mysqli_select_db($mysqli, $dbname)) 
		die("Could not open my_civic_sense database");
	
	$query = "SELECT email, password FROM registrazione_ente WHERE Username = '".$_POST['username']."'";
					
    //esegui query
    if(!($result = mysqli_query($mysqli, $query))) {
		print_r("Could not execute query: ");
		die(mysqli_error($mysqli));
	}
	
	if($row = mysqli_fetch_row($result)) {
		    ini_set('SMTP', 'localhost');
			ini_set('smtp_port', 25);
			$email = $row[0];
			$password = $row[1];
		
			$header= "From: Civic Sense <me@example.com>\n";
		    $header.= "Content-Type: text/html; charset=\"iso-8859-1\"\n";
		    $header.= "Content-Transfer-Encoding: 7bit\n\n";

		    $subject= "Civic Sense - Recupera Password";

		    $mess_invio="<html><body>";
		    $mess_invio.="<div>Di seguito i tuoi dati. <br>Username: ".$_POST['username']."<br>E-mail: ".$email."<br>Password: ".$password."</div>";
		    $mess_invio.="</body></html>";
 
		    //invio email
		    if(mail('walter94-6@live.com', 'Civic Sense', 'Ciao sono Walter')){
			    print_r("<script type='text/javascript'>window.alert('Email inviata con successo. Controlla la tua email.');</script>");
			}else
				print_r("<script type='text/javascript'>window.alert('Si sono verificati dei problemi nell'invio dell'email.');</script>");
			print_r("<script type='text/javascript'>self.location='index.php';</script>");
			
		}
	
	mysqli_close($mysqli);
}

?>