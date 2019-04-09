
 <?php
 session_start();
 if(isset($_POST['loginCittadino']) != NULL || isset($_POST['loginEnte']) != NULL){
	 
	$_SESSION['username'] = $_POST['username'];
	
 } 
 
 if(isset($_SESSION['$logout']) == -1){
	 session_destroy();
 }
 if (isset($_SESSION['$nonLoggato']) == -2) {
	 print_r("<script type='text/javascript'>window.alert('Effettuare il login per accedere.');</script>");
	 session_destroy();
 }
 
	 
 

?> 

<!DOCTYPE html>
<html>


  <head>
       <style>
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
    </style>

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
	
    <!-- Ultima versione di jquery.validate (minfied) -->
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script>
    <!-- Ultima versione di bootstrap (minified) -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	
    <!-- codice jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.9.0/validator.min.js"></script>
  	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	
	<!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/new-age.min.js"></script>

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
      //Mostra Data
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
            <a class="nav-link" href="#myModal21" data-toggle="modal">Login</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#myModal1" data-toggle="modal">Registrati</a>
            </li>
			 <li class="nav-item">
            <a class="nav-link" href="#myModa24" style="color:orange" data-toggle="modal">Ticket</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contact">Contatti</a>
            </li>

          </ul>
        </div>
      </div>
    </nav>
	<div class="modal fade" id="myModal21" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">LOGIN</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
          </div>
          <div class="modal-footer">
            <a href="#myModalA" type="submit" class="form-control btn btn-primary" data-toggle="modal">Cittadino</a>
          </div>
	      <div class="modal-footer">
            <a href="#myModalB" type="submit" class="form-control btn btn-primary" data-toggle="modal">Personale ente</a>			
          </div>
        </div>
      </div>
    </div>
	
	<!--LOGIN CITTADINO-->
   	<div class="modal fade" id="myModalA" tabinex="-1" role="dialog" aria-labellebdy="myModalLabel" aria-hidden="false">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">ACCEDI</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
          </div><!--modal-header--> 
          <div class="modal-body">
            <form name="FormLogin" method="post" action="index.php">
              <div class="form-group">
                <div class="input-group">
                  <input type="text" class="form-control" id="username" placeholder="Username" name="username">
                </div>
              </div><!--form-group-->   
              <div class="form-group">
                <div class="input-group">
                  <input type="password" class="form-control"  placeholder="Password" name="password" autocomplete="off">
                </div>
                <a class="nav-link" href="#RecPassCittadino" data-toggle="modal">Hai dimenticato la password?</a>
                <div class="modal-footer">
                  <input class="form-control btn btn-primary" type="submit" value="Login" name="loginCittadino">
                </div>
		      </div><!--form-group-->
            </form>
          </div><!--modal-body-->                                                                                                                                   				                                         
        </div><!--modalcontent-->
      </div><!--modaldialog-->
    </div><!--modalfade-->  
	<!--FINE LOGIN CITTADINO-->
	
	<!--LOGIN ENTE-->
   	<div class="modal fade" id="myModalB" tabinex="-1" role="dialog" aria-labellebdy="myModalLabel" aria-hidden="false">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">ACCEDI</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
          </div><!--modal-header--> 
          <div class="modal-body">
            <form name="FormLogin" method="post" action="index.php">
              <div class="form-group">
                <div class="input-group">
                  <input type="text" class="form-control" id="username" placeholder="Username" name="username">
                </div>
              </div><!--form-group-->   
              <div class="form-group">
                <div class="input-group">
                  <input type="password" class="form-control"  placeholder="Password" name="password" autocomplete="off">
                </div>
                <a class="nav-link" href="#RecPassEnte" data-toggle="modal">Hai dimenticato la password?</a>
                <div class="modal-footer">
                  <input class="form-control btn btn-primary" type="submit" value="Login" name="loginEnte">
                </div>
		      </div><!--form-group-->
            </form>
          </div><!--modal-body-->                                                                                                                                   				                                         
        </div><!--modalcontent-->
      </div><!--modaldialog-->
    </div><!--modalfade--> 
    <!--FINE LOGIN ENTE-->
	
	
    <!--RECUPERA PASSWORD CITTADINO-->
	<div class="modal fade" id="RecPassCittadino" tabinex="-1" role="dialog" aria-labellebdy="myModalLabel" aria-hidden="false">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">RECUPERA PASSWORD</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
          </div><!--modal-header--> 
          <div class="modal-body">
            <form name="FormLogin" method="post" action="recPassCittadino.php">
              <div class="form-group">
                <div class="input-group">
                  <input type="text" class="form-control" id="username" placeholder="Inserisci username" name="username">
                </div>
              </div><!--form-group-->   
              <div class="form-group">
                <div class="modal-footer">
                  <input class="form-control btn btn-primary" type="submit" value="Invia" name="recPass">
                </div>
		      </div><!--form-group-->
            </form>
          </div><!--modal-body-->                                                                                                                                   				                                         
        </div><!--modalcontent-->
      </div><!--modaldialog-->
    </div><!--modalfade-->		
    <!--FINE RECUPERA PASSWORD CITTADINO-->
	
	
	<!--RECUPERA PASSWORD ENTE-->
	<div class="modal fade" id="RecPassEnte" tabinex="-1" role="dialog" aria-labellebdy="myModalLabel" aria-hidden="false">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">RECUPERA PASSWORD</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
          </div><!--modal-header--> 
          <div class="modal-body">
            <form name="FormLogin" method="post" action="recPassEnte.php">
              <div class="form-group">
                <div class="input-group">
                  <input type="text" class="form-control" id="username" placeholder="Inserisci username" name="username">
                </div>
              </div><!--form-group-->   
              <div class="form-group">
                <div class="modal-footer">
                  <input class="form-control btn btn-primary" type="submit" value="Invia" name="recPass">
                </div>
		      </div><!--form-group-->
            </form>
          </div><!--modal-body-->                                                                                                                                   				                                         
        </div><!--modalcontent-->
      </div><!--modaldialog-->
    </div><!--modalfade-->		
    <!--FINE RECUPERA PASSWORD ENTE-->
	
	
	<!--scelta ruolo-->
    <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
    <h4 class="modal-title" id="myModalLabel">REGISTRATI</h4>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
    </div>
    <div class="modal-footer">
    <a href="#myModal2" type="submit" class="form-control btn btn-primary" data-toggle="modal">Cittadino</a>
    </div>
	<div class="modal-footer">
    <a href="#myModal3" type="submit" class="form-control btn btn-primary" data-toggle="modal">Personale ente</a>			
    </div>
    </div>
    </div>
    </div>
    
    <!--finescelta-->
	
	
    <!---REGISTRAZIONE CITTADINO-->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">REGISTRAZIONE CITTADINO</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
      </div>
	  
      <div class="modal-body">
        <form data-toggle="validator" role=" form"method="POST" action="index.php">
          <div class="form-group">
            <label for="inputName" class="control-label">Username</label>
            <input type="text" class="form-control" name="username" id="inputName" placeholder="Username" required>
          </div>
			
		  <div class="form-group">
            <label for="inputEmail" class="control-label">Email</label>
            <input type="email" class="form-control" name="email" id="inputEmail" placeholder="Email" data-error="Bruh, that email address is invalid" required>
            <div class="help-block with-errors"></div> 
          </div>
		  
          <div class="form-group">
            <label for="inputPassword" class="control-label">Password</label>
            <div class="form-inline row">
              <div class="form-group col-sm-6">
                <input type="password" name="password" data-minlength="6" class="form-control" id="inputPassword" placeholder="Password" required>
                <div class="help-block">Minimum of 6 characters</div>
              </div>
																	   
              <div class="form-group col-sm-6">
                <input type="password" class="form-control"  id="inputPasswordConfirm" data-match="#inputPassword" data-match-error="These don't match" placeholder="Conferma" required>
                <div class="help-block with-errors"></div>
              </div>
            </div>
		  </div>
		  
		  <div class="form-group">
		    <label for="inputName" class="control-label">Nome</label>
            <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome" required>
          </div>
		  
		  <div class="form-group">
            <label for="inputName" class="control-label">Cognome</label>
            <input type="text" class="form-control" name="cognome" id="cognome" placeholder="Cognome" required>                                                    															
          </div>
	      
		  <div class="form-group">
            <label for="inputName" class="control-label">Città</label>
            <input type="text" class="form-control" name="citta" id="citta" placeholder="Città" required>
          </div>
                                                                  
		  <div class="form-group">
            <input type="submit" class="form-control btn btn-primary" id="registrati" name="registrati" value="registrati">
	      </div>
        </div>
      </form>																																																																				
    </div>                                                                      
  </div>
