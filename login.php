<?php
session_start();
include("header.php");
include("connection.php");

if(isset($_POST['btnlogin']))
{
	$email=$_POST['txtemail'];
	$pwd=$_POST['txtpwd'];
	
	$res1=mysql_query("select * from admin_detail where email_id='$email' and pwd='$pwd'");
	if(mysql_num_rows($res1)>0)
	{
		echo "<script type='text/javascript'>";
		echo "alert('Admin Login Successfully');";
		echo "window.location.href='admin_manage_roomtype.php';";
		echo "</script>";
	}else{
		$res2=mysql_query("select * from user_regis where email_id='$email' and pwd='$pwd'");
		if(mysql_num_rows($res2)>0)
		{
			$r2=mysql_fetch_array($res2);
			$_SESSION['userid']=$r2[0];
			if(isset($_SESSION['rcid']))
			{
				$rcid=$_SESSION['rcid'];
				unset($_SESSION['rcid']);
				echo "<script type='text/javascript'>";
				echo "alert('User Login Successfully');";
				echo "window.location.href='book_room.php?rcid=$rcid';";
				echo "</script>";
			}else{
				echo "<script type='text/javascript'>";
				echo "alert('User Login Successfully');";
				echo "window.location.href='view_accommodation.php';";
				echo "</script>";
			}
		}else{
			echo "<script type='text/javascript'>";
			echo "alert('Check Your Email ID or Password');";
			echo "window.location.href='login.php';";
			echo "</script>";
		}
	}
}
?>

  <main id="main">

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">
		<br/><br/><br/>
        <div class="section-title">
          <h2>Login</h2>
          <p>We give you everything right here, where you need it.</p>
        </div>
     
		<div class="col-md-12">
			<div class="row contact-info">
        <div class="form col-md-6">
          <form method="post" role="form" class="php-email-form">
             <div class="form-group">
              <input type="text" class="form-control" name="txtemail" placeholder="Enter Email ID" />
              <div class="validate"></div>
            </div>
            <div class="form-group">
              <input type="password" class="form-control" name="txtpwd" placeholder="*******"/>
              <div class="validate"></div>
            </div>
            
           
            <div class="text-center">
			<button type="submit" name="btnlogin">LOGIN</button></div>
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