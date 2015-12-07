<?php session_start();
//logout if session not active
if (!isset($_SESSION['admin'])) {
    header('Location: admin_login.php');
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
            <li class="sidebar-brand"><a href="#">Admin</a></li>
            <li><a href="admin_home.php">Dashboard</a></li>
<!--
            <li><a href="admin_user_list.php">User List</a></li>
            <li><a href="admin_user_search.php">Search User</a></li>
-->
			<li><a href="admin_user_add.php">Add new Client</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>

    <!-- Page content -->
    <div id="page-content-wrapper">
        <div class="content-header">
            <h1>
                <a id="menu-toggle" href="#" class="btn btn-default"><i class="icon-reorder"></i></a>
                Registered Users
            </h1>
        </div>
        <!-- Keep all page content within the page-content inset div! -->
        <?php
        include("db.php");
       $con=mysqli_connect($server, $db_user, $db_pwd,$db_name) //connect to the database server
	or die ("Could not connect to mysql because ".mysqli_error());

	mysqli_select_db($con,$db_name)  //select the database
	or die ("Could not select to mysql because ".mysqli_error());

        $selectall = "select id from " . $table_name . " union all select id from " . $table_name_social;
        $result = mysqli_query($con,$selectall);
        $totalcount = mysqli_num_rows($result);

        $selecttwitter = "select * from " . $table_name_social . " where source='twitter'";
        $result = mysqli_query($con,$selecttwitter);
        $twittercount = mysqli_num_rows($result);

        $selectfb = "select * from " . $table_name_social . " where source='facebook'";
        $result = mysqli_query($con,$selectfb);
        $fbcount = mysqli_num_rows($result);

        $selectgoogle = "select * from " . $table_name_social . " where source='google'";
        $result = mysqli_query($con,$selectgoogle);
        $googlecount = mysqli_num_rows($result);

        $selectemail = "select * from " . $table_name;
        $result = mysqli_query($con,$selectemail);
        $emailcount = mysqli_num_rows($result);

        $selectactive = "select id from " . $table_name . " where activ_status='1' union all select id from " . $table_name_social;
        $result = mysqli_query($con,$selectactive);
        $activecount = mysqli_num_rows($result);

        $selectinactive = "select id from " . $table_name . " where activ_status='0'";
        $result = mysqli_query($con,$selectinactive);
        $inactivecount = mysqli_num_rows($result);

        ?>
        <div class="page-content inset">
            <div class="row">
<!--
                <div class="col-lg-3 col-sm-6 col-xs-6 col-xxs-12">
                    <div class="analytics box">
                        <div class="boxchart-overlay green">
                            <div class="boxchart">
                                <canvas width="64" height="30"
                                        style="display: inline-block; width: 64px; height: 30px; vertical-align: top;"></canvas>
                            </div>
                        </div>
                        <span class="title">Email Users</span>
                        <span class="value"><?php if ($emailcount > 0) echo $emailcount; else echo 0; ?></span>
                    </div>
                </div>
-->

<!--
                <div class="col-lg-3 col-sm-6 col-xs-6 col-xxs-12">
                    <div class="analytics box">
                        <div class="boxchart-overlay blue">
                            <div class="boxchart">
                                <canvas width="64" height="30"
                                        style="display: inline-block; width: 64px; height: 30px; vertical-align: top;"></canvas>
                            </div>
                        </div>
                        <span class="title">Twitter Users</span>
                        <span class="value"><?php if ($twittercount > 0) echo $twittercount; else echo 0; ?></span>
                    </div>
                </div>
-->
            </div>
<!--
            <div class="row">
                <div class="col-lg-3 col-sm-6 col-xs-6 col-xxs-12">
                    <div class="analytics box">
                        <div class="boxchart-overlay blue">
                            <div class="boxchart">
                                <canvas width="64" height="30"
                                        style="display: inline-block; width: 64px; height: 30px; vertical-align: top;"></canvas>
                            </div>
                        </div>
                        <span class="title">Facebook users</span>
                        <span class="value"><?php if ($fbcount > 0) echo $fbcount; else echo 0; ?></span>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-xs-6 col-xxs-12">
                    <div class="analytics box">
                        <div class="boxchart-overlay red">
                            <div class="boxchart">
                                <canvas width="64" height="30"
                                        style="display: inline-block; width: 64px; height: 30px; vertical-align: top;"></canvas>
                            </div>
                        </div>
                        <span class="title">Google+ users</span>
                        <span class="value"><?php if ($googlecount > 0) echo $googlecount; else echo 0; ?></span>
                    </div>
                </div>
            </div>
-->
            <div class="row">
                <div class="col-lg-3 col-sm-6 col-xs-6 col-xxs-12">
                    <div class="analytics box">
                        <div class="boxchart-overlay green">
                            <div class="boxchart">
                                <canvas width="64" height="30"
                                        style="display: inline-block; width: 64px; height: 30px; vertical-align: top;"></canvas>
                            </div>
                        </div>
                        <span class="title">Volunteers</span>
                        <span class="value"><?php echo $activecount; ?></span>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-xs-6 col-xxs-12">
                    <div class="analytics box">
                        <div class="boxchart-overlay grey">
                            <div class="boxchart">
                                <canvas width="64" height="30"
                                        style="display: inline-block; width: 64px; height: 30px; vertical-align: top;"></canvas>
                            </div>
                        </div>
                        <span class="title">Clients</span>
                        <span class="value"><?php echo $inactivecount; ?></span>
                    </div>
                </div>
            </div>
<!--
            <div class="row">


                <div class="col-lg-3 col-sm-6 col-xs-6 col-xxs-12">
                    <div class="analytics box">
                        <div class="boxchart-overlay orange">
                            <div class="boxchart">
                                <canvas width="64" height="30"
                                        style="display: inline-block; width: 64px; height: 30px; vertical-align: top;"></canvas>
                            </div>
                        </div>
                        <span class="title">Total users</span>
                        <span class="value"><?php echo $totalcount; ?></span>
                    </div>
                </div>
            </div>
-->


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
</body>
</html>