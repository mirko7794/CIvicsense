<?php 
session_start();
                            //funzione che esegue su db la cancellazione di un gruppo di risoluzione e restituisce il risultato alla pagina Gruppo di risoluzione.php
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
							  
							    
							
								$id = $_SESSION['idGruppo'];
							    if(isset($id) != NULL) {
								  $segn = "<p style='color:red;'>Gruppo di risoluzione eliminato</p>";								  
							      $delete = "DELETE FROM `gruppo di risoluzione` WHERE `ID Gruppo` = $id";
							      if(!($result2 = mysqli_query($mysqli, $delete))) {
			                        print_r("<p style='color:red;'>Could not execute query: </p>");
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