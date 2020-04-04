<!DOCTYPE html>
<html>
<head>
<title> NoteXChange </title>

</head>
<body>
	<div class="center">
	<!-- Header -->
	<header>
			<h1 >NoteXChange</h1>
			<p>A simple web application for helping UW students with note taking...<br/>
			
			</p>
			<p1>Created by - Group 9 (Miral, Nimisha, Defne, Bhoomika)</p1>
	</header>
	
<br>
	<div class= "buttons">
	<!-- Note-Taker -->
	<form>
	<p1>Looking to sell your notes? </p1>	<input type=button1 onClick="parent.location='nt_register.php'" value="Sign up/Sign in">
	</form>
	
<br>
<!-- Note-Taker -->
	<form>
		<p1>Looking to find notes? </p1>	<input type=button2 onClick="parent.location='search.php'" value="Explore">
	</form>
	
<br>
	</div>
</div>
		<style>
		html {
		overflow-x: hidden; }

		body {
			line-height: 1.7;
			font-weight: 300;
			font-size: 1.1rem;
			align-items: center;
			margin: auto;
			
			

		}
		h1{
			font-family: Roboto; 
			font-size: 78px;
			color:  black;
			text-align: center;
			font-weight: 900;

		}
		p{
			font-family: Roboto; 
			font-size: 28px;
			color:  black;
			text-align: center;
			

		}
		p1{
			font-family: Roboto; 
			font-size: 15px;
			color:  black;
			text-align: center;
			margin-right: 20px;


		}
		input[type=button1]{
			border-radius: 15px;
			border-width: 1px;
			border-color: transparent;
			width: 400px;
			height: 40px;
			color: white;
			font-family: Roboto; 
			font-weight: 400;
			font-size: 16px;
			display: block;
			background-color:#b30000;
			box-shadow: 2px 2px 2px #888888;
			text-align: center;
			margin-right: 20px;
			margin-top: 10px;


		}
		input[type=button1]:hover {
			background-color:red;
			box-shadow: 0px 15px 20px rgb(235,235,235);
			color: #fff;
		}
		input[type=button2]:hover {
			background-color:#0080ff;
			box-shadow: 0px 15px 20px rgb(235,235,235);
			color: #fff;
		}

		input[type=button2]{
			border-radius: 15px;
			border-width: 1px;
			width: 400px;
			height: 40px;
			color: white;
			border-color: transparent;
			font-family: Roboto; 
			font-weight: 400;
			font-size: 16px;
			display: block;
			background-color:#004080;
			box-shadow: 2px 2px 2px #888888;
			text-align: center;
			margin-top: 10px;


		}
		.center{
			margin: auto;
			padding-top: 30px;

		}
		.buttons{
			text-align: center;
			display: flex; 
			justify-content: center; 
		}
		div
		{
			text-align: center;
		}
		</style>



</body>

</html>
