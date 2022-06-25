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
          <h2>ROOM TYPE WISE AVAILABLE BED REPORT</h2>
          <p>We give you everything right here, where you need it.</p>
        </div>
     
		<div class="col-md-12">
			<div class="row contact-info">
      
		<div class="col-md-12">
		<?php
		$res3=mysql_query("select * from room_type_master");
		if(mysql_num_rows($res3)>0)
		{
			echo "<table class='table table-bordered'>
					<tr>
						<th>TYPE ID</th>
						<th>ROOM TYPE</th>
						<th>TOTAL NO OF ROOMS</th>
						<th>AVAILABLE ROOMS</th>
						<th>ROOM IMAGES</th>
						
					</tr>";
				while($r3=mysql_fetch_array($res3))
				{
					echo "<tr>";
					echo "<td>$r3[0]</td>";
					echo "<td>$r3[1]</td>";
					echo "<td>$r3[3]</td>";
					$res2=mysql_query("select count(*) from booking_master where YEAR(start_date)='2021' and  room_charges_id='$r3[0]'");
					
					if(mysql_num_rows($res2)>0)
					{
						$r2=mysql_fetch_array($res2);
						echo "<td>".($r3[3]-$r2[0])."</td>";						
					}else{
						echo "<td>".($r3[3]-0)."</td>";						
					}
					
					echo "<td><img src='$r3[2]' style='width:150px; height:150px;'></td>";
					
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