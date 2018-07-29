<?php require_once('chksess.php'); ?>
<?php require_once('conn.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>File Upload</title>
	<?php require_once('header.php'); ?>
	<style>
		ul.dropdown ul li a:hover{
			width: 100%;
		}
	</style>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>

	<link href="style_Admin.css" rel="stylesheet" type="text/css">
	<?php include('top-menu.php') ?>
	<br><br><br><br>
</head>

<?php 
$sql = "SELECT part_no,rev FROM order_tb WHERE cust_name ='".$_GET['customer']."'";
$res = mysql_query($sql,$conn);
?>

<div class="container">
	<div class="row">
	<div class="col-lg-6">
		<div class="alert alert-info">
			<h3>Files for customer : <?php echo $_GET['customer'] ?> </h3>
		</div>
	</div>
		<div class="col-lg-12">
			<table class="table table-bordered" id="table">
				<thead class="table table-info">
					<tr>
						<th>Part No.</th>
						<th>REV </th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
				<?php while($row = mysql_fetch_assoc($res)){ ?>
					<tr>
						<td><?php echo $row['part_no'] ?></td>
						<td><?php echo $row['rev'] ?></td>
						<td>
							<a href="file_upload_files.php?customer=<?php echo $_GET['customer'] ?>&part_no=<?php echo $row['part_no'] ?>&rev=<?php echo $row['rev'] ?>">
								<input type="button" value="Files" class="btn btn-info">
							</a>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
    $('#table').DataTable();
});
</script>
</html>