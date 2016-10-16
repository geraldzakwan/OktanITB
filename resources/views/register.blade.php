<!DOCTYPE html>
<html>

<head>
  <title>Oktan ITB | Registration</title>
  <link href="<?php public_path()?>/css/style.css" rel="stylesheet" type = "text/css" />
  <!--<script src="<?php //echo asset('http://laravelapp.dev/js/respond_1_4_2.min.js') ?>"></script>-->
  <script src="<?php public_path()?>/js/scripts.js"></script>
  <script src="<?php public_path()?>/js/main.js"></script>
  <script src="<?php public_path()?>/js/rayon.js"></script>
</head> 

<body>
  <div class="sp-container">

    <h1 class="title"><span class="titlesale">Registrasi</span><span class="titleproject"> Oktan ITB</span></h1><br>
    <h2 class="">Lengkapi data dirimu!</h2><hr><br>

    <form class="sp-form" name="register" id="register" action="{{'register'}}" method="POST">
      
      Nama Lengkap<br>
      <input type="text" class="sp-textbox" name="nama" id="nama" onchange="nullValidation(this.value, this.id, 2)">
      <span style="color:red; font-size:80%"  id="namaMessage">
          <br><br>
      </span>

      Tempat Kelahiran (contoh : Jakarta)<br>
      <input type="text" class="sp-textbox" name="tempatlahir" id="tempatlahir" onchange="nullValidation(this.value, this.id, 2)">
      <span style="color:red; font-size:80%"  id="tempatlahirMessage">
          <br><br>
      </span>

      Tanggal Lahir<br>
      <input type="date" class="sp-textbox" name="tanggallahir" id="tanggallahir" onchange="nullValidation(this.value, this.id, 2)">
      <span style="color:red; font-size:80%"  id="tanggallahirMessage">
          <br><br>
      </span>

      Alamat Lengkap<br>
      <input type="text" class="sp-textbox sp-textboxaddress" name="alamat" id="alamat" onchange="nullValidation(this.value, this.id, 2)"><span style="color:red; font-size:80%"  id="alamatMessage">
          <br><br>
      </span>

      Kode Pos<br>
      <input type="text" class="sp-textbox" name="kodepos" id="kodepos" onchange="isPostalCode(this.value, this.id, 2)"><span style="color:red; font-size:80%"  id="kodeposMessage">
          <br><br>
      </span>

      Asal SMA (contoh : SMAN 3 Bandung)<br>
      <input type="text" class="sp-textbox" name="asalsma" id="asalsma" onchange="nullValidation(this.value, this.id, 2)"><span style="color:red; font-size:80%"  id="asalsmaMessage">
          <br><br>
      </span>

      Asal Provinsi (berdasarkan asal SMA)<br>
      <!--
      <input type="text" class="sp-textbox" name="provinsisma" id="provinsismanumber" onchange="nullValidation(this.value, this.id, 2)">
      -->
      <select class="sp-textboxprovinsi" name="asalprovinsi" id="asalprovinsi" onchange="selectRayon(this.value, this.id); nullValidation(this.value, this.id, 2);">
        <option value="">Pilih provinsi</option>
        <option value="Aceh">Aceh</option>
        <option value="Bali">Bali</option>
        <option value="Banten">Banten</option>
        <option value="Bengkulu">Bengkulu</option>
        <option value="Gorontalo">Gorontalo</option>
        <option value="Jakarta">Jakarta</option>
        <option value="Jambi">Jambi</option>
        <option value="Jawa Barat">Jawa Barat</option>
        <option value="Jawa Tengah">Jawa Tengah</option>
        <option value="Jawa Timur">Jawa Timur</option>
        <option value="Kalimantan Barat">Kalimantan Barat</option>
        <option value="Kalimantan Selatan">Kalimantan Selatan</option>
        <option value="Kalimantan Tengah">Kalimantan Tengah</option>
        <option value="Kalimantan Timur">Kalimantan Timur</option>
        <option value="Kalimantan Utara">Kalimantan Utara</option>
        <option value="Kep Bangka Belitung">Kep Bangka Belitung</option>
        <option value="Kep Riau">Kep Riau</option>
        <option value="Lampung">Lampung</option>
        <option value="Maluku">Maluku</option>
        <option value="Maluku Utara">Maluku Utara</option>
        <option value="Nusa Tenggara Barat">Nusa Tenggara Barat</option>
        <option value="Nusa Tenggara Timur">Nusa Tenggara Timur</option>
        <option value="Papua">Papua</option>
        <option value="Papua Barat">Papua Barat</option>
        <option value="Riau">Riau</option>
        <option value="Sulawesi Barat">Sulawesi Barat</option>
        <option value="Sulawesi Selatan">Sulawesi Selatan</option>
        <option value="Sulawesi Tengah">Sulawesi Tengah</option>
        <option value="Sulawesi Tenggara">Sulawesi Tenggara</option>
        <option value="Sulawesi Utara">Sulawesi Utara</option>
        <option value="Sumatera Barat">Sumatera Barat</option>
        <option value="Sumatera Selatan">Sumatera Selatan</option>
        <option value="Sumatera Utara">Sumatera Utara</option>
        <option value="Yogyakarta">Yogyakarta</option>
      </select>
      <span style="color:red; font-size:80%"  id="asalprovinsiMessage">
          <br><br>
      </span>

      Rayon
      <p class="descRayon">Pilih provinsi terlebih dahulu sebelum memilih rayon.</p>
      <p class="descRayon">Setelah memilih provinsi, akan ditampilkan rayon-rayon terdekat yang dapat Anda pilih.</p>
      <p class="descRayon">Jika pilihan rayon hanya satu, maka Anda otomatis ditempatkan pada rayon tersebut.</p>
      <p class="descRayon">Khusus untuk provinsi dari Indonesia Timur, seluruh pilihan rayon diperbolehkan.</p>
      <select class="sp-textboxrayon" name="rayon" id="rayon" onchange="nullValidation(this.value, this.id, 2);">
        <!-- Bakal diisi sama js selectRayon -->
        <option value="">Pilih rayon</option>
      </select>
      <span style="color:red; font-size:80%"  id="rayonMessage"><br><br></span>

      Nomor HP (contoh : 081218651998)<br>
      <input type="text" class="sp-textbox" name="nomorhp" id="nomorhp" onchange="nullValidation(this.value, this.id, 2)"><span style="color:red; font-size:80%"  id="nomorhpMessage">
          <br><br>
      </span>

      Username<br>
      <input type="text" class="sp-textbox" name="username" id="username" onchange="validateInDB(this.value, this.id, 2, 'username')" ><span style="color:red; font-size:80%"  id="usernameMessage">
          <br><br>
      </span>

      Email<br>
      <input type="text" class="sp-textbox" name="email" id="email" onchange="if(isEmailValid(this.value, this.id, 2)) {validateInDB(this.value, this.id, 2, 'email')}"><span style="color:red; font-size:80%"  id="emailMessage">
          <br><br>
      </span>

      Password<br>
      <input type="password" class="sp-textbox" name="password" id="password" onchange="nullValidation(this.value, this.id, 2)"><span style="color:red; font-size:80%"  id="passwordMessage">
          <br><br>
      </span>

      Confirm Password<br>
      <input type="password" class="sp-textbox" name="confirmpassword" id="confirmpassword" onchange="isConfirmPassword(this.value, this.id, 2)"><span style="color:red; font-size:80%"  id="confirmpasswordMessage">
          <br><br>
      </span>

      <span value="invalid" id="isValid"></span>
      <input type="submit" class="sp-submitbutton" value="REGISTER" onclick="return confirmJumlah('register', 1) && confirmAction();"><br><br>

    </form>
    <p class="errmsg"></p><br>
    <p><strong>Sudah mendaftar? Login <a href="{{url('login')}}">disini</a></strong></p>
  </div>
</body>
</html>