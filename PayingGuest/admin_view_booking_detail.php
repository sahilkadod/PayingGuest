<?php
session_Start();
include("admin_header.php");
include("connection.php");


?>

  <main id="main">

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">
		<br/><br/><br/>
        <div class="section-title">
          <h2>VIEW BOOKING DETAIL</h2>
          <p>We give you everything right here, where you need it.</p>
        </div>
     
		<div class="col-md-12">
			<div class="row contact-info">
      
	
		<div class="col-md-12">
		<?php
		$tdate=date("Y-m-d");
		$res3=mysql_query("select * from booking_master where booking_date='$tdate'");
		if(mysql_num_rows($res3)>0)
		{
			echo "<table class='table table-bordered'>
					<tr>
						<th>BOOKING ID</th>
						<th>BOOKING DATE</th>
						<th>START DATE</th>
						<th>END DATE</th>
						<th>ROOM TYPE</th>
						<th>ROOM DESCRIPTION</th>
						<th>AC/NON AC</th>
						<th>USER NAME</th>
						<th>MOBILE NO</th>
						<th>TOTAL CHARGES</th>
						
						
					</tr>";
				while($r3=mysql_fetch_array($res3))
				{
					echo "<tr>";
					echo "<td>$r3[0]</td>";
					echo "<td>".date("d-m-Y",strtotime($r3[1]))."</td>";
					echo "<td>".date("d-m-Y",strtotime($r3[2]))."</td>";
					echo "<td>".date("d-m-Y",strtotime($r3[3]))."</td>";
					$res7=mysql_query("select * from room_type_master where room_type_id=(select room_type_id from room_charge_detail where room_charges_id='$r3[4]')");
					$r7=mysql_fetch_array($res7);
					echo "<td>$r7[1]</td>";
					$res8=mysql_query("select * from room_charge_detail where room_charges_id='$r3[4]'");
					$r8=mysql_fetch_array($res8);
					echo "<td>$r8[2]</td>";
					if($r8[3]=="1")
					{
						echo "<td>A.C.</td>";
					}else{
						echo "<td>NON-A.C.</td>";
					}
					$res9=mysql_query("select * from user_regis where user_id='$r3[6]'");
					$r9=mysql_fetch_array($res9);
					echo "<td>$r9[1]</td>";
					echo "<td>$r9[4]</td>";
					echo "<td>Rs. $r3[5] /-</td>";
					echo "</tr>";
				}
				
			echo "</table>";
		}else{
			echo "<h3>No Booking Found</h3>";
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