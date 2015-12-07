<!DOCTYPE html>
<html lang="en">

    
    <!--

CREATE TABLE Clients (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
address VARCHAR(60),
reg_date TIMESTAMP
)

INSERT INTO Clients (firstname, lastname, email, address)
VALUES ('Zach', 'Ellis', 'fuckoffblud.com', '2016 Park Pl, Boca Raton, FL, 33486'),
('Tyler', 'Hoffman', 'fuckoffblud.com', '855 NW 4th Ave, Boca Raton, FL, 33432'),
('Ken', 'Ellis', 'fuckoffblud.com', '900 S Ocean Blvd, Boca Raton, FL 33432'),
('Alex', 'Gillman', 'fuckoffblud.com', '777 Glades Rd, Boca Raton, FL 33431')

-->
    
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MOW Expedius</title>

    <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/agency.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
   
     <style>
    @media(min-width:768px) {
    .navbar-default {
        padding: 15px 0;
        border: 0;
        background-color: #1B2D57;
        -webkit-transition: padding .3s;
        -moz-transition: padding .3s;
        transition: padding .3s;
    }

    .navbar-default .navbar-brand {
        font-size: 2em;
        -webkit-transition: all .3s;
        -moz-transition: all .3s;
        transition: all .3s;
    }

    .navbar-default .navbar-nav>.active>a {
        border-radius: 3px;
    }

    .navbar-default.navbar-shrink {
        padding: 7px 0;
        background-color: #1B2D57;
    }

    .navbar-default.navbar-shrink .navbar-brand {
        font-size: 1.5em;
    }
}

        
    header .intro-text {
    padding-top: 120px;
    padding-bottom: 50px;
    }


    </style>
    
  <!--<head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Draggable directions</title> -->
    <style>
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
        background-color: #f0f0f0;
      }
        .cont {
        margin-top: 8%;
        height: 18%;
        width: 100%;
      }
      #map {
        height: 75%;
        /*float: left;*/
        margin-left: 10%;
        margin-right: 10%;
        width: 80%;
      }
      #right-panel {
        /*float: left;*/
        width: 100%;
        height: 75%;
      }
      #right-panel {
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }
        #right-panel select, #right-panel input {
        font-size: 35px;
        }

        #right-panel select {
          width: 100%;
        }

        #right-panel i {
          font-size: 12px;
        }

      .panel {
        height: 100%;
        overflow: auto;
      }
      
      .col-lg-10{
        float : none;
      }    
        
        .container-client-buttons{
            text-align: center;
            margin-top: 15px;
            margin-bottom: 15px;
        }   
        
    </style>
  </head>

  <body>
  
<?php
	$servername = "localhost";
	$username = "zellis1";
	$password = "duG9osd1t3Uy1";
	$dbname = "test";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		 die("Connection failed: " . $conn->connect_error);
	} 

    //fetch table rows from mysql db
    $sql = "SELECT id, firstname, lastname, address FROM Clients";
	$result = $conn->query($sql);
    //create an array
    $emparray = array();
    while($row =mysqli_fetch_assoc($result))
    {
        $emparray[] = $row;
    }
    //echo json_encode($emparray);

    //close the db connection
    mysqli_close($connection);
