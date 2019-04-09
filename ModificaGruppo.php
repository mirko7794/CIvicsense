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
				td:nth-of-type(1):before { content: "ID Gruppo"; } /* inserimento etichetta per ciascuna cella con il selettore nth-of-type */
				td:nth-of-type(2):before { content: "Città"; }
				td:nth-of-type(3):before { content: "CAP"; }
				td:nth-of-type(4):before { content: "Codice segnalazione assegnata"; }
			}
			}
		
       }
    </style>

  </head>

  <body id="page-top" align = "center">

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
              <a class="navbar-brand js-scroll-trigger" style="color:orange" href="homeEnte.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="index.php">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>


    <header class="masthead">
      <div class="container h-100">
        <div class="row h-100">
          <div class="col-lg-7 my-auto">
            <div class="header-content mx-auto">
              <h1 class="mb-5" style="color:orange">SEZIONE DEDICATA AL PERSONALE ENTE</h1> 
            </div>
			
	
	    
			
			  <?php
				 
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
					
			        if(isset($_SESSION['idGruppo']) != NULL) {
						
						$query = "SELECT * FROM `gruppo di risoluzione` WHERE `ID Gruppo` = $id";
						
						if(!($result = mysqli_query($mysqli, $query))) {
			              print_r("Could not execute query: ");
			              die(mysqli_error($mysqli));
			            }
				
				        if($row = mysqli_fetch_row($result)) {
						  echo "<table align='center' bgcolor='#FFFFFF' border=\"2\" cellspacing=\"1\" cellpadding=\"1\">";
	                      echo "<tr>";
	                      echo "<th><font face=\"Arial, Helvetica, sans-serif\">ID Gruppo</font></th>";
	                      echo "<th><font face=\"Arial, Helvetica, sans-serif\">Citt&agrave;</font></th>";
		                  echo "<th><font face=\"Arial, Helvetica, sans-serif\">CAP</font></th>";
		                  echo "<th><font face=\"Arial, Helvetica, sans-serif\">Codice segnalazione assegnata</font></th>";
	                      echo "</tr>";
			              print_r("<tr>");
		                  foreach($row as $key => $value)
				            print_r("<td align = 'center'><font face=\"Arial, Helvetica, sans-serif\">$value</font></td>"); 
                          print_r("</tr>");	
						  echo "</table>";						  
		                } else
						  print_r("<p>Tracking code not found</p>");
					  
													
			            
						
				    }
					
                    
					
			     ?>
				 
				 <div align='center' font face="Arial, Helvetica, sans-serif"><a href="Gruppo di risoluzione.php"><strong>Modifica un altro gruppo di risoluzione</strong></a></div>
 
				 </br>
				 
				 <form method = 'POST' action = 'ModificaGruppo.php'>
				 <label><strong>Selezionare il campo da modificare: </strong>
				 <select name = 'modCampo' id = 'tipo'>
				 <option>seleziona</option>
				 <option>Citt&agrave;</option>
				 <option>CAP</option>
				 <option>Codice Segnalazione assegnata</option>
				 </select></label>
				 
                 <div font face="Arial, Helvetica, sans-serif"><strong>Inserire la modifica: </strong>  
	             <input type = "text" name = 'Campo' id = "tipoMod">
				 </div>
				 </br>
				 <p><input class="btn btn-primary" type = "submit" value = "Invia" name = "Invia"></p>
				 </form>
				 
				 
				 
				 <?php
								
								$notsegn = "<p style='color:black;'>Selezionare dei campi da modificare</p>";
							    if(isset($id) != NULL && isset($_POST['modCampo']) != NULL && isset($_POST['Campo']) != NULL) {
								    $modifica = $_POST['modCampo'];
									$campo = $_POST['Campo'];

									
									if($modifica == "Città") {
										
									    $update = "UPDATE `gruppo di risoluzione` SET `Citta` = '$campo' WHERE `gruppo di risoluzione`.`ID Gruppo` = '$id'";
											
										if(!($result = mysqli_query($mysqli, $update))) {
											print_r("Could not execute query: ");
			                                die(mysqli_error($mysqli));
									    }
										$result1 = mysqli_query($mysqli, $query);
										if($row = mysqli_fetch_row($result1)) {
										    echo "<div align='center'><strong>GRUPPO DI RISOLUZIONE AGGIORNATO</strong></div>";
											echo "<table align='center' bgcolor='#FFFFFF' border=\"2\" cellspacing=\"1\" cellpadding=\"1\">";
											echo "<tr>";
											echo "<th><font face=\"Arial, Helvetica, sans-serif\">ID Gruppo</font></th>";
	                                        echo "<th><font face=\"Arial, Helvetica, sans-serif\">Citt&agrave;</font></th>";
		                                    echo "<th><font face=\"Arial, Helvetica, sans-serif\">CAP</font></th>";
		                                    echo "<th><font face=\"Arial, Helvetica, sans-serif\">Codice segnalazione assegnata</font></th>";
	                                        echo "</tr>";
			                                print_r("<tr>");
		                                    foreach($row as $key => $value)
				                                print_r("<td align = 'center'><font face=\"Arial, Helvetica, sans-serif\">$value</font></td>"); 
                                            print_r("</tr>");	
						                    echo "</table>";
									    }
									} else if($modifica == "CAP") {
										
											$update = "UPDATE `gruppo di risoluzione` SET `CAP` = '$campo' WHERE `ID Gruppo` = $id";
											
											if(!($result = mysqli_query($mysqli, $update))) {
											    print_r("Could not execute query: ");
			                                    die(mysqli_error($mysqli));
											} 
											$result1 = mysqli_query($mysqli, $query);
												if($row = mysqli_fetch_row($result1)) {
													echo "<div align='center'><strong>GRUPPO DI RISOLUZIONE AGGIORNATO</strong></div>";
													echo "<table align='center' bgcolor='#FFFFFF' border=\"2\" cellspacing=\"1\" cellpadding=\"1\">";
													echo "<tr>";
													echo "<th><font face=\"Arial, Helvetica, sans-serif\">ID Gruppo</font></th>";
	                                                echo "<th><font face=\"Arial, Helvetica, sans-serif\">Citt&agrave;</font></th>";
		                                            echo "<th><font face=\"Arial, Helvetica, sans-serif\">CAP</font></th>";
		                                            echo "<th><font face=\"Arial, Helvetica, sans-serif\">Codice segnalazione assegnata</font></th>";
	                                                echo "</tr>";
			                                        print_r("<tr>");
		                                            foreach($row as $key => $value)
				                                      print_r("<td align = 'center'><font face=\"Arial, Helvetica, sans-serif\">$value</font></td>"); 
                                                    print_r("</tr>");	
						                            echo "</table>";
                                                    												
		                                        }
											
									} else if($modifica == "Codice Segnalazione assegnata") {
										
											$update = "UPDATE `gruppo di risoluzione` SET `CodicediTracciamento` = '$campo' WHERE `gruppo di risoluzione`.`ID Gruppo` = '$id'";
											
											if(!($result = mysqli_query($mysqli, $update))) {
											    print_r("Could not execute query: ");
			                                    die(mysqli_error($mysqli));
											} 
											$result1 = mysqli_query($mysqli, $query);
												if($row = mysqli_fetch_row($result1)) {
													echo "<div align='center'><strong>GRUPPO DI RISOLUZIONE AGGIORNATO</strong></div>";
													echo "<table align='center' bgcolor='#FFFFFF' border=\"2\" cellspacing=\"1\" cellpadding=\"1\">";
													echo "<tr>";
													echo "<th><font face=\"Arial, Helvetica, sans-serif\">ID Gruppo</font></th>";
	                                                echo "<th><font face=\"Arial, Helvetica, sans-serif\">Citt&agrave;</font></th>";
		                                            echo "<th><font face=\"Arial, Helvetica, sans-serif\">CAP</font></th>";
		                                            echo "<th><font face=\"Arial, Helvetica, sans-serif\">Codice segnalazione assegnata</font></th>";
	                                                echo "</tr>";
			                                        print_r("<tr>");
		                                            foreach($row as $key => $value)
				                                      print_r("<td align = 'center'><font face=\"Arial, Helvetica, sans-serif\">$value</font></td>"); 
                                                    print_r("</tr>");	
						                            echo "</table>";
                                                    												
		                                        }
											
									} else
										print_r($notsegn);
									
								} else{
									print_r($notsegn);
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


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/new-age.min.js"></script>
    <script src="assets2/js/carousel.js"></script>
    <!--js nuovo-->
    

  </body>

</html>
