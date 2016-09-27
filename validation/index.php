<?php 
	if($_POST["username"] && $_POST["password"]){
		echo "Hello ".$_POST["username"];
		$results = '<div class="text-center"><h3>Server Side Validation is also Needed</h3><p>We could avoid this problem by doing validation on the server side as well!</p><a href="/sqlinjection/">Let\'s see what can happen if we don\'t validate server side</a></div>';
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Validation</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h1 class="text-center">Client Side Validation</h1>
	<p class="text-center">Important for giving good clues to the user for mistakes they have made</p>
	<hr/>
	<div class="text-center">
		<p> let's take a look at this form</p>
		<p id="error"></p>
		<form method="post" id="myform" action="#" name="myform" onsubmit="return (validate(event));">
			<label for="username">Email: </label>
			<input type="text" name="username" id="user">
			<label for="password">Password:</label>
			<input type="password" name="password" id="pass">
			<button type="submit">Submit</button>
		</form>
	</div>
	<?php echo $results; ?>
<script type="text/javascript">
	function validate(e){
		e.preventDefault();
		//document.myform.submit();
		document.getElementById("error").innerHTML ="";
		var user = document.getElementById("user").value;
		var pass = document.getElementById("pass").value;
		if(!user || !pass){
			document.getElementById("error").innerHTML = "You need a valid username and password!";
			
		} else {
			var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
			if(!re.test(user)){
				document.getElementById("error").innerHTML = "Invalid email!";
			} else {
				document.myform.submit();
			
			}
		}

	};
	
</script>

</body>
</html>