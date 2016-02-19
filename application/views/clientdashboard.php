<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard - Client</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo $assets_folder ?>admin_pages/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo $assets_folder ?>admin_pages/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="<?php echo $assets_folder ?>admin_pages/dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo $assets_folder ?>admin_pages/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo $assets_folder ?>admin_pages/bower_components/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo $assets_folder ?>admin_pages/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>

		<?php require('includes/nav3.php'); ?>

        <div id="page-wrapper">
            <div class="row">
		<h2 style="text-align:center">Appointments</h2>
		<hr>
                <?php if(isset($appointments)||isset($pending_appointments)||isset($denied_appointments)){?>
                <h2>Approved Appointments</h2>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td>Lawyer</td>
                            <td>Purpose</td>
                            <td>Date</td>
                            <td>Time</td>
                            <td>Phone Number</td>
                            <td>Email Id</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            foreach($appointments as $appointment) {
                                echo "<tr>".
                                        "<td>".$appointment['lawyer']."</td>".
                                        "<td>".$appointment['purpose']."</td>".
                                        "<td>".$appointment['date']."</td>".
                                        "<td>".$appointment['time']."</td>".
                                        "<td>".$appointment['phone']."</td>".
                                        "<td>".$appointment['email_id']."</td>".
                                    "</tr>";
                            }
                        ?>
                    </tbody>
                </table>
                <h2>Pending Appointments</h2>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td>Lawyer</td>
                            <td>Purpose</td>
                            <td>Date</td>
                            <td>Time</td>
                            <td>Phone Number</td>
                            <td>Email Id</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            foreach($pending_appointments as $appointment) {
                                echo "<tr>".
                                        "<td>".$appointment['lawyer']."</td>".
                                        "<td>".$appointment['purpose']."</td>".
                                        "<td>".$appointment['date']."</td>".
                                        "<td>".$appointment['time']."</td>".
                                        "<td>".$appointment['phone']."</td>".
                                        "<td>".$appointment['email_id']."</td>".
                                    "</tr>";
                            }
                        ?>
                    </tbody>
                </table>
                <h2>Denied Appointments</h2>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td>Lawyer</td>
                            <td>Purpose</td>
                            <td>Date</td>
                            <td>Time</td>
                            <td>Phone Number</td>
                            <td>Email Id</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            foreach($denied_appointments as $appointment) {
                                echo "<tr>".
                                        "<td>".$appointment['lawyer']."</td>".
                                        "<td>".$appointment['purpose']."</td>".
                                        "<td>".$appointment['date']."</td>".
                                        "<td>".$appointment['time']."</td>".
                                        "<td>".$appointment['phone']."</td>".
                                        "<td>".$appointment['email_id']."</td>".
                                    "</tr>";
                            }
                        ?>
                    </tbody>
                </table>
                <?php } ?>
            </div>
        </div>

         <!-- jQuery -->
    <script src="<?php echo $assets_folder; ?>admin_pages/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo $assets_folder; ?>admin_pages/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo $assets_folder; ?>admin_pages/bower_components/metisMenu/dist/metisMenu.min.js"></script>
    <script src="<?php echo $assets_folder; ?>admin_pages/bower_components/raphael/raphael-min.js"></script>
    <script src="<?php echo $assets_folder; ?>admin_pages/dist/js/sb-admin-2.js"></script>

</body>
</html>
