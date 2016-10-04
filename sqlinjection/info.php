<!DOCTYPE html>
<html>
<head>
	<title>Why it works!</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h1 class="text-center">Why it works!</h1>
	<p class="text-center">Since there is no server side validation or sanitation this is what happens</p>
	<hr/>
	<div class="text-center">
		<h3>SELECT * FROM `users` WHERE `name` = '$name' AND  `password` = '$password'</h3>
		<p> When we submit the form, this is what is replaced: </p>
		<h3>SELECT * FROM `users` WHERE `name` = 'hi' OR '1' = '1' AND  `password` = 'hi' OR '1' = '1'</h3>
		<br>
		<p> If $name and $password had been passed through a character escape function, this wouldn't be possible. <p>
	</div>
	<div id="samples" class="text-center"><h4>Check out the code samples at <a href="//www.github.com/wrejcodes/classExamples">Github!</a></h4></div>

</body>
</html>