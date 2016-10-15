<!DOCTYPE html>
<html>
<head>
	<title>Oktan ITB | Login</title>
	 <link href="<?php public_path()?>/css/style.css" rel="stylesheet" type = "text/css" />
  	<!--<script src="<?php //echo asset('http://laravelapp.dev/js/respond_1_4_2.min.js') ?>"></script>-->
  	<script src="<?php public_path()?>/js/scripts.js"></script>
</head>
<body>
	<div class="color">
		<div class="sp-container">
			<h1 class="title"><span class="titlesale">Login</span><span class="titleproject"> Oktan ITB</span></h1>
			<br>
			<h2 class="">Please login</h2>
			<hr>
			<br>
			<form name="login" action="loginAction.php" method="POST">
				Email or Username
				<br>
				<input type="text" class="sp-textbox" id="username" name="username" onchange="nullValidation(this.value, this.id, 3)">
				<span style="color:red; font-size:80%"  id="usernameMessage">
					<br><br><br>
				</span>
				Password<br>
				<input type="password" class="sp-textbox" id="password" name="password" onchange="nullValidation(this.value, this.id, 3)">
				<span style="color:red; font-size:80%"  id="passwordMessage">
					<br><br><br>
				</span>
				<input type="submit" class="sp-submitbutton" value="LOGIN">
			</form>
			<p class="errmsg"></p>
			<script src="js/scripts.js"></script>
			<br>
			<p><strong>Belum memiliki akun? Registrasi <a href="{{url('register')}}">disini</a></strong></p>
		</div>
	</div>
</body>
</html>