<?php
	namespace App\Http\Controllers;

	use Illuminate\Foundation\Bus\DispatchesJobs;
	use Illuminate\Routing\Controller as BaseController;
	use Illuminate\Foundation\Validation\ValidatesRequests;
	use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

	use Illuminate\Http\Request;
	use App\Http\Requests;
	use App\Peserta;
	use View;
	use Session;

	$id = Session::get('sid');
	$uname = Peserta::where('id', '=', $id)->select('username')->get()->toArray()[0]['username'];
?>	

<!DOCTYPE html>
<html>

	<head>
		<title>Oktan ITB | Your Profile</title>
	 	<link href="<?php public_path()?>/css/style.css" rel="stylesheet" type = "text/css" />
	  	<!--<script src="<?php //echo asset('http://laravelapp.dev/js/respond_1_4_2.min.js') ?>"></script>-->
	  	<script src="<?php public_path()?>/js/scripts.js"></script>
	</head>

	<body>
		<div class="sp-container">
			<h1 class="title"><span class="titlesale">Upload </span><span class="titleproject">Photo</span></h1><br>
			<p class="greeting"> Hi, <?php echo $uname; echo"!"?></p>
			<p class="logout"><strong><a href="{{url('logout')}}">logout</a></strong></p>
			<br>
			<ul id="nav" class="tab">
				<li class="tab"><a href="{{url('profile')}}">Your Profile</a></li>
				<li class="tab"><a class='active' href="{{url('uploadPhoto')}}">Upload Photo</a></li>
				<li class="tab"><a href="{{url('editProfile')}}">Edit Profile</a></li>
			</ul>
			<br>
  			<br>
		</div>
	</div>

	</body>
</html>