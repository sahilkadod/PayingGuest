<?php
session_start();
include("header.php");
include("connection.php");


?>

  <main id="main">
	<br/><br/><br/><br/>
    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container">

        <div class="section-title">
          <h2>ACCOMMODATION DETAIL</h2>
         
        </div>

        <div class="row">
          <div class="col-lg-12 d-flex justify-content-center">
            
          </div>
        </div>

        <div class="row portfolio-container">
		<?php
		$res1=mysql_query("select * from room_type_master");
		if(mysql_num_rows($res1)>0)
		{
			while($r1=mysql_fetch_array($res1))
			{
		?>
          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="<?php echo $r1[2]; ?>" style="width:350px; height:262px;" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4><?php echo $r1[1]; ?></h4>
                <p>Total No of Rooms: <?php echo $r1[3]; ?></p>
                <div class="portfolio-links">
                  <a href="view_room_charges.php?rtid=<?php echo $r1[0]; ?>"  title="App 1">VIEW DETAIL</a>
                
                </div>
              </div>
            </div>
          </div>
		<?php
			}
		}else{
			echo "<h2>No Record Found</h2>";
		}
		?>

        </div>

      </div>
    </section><!-- End Portfolio Section -->
  </main><!-- End #main -->



<?php
include("footer.php");
?>