<?php
defined('BASEPATH') OR exit('No direct script access allowed');
echo $message; 
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Edit Prof</title>
</head>
<body>

<div id="container">
	<h1>Edit</h1>
	<form action="editprof" method="post" >
		Name: <input type="text" name="uname"><br>
		Department: <input type="text" name="dept"><br>
		Phone: <input type="text" name="phone"><br>
		Email: <input type="text" name="email"><br>
	<input type="submit">
</div>

</body>
</html>