</div>

<!--FINE REGISTRAZIONE CITTADINO-->	

<!--REGISTRAZIONE ENTE-->																	

<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">REGISTRAZIONE PERSONALE ENTE</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
      </div>
	  
      <div class="modal-body">
        <form data-toggle="validator" role=" form"method="POST" action="index.php">
          <div class="form-group">
            <label for="inputName" class="control-label">Username</label>
            <input type="text" class="form-control" name="username" id="inputName" placeholder="Username" required>
          </div>
			
		  <div class="form-group">
            <label for="inputEmail" class="control-label">Email</label>
            <input type="email" class="form-control" name="email" id="inputEmail" placeholder="Email" data-error="Bruh, that email address is invalid" required>
            <div class="help-block with-errors"></div> 
          </div>
		  
          <div class="form-group">
            <label for="inputPassword" class="control-label">Password</label>
            <div class="form-inline row">
              <div class="form-group col-sm-6">
                <input type="password" name="password" data-minlength="6" class="form-control" id="inputPasswordEnte" placeholder="Password" required>
                <div class="help-block">Minimum of 6 characters</div>
              </div>
																	   
              <div class="form-group col-sm-6">
                <input type="password" class="form-control"  id="inputPasswordConfirm" data-match="#inputPasswordEnte" data-match-error="These don't match" placeholder="Conferma" required>
                <div class="help-block with-errors"></div>
              </div>
            </div>
		  </div>
		  
		  <div class="form-group">
		    <label for="inputName" class="control-label">Nome</label>
            <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome" required>
          </div>
		  
		  <div class="form-group">
            <label for="inputName" class="control-label">Cognome</label>
            <input type="text" class="form-control" name="cognome" id="cognome" placeholder="Cognome" required>                                                    															
          </div>
	      
		  <div class="form-group">
            <label for="inputName" class="control-label">Città</label>
            <input type="text" class="form-control" name="citta" id="citta" placeholder="Città" required>
          </div>
		  
          <div class="modal-footer">
		    <input type="submit" class="form-control btn btn-primary" id="registrati" value="Registrati" name="regi">                                                                       				
          </div>
        </form>
      </div>                                                                     
    </div>
  </div>
