<?php

session_start();
if(isset($_POST["idGruppo"]) != NULL) {
	$_SESSION['idGruppo'] = $_POST['idGruppo'];
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
	
	<script type="text/javascript" src="stats/Chart.bundle.min.js"></script>
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
				td:nth-of-type(1):before { content: "ID Gruppo"; } /* inserimento etichetta per ciascuna cella con il selettore nth-of-type */
				td:nth-of-type(2):before { content: "Città"; }
				td:nth-of-type(3):before { content: "CAP"; }
				td:nth-of-type(4):before { content: "Codice segnalazione assegnata"; }
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
            <a class="nav-link" href="#myModa24" data-toggle="modal">Inserisci gruppo</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="index.php">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    
	
	
	<!--DIALOG PER INSERIMENTO GRUPPO-->
	
	<div class="modal fade" id="myModa24" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
        <div class="modal-content">
		
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Inserisci nuovo gruppo di risoluzione</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
          </div>
		  
            <div class="modal-body">
              <form data-toggle="validator" role="form" method="POST" action="Gruppo di risoluzione.php">
            
          
		        <div class="form-group">
	              <label class="col-form-label">Città <font color="red">*</font></label>
                  <input name="città" class="form-control" type="text" id="città" placeholder="Inserisci la città del gruppo" required>
		        </div>
				
				<div class="form-group">
	              <label class="col-form-label">CAP <font color="red">*</font></label>
                  <input name="CAP" class="form-control" type="text" id="CAP" placeholder="Inserisci il CAP del gruppo" required>
		        </div>
		
			    <div class="form-group">
	              <label class="col-form-label">Codice della segnalazione</label>
                  <input name="cdt" class="form-control" type="text" id="cdt" placeholder="Inserisci il codice della segnalazione assegnata al gruppo">
		        </div>
			 
			   <div class="form-group">
                 <div class="col-sm-4 col-lg-3">
                   <input type="submit" class="form-control btn btn-primary" id="Invia" value="invia" name="invia"> 
                 </div>
               </div>
			   
			   <div class="form-group">
                 <div class="col-sm-4 col-lg-3">
                   <button onclick="location.href='Gruppo di risoluzione.php'" type="button" class="btn btn-danger btn-block">Annulla</button>
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
			  <h1 class="mb-5" style="color:orange">SEZIONE DEDICATA AL PERSONALE ENTE </h1>
			  
			  <form method = "post" action = "Gruppo di risoluzione.php">
                <div font face="Arial, Helvetica, sans-serif"><p><strong>Inserire il codice identificativo del gruppo di risoluzione che si intende ricercare, modificare o eliminare: </strong></p>  
	            <p><input type = "text" name = "idGruppo" placeholder = "ID gruppo">
		        <input class="btn btn-primary" type = "submit" value = "Invia" name = "Invia"></p>
				</div>
				</form>
				
			   
			   
			   
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
					  
					$query = "SELECT * FROM `gruppo di risoluzione`";
					
			        //esegui query
			        if(!($result = mysqli_query($mysqli, $query))) {
			          print_r("Could not execute query: ");
			          die(mysqli_error($mysqli));
			        }
				    
			        if(isset($_POST["idGruppo"]) != NULL) {     //codice eseguito se il parametro "ID Gruppo" viene inserito in input
					
				        $id = $_POST["idGruppo"];
				        
						$query1 = "SELECT * FROM `gruppo di risoluzione` WHERE `ID Gruppo` = $id";
						
						if(!($result1 = mysqli_query($mysqli, $query1))) {
			              print_r("Could not execute query: ");
			              die(mysqli_error($mysqli));
			            }
				
				        if($row1 = mysqli_fetch_row($result1)) {
						  echo "<table align='center' bgcolor='#FFFFFF' border=\"2\" cellspacing=\"1\" cellpadding=\"1\">";
	                      echo "<tr>";
	                      echo "<th><font face=\"Arial, Helvetica, sans-serif\">ID Gruppo</font></th>";
	                      echo "<th><font face=\"Arial, Helvetica, sans-serif\">Citt&agrave;</font></th>";
		                  echo "<th><font face=\"Arial, Helvetica, sans-serif\">CAP</font></th>";
		                  echo "<th><font face=\"Arial, Helvetica, sans-serif\">Codice segnalazione assegnata</font></th>";
	                      echo "</tr>";
			              print_r("<tr>");	
		                  foreach($row1 as $key => $value)
				            print_r("<td align = 'center'><font face=\"Arial, Helvetica, sans-serif\">$value</font></td>");
                          print_r("</tr>");
						  echo "</table>";
						  
						  
						  
				 ?>
				 
				 <!-- script ajax per eliminare il gruppo di risoluzione-->
				         <script type="text/javascript">
						  
						  function cancella() {
							  var ok = window.confirm("Confermi di voler eliminare il gruppo di risoluzione selezionato ?");
							  if(ok) {
								  callWebService();
								  } else {
								  return annulla;
								  }
							  }
							  
							 
							  
							function callWebService() {
								  var requestURL = "CancellaGruppo.php";
								  try {
									  var asyncRequest = new XMLHttpRequest();
									  asyncRequest.onreadystatechange = function() {
										  if(asyncRequest.readyState == 4 && asyncRequest.status == 200) {
											  document.getElementById("segna").innerHTML = asyncRequest.responseText;
										  }
									  }
									  asyncRequest.open("GET", requestURL, true);
									  asyncRequest.setRequestHeader("connection", "close");
									  asyncRequest.send();
								  } catch(exception)
								  {
									  alert("Request failed");
								  }
							  }
							  
							  
						  
						  </script>
						  
						  
				 
				 <?php 
				        // bottoni per modifica e cancella gruppo
				          print_r("<a href = 'http://localhost/bootstrap/my_civic_sense/ModificaGruppo.php'>");
						  print_r("<img src='img/Modifica.png' alt = 'Modifica' title = 'Modifica' value = 'Modifica' name='Modifica' width=30 height=30>");
						  print_r("</a>");
						  print_r("<a href = '#' onclick = 'cancella()'>");
						  print_r("<img src='img/cancella.png' alt = 'Cancella' title = 'Cancella' id = 'canc' value = 'Cancella' name='Cancella' width=25 height=25>");
						  print_r("</a>");
						  
						  print_r("<p id='segna'></p>");//qui, risposta da db dopo chiamata ajax
						 
						 
						  
		                } else 
						  print_r("<p>Tracking code not found</p>");
					  
					  
						  
						
						
				    }
				 ?>
				 
					
					      
					
			     
			     </br>
			     <div align='center'><caption><strong> ELENCO GRUPPI DI RISOLUZIONE </strong></caption></div>
				 
					
				
				 <?php
				 
				   echo "<table align='center' bgcolor='#FFFFFF' border=\"2\" cellspacing=\"1\" cellpadding=\"1\">";
	               echo "<tr>";			
	               echo "<th><font face=\"Arial, Helvetica, sans-serif\">ID Gruppo</font></th>";
	               echo "<th><font face=\"Arial, Helvetica, sans-serif\">Citt&agrave;</font></th>";
		           echo "<th><font face=\"Arial, Helvetica, sans-serif\">CAP</font></th>";
		           echo "<th><font face=\"Arial, Helvetica, sans-serif\">Codice segnalazione assegnata</font></th>";
	               echo "</tr>";
			  
	
                   while($row = mysqli_fetch_row($result)) {
			         print_r("<tr>");
		             foreach($row as $key => $value)
				       print_r("<td align = 'center'><font face=\"Arial, Helvetica, sans-serif\">$value</font></td>");
                     print_r("</tr>");				
		           }
		
			       echo "</table>";
					  
				   mysqli_close($mysqli);
				     
				
				 ?>
			</div>
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
	

  </body>
  
   <?php
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
if(isset($_POST['invia'])){
  				   
 	                $città=$_POST['città'];	
                     $CAP=$_POST['CAP'];	
                     $cdt=$_POST['cdt'];						 
$query = "INSERT INTO `gruppo di risoluzione`(Citta, CAP, CodicediTracciamento) VALUES ('$città', '$CAP', '$cdt')";
$query1 = "SELECT `ID Gruppo` FROM `gruppo di risoluzione` ORDER BY `ID Gruppo` DESC LIMIT 1";

if ($conn->query($query) === TRUE) {
	if(!($result = mysqli_query($conn, $query1))) {
	  print_r("Could not execute query: ");
	  die(mysqli_error($conn));
    } 
    if($row = mysqli_fetch_array($result)) {
	  $id = "Di seguito è indicato il codice ID del gruppo di risoluzione appena inserito: ".$row["ID Gruppo"];
	  print_r("<script type='text/javascript'>window.alert('$id');</script>");
    }
	print_r("<meta http-equiv='refresh' content='0;URL=Gruppo di risoluzione.php'>");
} else {
    echo "Error: " . $query . "<br>" . $conn->error;
}
$conn->close();
}

?>
  
  
</html>