<?php require_once('chksess.php'); ?>
<?php require_once('conn.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>File Upload</title>
	<?php require_once('header.php'); ?>
	<?php include('top-menu.php') ?>
	<br><br><br><br>
<style>
		ul.dropdown ul li a:hover{
			width: 100%;
		}
	</style>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	</head>
	<div class="container">
	<div class="row">
	<div class="col-lg-12 alert alert-danger">
		Confirm Your Deletion..

		<a href="file_delete_file_get.php?id=<?php echo $_GET['id'] ?>&customer=<?php echo $_GET['customer']?>&part_no=<?php echo $_GET['part_no'] ?>&rev=<?php echo $_GET['rev'] ?>" title=""><input type="button" name="" value="Delete" class="btn btn-danger pull-right"></a>
		<button onclick="goBack()" class="btn btn-warning pull-right" style="margin-right:10px;">Cancel
<script>
function goBack() {
    window.history.back();
}
</script> 
	</div>
		
	</div>
		
	</div>
	</html>