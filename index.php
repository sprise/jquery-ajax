<?php 
session_start(); // This makes $_SESSION available to us

if(!isset($_SESSION['crsf_token'])) $_SESSION['crsf_token'] = sha1('mmm_salt'.uniqid());
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<title>The Image Store, a jQuery Ajax Demo</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/cerulean/bootstrap.min.css" rel="stylesheet" />
	<style>
		.row, #products, input[type="submit"] {margin: 3rem auto;}
	</style>
</head>
<body>
	<div class="container">
		<div class="page-header">
			<h1>The Image Store	<small>We sell pretty photos</small></h1>
		</div>
		
		<div class="row">
			<div class="col-sm-4 col-sm-offset-4">
				<p><select id="your-industry" class="form-control" autocomplete="off">
					<option value="">Choose Your Industry to Begin</option>
					<option value="advertising">Advertising</option>
					<option value="posters">Poster Printing</option>
					<option value="webdesign">Web Design</option>
				</select></p>
			</div>
		</div>
		
		<div class="row">
			<form action="post" style="display: none;">
				<input type="hidden" name="crsf_token" value="<?php echo $_SESSION['crsf_token'] ?>" />
				<div id="products"><!-- jQuery will put our products here --></div>
				
				<p class="text-center"><input type="submit" class="btn btn-primary btn-lg" name="submit_order" value="Place Order" /></p>
			</form>
		</div>
	</div>
	
	<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="scripts_complete.js"></script>
</body>
</html>
