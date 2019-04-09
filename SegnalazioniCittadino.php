<?php

 session_start();
if(isset($_POST["cdt"]) != NULL) {
	$_SESSION['$cdt'] = $_POST['cdt'];
}

if(!isset($_SESSION['username'])) {
	$nonLoggato = -2;
	$_SESSION['$nonLoggato']= $nonLoggato;
	 header("Location:index.php");
	 exit;
 }else {
	 $logout = -1;
     $_SESSION['$logout'] = $logout;
 }
 
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Civic Sense</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	
	<!-- Custom fonts for this template -->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendor/simple-line-icons/css/simple-line-icons.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
	
    <!-- Custom styles for this template -->
    <link href="css/new-age.min.css" rel="stylesheet">
   	<link href="css/new-age.css" rel="stylesheet">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	
         <style type="text/css">
	    .responsive {
	    width: 100%;
	    height: auto;
			}
    * {
    box-sizing: border-box;
			}
			.column {
				text-align: center;
		    float: left;
		    width: 33.33%;
		    padding: 5px;
			}
			/* Clearfix (clear floats) */
			.row::after {
		    content: "";
		    clear: both;
		    display: table;
			}
			@media screen and (min-width:250px) and (max-width:767px){
				stile media query
				table, thead, tbody, th, td, tr {
					display: block;
				}
				table tr td{
					border:0;
				}
				th{
				    position: absolute;     /* Nascondo intestazione */
				    top: -9999px;
				    left: -9999px;
				}
				td{
					position: relative;     /* Creazione spazio per l'intestazione */
					left: 15px;
					border:0;
				}
				tr:nth-child(even) {
					background-color: #CCCCCC;
				}
				tr:nth-child(odd) {
					background-color: #FFFFFF;
				}
				td:before {
				    position: relative;     /* Creazione delle altre celle per la descrizione */
				    top: 0px;
				    left: -15px;
				    width: 50%;  
				    font-weight:bold;
				    line-height:0px;
				}
				td:nth-of-type(1):before { content: "Codice di tracciamento"; } /* inserimento etichetta per ciascuna cella con il selettore nth-of-type */
				td:nth-of-type(2):before { content: "Latitudine"; }
				td:nth-of-type(3):before { content: "Longitudine"; }
				td:nth-of-type(4):before { content: "Descrizione"; }
				td:nth-of-type(5):before { content: "Video"; }
				td:nth-of-type(6):before { content: "Foto"; }
				td:nth-of-type(7):before { content: "Categoria"; }
				td:nth-of-type(8):before { content: "Gravità"; }
				td:nth-of-type(9):before { content: "Stato"; }
				td:nth-of-type(10):before { content: "Username"; }
				td:nth-of-type(11):before { content: "Data"; }
			}
			}
		
       }
    </style>

  </head>
  
  
  
  <body id="page-top">
  
  
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" style="color:orange" href="#page-top">CIVIC SENSE</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" style="color:orange" href="homeEnte.php">Home</a>
            </li>
			<li class="nav-item">
            <a class="nav-link" href="#myModa24" data-toggle="modal">Ticket</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="index.php">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
	
	<!--DIALOG PER INSERIMENTO TICKET-->
	
		<div class="modal fade" id="myModa24" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
        <div class="modal-content">
		
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Invio segnalazione</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
          </div>
		  
          <div class="modal-body">
            <form enctype="multipart/form-data" data-toggle="validator" role="form" method="POST" action="SegnalazioniCittadino.php">
			  
			    <div class="form-group">
                  <label style="visibility:hidden">Label</label>
                  <button class="btn btn-secondary btn-block" type='button' onclick="getLocation(),AttivaSubmit()" id="ottienigeolocalizzazione">
                    <a id="scrittainterna">Ottieni Posizione/Attiva Crea ticket</a>
                  </button>
                </div>
				
				<div class="form-group">
                  <label class="col-form-label">Username </label>
                  <input name="username" class="form-control" type="text" id="username" placeholder="Username">
				  <h6>Necessario se si ha intenzione in futuro di controllare lo stato della segnalazione e/o modificarla.</h6>
                </div>
            
                <div class="form-group">
                  <label>Latitudine</label>
                  <input name="latitudine" class="form-control" type="text" id="latitudine" readonly>
                </div>
           
            
                <div class="form-group">
                  <label>Longitudine</label>
                  <input name="longitudine" class="form-control" type="text" id="longitudine" readonly>
                </div>
				
				<div class="form-group">
                  <label>Data <font color="red">*</font></label>
                  <input name="data" class="form-control" type="date" id="data" required>
                </div>
            
		        <div class="form-group">
	              <label class="col-form-label">Descrizione <font color="red">*</font></label>
                  <textarea class="form-control" name="descrizione" type="text" rows="4" placeholder="Descrizione necessaria" required></textarea>
                  <span style="color:#FF2D00" class="help-block"></span>
		        </div>
		
			    <br>
                <div class="form-group">
                  <label>Inserisci video</label>
                </div>
		 
                <div class="form-group">
                  <div class="col-sm-2 col-lg-3">
                    <input type="file" name="video" id="video">
                  </div>
			    </div>
				
			    <br>
                <div class="form-group">
                  <label>Inserisci foto</label>
                </div>
          
                <div class="form-group">
                  <div class="col-sm-2 col-lg-3">
                    <input type="file" name="foto" id="foto">
                  </div>
			    </div>
				
			    <div class="form-group">
			      <div class="select-group"><label>Categoria <font color="red">*</font></label>
                    <div class="dropdown">
                      <div>
                        <select name="categoriabox" required class="custom-select">
                          <option name="autostrade" value="Autostrade">Autostrade</option>
                          <option name="aquedotto" value="Acquedotto">Acquedotto</option>
                          <option name="enel" value="Elettricita">Elettricit&agrave;</option>
						  <option name="telefono" value="Telefonia">Telefonia</option>
                        </select>
                      </div>
                    </div>
                  </div>
			    </div>
			 
			    <div class="form-group">
			      <div class="select-group"><label>Gravità <font color="red">*</font></label>
                    <div class="dropdown">
                      <div>
                        <select name="gravitabox" required class="custom-select">
                          <option name="Alta" value="Alta">Alta</option>
                          <option name="Intermedia" value="Intermedia">Intermedia</option>
                          <option name="Bassa" value="Bassa">Bassa</option>
                        </select>
                      </div>
                    </div>
                  </div>
			    </div>
			 
			   <div class="form-group">
                 <div class="col-sm-4 col-lg-3">
                   <input type="submit" class="form-control btn btn-primary" id="ticket" value="INVIA" name="ticket"> 
                 </div>
               </div>
			   
			   <div class="form-group">
                 <div class="col-sm-4 col-lg-3">
                   <button onclick="location.href='SegnalazioniCittadino.php'" type="button" class="btn btn-danger btn-block">Annulla</button>
                 </div>
               </div>
              </form>
			</div>
	      </div>
        </div>
      </div>
	  

	<header style="height:auto" class="masthead">
      <div class="container h-100">
        <div class="row h-100">
          <div class="col-lg-7 my-auto">
            <div class="header-content mx-auto">
			  <h1 class="mb-5" style="color:orange">SEZIONE DEDICATA AL CITTADINO </h1>
			  
			  <form method = "post" action = "SegnalazioniCittadino.php">
                <div font face="Arial, Helvetica, sans-serif"><p><strong>Inserire il codice di tracciamento della segnalazione che si intende ricercare o modificare: </strong></p>  
	            <p><input type = "text" name = "cdt" placeholder = "Codice di tracciamento">
		        <input class="btn btn-primary" type = "submit" value = "Invia" name = "Invia"></p>
				</div>
				</form>
				
				<form method = 'POST' action = 'SegnalazioniCittadino.php'>
				 <div font face="Arial, Helvetica, sans-serif"><p><strong>Visualizzare elenco segnalazioni attive/concluse: </strong></p>
				 <select name = 'visual' id = 'visual'>
				 <option>Tutte</option>
				 <option>Attive</option>
				 <option>Concluse</option>
				 </select>
				 
				 <input class = 'btn btn-primary' type = 'submit' value = 'Invia'  name = 'Invia'></div>
				 
			    </form>
				
				</br>

			     <?php
				 
				 
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
					  
					$query = "SELECT * FROM ticket WHERE Username = '".$_SESSION['username']."'";
					
			        //esegui query
			        if(!($result = mysqli_query($mysqli, $query))) {
			          print_r("Could not execute query: ");
			          die(mysqli_error($mysqli));
			        }
					
					$username = $_SESSION["username"];
				    //cdt: codice di tracciamento
			        if(isset($_POST["cdt"]) != NULL && isset($username) != NULL) {
					    
				        $cdt = $_POST["cdt"];
				        
						$query1 = "SELECT * FROM ticket WHERE CodicediTracciamento = $cdt and Username = '$username'";
						
						if(!($result1 = mysqli_query($mysqli, $query1))) {
			              print_r("Could not execute query: ");
			              die(mysqli_error($mysqli));
			            }
				
				        if($row1 = mysqli_fetch_row($result1)) {
						  echo "<table align='center' bgcolor='#FFFFFF' border=\"2\" cellspacing=\"1\" cellpadding=\"1\">";
	                      echo "<tr>";
	                      echo "<th><font face=\"Arial, Helvetica, sans-serif\">Codice di tracciamento</font></th>";
	                      echo "<th><font face=\"Arial, Helvetica, sans-serif\">Latitudine</font></th>";
		                  echo "<th><font face=\"Arial, Helvetica, sans-serif\">Longitudine</font></th>";
		                  echo "<th><font face=\"Arial, Helvetica, sans-serif\">Descrizione</font></th>";
	                      echo "<th><font face=\"Arial, Helvetica, sans-serif\">Video</font></th>";
	                      echo "<th><font face=\"Arial, Helvetica, sans-serif\">Foto</font></th>";
	                      echo "<th><font face=\"Arial, Helvetica, sans-serif\">Categoria</font></th>";
	                      echo "<th><font face=\"Arial, Helvetica, sans-serif\">Gravit&agrave;</font></th>";
						  echo "<th><font face=\"Arial, Helvetica, sans-serif\">Stato</font></th>";
						  echo "<th><font face=\"Arial, Helvetica, sans-serif\">Username</font></th>";
						  echo "<th><font face=\"Arial, Helvetica, sans-serif\">data</font></th>";
	                      echo "</tr>";
			              print_r("<tr>");	
				            $row1[0] = print_r("<td align = 'center'><font face='Arial, Helvetica, sans-serif'>$row1[0]</font></td>");
		                    $row1[1] = print_r("<td align = 'center'><font face='Arial, Helvetica, sans-serif'>$row1[1]</font></td>");
					        $row1[2] = print_r("<td align = 'center'><font face='Arial, Helvetica, sans-serif'>$row1[2]</font></td>");
						    $row1[3] = print_r("<td align = 'center'><font face='Arial, Helvetica, sans-serif'>$row1[3]</font></td>");
							$row1[4] = print_r("<td align = 'center'><a href='$row1[4]' face='Arial, Helvetica, sans-serif'>$row1[4]</a></td>");
							$row1[5] = print_r("<td align = 'center'><a href='$row1[5]' face='Arial, Helvetica, sans-serif'>$row1[5]</a></td>");
							$row1[6] = print_r("<td align = 'center'><font face='Arial, Helvetica, sans-serif'>$row1[6]</font></td>");
						    $row1[7] = print_r("<td align = 'center'><font face='Arial, Helvetica, sans-serif'>$row1[7]</font></td>");
							$row1[8] = print_r("<td align = 'center'><font face='Arial, Helvetica, sans-serif'>$row1[8]</font></td>");
							$row1[9] = print_r("<td align = 'center'><font face='Arial, Helvetica, sans-serif'>$row1[9]</font></td>");
							$row1[10] = print_r("<td align = 'center'><font face='Arial, Helvetica, sans-serif'>$row1[10]</font></td>");
                          print_r("</tr>");
						  echo "</table>";
						  
						   
				        // bottoni per modifica e cancella segnalazione
				          print_r("<a href = 'http://localhost/bootstrap/my_civic_sense/ModificaSegnalazioneCittadino.php'>");
						  print_r("<img src='img/Modifica.png' alt = 'Modifica' title = 'Modifica' value = 'Modifica' name='Modifica' width=30 height=30>");
						  print_r("</a>");

		                } else 
						  print_r("<p>Tracking code not found</p>");

						
				    }
				 
				   //creazione della tabella aggiornata, in base ai campi inseriti nelle select precedenti
								
								$notsegn = "<p style='color:red;'>Selezionare quali segnalazioni si vogliono visualizzare</p>";
							    if(isset($_POST['visual']) != NULL) {
								    $visual = $_POST['visual'];
									
									if($visual == "Tutte") { //se selezionate tutte le visualizzazioni
											$query = "SELECT * FROM `ticket` WHERE Username = '$username'";
											
										    if(!($result = mysqli_query($mysqli, $query))) {
											    print_r("Could not execute query: ");
			                                    die(mysqli_error($mysqli));
											}
											$result = mysqli_query($mysqli, $query);
												if($row = mysqli_fetch_row($result)) {
													echo "<strong>ELENCO COMPLETO SEGNALAZIONI DI $username</strong>";
													echo "<table align='center' bgcolor='#FFFFFF' border=\"2\" cellspacing=\"1\" cellpadding=\"1\">";
													echo "<tr>";
													echo "<th><font face=\"Arial, Helvetica, sans-serif\">Codice di tracciamento</font></th>";
	                                                echo "<th><font face=\"Arial, Helvetica, sans-serif\">Latitudine</font></th>";
		                                            echo "<th><font face=\"Arial, Helvetica, sans-serif\">Longitudine</font></th>";
		                                            echo "<th><font face=\"Arial, Helvetica, sans-serif\">Descrizione</font></th>";
	                                                echo "<th><font face=\"Arial, Helvetica, sans-serif\">Video</font></th>";
	                                                echo "<th><font face=\"Arial, Helvetica, sans-serif\">Foto</font></th>";
	                                                echo "<th><font face=\"Arial, Helvetica, sans-serif\">Categoria</font></th>";
	                                                echo "<th><font face=\"Arial, Helvetica, sans-serif\">Gravit&agrave;</font></th>";
						                            echo "<th><font face=\"Arial, Helvetica, sans-serif\">Stato</font></th>";
													echo "<th><font face=\"Arial, Helvetica, sans-serif\">Username</font></th>";
													echo "<th><font face=\"Arial, Helvetica, sans-serif\">data</font></th>";
	                                                echo "</tr>";
			                                        do{
			                                          print_r("<tr>");
				                                        $row[0] = print_r("<td align = 'center'><font face='Arial, Helvetica, sans-serif'>$row[0]</font></td>");
		                                                $row[1] = print_r("<td align = 'center'><font face='Arial, Helvetica, sans-serif'>$row[1]</font></td>");
					                                    $row[2] = print_r("<td align = 'center'><font face='Arial, Helvetica, sans-serif'>$row[2]</font></td>");
						                                $row[3] = print_r("<td align = 'center'><font face='Arial, Helvetica, sans-serif'>$row[3]</font></td>");
							                            $row[4] = print_r("<td align = 'center'><a href='$row[4]' face='Arial, Helvetica, sans-serif'>$row[4]</a></td>");
							                            $row[5] = print_r("<td align = 'center'><a href='$row[5]' face='Arial, Helvetica, sans-serif'>$row[5]</a></td>");
							                            $row[6] = print_r("<td align = 'center'><font face='Arial, Helvetica, sans-serif'>$row[6]</font></td>");
						                                $row[7] = print_r("<td align = 'center'><font face='Arial, Helvetica, sans-serif'>$row[7]</font></td>");
							                            $row[8] = print_r("<td align = 'center'><font face='Arial, Helvetica, sans-serif'>$row[8]</font></td>");
							                            $row[9] = print_r("<td align = 'center'><font face='Arial, Helvetica, sans-serif'>$row[9]</font></td>");
							                            $row[10] = print_r("<td align = 'center'><font face='Arial, Helvetica, sans-serif'>$row[10]</font></td>");
                                                      print_r("</tr>");				
		                                            } while($row = mysqli_fetch_row($result));	
						                            echo "</table>";
                                                  												
											    }
												
									} else if($visual == "Attive") { //se selezionate le visualizzazioni attive
											$query1 = "SELECT * FROM `ticket` WHERE Stato = 'Attiva' and Username = '$username'";
											
											if(!($result1 = mysqli_query($mysqli, $query1))) {
											    print_r("Could not execute query: ");
			                                    die(mysqli_error($mysqli));
											} 
											$result1 = mysqli_query($mysqli, $query1);
												if($row1 = mysqli_fetch_row($result1)) {
													echo "<strong>ELENCO SEGNALAZIONI ATTIVE DI $username</strong>";
													echo "<table align='center' bgcolor='#FFFFFF' border=\"2\" cellspacing=\"1\" cellpadding=\"1\">";
													echo "<tr>";
													echo "<th><font face=\"Arial, Helvetica, sans-serif\">Codice di tracciamento</font></th>";
	                                                echo "<th><font face=\"Arial, Helvetica, sans-serif\">Latitudine</font></th>";
		                                            echo "<th><font face=\"Arial, Helvetica, sans-serif\">Longitudine</font></th>";
		                                            echo "<th><font face=\"Arial, Helvetica, sans-serif\">Descrizione</font></th>";
	                                                echo "<th><font face=\"Arial, Helvetica, sans-serif\">Video</font></th>";
	                                                echo "<th><font face=\"Arial, Helvetica, sans-serif\">Foto</font></th>";
	                                                echo "<th><font face=\"Arial, Helvetica, sans-serif\">Categoria</font></th>";
	                                                echo "<th><font face=\"Arial, Helvetica, sans-serif\">Gravit&agrave;</font></th>";
						                            echo "<th><font face=\"Arial, Helvetica, sans-serif\">Stato</font></th>";
													echo "<th><font face=\"Arial, Helvetica, sans-serif\">Username</font></th>";
													echo "<th><font face=\"Arial, Helvetica, sans-serif\">data</font></th>";
	                                                echo "</tr>";
			                                        do{
			                                          print_r("<tr>");
				                                        $row1[0] = print_r("<td align = 'center'><font face='Arial, Helvetica, sans-serif'>$row1[0]</font></td>");
		                                                $row1[1] = print_r("<td align = 'center'><font face='Arial, Helvetica, sans-serif'>$row1[1]</font></td>");
					                                    $row1[2] = print_r("<td align = 'center'><font face='Arial, Helvetica, sans-serif'>$row1[2]</font></td>");
						                                $row1[3] = print_r("<td align = 'center'><font face='Arial, Helvetica, sans-serif'>$row1[3]</font></td>");
							                            $row1[4] = print_r("<td align = 'center'><a href='$row1[4]' face='Arial, Helvetica, sans-serif'>$row1[4]</a></td>");
							                            $row1[5] = print_r("<td align = 'center'><a href='$row1[5]' face='Arial, Helvetica, sans-serif'>$row1[5]</a></td>");
							                            $row1[6] = print_r("<td align = 'center'><font face='Arial, Helvetica, sans-serif'>$row1[6]</font></td>");
						                                $row1[7] = print_r("<td align = 'center'><font face='Arial, Helvetica, sans-serif'>$row1[7]</font></td>");
							                            $row1[8] = print_r("<td align = 'center'><font face='Arial, Helvetica, sans-serif'>$row1[8]</font></td>");
							                            $row1[9] = print_r("<td align = 'center'><font face='Arial, Helvetica, sans-serif'>$row1[9]</font></td>");
							                            $row1[10] = print_r("<td align = 'center'><font face='Arial, Helvetica, sans-serif'>$row1[10]</font></td>");
                                                      print_r("</tr>");				
		                                            } while($row1 = mysqli_fetch_row($result1));
						                            echo "</table>";
                                                    												
		                                        }
											
									} else if($visual == "Concluse") { //se selezionate le visualizzazioni concluse
											$query2 = "SELECT * FROM `ticket` WHERE Stato = 'Conclusa' and Username = '$username'";
											
											if(!($result2 = mysqli_query($mysqli, $query2))) {
											    print_r("Could not execute query: ");
			                                    die(mysqli_error($mysqli));
											} 
											$result2 = mysqli_query($mysqli, $query2);
												if($row2 = mysqli_fetch_row($result2)) {
													echo "<strong>ELENCO SEGNALAZIONI CONCLUSE DI $username</strong>";
													echo "<table align='center' bgcolor='#FFFFFF' border=\"2\" cellspacing=\"1\" cellpadding=\"1\">";
													echo "<tr>";
													echo "<th><font face=\"Arial, Helvetica, sans-serif\">Codice di tracciamento</font></th>";
	                                                echo "<th><font face=\"Arial, Helvetica, sans-serif\">Latitudine</font></th>";
		                                            echo "<th><font face=\"Arial, Helvetica, sans-serif\">Longitudine</font></th>";
		                                            echo "<th><font face=\"Arial, Helvetica, sans-serif\">Descrizione</font></th>";
	                                                echo "<th><font face=\"Arial, Helvetica, sans-serif\">Video</font></th>";
	                                                echo "<th><font face=\"Arial, Helvetica, sans-serif\">Foto</font></th>";
	                                                echo "<th><font face=\"Arial, Helvetica, sans-serif\">Categoria</font></th>";
	                                                echo "<th><font face=\"Arial, Helvetica, sans-serif\">Gravit&agrave;</font></th>";
						                            echo "<th><font face=\"Arial, Helvetica, sans-serif\">Stato</font></th>";
													echo "<th><font face=\"Arial, Helvetica, sans-serif\">Username</font></th>";
													echo "<th><font face=\"Arial, Helvetica, sans-serif\">data</font></th>";
	                                                echo "</tr>";
			                                        do{
			                                          print_r("<tr>");
				                                        $row2[0] = print_r("<td align = 'center'><font face='Arial, Helvetica, sans-serif'>$row2[0]</font></td>");
		                                                $row2[1] = print_r("<td align = 'center'><font face='Arial, Helvetica, sans-serif'>$row2[1]</font></td>");
					                                    $row2[2] = print_r("<td align = 'center'><font face='Arial, Helvetica, sans-serif'>$row2[2]</font></td>");
						                                $row2[3] = print_r("<td align = 'center'><font face='Arial, Helvetica, sans-serif'>$row2[3]</font></td>");
							                            $row2[4] = print_r("<td align = 'center'><a href='$row2[4]' face='Arial, Helvetica, sans-serif'>$row2[4]</a></td>");
							                            $row2[5] = print_r("<td align = 'center'><a href='$row2[5]' face='Arial, Helvetica, sans-serif'>$row2[5]</a></td>");
							                            $row2[6] = print_r("<td align = 'center'><font face='Arial, Helvetica, sans-serif'>$row2[6]</font></td>");
						                                $row2[7] = print_r("<td align = 'center'><font face='Arial, Helvetica, sans-serif'>$row2[7]</font></td>");
							                            $row2[8] = print_r("<td align = 'center'><font face='Arial, Helvetica, sans-serif'>$row2[8]</font></td>");
							                            $row2[9] = print_r("<td align = 'center'><font face='Arial, Helvetica, sans-serif'>$row2[9]</font></td>");
							                            $row2[10] = print_r("<td align = 'center'><font face='Arial, Helvetica, sans-serif'>$row2[10]</font></td>");
                                                      print_r("</tr>");				
		                                            } while($row2 = mysqli_fetch_row($result2));
						                            echo "</table>";
                                                    												
		                                        }
									
								    } else {
									    print_r($notsegn);
								    }
								}
								mysqli_close($mysqli);

				 ?>
			
		 </div> 	
        </div>
      </div>
    </header>
	
	<script>
      // Enable button
      function AttivaSubmit(){
        document.getElementById('creaticket').removeAttribute('disabled');
      }
    </script>
    <script>
    var x = document.getElementById("latitudine");
    var y = document.getElementById("longitudine");
    var z = document.getElementById("ottienigeolocalizzazione");
    var zz = document.getElementById("scrittainterna");
    // Geolocalizzazione
    function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        zz.innerHTML = "Geolocation is not supported by this browser.";
    }
    }
    // Coordinate
    function showPosition(position) {
        latitudine.value = position.coords.latitude;
        longitudine.value = position.coords.longitude;
        zz.innerHTML = "Posizione registrata";
        z.disabled = true;
        x.readonly = true;
        y.readonly = true;
    }
    </script>
    <script>
      // Mostra Data
      function showdate(){
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth()+1;
        var yyyy = today.getFullYear();
        if(dd<10) {
          dd = '0'+dd
        }
        if(mm<10) {
          mm = '0'+mm
        }
        today = yyyy + '-' + mm + '-' + dd;
        date.placeholder = today;
      }
    </script>
	
	<section class="contact bg-primary" id="contact">
      <div class="container">
        <h2>Contatti</h2>
        <ul class="lista"><center>
        <li><i class="fa fa-home fa"></i>Universit&agrave;  degli Studi di Bari "Aldo Moro"</li>
		<li><i class="fa fa-home fa"></i>E-mail: w.dipace@studenti.uniba.it</li>
		<li><i class="fa fa-home fa"></i>E-mail: d.dicuonzo@studenti.uniba.it</li>
        </ul>
       
      </div>
    </section>

    <footer>
      <div class="container">
        <p>&copy; 2019 Copyright: Walter Dipace &amp; Domenico Dicuonzo</p>
        <ul class="list-inline">
          <li class="list-inline-item">
            <a href="#">Privacy</a>
          </li>
          <li class="list-inline-item">
            <a href="#">Terms</a>
          </li>
          <li class="list-inline-item">
            <a href="#">FAQ</a>
          </li>
        </ul>
      </div>
    </footer>
	
	<!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/new-age.min.js"></script>

  </body>
  
  <?php
 //INVIO TICKET
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "my_civic_sense";

             
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if(isset($_POST['ticket'])){
	    if (!isset($_FILES['foto']) || !is_uploaded_file($_FILES['foto']['tmp_name'])) {
		  $userfile_nameFoto = $_FILES['foto']['name'];
          goto end;    
        }
        //percorso della cartella dove mettere i file caricati dagli utenti
        $uploaddir = 'C:/xampp/htdocs/bootstrap/my_civic_sense/img/';
        //Recupero il percorso temporaneo del file
        $userfile_tmpFoto = $_FILES['foto']['tmp_name'];
		$filenameFoto = $_FILES['foto']['name'];
        //recupero il nome originale del file caricato
        $userfile_nameFoto = "img/".$_FILES['foto']['name'];
        //copio il file dalla sua posizione temporanea alla mia cartella upload
        if (move_uploaded_file($userfile_tmpFoto, $uploaddir . $filenameFoto)) {
          //Se l'operazione è andata a buon fine...
          echo 'File inviato con successo.';
		  echo '<br>';
        }else{
          //Se l'operazione è fallta...
          echo 'Upload NON valido!'; 
		  echo '<br>';
        }
		end:
		
		if (!isset($_FILES['video']) || !is_uploaded_file($_FILES['video']['tmp_name'])) {
		  $userfile_nameVideo = $_FILES['video']['name'];
          goto finish;    
        }
        $uploaddir = 'C:/xampp/htdocs/bootstrap/my_civic_sense/img/';
        $userfile_tmpVideo = $_FILES['video']['tmp_name'];
		$filenameVideo = $_FILES['video']['name'];
        $userfile_nameVideo = "img/".$_FILES['video']['name'];
        if (move_uploaded_file($userfile_tmpVideo, $uploaddir . $filenameVideo)) {
          echo 'File inviato con successo.';
		  echo '<br>';
        }else{
          echo 'Upload NON valido!'; 
		  echo '<br>';
        }
		finish:
		
	$latitudine=$_POST['latitudine'];	
    $longitudine=$_POST['longitudine'];	
    $descrizione=$_POST['descrizione'];
    $categoriabox=$_POST['categoriabox'];
    $gravitabox=$_POST['gravitabox'];
    $username=$_POST['username'];
	$data=$_POST['data'];
												 
  $sql = "INSERT INTO ticket (latitudine, longitudine, descrizione, video, foto, categoriabox, gravitabox, username, data) VALUES ('$latitudine', '$longitudine', '$descrizione', '$userfile_nameVideo', '$userfile_nameFoto', '$categoriabox', '$gravitabox', '$username', '$data')"; 
  $query = "SELECT CodicediTracciamento FROM ticket ORDER BY CodicediTracciamento DESC LIMIT 1";
								

  if ($conn->query($sql) === TRUE) {
	if(!($result = mysqli_query($conn, $query))) {
	  print_r("Could not execute query: ");
	  die(mysqli_error($conn));
    } 
    if($row = mysqli_fetch_array($result)) {
	  $codice = "Di seguito è indicato il codice di tracciamento della segnalazione da te aperta: ".$row["CodicediTracciamento"];
	  print_r("<script type='text/javascript'>window.alert('$codice');</script>");
    }
	print_r("<meta http-equiv='refresh' content='0;URL=SegnalazioniCittadino.php'>");
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
$conn->close();

 ?> 
  
</html>