?>

  
       <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="volunteer-dashboard.html">Expedius</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll">
                        <a href="routes.php">Routes</a>
                    </li>
                    <li class="page-scroll">
                        <a href="volunteer-dashboard.html">Schedule</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
      
      <!-- Header -->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-text">
                        <!--span class="skills">Route 1</span0  1,Infinite+Loop,Cupertino,California   -->
                        <!--button type="button" class="btn btn-primary btn-lg" id="button1" >Route 1</button>
                        <button type="button" class="btn btn-primary btn-lg" id="button2" >Route 2</button-->
                        <!--button type="button" class="btn btn-primary btn-lg" id="button4" >Show Me Where I am</button-->
                        <h1>Route: 2</h1>
                        <a href ="http://maps.apple.com/?saddr=2016 Park Pl,Boca+Raton,Florida&daddr=900+S+Ocean+Blvd,Boca+Raton,Florida&dirflg=d"><button type="button" class="btn btn-primary btn-lg" id="button5" >open google maps</button></a>
                        <a class="page-scroll" href="#right-panel"><button type="button" class="btn btn-primary btn-lg" id="button3" >Show Directions</button></a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <body id="page-top" class="index">
        <div class="container-client-buttons">            
            <div class="row">
                <div class="col-lg-12">
                    <style>
                        #client1{
                            border-color: #17AD1E; /*green */
                            background-color:#17AD1E; 
                            color: #fed136;/*yellow*/
                        }
                    </style>
                    <h2>Clients:</h2>
                    <button type="button" class="btn btn-primary btn-med" id="client1" >Zachary Ellis</button>
                    <button type="button" class="btn btn-primary btn-med" id="client2" >Ken Ellis</button>
                    <button type="button" class="btn btn-primary btn-med" id="client3" >Tyler Hoffman</button>
                    <button type="button" class="btn btn-primary btn-med" id="client4" >Alex Gillman</button>
                 </div>
            </div>
        </div>
    <div id="map">map not loading</div>  
    <div id="right-panel">
    <p>Total Distance: <span id="total"></span></p>
    </div>
    </body>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB6MVCTLG20_UyDD56Lhj7qN-8ymPkhM9k&signed_in=true&callback=initMap"
        async defer></script>
      
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="js/classie.js"></script>
    <script src="js/cbpAnimatedHeader.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/agency.js"></script>

          <script>
		  var clientsArray = <?php echo json_encode($emparray);?>;
		  
        var route1 = {
            "origin": '2016 Park Pl, Boca Raton, FL, 33486',
            "destination" : 'West Palm Beach, FL',
            "waypoint1": 'Delray Beach, FL',
            "waypoint2": 'Boyton Beach, FL'     
        }
        var route2  = {
            "origin": clientsArray[0].address,
            "destination" : clientsArray[2].address,
            "waypoint1": clientsArray[3].address,
            "waypoint2": clientsArray[1].address
        }
    
        var directionsService;
        var directionsDisplay;
              

        $('#button1').click(function() {
            console.log("Button1 clicked!");
            displayRoute(route1)
        });
              
        $('#button2').click(function() {
            console.log("Button2 clicked!");
            displayRoute(route2)
        });
              
        $('#button4').click(function() {
            console.log("Button4 clicked!");
            //whereAmI()
        });

              
    function initMap() {
      var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 4,
        center: {lat: 26.375, lng: -80.103} // FAU.
      });
        
        
      directionsService = new google.maps.DirectionsService;
      directionsDisplay = new google.maps.DirectionsRenderer({
        draggable: false,
        map: map,
        panel: document.getElementById('right-panel')
      });

      directionsDisplay.addListener('directions_changed', function() {
        computeTotalDistance(directionsDisplay.getDirections());
      });

      displayRoute(route2);
    }

    function displayRoute(newRoute) {
      directionsService.route({
        origin: newRoute.origin,
        destination: newRoute.destination,
        waypoints: [{location: newRoute.waypoint1}, {location: newRoute.waypoint2}],
        travelMode: google.maps.TravelMode.DRIVING,
        avoidTolls: true
      }, function(response, status) {
        if (status === google.maps.DirectionsStatus.OK) {
          directionsDisplay.setDirections(response);
        } else {
          alert('Could not display directions due to: ' + status);
        }
      });
    }

              
    function computeTotalDistance(result) {
      var total = 0;
      var myroute = result.routes[0];
      for (var i = 0; i < myroute.legs.length; i++) {
        total += myroute.legs[i].distance.value;
      }
      total = total / 1000;
      document.getElementById('total').innerHTML = total + ' km';
    }
    </script>
      
      
  </body>
</html>