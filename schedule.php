<?php session_start();
//logout if session not active
if (!isset($_SESSION['login'])) {
    header('Location: index.php');

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Expedius</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="css/style.css" rel="stylesheet" media="screen">
</head>

<body>
<div id="wrapper">

    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <form class="form-horizontal_1" id="login_form_">
        
       <h2><?php echo "hi ".$_SESSION['username']; ?></h2>
            </form>
<!--            <li class="sidebar-brand"><a href="#">Volunteer</a></li>-->
            <li><a href="members.php">Dashboard</a></li>
            <li><a href="https://lamp.cse.fau.edu/~zellis1/projects/MOW4/routes.php">Routes</a></li>
            <li><a href="schedule.php">Schedule</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>

    <!-- Page content -->
    <div id="page-content-wrapper">
        <div class="content-header">
            <h1>
                <a id="menu-toggle" href="#" class="btn btn-default"><i class="icon-reorder"></i></a>
                Schedule
            </h1>
        </div>
        <!-- Keep all page content within the page-content inset div! -->
        <div class="page-content inset">
            <link rel="stylesheet" type="text/css" media="screen" href="calendar.css">
            <?php
  $find = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
  $lang = substr($find,0,2);
  if ($lang == "it") {
    include("calendar_it.php");
  } else {
    include("calendar_en.php");
  }
?>

        </div>
    </div>

</div>

<!-- Bootstrap core JavaScript -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<!-- Put this into a custom JavaScript file to make things more organized -->
<script>
    $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("active");
    });
</script>
   

<?php
  $find = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
  $lang = substr($find,0,2);
  if ($lang == "it") {
    include("calendar_it.php");
  } else {
    include("calendar_en.php");
  }
?>



</body>
</html>