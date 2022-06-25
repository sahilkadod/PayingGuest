<?php
include("admin_header.php");
include("connection.php");

//auto no code begin...
$qur4=mysql_query("select max(room_type_id) from room_type_master");
$rtid=0;
while($q4=mysql_fetch_array($qur4))
{
	$rtid=$q4[0];
}
$rtid++;
//auto no code finish...

?>
<script type="text/javascript">
function validate()
{
	var v=/^[a-zA-Z0-9 ]+$/
	if(form1.txttype.value=="")
	{
		alert("Please Enter Room Type");
		form1.txttype.focus();
		return false;
	}else{
		if(!v.test(form1.txttype.value))
		{
			alert("Please Enter Only Alphabets and Digits in Room Type");
			form1.txttype.focus();
			return false;
		}
	}
	
	
	if(form1.txtnrooms.value=="")
	{
		alert("Please Enter Total No Of Rooms");
		form1.txtnrooms.focus();
		return false;
	}else{ 
		if((parseInt(form1.txtnrooms.value))<=0)
		{
			alert("Please Enter Total No Of Rooms Greater Than 0");
			form1.txtnrooms.focus();
			return false;
		}
	}
	
	var filename=document.getElementById("txtimg").value;
	var ext=filename.substr(filename.lastIndexOf(".")+1).toLowerCase().trim();
	if(document.getElementById("txtimg").value=="")
	{
		alert("Please Select Room Image");
		return false;
	}else{
		if(!(ext=="png" || ext=="jpg" || ext=="jpeg"))
		{
			alert("Please Select Room Images Format in jpg jpeg or png");
			return false;
		}
	}
	
}

function validate_update()
{
	var v=/^[a-zA-Z0-9 ]+$/
	if(form1.txttype.value=="")
	{
		alert("Please Enter Room Type");
		form1.txttype.focus();
		return false;
	}else{
		if(!v.test(form1.txttype.value))
		{
			alert("Please Enter Only Alphabets and Digits in Room Type");
			form1.txttype.focus();
			return false;
		}
	}
	
	
	if(form1.txtnrooms.value=="")
	{
		alert("Please Enter Total No Of Rooms");
		form1.txtnrooms.focus();
		return false;
	}else{ 
		if((parseInt(form1.txtnrooms.value))<=0)
		{
			alert("Please Enter Total No Of Rooms Greater Than 0");
			form1.txtnrooms.focus();
			return false;
		}
	}
	
	var filename=document.getElementById("txtimg").value;
	var ext=filename.substr(filename.lastIndexOf(".")+1).toLowerCase().trim();
	if(document.getElementById("txtimg").value!="")
	{
		if(!(ext=="png" || ext=="jpg" || ext=="jpeg"))
		{
			alert("Please Select Room Images Format in jpg jpeg or png");
			return false;
		}
	}
	
}
</script>
<?php
if(isset($_POST['btnsave']))
{
	$rtid=$_POST['txtrtid'];
	$rtype=$_POST['txttype'];
	$nrooms=$_POST['txtnrooms'];
	
	$temppath=$_FILES['txtimg']['tmp_name'];
	$imgpath="room_img/R".$rtid."_".rand(1000,9999).".jpg";
	$query="insert into room_type_master values('$rtid','$rtype','$imgpath','$nrooms')";
	if(mysql_query($query))
	{
		move_uploaded_file($temppath,$imgpath);
		echo "<script type='text/javascript'>";
		echo "alert('Room Type Inserted Successfully');";
		echo "window.location.href='admin_manage_roomtype.php';";
		echo "</script>";
	}
}


if(isset($_REQUEST['urtid']))
{
	$rtid=$_REQUEST['urtid'];
	$qur3=mysql_query("select * from room_type_master where room_type_id='$rtid'");
	$q3=mysql_fetch_array($qur3);
	$rtype1=$q3[1];
	$rimg1=$q3[2];
	$nrooms1=$q3[3];
}

if(isset($_POST['btnupdate']))
{
	$rtid=$_POST['txtrtid'];
	$rtype=$_POST['txttype'];
	$nrooms=$_POST['txtnrooms'];
	
	if($_FILES['txtimg']['size']>0)
	{
		$temppath=$_FILES['txtimg']['tmp_name'];
		$imgpath="room_img/R".$rtid."_".rand(1000,9999).".jpg";
		$query="update room_type_master set room_type='$rtype',room_type_img='$imgpath',total_no_of_rooms='$nrooms' where room_type_id='$rtid'";
		move_uploaded_file($temppath,$imgpath);
	}else{
		$query="update room_type_master set room_type='$rtype',total_no_of_rooms='$nrooms' where room_type_id='$rtid'";
	}
	if(mysql_query($query))
	{
	
		echo "<script type='text/javascript'>";
		echo "alert('Room Type Updated Successfully');";
		echo "window.location.href='admin_manage_roomtype.php';";
		echo "</script>";
	}
}

if(isset($_REQUEST['drtid']))
{
	$rtid=$_REQUEST['drtid'];
	$query="delete from room_type_master where room_type_id='$rtid'";
	if(mysql_query($query))
	{
		echo "<script type='text/javascript'>";
		echo "alert('Room Type Deleted Successfully');";
		echo "window.location.href='admin_manage_roomtype.php';";
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
          <h2>MANAGE ROOM TYPE</h2>
          <p>We give you everything right here, where you need it.</p>
        </div>
     
		<div class="col-md-12">
			<div class="row contact-info">
        <div class="form col-md-5">
          <form method="post" name="form1" enctype="multipart/form-data"role="form" class="php-email-form">
             <div class="form-group">
              <input type="text" class="form-control" name="txtrtid" placeholder="Enter Room Type ID" value="<?php echo $rtid; ?>" readonly />
              <div class="validate"></div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="txttype" placeholder="Enter Room Type" value="<?php echo $rtype1; ?>" />
              <div class="validate"></div>
            </div>
            <div class="form-group">
              <input type="number" class="form-control" name="txtnrooms" placeholder="Enter Total No Of Rooms" value="<?php echo $nrooms1; ?>"/>
              <div class="validate"></div>
            </div>
           <div class="form-group">
		   <span style="float:left;">Select Room Images:</span>
              <input type="file" class="form-control" name="txtimg" id="txtimg" />
              <div class="validate"></div>
            </div>
            <div class="text-center">
		<?php
		if(isset($_REQUEST['urtid']))
		{
			?>
			<img src="<?php echo $rimg1; ?>" style="width:150px; height:150px;">
			<Br/><Br/><Br/>
			<button type="submit" name="btnupdate" onclick="return validate_update();">UPDATE</button>
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
		<div class="col-md-7">
		<?php
		$res3=mysql_query("select * from room_type_master");
		if(mysql_num_rows($res3)>0)
		{
			echo "<table class='table table-bordered'>
					<tr>
						<th>TYPE ID</th>
						<th>ROOM TYPE</th>
						<th>NO OF ROOMS</th>
						<th>ROOM IMAGES</th>
						<th>UPDATE</th>
						<th>DELETE</th>
					</tr>";
				while($r3=mysql_fetch_array($res3))
				{
					echo "<tr>";
					echo "<td>$r3[0]</td>";
					echo "<td>$r3[1]</td>";
					echo "<td>$r3[3]</td>";
					echo "<td><img src='$r3[2]' style='width:150px; height:150px;'></td>";
					echo "<td><a href='admin_manage_roomtype.php?urtid=$r3[0]'>UPDATE</a></td>";
					echo "<td><a href='admin_manage_roomtype.php?drtid=$r3[0]'>DELETE</a></td>";
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