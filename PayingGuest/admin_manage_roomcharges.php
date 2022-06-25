<?php
include("admin_header.php");
include("connection.php");

//auto no code begin...
$qur4=mysql_query("select max(room_charges_id) from room_charge_detail");
$rcid=0;
while($q4=mysql_fetch_array($qur4))
{
	$rcid=$q4[0];
}
$rcid++;
//auto no code finish...

?>
<script type="text/javascript">
function validate()
{
	
	if(form1.seltype.value=="0")
	{
		alert("Please Select Room Type");
		form1.seltype.focus();
		return false;
	}
	if(form1.txtdesc.value=="")
	{
		alert("Please Enter Room Description");
		form1.txtdesc.focus();
		return false;
	}
	
	if(form1.selacnon.value=="0")
	{
		alert("Please Select Ac/Non Ac Room");
		form1.selacnon.focus();
		return false;
	}
	
	if(form1.selhalf.value=="0")
	{
		alert("Please Select Room Accommodation Periods");
		form1.selhalf.focus();
		return false;
	}
	
	if(form1.txtcharges.value=="")
	{
		alert("Please Enter Room Charges");
		form1.txtcharges.focus();
		return false;
	}else{ 
		if((parseInt(form1.txtcharges.value))<=0)
		{
			alert("Please Enter Room Charges Greater Than 0");
			form1.txtcharges.focus();
			return false;
		}
	}
	
}


</script>
<?php
if(isset($_POST['btnsave']))
{
	$rcid=$_POST['txtrcid'];
	$rtype=$_POST['seltype'];
	$desc=$_POST['txtdesc'];
	$acnon=$_POST['selacnon'];
	$half_full=$_POST['selhalf'];
	$rcharge=$_POST['txtcharges'];
	$query="insert into room_charge_detail values('$rcid','$rtype','$desc','$acnon','$half_full','$rcharge')";
	if(mysql_query($query))
	{
		echo "<script type='text/javascript'>";
		echo "alert('Room Charges Inserted Successfully');";
		echo "window.location.href='admin_manage_roomcharges.php';";
		echo "</script>";
	}
}


if(isset($_REQUEST['urcid']))
{
	$rcid=$_REQUEST['urcid'];
	$qur3=mysql_query("select * from room_charge_detail where room_charges_id='$rcid'");
	$q3=mysql_fetch_array($qur3);
	$rtid1=$q3[1];
	$desc1=$q3[2];
	$acnon1=$q3[3];
	$half1=$q3[4];
	$rcharge1=$q3[5];
}

if(isset($_POST['btnupdate']))
{
	$rcid=$_POST['txtrcid'];
	$rtype=$_POST['seltype'];
	$desc=$_POST['txtdesc'];
	$acnon=$_POST['selacnon'];
	$half_full=$_POST['selhalf'];
	$rcharge=$_POST['txtcharges'];
	
	
	$query="update room_charge_detail set room_type_id='$rtype',description='$desc',ac_non='$acnon',half_full='$half_full',room_charges='$rcharge' where room_charges_id='$rcid'";
	
	if(mysql_query($query))
	{
	
		echo "<script type='text/javascript'>";
		echo "alert('Room Charges Updated Successfully');";
		echo "window.location.href='admin_manage_roomcharges.php';";
		echo "</script>";
	}
}

