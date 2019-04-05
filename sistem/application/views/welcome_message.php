<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<style type="text/css">

	</style>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<!-- Bootstrap -->
	<link href="<?php echo base_url(); ?>assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url(); ?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url(); ?>assets/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <!-- <link href="<?php echo base_url(); ?>assets/build/css/custom.min.css" rel="stylesheet"> -->

	
</head>
<body >
	<!-- <?php echo base_url(); ?>
	<table>
		<?php foreach ($takmirs as $takmir): ?>
		<tr>
			<td> <?php echo $takmir->id_jabatan; ?></td>
			<td> <?php echo $takmir->nama; ?></td>
		</tr>
		<?php endforeach; ?>
	</table> -->
	
	<div class="container-fluid">
		<br>
		<h1> Aplikasi dasar Notulensi </h1>
		<hr>
		<div id="step1"  class="card">
			<h5 class="card-header"> Deskripsi Musyawarah </h5>
			<div class="card-body">
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Notulen <span class="required">*</span>
					</label>
					<div class="col-md-9 col-sm-9 col-xs-12">
						<select class="form-control">
							<option>Pilih Notulen</option>
							<?php foreach ($takmirs as $takmir): ?>
								<option value="$takmir->id"><?php echo $takmir->nama;?></option>
							<?php endforeach;?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Amir <span class="required">*</span>
					</label>
					<div class="col-md-9 col-sm-9 col-xs-12">
						<select class="form-control">
							<option>Pilih Notulen</option>
							<?php foreach ($takmirs as $takmir): ?>
								<option value="$takmir->id"><?php echo $takmir->nama;?></option>
							<?php endforeach;?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Peserta musyawarah</label>
					<div class="col-md-9 col-sm-9 col-xs-12">
						<select class="select2_multiple form-control" multiple="multiple">
							<?php foreach ($takmirs as $takmir): ?>
								<option value="$takmir->id"><?php echo $takmir->nama;?></option>
							<?php endforeach;?>
						</select>
					</div>
				</div>
			</div>
		</div>
		<h2></h2>
		
		<hr>

		<h2> Progress Musyawarah </h2>
		<div id="step2" class="col-md-12">
			<!-- Tambah pekerjaan baru start -->
			
			<!-- Tambah pekerjaan baru start -->
			<!-- Tambah progress start -->
			<div class="card">
				<div id="kolomProgres" class="card-body">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tambah Progres <span class="required">*</span>
					</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input type="text" id="namaProgress" class="form-control col-md-7 col-xs-12" placeholder="nama progres..">
						<!-- <select class="form-control">
							<option>Pilih Proyek</option>
							<option>Kursi</option>
							<option>Bangku</option>
						</select> -->
						<button onclick="tambahProgres()" class="btn btn-primary">Tambah</a>
					</div>
					
					<!-- Card Progress -->
					<!-- <div class="card" style="width: 18rem;">
						<div class="card-body">
							<h5 class="card-title">Nama Pekerjaan</h5>
							<textarea id="progres1" class="form-control" aria-label="With textarea" onchange="halo(1)"></textarea>
						</div>
					</div> -->
					
				</div>
			</div>
			<!-- Tambah progress end -->
		</div>
		
		<hr>
		<h2> Masukkan dan tanggapan Musyawarah </h2>	
		<div id="step3" class="col-md-12">
			<!-- Tambah progress start -->
			<div class="card">
				<div id="kolomMasukkan" class="card-body">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tambah tanggapan pekerjaan lain<span class="required">*</span>
					</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input type="text" id="first-name" class="form-control col-md-7 col-xs-12">
						<!-- <select class="form-control">
							<option>Pilih Proyek</option>
							<option>Kursi</option>
							<option>Bangku</option>
						</select> -->
						<a href="#" class="btn btn-primary">Tambah</a>
					</div>
					<br>
					<!-- Card Progress -->
					<!-- <div class="card" style="width: 18rem;">
						<div class="card-body">
							<h5 class="card-title">Nama Pekerjaan</h5>
							<p id="kontendariprogres1"> halo </p>		
							<textarea class="form-control" aria-label="With textarea"></textarea>
						</div>
					</div> -->
					
				</div>
			</div>
			<!-- Tambah progress end -->
		</div>
		<hr>
		<h2> Keputusan Musyawarah </h2>	
		<div id="step3" class="col-md-12">
			<!-- Tambah progress start -->
			<div class="card">
				<div id="kolomKeputusan" class="card-body">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tambah keputusan pekerjaan lain<span class="required">*</span>
					</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input type="text" id="first-name" class="form-control col-md-7 col-xs-12">
						<!-- <select class="form-control">
							<option>Pilih Proyek</option>
							<option>Kursi</option>
							<option>Bangku</option>
						</select> -->
						<a href="#" class="btn btn-primary">Tambah</a>
					</div>
					<br>
					<!-- Card progress -->
					<!-- <div class="card" style="width: 18rem;">
						<div class="card-body">
							<h5 class="card-title">keputusan : Nama Pekerjaan</h5>
							<p class> deksripsi progres </p>
							<textarea class="form-control" aria-label="With textarea"></textarea>
						</div>
					</div> -->
					
				</div>
			</div>
			<!-- Tambah progress end -->
		</div>
		<hr>
		<h2> Review Notulensi </h2>	
		<style> 
			.bd-callout-warning {
				border-left-color: #f0ad4e;
			}
			.bd-callout {
				padding: 1.25rem;
				margin-top: 1.25rem;
				margin-bottom: 1.25rem;
				border: 1px solid #eee;
				border-left-width: .25rem;
				border-radius: .25rem;
			}
		</style>
		<div class="bd-callout bd-callout-warning">
			<h5 id="conveying-meaning-to-assistive-technologies">Progress </h5>
			<p>Using color to add meaning only provides a visual indication, which will not be conveyed to users of assistive technologies – such as screen readers. Ensure that information denoted by the color is either obvious from the content itself (e.g. the visible text), or is included through alternative means, such as additional text hidden with the <code class="highlighter-rouge">.sr-only</code> class.</p>
			<h5 id="conveying-meaning-to-assistive-technologies">Keputusan </h5>
			<p>Using color to add meaning only provides a visual indication, which will not be conveyed to users of assistive technologies – such as screen readers. Ensure that information denoted by the color is either obvious from the content itself (e.g. the visible text), or is included through alternative means, such as additional text hidden with the <code class="highlighter-rouge">.sr-only</code> class.</p>
			<button type="button" class="btn btn-primary">Simpan</button>
			<button type="button" class="btn btn-link">Copy to clipboard</button>
		</div>
	</div>
	<script type="text/javascript">
		var tempIdPekerjaan = 0;
		function tambahProgres(){
			var namaProgress = document.getElementById("namaProgress").value; 
			console.log(namaProgress);
			var sethtml = '<br><div class="card" style=""><div class="card-body"><h5 class="card-title">'+namaProgress+'</h5><textarea id="progres'+tempIdPekerjaan+'" onchange="tambahKeterangan('+tempIdPekerjaan+', 0)" class="form-control" aria-label="With textarea"></textarea></div></div>'
			$("#kolomProgres").append(sethtml);
			var sethtml = '<div class="card" style=""><div class="card-body"><h5 class="card-title">'+namaProgress+'</h5><p id="kontendariprogres'+tempIdPekerjaan+'"></p><textarea id="masukkan'+tempIdPekerjaan+'"  onchange="tambahKeterangan('+tempIdPekerjaan+', 1)" class="form-control" aria-label="With textarea"></textarea></div></div>'
			$("#kolomMasukkan").append(sethtml);
			var sethtml = '<div class="card" style=""><div class="card-body"><h5 class="card-title">'+namaProgress+'</h5><p id="kontendarimasukkan'+tempIdPekerjaan+'"></p><textarea id="keputusan'+tempIdPekerjaan+'" onchange="tambahKeterangan('+tempIdPekerjaan+', 2)" class="form-control" aria-label="With textarea"></textarea></div></div>'
			$("#kolomKeputusan").append(sethtml);
		}
		function tambahKeterangan(nilai, keputusan){
			console.log('id : '+ nilai + '. keputusan -> '+ keputusan);
			if(keputusan == 0) {
				var contentProgress = document.getElementById("progres"+nilai).value; 
				var sethtml = ''+contentProgress;
				console.log(contentProgress);
				$("#kontendariprogres"+nilai).empty();
				$("#kontendariprogres"+nilai).append(sethtml);
			} else if(keputusan == 1){
				var contentProgress = document.getElementById("masukkan"+nilai).value; 
				var sethtml = ''+contentProgress;
				console.log(contentProgress);
				$("#kontendarimasukkan"+nilai).empty();
				$("#kontendarimasukkan"+nilai).append(sethtml);
			} else {	
				var contentProgress = document.getElementById("progres"+nilai).value; 
				var contentMasukkan = document.getElementById("masukkan"+nilai).value; 
				var sethtml = '<p>progress: '+contentProgress+"<br> masukkan :"+contentMasukkan;
				console.log(contentProgress);
				// $("#kontendarimasukkan"+nilai).empty();
				// $("#kontendarimasukkan"+nilai).append(sethtml);
			}
			
		}
	</script>

    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>assets/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url(); ?>assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url(); ?>assets/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?php echo base_url(); ?>assets/vendors/nprogress/nprogress.js"></script>
    <!-- jQuery Smart Wizard -->
    <script src="<?php echo base_url(); ?>assets/vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="<?php echo base_url(); ?>assets/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/google-code-prettify/src/prettify.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url(); ?>assets/build/js/custom.min.js"></script>

</body>
</html>