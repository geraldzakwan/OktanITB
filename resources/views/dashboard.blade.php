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

	$query = Peserta::where('id', '>', 0)->select(); 
	$count = $query->count();
	if ($count>0) {
		$listpeserta = $query->get()->toArray();
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
				<li class="tab"><a class='active' href="{{url('dashboard')}}"><strong>Dashboard</strong></a></li>
				<li class="tab"><a >Details & Approval</a></li>
			</ul>

			<!--Here for the filter-->
			<br>

  			@if ($count>0)
  				<table class="table">
	  				<thead>
	  					<tr>
	  						<th>
	  							Nomor Urut
	  						</th>
	  						<th>
	  							Nama
	  						</th>
	  						<th>
	  							Upload
	  						</th>
	  						<th>
	  							Rayon
	  						</th>
	  						<th>
	  							Approval
	  						</th>
	  					</tr>
	  				</thead>
	  				<tbody>
	  					<?php foreach ($listpeserta as $peserta):?>
		  					<tr>
		  						<td>
		  							{{ $peserta['nomorurut'] }}
		  						</td>
		  						<td>
		  							{{ $peserta['nama'] }}
		  						</td>
		  						<td>
		  							@if ($peserta['buktibayar'] === 'Not yet uploaded')
		  								No
		  							@else
		  								Yes
		  							@endif
		  						</td>
		  						<td>
		  							{{ $peserta['rayon'] }}
		  						</td>
		  						<td>
		  							{{ $peserta['approval'] }}
		  						</td>
		  						<td>
		  							<?php $idd = $peserta['id'];?>
		  							<a class="detail" href="{{ url('details') }}?id={{ $idd }}">DETAILS</a>
		  						</td>
		  					</tr>
		  				<?php endforeach ?>
	  				</tbody>
  				</table>
  			@else
  				<p>Belum ada peserta yang mendaftar</p>
  			@endif
		</div>
	</div>

	</body>
</html>