if(isset($_REQUEST['drcid']))
{
	$rcid=$_REQUEST['drcid'];
	$query="delete from room_charge_detail where room_charges_id='$rcid'";
	if(mysql_query($query))
	{
		echo "<script type='text/javascript'>";
		echo "alert('Room Charges Deleted Successfully');";
		echo "window.location.href='admin_manage_roomcharges.php';";
		echo "</script>";
	}
}
?>

  <main id="main">

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">
		<br/><br/><br/>
        <div class="section-title">
          <h2>MANAGE ROOM CHARGES</h2>
          <p>We give you everything right here, where you need it.</p>
        </div>
     
		<div class="col-md-12">
			<div class="row contact-info">
        <div class="form col-md-6">
          <form method="post" name="form1" enctype="multipart/form-data"role="form" class="php-email-form">
             <div class="form-group">
              <input type="text" class="form-control" name="txtrcid" placeholder="Enter Room Charges ID" value="<?php echo $rcid; ?>" readonly />
              <div class="validate"></div>
            </div>
            <div class="form-group">
              <select class="form-control" name="seltype" >	
					<option value="0">--Select Room Type--</option>
				<?php
				$res8=mysql_query("select * from room_type_master");
				while($r8=mysql_fetch_array($res8))
				{
					?>
					<option value="<?php echo $r8[0]; ?>" <?php if($rtid1==$r8[0]){ echo "selected='selected'"; } ?>><?php echo $r8[1]; ?></option>
					<?php
				}
				?>
			  </select>
              <div class="validate"></div>
            </div>
			<div class="form-group">
              <textarea class="form-control" name="txtdesc" rows="3"  placeholder="Enter Room Description"><?php echo $desc1; ?></textarea>
              <div class="validate"></div>
            </div>
           
          
        
        </div>
		<div class="form col-md-6 php-email-form">
         
             <div class="form-group">
				 <select class="form-control" name="selacnon" >	
					<option value="0">--Select AC/NON--</option>
					<option value="1" <?php if($acnon1=="1"){ echo "selected='selected'"; } ?>>A.C.</option>
					<option value="2" <?php if($acnon1=="2"){ echo "selected='selected'"; } ?>>NON A.C.</option>
			  </select>
              <div class="validate"></div>
            </div>
            <div class="form-group">
              <select class="form-control" name="selhalf" >	
					<option value="0">--Select Room Accomodation Periods--</option>
					<option value="HALF YEAR" <?php if($half1=="HALF YEAR"){ echo "selected='selected'"; } ?>>HALF YEAR</option>
					<option value="FULL YEAR" <?php if($half1=="FULL YEAR"){ echo "selected='selected'"; } ?>>FULL YEAR</option>
			  </select>
              <div class="validate"></div>
            </div>
			
            <div class="form-group">
              <input type="number" class="form-control" name="txtcharges" placeholder="Enter Room Charges" value="<?php echo $rcharge1; ?>"/>
              <div class="validate"></div>
            </div>
          
            <div class="text-center">
		<?php
		if(isset($_REQUEST['urcid']))
		{
			?>
			
			<Br/><Br/><Br/>
			<button type="submit" name="btnupdate" onclick="return validate();">UPDATE</button>
			<?php
		}else{
		?>
			<button type="submit" name="btnsave" onclick="return validate();">SAVE</button>
		<?php
		}
		?>
			</div>
          </form>
        </div>
		<div class="col-md-12">
		<?php
		$res3=mysql_query("select * from room_charge_detail");
		if(mysql_num_rows($res3)>0)
		{
			echo "<table class='table table-bordered'>
					<tr>
						<th>CHARGE ID</th>
						<th>ROOM TYPE</th>
						<th>ROOM DESCRIPTION</th>
						<th>AC/NON AC</th>
						<th>HALF/FULL YEAR</th>
						<th>ROOM CHARGES</th>
						<th>UPDATE</th>
						<th>DELETE</th>
					</tr>";
				while($r3=mysql_fetch_array($res3))
				{
					echo "<tr>";
					echo "<td>$r3[0]</td>";
					//echo "<td>$r3[1]</td>";
					$res7=mysql_query("select * from room_type_master where room_type_id='$r3[1]'");
					$r7=mysql_fetch_array($res7);
					echo "<td>$r7[1]</td>";
					echo "<td>$r3[2]</td>";
					//echo "<td>$r3[3]</td>";
					if($r3[3]=="1")
					{
						echo "<td>A.C.</td>";
					}else{
						echo "<td>NON-A.C.</td>";
					}
					echo "<td>$r3[4]</td>";
					echo "<td>$r3[5]</td>";
					
					echo "<td><a href='admin_manage_roomcharges.php?urcid=$r3[0]'>UPDATE</a></td>";
					echo "<td><a href='admin_manage_roomcharges.php?drcid=$r3[0]'>DELETE</a></td>";
					echo "</tr>";
				}
				
			echo "</table>";
		}else{
			echo "<h3>No Rooms Type Found</h3>";
		}
		?>
		</div>
      </div>
	  </div>
	  </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->



<?php
include("footer.php");
?>