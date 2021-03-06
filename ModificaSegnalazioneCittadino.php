<?php

session_start();
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
<script type="text/javascript">
function disattiva() {
document.getElementById("descrizione").disabled = true;
}
function attiva() {
document.getElementById("descrizione").disabled = false;
}
</script>

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
    <script type="text/javascript" src="tipoModifica.js"></script>
	
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
    </style>

  </head>

  <body id="page-top" onload="disattiva()">

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
              <a class="nav-link js-scroll-trigger" href="index.php">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>


    <header style="height:1420" class="masthead">
      <div class="container h-100">
        <div class="row h-100">
          <div class="col-lg-7 my-auto">
            <div class="header-content mx-auto">
              <h1 class="mb-5" style="color:orange">SEZIONE DEDICATA AL CITTADINO</h1> 
            </div>
			
	
	    
			
			  <?php
				 
				    $servername = "localhost";
	                $username = "root";
	                $password = "";
	                $dbname = "my_civic_sense";
					
					//create and check connection
	                if (!($mysqli = mysqli_connect($servername, $username, $password, $dbname))) 
			          die("Could not connect to database");
			        
			
			        if(!mysqli_select_db($mysqli, $dbname)) 
			          die("Could not open my_civic_sense database");
				    //creazione variabile codice di tracciamento della segnalazione
					$cdt = $_SESSION['$cdt'];
					
			        if(isset($_SESSION['$cdt']) != NULL) {
						//codice eseguito se inserito $cdt
						$query = "SELECT * FROM ticket WHERE CodicediTracciamento = $cdt";
						
						if(!($result = mysqli_query($mysqli, $query))) {
			              print_r("Could not execute query: ");
			              die(mysqli_error($mysqli));
			            }
				        //visualizzazione della tabella selezionata nella pagina Segnalazioni.php
				        if($row = mysqli_fetch_row($result)) {
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
						  echo "</table>";						  
		                } else
						  print_r("<p>Tracking code not found</p>");
					  
													
			            
						
				    }
					
                    
					
			     ?>
				 
                 <div font face="Arial, Helvetica, sans-serif"><a href="SegnalazioniCittadino.php"><strong>Modifica un'altra segnalazione</strong></a></div>
 
				 </br>
				 <!--Invio dei campi da modificare alla pagina ModificaSegnalazione.php-->
			<form enctype="multipart/form-data" method = 'POST' action = 'ModificaSegnalazioneCittadino.php'>
				 <label><strong>Selezionare il campo da modificare: </strong>
				 <select name = 'modCampo' id = 'tipo' onchange='scegliModifica()'>
				 <option onclick='disattiva()'>seleziona</option>
				 <option onclick='attiva()'>Descrizione</option>
				 <option onclick='disattiva()'>Categoria</option>
				 <option onclick='disattiva()'>Gravit&agrave;</option>
				 <option onclick='disattiva()'>Stato</option>
				 </select></label>
				 <div>  <!--select in cui inserire le modifiche-->
				 <label><strong>Selezionare la modifica: </strong>
				 <select name = 'Campo' id='tipoMod'>
				 <option>seleziona</option>
				 </select></label>
				 </div>
				 <div class="form-group">
	              <label class="col-form-label"><strong>Descrizione</strong></label>
                  <textarea class="form-control" name="descrizione" id="descrizione" type="text" rows="4" placeholder="Selezionare il campo Descrizione per modificare"></textarea>
                  <span style="color:#FF2D00" class="help-block"></span>
		        </div>
				<div class="form-group">
                  <label><strong>Inserisci video</strong></label>
                </div>
		 
                <div class="form-group">
                  <div class="col-sm-2 col-lg-3">
                    <input type="file" name="video" id="video">
                  </div>
			    </div>
				
			    <br>
                <div class="form-group">
                  <label><strong>Inserisci foto</strong></label>
                </div>
          
                <div class="form-group">
                  <div class="col-sm-2 col-lg-3">
                    <input type="file" name="foto" id="foto">
                  </div>
			    </div>
				 </br>
				 
				 <p><input class = 'btn btn-primary' type = 'submit' value = 'Invia'  name = 'Invia'></p>
				 
			</form>
 
				 <?php
				 
								//creazione della tabella aggiornata, in base ai campi inseriti nelle select precedenti
								$segna = 0;
							    if(isset($_SESSION['$cdt']) != NULL && isset($_POST['modCampo']) != NULL) {
								    $modifica = $_POST['modCampo'];
									
									if($modifica == "Gravità" && isset($_POST['Campo']) != NULL) { //se selezionata colonna "Gravita"
									  $campo = $_POST['Campo'];
										if($campo == "Bassa" || $campo == "Intermedia" || $campo == "Alta"){
											$segna++;
											$update = "UPDATE ticket SET gravitabox = '$campo' WHERE CodicediTracciamento = '$cdt'";
											
										    if(!($result = mysqli_query($mysqli, $update))) {
											    print_r("Could not execute query: ");
			                                    die(mysqli_error($mysqli));
											}
											$result1 = mysqli_query($mysqli, $query);
												if($row = mysqli_fetch_row($result1)) {
													echo "<strong>SEGNALAZIONE AGGIORNATA</strong>";
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
						                            echo "</table>";
                                                  												
											    }
												
							            }
									} else if($modifica == "Stato" && isset($_POST['Campo']) != NULL) { //se selezionata colonna "Stato"
									  $campo = $_POST['Campo'];
										if($campo == "Attiva" || $campo == "Conclusa"){
											$segna++;
											$update = "UPDATE ticket SET Stato = '$campo' WHERE CodicediTracciamento = '$cdt'";
											
											if(!($result = mysqli_query($mysqli, $update))) {
											    print_r("Could not execute query: ");
			                                    die(mysqli_error($mysqli));
											} 
											$result1 = mysqli_query($mysqli, $query);
												if($row = mysqli_fetch_row($result1)) {
													echo "<strong>SEGNALAZIONE AGGIORNATA</strong>";
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
						                            echo "</table>";
                                                    												
		                                        }
											
										}
									} else if($modifica == "Descrizione") { //se selezionata colonna "Descrizione"
									        $descrizione = $_POST['descrizione'];
											$segna++;
											$update = "UPDATE ticket SET descrizione = '$descrizione' WHERE CodicediTracciamento = '$cdt'";
											
											if(!($result = mysqli_query($mysqli, $update))) {
											    print_r("Could not execute query: ");
			                                    die(mysqli_error($mysqli));
											} 
											$result1 = mysqli_query($mysqli, $query);
												if($row = mysqli_fetch_row($result1)) {
													echo "<strong>SEGNALAZIONE AGGIORNATA</strong>";
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
						                            echo "</table>";
                                                    												
		                                        }
											
									} else if($modifica == "Categoria" && isset($_POST['Campo']) != NULL) { //se selezionata colonna "Categoria"
									  $campo = $_POST['Campo'];
									  print_r($campo);
										if($campo == "Autostrade" || $campo == "Acquedotto" || $campo == "Elettricità" || $campo == "Telefonia"){
											$segna++;
											$update = "UPDATE ticket SET categoriabox = '$campo' WHERE CodicediTracciamento = '$cdt'";
											
											if(!($result = mysqli_query($mysqli, $update))) {
											    print_r("Could not execute query: ");
			                                    die(mysqli_error($mysqli));
											} 
											$result1 = mysqli_query($mysqli, $query);
												if($row = mysqli_fetch_row($result1)) {
													echo "<strong>SEGNALAZIONE AGGIORNATA</strong>";
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
						                            echo "</table>";
                                                    												
		                                        }
											
										}
									}
									
								}
								
								if(isset($_FILES['foto']) != NULL){
									if (!isset($_FILES['foto']) || !is_uploaded_file($_FILES['foto']['tmp_name'])) {
                                        goto end;    
                                    }
                                    //percorso della cartella dove mettere i file caricati dagli utenti
                                    $uploaddir = 'C:/xampp/htdocs/bootstrap/my_civic_sense/img/';
                                    //Recupero il percorso temporaneo del file
                                    $userfile_tmp = $_FILES['foto']['tmp_name'];
                                    //recupero il nome originale del file caricato
                                    $userfile_name = $_FILES['foto']['name'];
                                    //copio il file dalla sua posizione temporanea alla mia cartella upload
                                    if (move_uploaded_file($userfile_tmp, $uploaddir . $userfile_name)) {
                                      //Se l'operazione è andata a buon fine...
                                      echo 'File inviato con successo. ';
									  echo '<br>';
                                    }else{
                                      //Se l'operazione è fallta...
                                      echo 'Upload NON valido!';
									  echo '<br>';
                                    }
									if(isset($userfile_name) != NULL) { 
										$segna++;
										$update = "UPDATE ticket SET foto = 'img/$userfile_name' WHERE CodicediTracciamento = '$cdt'";
									}
									if(!($result = mysqli_query($mysqli, $update))) {
											    print_r("Could not execute query: ");
			                                    die(mysqli_error($mysqli));
											} 
											$result1 = mysqli_query($mysqli, $query);
												if($row = mysqli_fetch_row($result1)) {
													echo "<strong>SEGNALAZIONE AGGIORNATA</strong>";
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
						                            echo "</table>";
                                                    												
		                                        }
		
 
									
								}
								end:
								
								if (isset($_FILES['video']) != NULL) {
					                if (!isset($_FILES['video']) || !is_uploaded_file($_FILES['video']['tmp_name'])) {
                                      goto finish;    
                                    }
                                    $uploaddir = 'C:/xampp/htdocs/bootstrap/my_civic_sense/img/';
                                    $userfile_tmp = $_FILES['video']['tmp_name'];
                                    $userfile_name = $_FILES['video']['name'];
                                    if (move_uploaded_file($userfile_tmp, $uploaddir . $userfile_name)) {
                                      echo 'File inviato con successo. ';
									  echo '<br>';
                                    }else {
                                      echo 'Upload NON valido!';
								      echo '<br>';
									}
									if(isset($userfile_name) != NULL) {
										$segna++;
										$update = "UPDATE ticket SET video = 'img/$userfile_name' WHERE CodicediTracciamento = '$cdt'";
									}
											if(!($result = mysqli_query($mysqli, $update))) {
											    print_r("Could not execute query: ");
			                                    die(mysqli_error($mysqli));
											} 
											$result1 = mysqli_query($mysqli, $query);
												if($row = mysqli_fetch_row($result1)) {
													echo "<strong>SEGNALAZIONE AGGIORNATA</strong>";
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
						                            echo "</table>";
                                                    												
		                                        }
								}
								finish:
								if($segna == 0) {
									print_r("Nessuna modifica effettuata");
								}
								
								mysqli_close($mysqli);
									

								
							
							
				 ?>

          </div>         
        </div>
      </div>
    </header>

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

  </body>

</html>
