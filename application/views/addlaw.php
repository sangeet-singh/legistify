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

    <title>Dashboard - Add Lawyer</title>

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
		<?php require('includes/nav.php');?>
        <div id="page-wrapper">
        	<div class="row">
				
				<?php if($message=="success"){?>
				<h1 class="center">Lawyer Added Successfully.</h1>
                <h2 class="center"><a href=<?php echo base_url()."addlaw"?>>Add Another Lawyer</a></h2>
				<?php } else{?>
				<h1 class="center">Add a Lawyer</h1>
				<form action=<?php echo base_url()."addlaw"?> class="login-form" method="post">
                        <fieldset>
                            <section class="row low-padding">
                                <label class="col col-lg-5 control-label label-text" for="first-name">Name</label>
                                <div class="controls">
                                    <input name="name" placeholder="John" type="text" maxlength="40" id="name" class="col col-lg-3" required/>
                                </div>
                            </section>
                            <section class="row low-padding">
                                <label class="col col-lg-5 control-label label-text" for="first-name">Username</label>
                                <div class="controls">
                                    <input name="username" placeholder="John" type="text" maxlength="20" id="username" class="col col-lg-3" required/>
                                </div>
                            </section>
                            <section class="row low-padding">
                                <label class="col col-lg-5 control-label label-text" for="password">Password</label>
                                <div class="controls">
                                    <input name="password" placeholder="password" type="password" maxlength="20" class="col col-lg-3" required/>
                                </div>
                            </section>
                            <section class="row low-padding">
                                <label class="col col-lg-5 control-label label-text" for="department">Department</label>
                                <div class="controls">
                                	<select name="deptname" class="col col-lg-3">
                                        <option>---------</option>
                                		<?php
											foreach($departments as $department)
												echo "<option>".$department['dept_name']."</option>";
										?>
									</select>
                                </div>
                            </section>
                            <section class="row low-padding">
                                <label class="col col-lg-5 control-label label-text" for="email">Email Id</label>
                                <div class="controls">
                                    <input name="email" placeholder="user@domain.com" type="email" maxlength="40" class="col col-lg-3" required/>
                                </div>
                            </section>
                            <section class="row low-padding">
                                <label class="col col-lg-5 control-label label-text" for="email">Fee</label>
                                <div class="controls">
                                    <input name="fee" placeholder="INR 2,00,000" type="number" pattern="[0-9]{10}" class="col col-lg-3" required/>
                                </div>
                            </section>
                        </fieldset>
                        <button class="btn btn-primary form-element no-margin-top">Add</button>
                </form>
                <?php }?>
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