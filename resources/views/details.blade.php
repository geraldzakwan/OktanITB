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

	if (!Session::has('sid')) {
		echo "<p>FORBIDDEN ACCESS YOU BITCH</p>";
		die();
	} else if (Session::get('sid')!=12061998) {
		echo "<p>FORBIDDEN ACCESS YOU BITCH</p>";
		die();
	}

	$id = \Request::input('id');

	$query = Peserta::where('id', '=', $id)->select(); 
	$count = $query->count();
	if ($count>0) {
		$peserta = $query->get()->toArray()[0];
		$nomorurut = $peserta['nomorurut'];
		$nama = $peserta['nama'];
		$rayon = $peserta['rayon'];
		$buktibayar = $peserta['buktibayar'];
		$approval = $peserta['approval'];
	}
	$uname = "Admin";
?>	

<!DOCTYPE html>
<html>

	<head>
		<title>Oktan ITB | Admin Dashboard</title>
	 	<link href="<?php public_path()?>/css/style.css" rel="stylesheet" type = "text/css" />
	  	<!--<script src="<?php //echo asset('http://laravelapp.dev/js/respond_1_4_2.min.js') ?>"></script>-->
	  	<script src="<?php public_path()?>/js/scripts.js"></script>
	</head>

	<body>
		<div class="sp-containerupload">
			<!--<h1 class="title"><span class="titlesale">Upload </span><span class="titleproject">Bukti Pembayaran</
			span></h1><br>-->
			<h1 class="title"><span class="titleproject">Admin Dashboard</span></h1><br>
			<p class="greeting"> Hi, <?php echo $uname; echo"!"?></p>
			<p class="logout"><strong><a href="{{url('logout')}}">logout</a></strong></p>
			<br>
			<ul id="nav" class="tab">
				<li class="tab"><a href="{{url('dashboard')}}"><strong>Dashboard</strong></a></li>
				<li class="tab"><a class='active' href="{{url('details')}}?id={{$id}}"><strong>Details & Approval</strong></a></li>
			</ul>

			<!--Here for the filter-->
			<br>

			<?php if(!empty($message)) {
			  	echo "<span style='color:green; font-size:80%'>";
			  	echo "<strong>";
			  	echo $message;
			  	echo "</strong>";
			  	echo "</span>";
			  	echo "<br><br>";
			  	}
		  	?>

  			Approval Pembayaran : 
  			<input type="button" class="button-like" value="<?php echo $approval;?>" id="likesbutton<?php echo $id; ?>" onclick="addLikes(this.id, <?php echo $id; ?>)">

  			@if ($count>0) 				
				@if ($buktibayar!="Not yet uploaded") 
					<div id="spaceGambar">
						<br>
						Bukti pembayaran peserta : 
						<strong><?php echo("(".$nomorurut."-".$nama."-".$rayon.")")?></strong>
						
						<br><br>
						<img src="{{ url('image/' . $buktibayar) }}" class="fotoBukti" align="left" hspace="10">
						<br>
						<br><br><br><br><br><br><br><br><br><br>
						<br><br><br><br><br><br>
						
					</div>
				@else
					<div id="spaceGambar">
						<br>
						Bukti pembayaran peserta belum diupload.
						<br>
					</div>
				@endif
  			@else
  				<p> Data peserta gagal diambil dari database </p>
  			@endif
		</div>
	</div>

	</body>
</html>