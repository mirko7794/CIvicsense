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
	
	<script type="text/javascript" src="stats/Chart.bundle.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	
	<!-- script mappa-->
    <script type='text/javascript' src='http://maps.google.com/maps/api/js?sensor=true'></script>
	<script type='text/javascript' src='jquery.js'></script> <!-- inclusione del file per jquery -->
	
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

	  div#gmaps-canvas {
		float:left;
		width:100%;	
		height:350px;
		margin-bottom:30px
	}
				@media screen and (min-width:250px) and (max-width:767px){
				stile media query
				table, thead, tbody, th, td, tr {
					display: block;
					align: center;
				}
				table tr td{
					border:0;
				}
				thead {
				    position: absolute;     /* Nascondo intestazione */
					top: -9999px;
				    left: -9999px;
				}
				tbody th{
				    position: relative;     
				    top: 0px;
				    width: 100%;
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
				td:nth-of-type(1):before { content: "Autostrade"; } /* inserimento etichetta per ciascuna cella con il selettore nth-of-type */
				td:nth-of-type(2):before { content: "Acquedotto"; }
				td:nth-of-type(3):before { content: "Elettricità"; }
				td:nth-of-type(4):before { content: "Telefonia"; }
				td:nth-of-type(5):before { content: "Alta"; }
				td:nth-of-type(6):before { content: "Intermedia"; }
				td:nth-of-type(7):before { content: "Bassa"; }
				td:nth-of-type(8):before { content: "Attiva"; }
				td:nth-of-type(9):before { content: "Conclusa"; }
			}
    </style>
	
	<script type="text/javascript">
	  function initialize() {
		  var coordinate = document.getElementById("risposta").innerHTML;
		  var cdt = "non presente";
		  var lat = 40.719614;
		  var lon = -73.996251;
		  if(coordinate != 0) {  
		      var cdt = document.getElementById("codice").innerHTML;
		      var coordinateTemp = coordinate.split('-');
			  var lat = coordinateTemp[0];
			  var lon = coordinateTemp[1];
		  }
		  var myLatLng = new google.maps.LatLng(lat,lon);
		  var myOptions = {
			  zoom: 14,
              center: myLatLng,
              mapTypeId: google.maps.MapTypeId.ROADMAP
		  }
		  var map = new google.maps.Map(document.getElementById("gmaps-canvas"), myOptions);
		  var marker = new google.maps.Marker({
			  position: myLatLng, 
              map: map,
			  title: "Segnalazione con codice di tracciamento " + cdt
		  });
		  var contentString = "<p>Latitudine: " + lat + "<br>Longitudine: " + lon + "</p>";
		  var infoWindow = new google.maps.InfoWindow({
			  content: contentString
		  });
		  google.maps.event.addListener(marker, 'click', function() {
			  infoWindow.open(map,marker);
		  });
	  }
	</script>
	
	<script type="text/javascript">
						  
						  function VisualMapp() {
							  callWebService();
							  onload = initialize();
							}
							  
							 
							  
							function callWebService() {
								  var requestURL = "Visualizzasumappa.php";
								  try {
									  var asyncRequest = new XMLHttpRequest();
									  asyncRequest.onreadystatechange = function() {
										  if(asyncRequest.readyState == 4 && asyncRequest.status == 200) {
											  
											  document.getElementById("risposta").innerHTML = asyncRequest.responseText;
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

  </head>
  
  
  
  <body id="page-top" onload="initialize()" align = "center">
  
  
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
            <form enctype="multipart/form-data" data-toggle="validator" role="form" method="POST" action="StatisticheMappa.php">
			  
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
                   <button onclick="location.href='StatisticheMappa.php'" type="button" class="btn btn-danger btn-block">Annulla</button>
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
			  
			  <h3><strong>STATISTICHE</strong></h3>
			  <table align="center" bgcolor="#FFFFFF" border="2" cellspacing="1" cellpadding="1">
	            <thead>
			      <tr>
				    <th bgcolor="grey" width="50%"><font face="Arial, Helvetica, sans-serif"><strong></strong></font></th>
	                <td colspan = "4" align = 'center'><font face="Arial, Helvetica, sans-serif"><strong>Categoria</strong></font></td>
	                <td colspan = "3" align = 'center'><font face="Arial, Helvetica, sans-serif"><strong>Gravit&agrave;</strong></font></td>
				    <td colspan = "2" align = 'center'><font face="Arial, Helvetica, sans-serif"><strong>Stato</strong></font></td>
                  </tr>
				  <tr>
				  <th bgcolor="grey" width="50%" align = 'center'><font face="Arial, Helvetica, sans-serif"></font></th>
				    <th><font face="Arial, Helvetica, sans-serif">Autostrade</font></th>
				    <th><font face="Arial, Helvetica, sans-serif">Acquedotto</font></th>
					<th><font face="Arial, Helvetica, sans-serif">Elettricit&agrave;</font></th>
					<th><font face="Arial, Helvetica, sans-serif">Telefonia</font></th>
					<th><font face="Arial, Helvetica, sans-serif">Alta</font></th>
					<th><font face="Arial, Helvetica, sans-serif">Intermedia</font></th>
				    <th><font face="Arial, Helvetica, sans-serif">Bassa</font></th>
					<th><font face="Arial, Helvetica, sans-serif">Attiva</font></th>
					<th><font face="Arial, Helvetica, sans-serif">Conclusa</font></th>
			      </tr>
				</thead>
				
				<tbody>
				  <tr>
				    
					
			  
			  
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
				    
					if(isset($_POST['data'])) {
						$data = $_POST['data'];
						print_r($data);
						print_r("<th><font face='Arial, Helvetica, sans-serif'>Numero di <br>segnalazioni <br>aperte a <br>partire dal $data <br>ad oggi</font></th>");
						$autostrade = "SELECT COUNT(CodicediTracciamento) FROM ticket WHERE categoriabox = 'Autostrade' and Data >= '$data'";
						$acquedotto = "SELECT COUNT(CodicediTracciamento) FROM ticket WHERE categoriabox = 'Acquedotto' and Data >= '$data'";
						$elettricità = "SELECT COUNT(CodicediTracciamento) FROM ticket WHERE categoriabox = 'Elettricita' and Data >= '$data'";
						$telefonia = "SELECT COUNT(CodicediTracciamento) FROM ticket WHERE categoriabox = 'Telefonia' and Data >= '$data'";
						$alta = "SELECT COUNT(CodicediTracciamento) FROM ticket WHERE gravitabox = 'Alta' and Data >= '$data'";
						$intermedia = "SELECT COUNT(CodicediTracciamento) FROM ticket WHERE gravitabox = 'Intermedia' and Data >= '$data'";
						$bassa = "SELECT COUNT(CodicediTracciamento) FROM ticket WHERE gravitabox = 'Bassa' and Data >= '$data'";
						$attiva = "SELECT COUNT(CodicediTracciamento) FROM ticket WHERE Stato = 'Attiva' and Data >= '$data'";
						$conclusa = "SELECT COUNT(CodicediTracciamento) FROM ticket WHERE Stato = 'Conclusa' and Data >= '$data'";
					} else if(isset($_POST['data']) == NULL || isset($_POST['tutti'])){
						print_r("<th><font face='Arial, Helvetica, sans-serif'>Numero di <br>segnalazioni</font></th>");
						$autostrade = "SELECT COUNT(CodicediTracciamento) FROM ticket WHERE categoriabox = 'Autostrade'";
						$acquedotto = "SELECT COUNT(CodicediTracciamento) FROM ticket WHERE categoriabox = 'Acquedotto'";
						$elettricità = "SELECT COUNT(CodicediTracciamento) FROM ticket WHERE categoriabox = 'Elettricita'";
						$telefonia = "SELECT COUNT(CodicediTracciamento) FROM ticket WHERE categoriabox = 'Telefonia'";
						$alta = "SELECT COUNT(CodicediTracciamento) FROM ticket WHERE gravitabox = 'Alta'";
						$intermedia = "SELECT COUNT(CodicediTracciamento) FROM ticket WHERE gravitabox = 'Intermedia'";
						$bassa = "SELECT COUNT(CodicediTracciamento) FROM ticket WHERE gravitabox = 'Bassa'";
						$attiva = "SELECT COUNT(CodicediTracciamento) FROM ticket WHERE Stato = 'Attiva'";
						$conclusa = "SELECT COUNT(CodicediTracciamento) FROM ticket WHERE Stato = 'Conclusa'";
					}
						
						if(!($result = mysqli_query($mysqli, $autostrade))) {
			              print_r("Could not execute query: ".$autostrade);
			              die(mysqli_error($mysqli));
			            }
						if($row = mysqli_fetch_row($result)) {
							print_r("<td align = 'center'><font face='Arial, Helvetica, sans-serif'>$row[0]</font></td>");
						}
						
						if(!($result = mysqli_query($mysqli, $acquedotto))) {
			              print_r("Could not execute query: ".$acquedotto);
			              die(mysqli_error($mysqli));
			            }
						if($row = mysqli_fetch_row($result)) {
							print_r("<td align = 'center'><font face='Arial, Helvetica, sans-serif'>$row[0]</font></td>");
						}
						
						if(!($result = mysqli_query($mysqli, $elettricità))) {
			              print_r("Could not execute query: ".$elettricità);
			              die(mysqli_error($mysqli));
			            }
						if($row = mysqli_fetch_row($result)) {
							print_r("<td align = 'center'><font face='Arial, Helvetica, sans-serif'>$row[0]</font></td>");
						}
						
						if(!($result = mysqli_query($mysqli, $telefonia))) {
			              print_r("Could not execute query: ".$telefonia);
			              die(mysqli_error($mysqli));
			            }
						if($row = mysqli_fetch_row($result)) {
							print_r("<td align = 'center'><font face='Arial, Helvetica, sans-serif'>$row[0]</font></td>");
						}
						
						if(!($result = mysqli_query($mysqli, $alta))) {
			              print_r("Could not execute query: ".$alta);
			              die(mysqli_error($mysqli));
			            }
						if($row = mysqli_fetch_row($result)) {
							print_r("<td align = 'center'><font face='Arial, Helvetica, sans-serif'>$row[0]</font></td>");
						}
						
						if(!($result = mysqli_query($mysqli, $intermedia))) {
			              print_r("Could not execute query: ".$intermedia);
			              die(mysqli_error($mysqli));
			            }
						if($row = mysqli_fetch_row($result)) {
							print_r("<td align = 'center'><font face='Arial, Helvetica, sans-serif'>$row[0]</font></td>");
						}
						
						if(!($result = mysqli_query($mysqli, $bassa))) {
			              print_r("Could not execute query: ".$bassa);
			              die(mysqli_error($mysqli));
			            }
						if($row = mysqli_fetch_row($result)) {
							print_r("<td align = 'center'><font face='Arial, Helvetica, sans-serif'>$row[0]</font></td>");
						}
						
						if(!($result = mysqli_query($mysqli, $attiva))) {
			              print_r("Could not execute query: ".$attiva);
			              die(mysqli_error($mysqli));
			            }
						if($row = mysqli_fetch_row($result)) {
							print_r("<td align = 'center'><font face='Arial, Helvetica, sans-serif'>$row[0]</font></td>");
						}
						
						if(!($result = mysqli_query($mysqli, $conclusa))) {
			              print_r("Could not execute query: ".$conclusa);
			              die(mysqli_error($mysqli));
			            }
						if($row = mysqli_fetch_row($result)) {
							print_r("<td align = 'center'><font face='Arial, Helvetica, sans-serif'>$row[0]</font></td>");
						}

                            print_r("</tr>");				
		                  echo "</tbody>";
						echo "</table>";
						
			     ?>
			  <br>
			  <form method = "POST" action = "StatisticheMappa.php">
			    <div>
				<p><label><strong>Indicare la data dalla quale si vogliono conoscere le statistiche: </strong><input type = "date" name = "data"/></label>
				<input class = 'btn btn-primary' type = 'submit' value = 'Invia'  name = 'Invia'></p>
				<div font face="Arial, Helvetica, sans-serif"><a name = "tutti" href="StatisticheMappa.php"><strong>Mostrare in tabella le statistiche di tutte le segnalazioni aperte</strong></a></div>
				</div>
			  </form>
				
			  </br>
			  
			  <!--MAPPA-->
			  <div id="gmaps-canvas"></div>
			  
			  <form method = "POST" action = "StatisticheMappa.php">
                <div font face="Arial, Helvetica, sans-serif"><p><strong>Inserire il codice di tracciamento della segnalazione che si intende visualizzare su mappa.</strong></p>  
	              <p><input type = "text" name = "cdt" placeholder = "Codice di tracciamento">
		          <input class="btn btn-primary" type = "submit" value = "Invia" name = "Invia"></p>
				</div>
			  </form>
			  
			  <div font face="Arial, Helvetica, sans-serif"><strong>Cliccare per visualizzare le coordinate della segnalazione scelta.</strong>
				<input onclick="VisualMapp()" class="btn btn-primary" type = "submit" value = "Coordinate" name = "Invia">
			    <div style='color:red' id = "risposta"></div><!--risposta da pagina Visualizzasumappa.php-->
              </div>
			  
			  <div style="display:none" id = "codice"><?php if (isset($_POST['cdt']))echo $_POST['cdt']; ?></div>

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
  //INVIO TICKET
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
								

  if ($mysqli->query($sql) === TRUE) {
	if(!($result = mysqli_query($mysqli, $query))) {
	  print_r("Could not execute query: ");
	  die(mysqli_error($mysqli));
    } 
    if($row = mysqli_fetch_array($result)) {
	  $codice = "Di seguito è indicato il codice di tracciamento della segnalazione da te aperta: ".$row["CodicediTracciamento"];
	  print_r("<script type='text/javascript'>window.alert('$codice');</script>");
    }
	print_r("<meta http-equiv='refresh' content='0;URL=StatisticheMappa.php'>");
  } else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
  }
}
mysqli_close($mysqli);

 ?> 
  
</html>