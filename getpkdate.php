<?php 
require_once('conn.php'); 
$date1 = isset($_POST['date1']) ? $_POST['date1'] : '';

if( isset($_POST['pno']) && isset($_POST['rev']) ) {
	$sqsh = "select distinct date1 from packing_tb where part_no='".$_POST['pno']."' and rev='".$_POST['rev']."' and po='".$_POST['custpo']."' ORDER BY invoice_id";

	$ressh = mysql_query($sqsh) or die('err');

	echo '<tr><td width="140" height="30">Delivered On</td><td height="30">';

	if(mysql_num_rows($ressh) > 0) {
		echo '<select name="date1">';
		$flag = 0;
		while($rwsh = mysql_fetch_assoc($ressh)) {
			echo '<option value="'.$rwsh['date1'].'" '.($date1 == $rwsh['date1'] ? ' SELECTED ' : '').'>'.$rwsh['date1'].'</option>';
			if($date1 == $rwsh['date1']) $flag = 1; 
		}
		if($flag == 0 && $date1 != '')
			echo '<option value="'.$date1.'" SELECTED >'.$date1.'</option>';

		echo '</select>';
	}
	else { ?>
<script type="text/javascript">
window.addEvent('domready', function() {
new CalendarEightysix('exampleII', { 'theme': 'default red', 'startMonday': true, 'slideTransition': Fx.Transitions.Back.easeOut, 'format': '%A-%m-%d-%Y', 'draggable': true }); });
</script>
<?php
		echo '<input name="date1" type="text" id="exampleII" value="'.$date1.'" size="30">';
	}

	echo '</td></tr>';
}
?>