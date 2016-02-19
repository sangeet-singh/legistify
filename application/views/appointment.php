<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Legistify - Book</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="<?php echo $assets_folder; ?>css/bootstrap.min.css" type="text/css">

    <!-- Custom Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="<?php echo $assets_folder; ?>css/animate.min.css" type="text/css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo $assets_folder; ?>css/creative.css" type="text/css">

    <link rel="stylesheet" href="<?php echo $assets_folder; ?>css/custom.css" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top">
    <?php 
        if(!$this->session->userdata('logged_in'))
            require('includes/header.php');
        else
            require('includes/header_loggedIn.php');
    ?>
    <header>
        <div class="header-content">
            <div class="header-content-inner">
                <div class="highlight highlight-width no-padding-top">
                    <h2>
                        <?php 
                        if($message=="SUCCESS")
                            echo "Booked Successfully";
                        else
                            echo "Book An Appointment";
                        ?>
                    </h2>
                    <form action="bookappointment" class="login-form" method="post">
                        <fieldset>
                            <section class="row low-padding">
                                <label class="col col-lg-4 control-label label-text" for="first-name">First Name</label>
                                <div class="controls">
                                    <input name="vis_name" placeholder="John" type="text" maxlength="20" id="first-name" class="col col-lg-6" required/>
                                </div>
                            </section>
                            <section class="row low-padding">
                                <label class="col col-lg-4 control-label label-text" for="email">Email Id</label>
                                <div class="controls">
                                    <input name="email_id" placeholder="someone@domain.com" type="email" maxlength="40" id="email" class="col col-lg-6" required/>
                                </div>
                            </section>
                            <section class="row low-padding">
                                <label class="col col-lg-4 control-label label-text" for="email">Phone No.</label>
                                <div class="controls">
                                    <input name="phone" placeholder="9571635483" type="text" pattern="[0-9]{10}" class="col col-lg-6" required/>
                                </div>
                            </section>
                        </fieldset>
                        <fieldset>
                            <section class="row low-padding">
                                <label class="col col-lg-3 control-label label-text" for="who">Department</label>
                                <div class="controls col col-lg-6">
                                    <select id="who" name="department">
                                        <?php
                                            foreach($departments as $department)
                                                echo "<option>".$department['dept_name']."</option>";
                                        ?>   
                                    </select>
                                </div>
                            </section>
                            <section class="row low-padding">
                                <label class="col col-lg-3 control-label label-text" for="who">Lawyer</label>
                                <div class="controls col col-lg-6">
                                    <select id="who" name="lawyer">
                                        <?php
                                            foreach($lawyers as $lawyer)
                                                echo "<option>".$lawyer['name']."</option>";
                                        ?>   
                                    </select>
                                </div>
                            </section>
                            <section class="row low-padding">
                                <label class="col col-lg-3 control-label label-text" for="purpose">Purpose</label>
                                <div class="controls">
                                    <input type="text" id="purpose" class="col col-lg-6" name= "purpose"required/>
                                </div>
                            </section>
                            <section class="row low-padding">
                                <label class="col col-lg-3 control-label label-text" for="date">Date</label>
                                <div class="controls">
                                    <input type="date" id="date" name="date" class="col col-lg-6" required/>
                                </div>
                            </section>
                            <section class="row low-padding">
                                <label class="col col-lg-3 control-label label-text" for="time">Time</label>
                                <div class="controls">
                                    <input type="time" id="time" name="time" class="col col-lg-6" required/>
                                </div>
                            </section>
                        </fieldset>
                        <button class="btn btn-primary form-element no-margin-top">Submit Request</button>
                    </form>
                </div>
            </div>
        </div>
    </header>

    

    <!-- jQuery -->
    <script src="<?php echo $assets_folder; ?>js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo $assets_folder; ?>js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="<?php echo $assets_folder; ?>js/jquery.easing.min.js"></script>
    <script src="<?php echo $assets_folder; ?>js/jquery.fittext.js"></script>
    <script src="<?php echo $assets_folder; ?>js/wow.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo $assets_folder; ?>js/creative.js"></script>

</body>

</html>


<!--
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
echo $message;
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Add Prof</title>
</head>
<body>

<div id="container">
	<h1>Book an appointment</h1>
	<form action="bookappointment" method="post" >
		Your Name: <input type="text" name="vis_name"><br>
		Your email: <input type="text" name="email"><br>
		Your phone: <input type="text" name="phone"><br>
		Date: <input type="date" name="date"><br>
		Prof Department: <select name="dept_name">
						<?php
						foreach($departments as $department)
							echo "<option>".$department['dept_name']."</option>";
						?>
    				</select><br>
		Prof Name: <input type="text" name="prof_name"><br>
		Purpose: <input type="text" name="purpose"><br>
	<input type="submit">
</div>

</body>
</html>
