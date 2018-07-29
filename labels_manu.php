<?php require_once('chksess.php'); ?>
<?php require_once('conn.php'); ?>
<?php 
$title = "Labels";
include_once('header.php');

?>
</head>
<body>

<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
	<td id="header">
		<?php require_once('top-menu.php'); ?>
	</td>                          
</tr>
</table>

<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
	<td align="center" valign="top" style="line-height: 16px;"><a href="welcome.php">Welcome To Admin Panel <br /><br />
	<img src="logo-pcb.png" width="189" height="198" border="0" /></a></td>

	<td valign='top'>

	<form name="form1" method="post" action="labelspdf_manu.php">

	<table border="1" cellpadding="2" cellspacing="2" bordercolor="#e6e6e6" width="55%">

	<tr>
		<td colspan="2"><strong>Labels </strong></td>
	</tr>

	<tr>
		<td width="150">Customer Name</td>
		<td width="300"><input name="cname" type="text" id="cname" size="30"></td>
	</tr>

	<tr>
		<td>Part# / Rev</td>
		<td><input name="partno" type="text" id="partno" size="30"></td>
	</tr>

	<tr>
		<td>MPN# & Rev</td>
		<td><input name="mpn_rev" type="text" id="mpn_rev" size="30"></td>
	</tr>

	<tr>
		<td>D/C</td>
		<td><input name="dc" type="text" id="dc" size="30"></td>
	</tr>	   

	<tr>
		<td>PO #</td>
		<td><input name="po" type="text" id="po" size="30"></td>
	</tr>

	<tr>
		<td>QTY</td>
		<td><input name="qty" type="text" id="qty" size="30"></td>
	</tr>

	<tr>
		<td>No. of Lables</td>
		<td><select name="lbls" id="lbls">
			<?php for($i = 1; $i <= 10; $i++)
				echo "<option value='".$i."'>".$i.' Label'.( $i > 1 ? 's' : '')."</option>"; ?>
		</select>
		</td>
	</tr>

	<tr>
		<td>Label start position</td>
		<td><select name="startpos">
			<?php for($i = 1; $i <= 5; $i++)
				echo "<option value='".$i."'>Row ".$i."</option>"; ?>
		</select>
		</td>
	</tr>
	
	<tr><td colspan="2">&nbsp;</td></tr>

	<tr>
		<td colspan="2"><input type="submit" name="Submit" id="Submit" value="Generate"></td>
	</tr>

	</table>

	</form>

	</td>
</tr>
</table>

</body>
</html>