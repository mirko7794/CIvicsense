<?php 
session_start();
                            //funzione che esegue su db la cancellazione di una segnalazione e restituisce il risultato alla pagina Segnalazioni.php
                            function cancella() {
						        $servername = "localhost";
	                            $username = "root";                           
	                            $password = "";
	                            $dbname = "my_civic_sense";
					
					            // Create and check connection
	                            if (!($mysqli = mysqli_connect($servername, $username, $password, $dbname))) 
			                      die("Could not connect to database");
			        
			                    if(!mysqli_select_db($mysqli, $dbname)) 
			                      die("Could not open my_civic_sense database");
							  
							    
							
								$cdt = $_SESSION['$cdt'];
							    if(isset($cdt) != NULL) {
								  $segn = "<p style='color:red;'>Segnalazione eliminata</p>";								  
							      $delete = "DELETE FROM ticket WHERE CodicediTracciamento = $cdt";
							      if(!($result2 = mysqli_query($mysqli, $delete))) {
			                        print_r("Could not execute query: ");
			                        die(mysqli_error($mysqli));
							      } else
								    print_r($segn);
								} else{
									$notsegn = "<p style='color:red;'>Operazione non andata a buon fine</p>";
								 }
                                mysqli_close($mysqli);								 
						    }
							cancella();
?>



