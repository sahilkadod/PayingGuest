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
          <h2>USER DETAIL REPORT</h2>
          <p>We give you everything right here, where you need it.</p>
        </div>
     
		<div class="col-md-12">
			<div class="row contact-info">
      
	
		<div class="col-md-12">
		<?php
		
		$res3=mysql_query("select * from user_regis");
		if(mysql_num_rows($res3)>0)
		{
			echo "<table class='table table-bordered'>
					<tr>
						<th>USER ID</th>
						<th>USER NAME</th>
						<th>ADDRESS</th>
						<th>CITY</th>
						<th>MOBILE NO</th>
						<th>EMAIL ID</th>
						<th>DATE OF BIRTH</th>
						<th>GENDER</th>
						
						<th>VIEW BOOKINGS</th>
						
					</tr>";
				while($r3=mysql_fetch_array($res3))
				{
					echo "<tr>";
					echo "<td>$r3[0]</td>";
					echo "<td>$r3[1]</td>";
					echo "<td>$r3[2]</td>";
					echo "<td>$r3[3]</td>";
					echo "<td>$r3[4]</td>";
					echo "<td>$r3[5]</td>";
					echo "<td>$r3[8]</td>";
					echo "<td>$r3[7]</td>";
					echo "<td><a href='admin_view_userwise_booking_report.php?uid=$r3[0]'>VIEW BOOKINGS</a></td>";
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