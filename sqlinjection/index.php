<?php 
	
	include('db.php');

	if($_POST["username"] && $_POST["password"]){
		$email = $_POST["username"];
		$password = $_POST["password"];
		$query = "SELECT * FROM `users` WHERE `email` ='$email' AND `password` = '$password'";
		$result = mysql_query($query);
		$results;
		$numOfResults = 0;
		while($row = mysql_fetch_array($result)){
			$results.= "<br/>";
			$results.= '<div class="results text-center">';
			$results .= "<p>Email: ";
			$results.= $row['email'];
			$results.= "</p><p> Password: ";
			$results.= $row['password'];
			$results.= "</p><p> Birthday: ";
			$results.= $row['birthdate'];
			$results.= "</p><p> Phone: ";
			$results.= $row['phone'];
			$results.= "</p><p> Address: ";
			$results.= $row['address'];
			$results.= "</p><p> ID: ";
			$results.= $row['id'];
			$results.= "</p></div><hr/>";
			$numOfResults++;

		}
		if(!$results){
			$results = '<p id="error" class="text-center"> Invalid username and/or password</p>';
		}
		if($numOfResults > 3){
			$results.= '<div id="samples" class="text-center"><h4>Check out the code samples at <a href="//www.github.com/wrejcodes/classExamples">Github!</a></h4></div>';
		}

	} else {
		if (!empty($_POST)){
			$results = '<p id="error" class ="text-center"> Please enter a username and/or password</p>';
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>SQL Injection</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h1 class="text-center">SQL Injection</h1>
	<p class="text-center">When we don't sanitize and validate input we leave ourselves open for SQL Injection</p>
	<hr/>
	<div class="text-center">
		<p> Enter your Email and Password </p>
		<p id="error"></p>
		<form method="post" id="myform" action="#" name="myform" >
			<label for="username">Email: </label>
			<input type="text" name="username" id="user">
			<label for="password">Password:</label>
			<input type="text" name="password" id="pass">
			<button type="submit">Submit</button>
		</form>
	</div>
	<?php echo $results; ?>


</body>
</html>