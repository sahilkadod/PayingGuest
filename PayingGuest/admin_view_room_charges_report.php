<?php
include("admin_header.php");
include("connection.php");

?>

  <main id="main">

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">
		<br/><br/><br/>
        <div class="section-title">
          <h2>ROOM CHARGES REPORT</h2>
          <p>We give you everything right here, where you need it.</p>
        </div>
     
		<div class="col-md-12">
			<div class="row contact-info">
      
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
						<th>VIEW BOOKINGS</th>
						
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
					
					echo "<td><a href='admin_view_roomcharges_wise_booking_report.php?rcid=$r3[0]'>VIEW BOOKINGS</a></td>";
					
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