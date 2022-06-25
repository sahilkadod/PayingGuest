<?php
include("header.php");
include("connection.php");
?>
<script type="text/javascript">
function validate()
{
	var v=/^[a-zA-Z ]+$/
	if(form1.txtname.value=="")
	{
		alert("Please Enter Name");
		form1.txtname.focus();
		return false;
	}else{
		if(!v.test(form1.txtname.value))
		{
			alert("Please Enter Only Alphabets in Name");
			form1.txtname.focus();
			return false;
		}
	}
	
	if(form1.txtadd.value=="")
	{
		alert("Please Enter Address");
		form1.txtadd.focus();
		return false;
	}
	
	if(form1.txtcity.value=="")
	{
		alert("Please Enter City");
		form1.txtcity.focus();
		return false;
	}else{
		if(!v.test(form1.txtcity.value))
		{
			alert("Please Enter Only Alphabets in City");
			form1.txtcity.focus();
			return false;
		}
	}

	var v=/^[0-9]+$/
	if(form1.txtmno.value=="")
	{
		alert("Please Enter Mobile No");
		form1.txtmno.focus();
		return false;
	}else if(form1.txtmno.value.length!=10){
		alert("Please Enter Mobile No 10 Digit Long");
		form1.txtmno.focus();
		return false;
	}else{ 
		if(!v.test(form1.txtmno.value))
		{
			alert("Please Enter Only Digits in Mobile No");
			form1.txtmno.focus();
			return false;
		}
	}
	
	var v=/^[a-zA-Z0-9.-_]+@[a-zA-Z0-9.-_]+\.([a-zA-Z]{2,4})+$/
	if(form1.txtemail.value=="")
	{
		alert("Please Enter Email ID");
		form1.txtemail.focus();
		return false;
	}else{
		if(!v.test(form1.txtemail.value))
		{
			alert("Please Enter Valid Email ID");
			form1.txtemail.focus();
			return false;
		}
	}
	
	
	if(form1.txtpwd.value=="")
	{
		alert("Please Enter Password");
		form1.txtpwd.focus();
		return false;
	}else if(form1.txtpwd.value.length<7){
		alert("Please Enter Password More than 7 Characters");
		form1.txtpwd.focus();
		return false;
	}else if(form1.txtpwd.value.length>10){
		alert("Please Enter Password Less than 10 Characters");
		form1.txtpwd.focus();
		return false;
	}
	
	if(form1.gender[0].checked==false)
	{
		if(form1.gender[1].checked==false)
		{
			alert("Please Select Gender");
			return false;
		}
	}
}


</script>
<?php
if(isset($_POST['btnregis']))
{
	$name=$_POST['txtname'];
	$add=$_POST['txtadd'];
	$city=$_POST['txtcity'];
	$mno=$_POST['txtmno'];
	$email=$_POST['txtemail'];
	$pwd=$_POST['txtpwd'];
	$dob=date("Y-m-d",strtotime($_POST['txtdob']));
	$gender=$_POST['gender'];
	
	$res1=mysql_query("select * from user_regis where email_id='$email'");
	if(mysql_num_rows($res1)>0)
	{
		echo "<script type='text/javascript'>";
		echo "alert('Email Id Already Registered');";
		echo "window.location.href='registration.php';";
		echo "</script>";
	}else{
		//auto no code begin...
		$qur4=mysql_query("select max(user_id) from user_regis");
		$userid=0;
		while($q4=mysql_fetch_array($qur4))
		{
			$userid=$q4[0];
		}
		$userid++;
		//auto no code finish...
		$query="insert into user_regis values('$userid','$name','$add','$city','$mno','$email','$pwd','$gender','$dob')";
		if(mysql_query($query))
		{
			echo "<script type='text/javascript'>";
			echo "alert('Registration Done');";
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
          <h2>REGISTRATION FORM</h2>
          <p>We give you everything right here, where you need it.</p>
        </div>
     
		<div class="col-md-12">
			<div class="row contact-info">
        <div class="form col-md-6">
          <form method="post" name="form1" role="form" class="php-email-form">
		   <div class="form-group">
              <input type="text" class="form-control" name="txtname" placeholder="Enter Name" />
              <div class="validate"></div>
            </div>
			<div class="form-group">
              <textarea class="form-control" name="txtadd" rows="3"  placeholder="Enter Address"></textarea>
              <div class="validate"></div>
            </div>
			<div class="form-group">
              <input type="text" class="form-control" name="txtcity" placeholder="Enter City" />
              <div class="validate"></div>
            </div>
			<div class="form-group">
              <input type="text" class="form-control" name="txtmno" placeholder="Enter Mobile No" />
              <div class="validate"></div>
            </div>
             <div class="form-group">
              <input type="text" class="form-control" name="txtemail" placeholder="Enter Email ID" />
              <div class="validate"></div>
            </div>
            <div class="form-group">
              <input type="password" class="form-control" name="txtpwd" placeholder="*******"/>
              <div class="validate"></div>
            </div>
            <div class="form-group">
			<div align="left">Select Date of Birth</div>
              <input type="date" class="form-control" name="txtdob" value="<?php echo date("Y-m-d",strtotime("-15 years")); ?>" max="<?php echo date("Y-m-d",strtotime("-15 years")); ?>"/>
              <div class="validate"></div>
            </div>
			<div class="form-group">
			<div align="left">Select Gender
              <input type="radio" name="gender" value="MALE"> MALE
			  <input type="radio" name="gender" value="FEMALE"> FEMALE
			 </div>
              <div class="validate"></div>
            </div>
            
            <div class="text-center">
			<button type="submit" name="btnregis" onclick="return validate();">REGISTER</button>
			</div>
          </form>
        </div>
		<div class="col-md-6">
			<img src="assets/img/regis.png" style="width:500px; height:550px;">
		</div>
      </div>
	  </div>
	  </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->



<?php
include("footer.php");
?>