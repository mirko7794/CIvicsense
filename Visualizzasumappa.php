
        <?php
		session_start();
		
		function mappa() {
			
            $servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "my_civic_sense";
			
            // Crea e controlla connessione
			if (!($mysqli = mysqli_connect($servername, $username, $password, $dbname))) 
				die("Could not connect to database");
	
	        // Seleziona database
	        if(!mysqli_select_db($mysqli, $dbname)) 
				die("Could not open my_civic_sense database");
			
			if(isset($_SESSION['$cdt']) != NULL) {
			  $cdt = $_SESSION['$cdt'];
			
			  $query1 = "SELECT latitudine FROM ticket WHERE CodicediTracciamento = $cdt";
			  $query2 = "SELECT longitudine FROM ticket WHERE CodicediTracciamento = $cdt ";
			
              $prendolatitudine = mysqli_query($mysqli, $query1);
              $prendolongitudine = mysqli_query($mysqli, $query2);
              $lat = mysqli_fetch_array($prendolatitudine);
              $lon = mysqli_fetch_array($prendolongitudine);
			  $coordinate = $lat[0]."-".$lon[0];
			  if($coordinate == "-") {
				  print_r("<div style='color:red'>Segnalazione non presente</div>");
			  } else
				  print_r($lat[0]."-".$lon[0]);
			}
			mysqli_close($mysqli);
		}
		mappa();
	
             
        ?>