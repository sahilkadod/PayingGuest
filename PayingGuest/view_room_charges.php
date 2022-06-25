<?php
session_start();
include("header.php");
include("connection.php");

$rtid=$_REQUEST['rtid'];
$res1=mysql_query("select * from room_type_master where room_type_id='$rtid'");
$r1=mysql_fetch_array($res1);
$rtype1=$r1[1];
$rimg1=$r1[2];
$nrooms1=$r1[3];

if(isset($_REQUEST['rcid']))
{
	$rcid=$_REQUEST['rcid'];
	$year=date("Y");
	$res2=mysql_query("select count(*) from booking_master where YEAR(start_date)='2021' and  room_charges_id='$rcid'");
	if(mysql_num_rows($res2)>0)
	{
		$r2=mysql_fetch_array($res2);
		$totalbook=$r2[0];
		if($rtype1=="2 Bed Per Room")
		{
			$totalbed=$nrooms1*2;
		}else if($rtype1=="3 Bed Per Room")
		{
			$totalbed=$nrooms1*3;
		}else if($rtype1=="4 Bed Per Room")
		{
			$totalbed=$nrooms1*4;
		}
		if($totalbed>$totalbook)
		{
			if(isset($_SESSION['userid']))
			{
				echo "<script type='text/javascript'>";
				echo "alert('Room Is Available');";
				echo "window.location.href='book_room.php?rcid=$rcid';";
				echo "</script>";
			}else{
				$_SESSION['rcid']=$rcid;
				echo "<script type='text/javascript'>";
				echo "alert('Room Is Available');";
				echo "window.location.href='login.php';";
				echo "</script>";
			}	
		}else{
			echo "<script type='text/javascript'>";
			echo "alert('Room Is Not Available');";
			echo "window.location.href='view_room_charges.php?rtid=$rtid';";
			echo "</script>";
		}
	}
	else
	{
		if(isset($_SESSION['userid']))
		{
			echo "<script type='text/javascript'>";
			echo "alert('Room Is Available');";
			echo "window.location.href='book_room.php?rcid=$rcid';";
			echo "</script>";
		}else{
			$_SESSION['rcid']=$rcid;
			echo "<script type='text/javascript'>";
			echo "alert('Room Is Available');";
			echo "window.location.href='login.php';";
			echo "</script>";
		}	
	}
}
?>

  <main id="main">
 <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="pricing">
      <div class="container">

        <div class="section-title">
          <h2>ROOM CHARGES</h2>
          <p>We give you everything right here, where you need it.</p>
        </div>

        <div class="row">
		<?php
		$qur1=mysql_query("select * from room_charge_detail where room_type_id='$rtid'");
		if(mysql_num_rows($qur1)>0)
		{
			while($q1=mysql_fetch_array($qur1))
			{
		?>
          <div class="col-lg-4 col-md-6">
            <div class="box">
			
              <h3><?php echo $rtype1; ?></h3>
              <h4><sup>&#8377;</sup> <?php echo $q1[5]; ?><span> <?php echo $q1[4]; ?></span></h4>
              <ul>
                <li><?php echo $q1[2]; ?></li>
              </ul>
			  <h5>
			  <?php
			  if($q1[3]=="1")
			  {
				echo "A.C. ROOM";
			  }else{
				echo "NON-A.C. ROOM";
			  }
			  ?>
			  </h5>
              <div class="btn-wrap">
                <a href="view_room_charges.php?rtid=<?php echo $rtid; ?>&rcid=<?php echo $q1[0]; ?>" class="btn-buy">CHECK AVABILITY</a>
              </div>
            </div>
          </div>
		<?php
			}
		}else{
			echo "<h2>No Room Charges Found</h2>";
		}
		?>
        

         

        </div>

      </div>
    </section><!-- End Pricing Section -->
  </main><!-- End #main -->



<?php
include("footer.php");
?>