</div>

<!--FINE REGISTRAZIONE ENTE-->
																		
																		
	<!--DIALOG PER TICKET-->															
																	
	<div class="modal fade" id="myModa24" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
        <div class="modal-content">
		
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Invio segnalazione</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
          </div>
		  
          <div class="modal-body">
            <form enctype="multipart/form-data" data-toggle="validator" role="form" method="POST" action="index.php">
			  
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
                 <div class="col-sm-4 col-lg-3" href = "index.php">
                   <input type="submit"  class="form-control btn btn-primary" id="ticket" value="INVIA" name="ticket"> 
                 </div>
               </div>
			   
			   <div class="form-group">
                 <div class="col-sm-4 col-lg-3">
                   <button onclick="location.href='index.php'" type="button" class="btn btn-danger btn-block">Annulla</button>
                 </div>
               </div>
              </form>
			</div>
	      </div>
        </div>
      </div>
	  
      <!--FINE DIALOG-->
	  


    <header class="masthead">
      <div class="container h-100">
        <div class="row h-100">
          <div class="col-lg-7 my-auto">
            <div class="header-content mx-auto">
              <h1 class="navbar-brand js-scroll-trigger" style="color:orange">Civic Sense</h1>
              <p style="color:white">Oggigiorno la segnalazione di un disservizio o problema avviene attraverso l’uso di numeri telefonici dedicati che i vari enti e soggetti gestori mettono a disposizione.
                 Civic Sense è un sistema con il quale un cittadino può segnalare agevolmente guasti, problemi, malfunzionamenti e, in generale, «eventi rilevanti» per un soggetto che eroga servizi o gestisce infrastrutture di interesse pubblico (Acquedotto, elettricità, strade e viabilità, sicurezza urbana, ecc…)
			     Il nostro sistema mira a fornire un metodo di comunicazione veloce e diretto tra il cittadino e l'ente che gestisce la piattaforma.
			  </p>
            </div>
          </div>
        </div>
      </div>

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

