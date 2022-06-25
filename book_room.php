<?php
session_start();
include("header.php");
include("connection.php");

$rcid=$_REQUEST['rcid'];
$res1=mysql_query("select * from room_charge_detail where room_charges_id='$rcid'");
$r1=mysql_fetch_array($res1);
$charge=$r1[5];
$typeid=$r1[1];
$hf=$r1[4];

$res2=mysql_query("select * from room_type_master where room_type_id='$typeid'");
$r2=mysql_fetch_array($res2);
$roomtype=$r2[1];


if(isset($_POST['btnbook']))
{
	$fdate=date("Y-m-d",strtotime($_POST['txtfdate']));
	if($hf=="FULL YEAR")
	{
		$tdate=date("Y-m-d",strtotime($_POST['txtfdate']." +12 Month"));
	}else{
		$tdate=date("Y-m-d",strtotime($_POST['txtfdate']." +6 Month"));
	}
	$bdate=date("Y-m-d");
	$userid=$_SESSION['userid'];
	//auto no code begin...
	$qur4=mysql_query("select max(booking_id) from booking_master");
	$bid=0;
	while($q4=mysql_fetch_array($qur4))
	{
		$bid=$q4[0];
	}
	$bid++;
	//auto no code finish...
	$query="insert into booking_master values('$bid','$bdate','$fdate','$tdate','$rcid','$charge','$userid')";
	if(mysql_query($query))
	{
		echo "<script type='text/javascript'>";
		echo "alert('Room Booked Successfully');";
		echo "window.location.href='payment.php?bid=$bid&amt=$charge';";
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
          <h2>BOOK ROOM</h2>
          <p>We give you everything right here, where you need it.</p>
        </div>
     
		<div class="col-md-12">
			<div class="row contact-info">
        <div class="form col-md-6">
          <form method="post" role="form" class="php-email-form">
             <div class="form-group">
			 <div align="left">Room Type:</div>
              <input type="text" class="form-control" name="txttype" value="<?php echo $roomtype; ?>"/>
              <div class="validate"></div>
            </div>
            <div class="form-group">
			<div align="left">Select From Date:</div>
              <input type="date" class="form-control" name="txtfdate" value="<?php echo date("Y-m-d",strtotime("+1 days")); ?>" min="<?php echo date("Y-m-d",strtotime("+1 days")); ?>"/>
              <div class="validate"></div>
            </div>
            
           
            <div class="text-center">
			<button type="submit" name="btnbook">BOOK</button></div>
          </form>
        </div>
		<div class="col-md-6">
			<img src="assets/img/login1.gif">
		</div>
      </div>
	  </div>
	  </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->



<?php
include("footer.php");
?>