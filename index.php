<!DOCTYPE html>
<html>
<head>
<title> NoteXChange </title>
<!-- <link rel=stylesheet type="text/css" href="css/style-index.css">-->
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css
">
</head>

<body>
	<div class="center">
	<!-- Header -->
	<header>
			<h1 >NoteXChange</h1>
			<p1>A simple web application to assist UW students with note taking...<br/></p1>
			<p2>Created by - Group 9 (Miral, Nimisha, Defne, Bhoomika)</p2>
	</header>
	<br>
	</div>
	
	<div class="container">
	
	<div class="row">
		

	<!-- Note-Taker Login/Register -->
	<form>
	<p3>Looking to sell your notes? </p3>
	<br>
	<input class="btn btn-warning" onClick="parent.location='nt_login_register.php'" value="Login/Register">
	</form>
	<br>
	</div>
	<br>
	<div class="row">
	<!-- Note-Finder Explore page - No contact info -->
	<form>
	<p3>Looking to find notes? </p3>	
	<br>
	<input class="btn btn-danger" onClick="parent.location='search.php'" value="Explore">
	</form>
	<br>

	</div>
	</div>
</body>
</html>