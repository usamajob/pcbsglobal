<?php 
require_once('conn.php'); 
require('library.php');

if(isset($_REQUEST['flag'])) {
	$sql = "select custid from profile_tb where custid='".$_REQUEST['cid']."'";
	$res = mysql_query($sql) or die('err');

	if(mysql_num_rows($res) > 0) echo true;
	else echo false;
}
else {

// code for temp-profiletb 
	$sql_temp = "SELECT * FROM temp_profile2";

	$res = mysql_query($sql_temp);

	if(mysql_num_rows($res)>0){
		$sql_remp_del = "DELETE  FROM temp_profile2";
		mysql_query($sql_remp_del);
	}





	$sql = "select c_name from data_tb where data_id = '".$_REQUEST['cid']."'";
	$res = mysql_query($sql) or die('err');
	$row = mysql_fetch_assoc($res);
	$cname = $row['c_name'];

	 $sql = "select pt2.* from profile_tb pt inner join profile_tb2 pt2 on pt.profid=pt2.profid where pt.custid='".$_REQUEST['cid']."' and instr(pt2.viewable, '".$_REQUEST['ftype']."') > 0 and trim(pt2.reqs) <> '' order by pt2.id";

	$res = mysql_query($sql) or die('err');


	if(mysql_num_rows($res) > 0) {

		while($rwv = mysql_fetch_assoc($res)) { 
			$reqs = addslashes($rwv['reqs']);
			$sql_inset_temp = "INSERT INTO temp_profile2 (profid,reqs,selectable,viewable) VALUES(
			".$rwv['profid'].",'".$reqs."',".$rwv['selectable'].",'".$rwv['viewable']."'
			)";
			mysql_query($sql_inset_temp);

		}

	}

$sql = "select pt2.* from profile_tb pt inner join temp_profile2 pt2 on pt.profid=pt2.profid where pt.custid='".$_REQUEST['cid']."' and instr(pt2.viewable, '".$_REQUEST['ftype']."') > 0 and trim(pt2.reqs) <> '' order by pt2.id";


$res = mysql_query($sql) or die('err');

	if(mysql_num_rows($res) > 0) {		
		
		echo "<a href='javascript:void(0)' id='close'  style='color:#cd0000; float:right'>Close</a>
		<div><h3>".$cname." Customer Profile</h3>";
		$i = 1;
		echo "<table border='0'>";
		echo "<tbody><tr><td></td><td></td><td>N/A</td><td>| Ok</td></tr>";
		while($rwv = mysql_fetch_assoc($res)) { 

			echo "<tr><td align='center'>".(getSelectable($_REQUEST['ftype'], $rwv['viewable']) == '1' ? "<input class='reqs_Checkbox' type='checkbox' name='req[]' value='".trim($rwv['reqs'])."'> ": $i.'.')."</td><td>".trim($rwv['reqs'])."</td>

				<td><input type='radio' class='checking1' name='".$rwv['id']."' onclick=\"checkingone('".$rwv['id']."')\" id='".$rwv['id']."'";if($rwv['check']==1){echo'checked';} echo"></td>

				<td><input type='radio' class='checking1' name='".$rwv['id']."' onclick=\"checkingtwo('".$rwv['id']."')\" id='".$rwv['id']."ok'";if($rwv['check2']==1){echo'checked';} echo"></td></tr>
			</tr>";

			$i++;
		}
		echo"<input type='hidden' id='tot' value='".$i."'>";
		echo "</table>";

		echo "<br><input type='button' id='save_value' name='save_value' value='Save' /></div>";
		?>


<script type="text/javascript">
	function checkingone(id){
		var iid = id;
		//alert(iid);
      if(document.getElementById(iid).checked) {
     $j.ajax({
      url: "edit_packing_check2.php",
      type: "get", //send it through get method
      data: { 
        ajaxid: iid, 
        enable: 1,
        check:1
      },
      success: function(response) {
        //alert("hi");
      },
      error: function(xhr) {
        alert("fail");
      }
    });
      }else{
		$j.ajax({
		      url: "edit_packing_check2.php",
		      type: "get", //send it through get method
		      data: { 
		        ajaxid: iid, 
		        enable: 0,
		        check:1
		      },
		      success: function(response) {
		        //alert("byr");
		      },
		      error: function(xhr) {
		        alert("fail");
		      }
		    });
		      }
	}
	function checkingtwo(id){
		var iid = id;
		//alert(iid);
      if(document.getElementById(iid+"ok").checked) {
     $j.ajax({
      url: "edit_packing_check2.php",
      type: "get", //send it through get method
      data: { 
        ajaxid: iid, 
        enable: 1,
        check:2
      },
      success: function(response) {
        //alert("hi");
      },
      error: function(xhr) {
        alert("fail");
      }
    });
      }else{
		$j.ajax({
		      url: "edit_packing_check2.php",
		      type: "get", //send it through get method
		      data: { 
		        ajaxid: iid, 
		        enable: 0,
		        check:2
		      },
		      success: function(response) {
		        //alert("byr");
		      },
		      error: function(xhr) {
		        alert("fail");
		      }
		    });
		      }
	}


jQuery(document).ready(function(){
		var total = document.getElementById('tot').value;
		//alert(total);
		var checkBoxes = jQuery('tbody .checking1');
		checkBoxes.change(function () {
			if(jQuery('.checking1:checked').length==jQuery('.checking1').length/2){
				document.getElementById("save_value").disabled = false;
				document.getElementById("close").style.display = "block";
			}else{
				document.getElementById("save_value").disabled = true;
				document.getElementById("close").style.display = "none";
			}
		    //$('#save_value').prop('disabled', checkBoxes.filter(':checked').length < total-1);
		});
		checkBoxes.change();
	});
		 
	
</script>
<?php 
	} else echo "";
}
?>
