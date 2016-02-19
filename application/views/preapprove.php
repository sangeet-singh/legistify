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
	<form action="preapprove" method="post" >
		Your Name: <input type="text" name="vis_name"><br>
		Your email: <input type="text" name="email"><br>
		Your phone: <input type="text" name="phone"><br>
		Date: <input type="date" name="date"><br>
		Purpose: <input type="text" name="purpose"><br>
	<input type="submit">
</div>

</body>
</html>