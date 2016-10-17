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
	$uname = Peserta::where('id', '=', $id)->select('username')->get()->toArray()[0]['username'];

	$record = Peserta::where('id', '=', $id)->get()->toArray()[0];
?>	

<!DOCTYPE html>
<html>

	<head>
		<title>Oktan ITB | Edit Profile</title>
	 	<link href="<?php public_path()?>/css/style.css" rel="stylesheet" type = "text/css" />
	  	<!--<script src="<?php //echo asset('http://laravelapp.dev/js/respond_1_4_2.min.js') ?>"></script>-->
	  	<script src="<?php public_path()?>/js/scripts.js"></script>
	  	<script src="<?php public_path()?>/js/rayon.js"></script>
	</head>

	<body>
		<div class="sp-container">
			<!--<h1 class="title"><span class="titlesale">Edit </span><span class="titleproject">Profile</span></h1><br>-->
			<h1 class="title"><span class="titleproject">Edit Profil</span></h1><br>
			<p class="greeting"> Hi, <?php echo $uname; echo"!"?></p>
			<p class="logout"><strong><a href="{{url('logout')}}">logout</a></strong></p>
			<br>
			<ul id="nav" class="tab">
				<li class="tab"><a href="{{url('uploadBuktiPembayaran')}}">Upload Bukti Pembayaran</a></li>
				<li class="tab"><a class='active' href="{{url('editProfile')}}"><strong>Edit Profil</strong></a></li>
			</ul>
			<br>
  			<br>

  			<form class="sp-form" name="edit" id="editProfile" action="{{'editProfile'}}" method="POST">

  			  <?php if(!empty($message)) {
  			  	echo "<span style='color:green; font-size:80%'>";
  			  	echo "<strong>";
			  	echo $message;
			  	echo "</strong>";
  			  	echo "</span>";
  			  	echo "<br><br>";
  			  }
  			  ?>
      
		      Nama Lengkap<br>
		      <input type="text" class="sp-textbox" name="nama" id="nama" onchange="nullValidation(this.value, this.id, 2)" <?php echo "value='".$record['nama']."'";?>>
		      <span style="color:red; font-size:80%"  id="namaMessage">
		          <br><br>
		      </span>

		      Tempat Kelahiran (contoh : Jakarta)<br>
		      <input type="text" class="sp-textbox" name="tempatlahir" id="tempatlahir" onchange="nullValidation(this.value, this.id, 2)" <?php echo "value='".$record['tempatlahir']."'";?>>
		      <span style="color:red; font-size:80%"  id="tempatlahirMessage">
		          <br><br>
		      </span>

		      Tanggal Lahir<br>
		      <input type="date" class="sp-textbox" name="tanggallahir" id="tanggallahir" onchange="nullValidation(this.value, this.id, 2)" <?php echo "value='".$record['tanggallahir']."'";?>>
		      <span style="color:red; font-size:80%"  id="tanggallahirMessage">
		          <br><br>
		      </span>

		      Alamat Lengkap<br>
		      <input type="text" class="sp-textbox sp-textboxaddress" name="alamat" id="alamat" onchange="nullValidation(this.value, this.id, 2)" <?php echo "value='".$record['alamat']."'";?>>
		      <span style="color:red; font-size:80%"  id="alamatMessage">
		          <br><br>
		      </span>

		      Kode Pos<br>
		      <input type="text" class="sp-textbox" name="kodepos" id="kodepos" onchange="isPostalCode(this.value, this.id, 2)" <?php echo "value='".$record['kodepos']."'";?>>
		      <span style="color:red; font-size:80%"  id="kodeposMessage">
		          <br><br>
		      </span>

		      Asal SMA (contoh : SMAN 3 Bandung)<br>
		      <input type="text" class="sp-textbox" name="asalsma" id="asalsma" onchange="nullValidation(this.value, this.id, 2)" <?php echo "value='".$record['asalsma']."'";?>>
		      <span style="color:red; font-size:80%"  id="asalsmaMessage">
		          <br><br>
		      </span>

		      Asal Provinsi (berdasarkan asal SMA)<br>
		      <!--
		      <input type="text" class="sp-textbox" name="provinsisma" id="provinsismanumber" onchange="nullValidation(this.value, this.id, 2)">
		      -->
		      <select class="sp-textboxprovinsi" name="asalprovinsi" id="editasalprovinsi" onchange="selectRayon(this.value, this.id);" > 
		        <option <?php echo "value='".$record['asalprovinsi']."'";?>> <?php echo$record['asalprovinsi'];?> </option>
		        <option value="">Ganti Provinsi</option>
		      </select>
		      <span style="color:red; font-size:80%"  id="editasalprovinsiMessage">
		          <br><br>
		      </span>

		      Rayon
		      <p class="descRayon">Pilih provinsi terlebih dahulu sebelum memilih rayon.</p>
		      <p class="descRayon">Setelah memilih provinsi, akan ditampilkan rayon-rayon terdekat yang dapat Anda pilih.</p>
		      <p class="descRayon">Jika pilihan rayon hanya satu, maka Anda otomatis ditempatkan pada rayon tersebut.</p>
		      <p class="descRayon">Khusus untuk provinsi dari Indonesia Timur, seluruh pilihan rayon diperbolehkan.</p>
		      <select class="sp-textboxrayon" name="rayon" id="rayon" onchange="nullValidation(this.value, this.id, 2);">
		        <!-- Bakal diisi sama js selectRayon -->
		        <option <?php echo "value='".$record['rayon']."'";?>> <?php echo$record['rayon'];?> </option>
		      </select>
		      <span style="color:red; font-size:80%"  id="rayonMessage"><br><br></span>

		      Nomor HP (contoh : 081218651998)<br>
		      <input type="text" class="sp-textbox" name="nomorhp" id="nomorhp" onchange="nullValidation(this.value, this.id, 2)" <?php echo "value='".$record['nomorhp']."'";?>>
		      <span style="color:red; font-size:80%"  id="nomorhpMessage" >
		          <br><br>
		      </span>

		      Username<br>
		      <input type="text" class="sp-textbox" name="username" id="username" onchange="validateInDB(this.value, this.id, 2, 'username')" <?php echo "value='".$record['username']."'";?>>
		      <span style="color:red; font-size:80%"  id="usernameMessage">
		          <br><br>
		      </span>

		      Email<br>
		      <input type="text" class="sp-textbox" name="email" id="email" onchange="if(isEmailValid(this.value, this.id, 2)) {validateInDB(this.value, this.id, 2, 'email')}" <?php echo "value='".$record['email']."'";?>>
		      <span style="color:red; font-size:80%"  id="emailMessage">
		          <br><br>
		      </span>

		      Password<br>
		      <input type="text" class="sp-textbox" name="password" id="password" onchange="nullValidation(this.value, this.id, 2)" <?php echo "value='".$record['password']."'";?>>
		      <span style="color:red; font-size:80%"  id="passwordMessage">
		          <br><br>
		      </span>

		      Confirm Password<br>
		      <input type="text" class="sp-textbox" name="confirmpassword" id="confirmpassword" onchange="isConfirmPassword(this.value, this.id, 2)" <?php echo "value='".$record['confirmpassword']."'";?>>
		      <span style="color:red; font-size:80%"  id="confirmpasswordMessage">
		          <br><br>
		      </span>

		      <span value="invalid" id="isValid"></span>
		      <input type="submit" class="sp-submitbutton" value="UPDATE" onclick="return confirmJumlah('editProfile', 1) && confirmAction();"><br><br>

		    </form>
		</div>

	</body>
</html>