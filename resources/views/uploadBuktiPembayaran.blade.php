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
	}

	$id = Session::get('sid');
	$record = Peserta::where('id', '=', $id)->select('username', 'approval', 'buktibayar')->get()->toArray()[0]; 
	$uname = $record['username'];
	$approval = $record['approval'];
	$buktibayar = $record['buktibayar'];
?>	

<!DOCTYPE html>
<html>

	<head>
		<title>Oktan ITB | Upload Bukti Pembayaran</title>
	 	<link href="<?php public_path()?>/css/style.css" rel="stylesheet" type = "text/css" />
	  	<!--<script src="<?php //echo asset('http://laravelapp.dev/js/respond_1_4_2.min.js') ?>"></script>-->
	  	<script src="<?php public_path()?>/js/scripts.js"></script>
	</head>

	<body>
		<div class="sp-containerupload">
			<!--<h1 class="title"><span class="titlesale">Upload </span><span class="titleproject">Bukti Pembayaran</
			span></h1><br>-->
			<h1 class="title"><span class="titleproject">Upload Bukti Pembayaran</span></h1><br>
			<p class="greeting"> Hi, <?php echo $uname; echo"!"?></p>
			<p class="logout"><strong><a href="{{url('logout')}}">logout</a></strong></p>
			<br>
			<ul id="nav" class="tab">
				<li class="tab"><a class='active' href="{{url('uploadBuktiPembayaran')}}"><strong>Upload Bukti Pembayaran</strong></a></li>
				<li class="tab"><a href="{{url('editProfile')}}">Edit Profil</a></li>
			</ul>
			<br>
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
  			<?php
				if ($approval ==='No') {
					echo "<span id='spaceApproval' style='color:red; font-size:100%'>";
					echo " Belum";
				} else {
					echo "<span id='spaceApproval' style='color:green; font-size:100%'>";
					echo " Sudah";
				}
				echo "</span>";
			?>

  			<br><br>

  			<form class="sp-form" name="uploadBuktiPembayaran" id="uploadBuktiPembayaran" action="{{'uploadBuktiPembayaran'}}" enctype="multipart/form-data" method="POST"> 			
	  			
	  			<?php  
					if($buktibayar != 'Not yet uploaded') {	  					
						$image = $buktibayar;
					} else {
						$image = "Not yet uploaded";
					}
				?>

				@if ($image!="Not yet uploaded") 
					<div id="spaceGambar">
						<br>
						Bukti pembayaran Anda :
						<br><br>
						<img src="{{ url('image/' . $image) }}" class="fotoBukti" align="left" hspace="10">
						<br>
						<br><br><br><br><br><br><br><br><br><br>
						<br><br><br><br><br><br>
						
					</div>
				@else
					<div id="spaceGambar">
						<br>
						Bukti pembayaran Anda belum diupload.
						<br>
					</div>
				@endif

				<br><br>
				
				Upload Bukti Pembayaran
	  			<p class="descRayon">Harap upload file berekstensi .jpg.</p>
			    <p class="descRayon">Ukuran file harap tidak melebihi 500KB.</p>
			    <p class="descRayon">Jika melebihi, silahkan cari web untuk mengecilkan ukuran file jpg.</p>

				<input type="file" name="fotoBukti" id="fotoBukti" onchange="if(nullValidation(this.value, this.id, 3)) {checkExtension(this.id, this.value);}"> <br>
				<span style="color:red; font-size:80%"  id="fotoBuktiMessage">
		          <br><br>
		      	</span>
				
				<span value="invalid" id="isValid"></span>

				<input type="submit" class="sp-uploadbutton" value="UPLOAD" onclick="return confirmJumlah('uploadBuktiPembayaran', 1) && confirmAction();"><br><br>
			</form>
			
		</div>
	</div>

	</body>
</html>