if(isset($_POST['registrati'])){	
	$username=$_POST['username'];
    $email=$_POST['email'];
 	$password=$_POST['password'];			
 	$nome=$_POST['nome'];
    $cognome=$_POST['cognome'];
	$citta=$_POST['citta'];
	
$sql = "INSERT INTO registrazione_cittadino (username, email, password, nome, cognome, citta) VALUES ('$username', '$email', '$password', '$nome', '$cognome', '$citta')";
$provaesistenzacittadino = "SELECT Username FROM registrazione_cittadino WHERE Username = '$username'";
$result=$conn->query($provaesistenzacittadino);

if(mysqli_num_rows($result)>=1){
    echo "<script type='text/javascript'>alert('Username gia registrato, sceglierne un altro')</script>";
    header("Location:index.php");
}else if ($conn->query($sql) === TRUE) {
    echo "<script type='text/javascript'>alert('Nuovo utente registrato')</script>";
	header("Location:index.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

}else if(isset($_POST['regi'])){
	$username=$_POST['username'];					   
 	$password=$_POST['password'];	
    $email=$_POST['email'];					
    $nome=$_POST['nome'];
	$cognome=$_POST['cognome'];
	$citta=$_POST['citta'];

$sql = "INSERT INTO registrazione_ente (username,  password, email, nome, cognome, citta) VALUES ('$username', '$password', '$email', '$nome', '$cognome', '$citta')";
$provaesistenzacittadino = "SELECT Username FROM registrazione_ente WHERE Username = '$username'";
$result=$conn->query($provaesistenzacittadino);

if(mysqli_num_rows($result)>=1){
    echo "<script type='text/javascript'>alert('Username gia registrato, sceglierne un altro')</script>";
    header("Location:index.php");
}else if ($conn->query($sql) === TRUE) {
    echo "<script type='text/javascript'>alert('Nuovo utente registrato')</script>";
	header("Location:index.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}


//LOGIN ENTE
if(isset($_POST['loginEnte'])){
  				   
 	                $username=$_POST['username'];	
                    $password=$_POST['password'];	
                    														 
  $sql1 = "SELECT username, password FROM registrazione_ente WHERE username='$username' and password='$password'";
  
  if(!($result1 = mysqli_query($conn, $sql1))) {
	  print_r("Could not execute query: ");
	  die(mysqli_error($conn));
	  }  

  if($row1 = mysqli_fetch_row($result1)){
	  print_r("<script type='text/javascript'>self.location='homeEnte.php';</script>");
  }else {
    print_r("<script type='text/javascript'>window.alert('Ente non ancora registrato');</script>");
  }
}else if(isset($_POST['loginCittadino'])){//LOGIN CITTADINO
  				   
 	                $username=$_POST['username'];	
                    $password=$_POST['password'];
                    														 
  $sql3 = "SELECT username, password FROM registrazione_cittadino WHERE username='$username' and password='$password'";

  if(!($result3 = mysqli_query($conn, $sql3))) {
	  print_r("Could not execute query: ");
	  die(mysqli_error($conn));
	  }  

  if($row3 = mysqli_fetch_row($result3)){
	  print_r("<script type='text/javascript'>self.location='homeCittadino.php';</script>");
  }else {
    print_r("<script type='text/javascript'>window.alert('Cittadino non ancora registrato');</script>");
  }
  
}

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
								

  if ($conn->query($sql) === TRUE) {
	if(!($result = mysqli_query($conn, $query))) {
	  print_r("Could not execute query: ");
	  die(mysqli_error($conn));
    } 
    if($row = mysqli_fetch_array($result)) {
	  $codice = "Di seguito è indicato il codice di tracciamento della segnalazione da te aperta: ".$row["CodicediTracciamento"];
	  print_r("<script type='text/javascript'>window.alert('$codice');</script>");
    }
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
$conn->close();
?>

</html>
