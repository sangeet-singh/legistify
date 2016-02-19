<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Visitor Records - Login</title>

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

    <?php require('includes/header.php') ?>

    <header>
        <div class="header-content">
            <div class="header-content-inner">
                <div class="highlight highlight-width no-padding-top">
                    <h2>Register</h2>
                    <form action="welcome/register_user" class="login-form" method="post">
                        <fieldset>
                            <section class="row low-padding">
                                <label class="col col-lg-4 control-label label-text" for="name">Name</label>
                                <div class="controls">
                                    <input name="name" placeholder="John" type="text" maxlength="40" id="name" class="col col-lg-6" required/>
                                </div>
                            </section>
                            <section class="row low-padding">
                                <label class="col col-lg-4 control-label label-text" for="email_id">Email</label>
                                <div class="controls">
                                    <input name="email_id" placeholder="someone@domain.com" type="email" maxlength="40" id="email_id" class="col col-lg-6" required/>
                                </div>
                            </section>
                            <section class="row low-padding">
                                <label class="col col-lg-4 control-label label-text" for="username">Username</label>
                                <div class="controls">
                                    <input name="username" placeholder="John" type="text" maxlength="20" id="username" class="col col-lg-6" required/>
                                </div>
                            </section>
                            <section class="row low-padding">
                                <label class="col col-lg-4 control-label label-text" for="password">Password</label>
                                <div class="controls">
                                    <input name="password" placeholder="password" type="password" maxlength="20" id="password" class="col col-lg-6" required/>
                                </div>
                            </section>
                        </fieldset>
                        <button class="btn btn-primary form-element no-margin-top">Register</button>
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
