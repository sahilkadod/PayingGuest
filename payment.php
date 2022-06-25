<?php
session_start();
include("header.php");
include("connection.php");
$bid=$_REQUEST['bid'];
$amt=$_REQUEST['amt'];
?>
<script type="text/javascript">
function validate()
{
	
	if(form1.selctype.value=="0")
	{
		alert("Please Select Card Type");
		form1.selctype.focus();
		return false;
	}
	
	var v=/^[a-zA-Z ]+$/
	if(form1.txtbname.value=="")
	{
		alert("Please Enter Bank Name");
		form1.txtbname.focus();
		return false;
	}else{
		if(!v.test(form1.txtbname.value))
		{
			alert("Please Enter Only Alphabets in Bank Name");
			form1.txtbname.focus();
			return false;
		}
	}
	
	
	

	var v=/^[0-9]+$/
	if(form1.txtcno.value=="")
	{
		alert("Please Enter Card No");
		form1.txtcno.focus();
		return false;
	}else if(form1.txtcno.value.length!=16){
		alert("Please Enter Card No 16 Digit Long");
		form1.txtcno.focus();
		return false;
	}else{ 
		if(!v.test(form1.txtcno.value))
		{
			alert("Please Enter Only Digits in Card No");
			form1.txtcno.focus();
			return false;
		}
	}
	
	if(form1.txtcvvno.value=="")
	{
		alert("Please Enter CVV No");
		form1.txtcvvno.focus();
		return false;
	}else if(form1.txtcvvno.value.length!=3){
		alert("Please Enter CVV No 3 Digit Long");
		form1.txtcvvno.focus();
		return false;
	}else{ 
		if(!v.test(form1.txtcvvno.value))
		{
			alert("Please Enter Only Digits in CVV No");
			form1.txtcvvno.focus();
			return false;
		}
	}
	
	var v=/^[a-zA-Z ]+$/
	if(form1.txtname.value=="")
	{
		alert("Please Enter Card Holder Name");
		form1.txtname.focus();
		return false;
	}else{
		if(!v.test(form1.txtname.value))
		{
			alert("Please Enter Only Alphabets in Card Holder Name");
			form1.txtname.focus();
			return false;
		}
	}
}


</script>
<?php
if(isset($_POST['btnpay']))
{
	$ctype=$_POST['selctype'];
	$bname=$_POST['txtbname'];
	$cno=$_POST['txtcno'];
	$cvvno=$_POST['txtcvvno'];
	$name=$_POST['txtname'];
	$exdate=$_POST['selexmonth']."-".$_POST['selexyear'];
	
	
	
	
	//auto no code begin...
	$qur4=mysql_query("select max(pay_id) from payment_detail");
	$pid=0;
	while($q4=mysql_fetch_array($qur4))
	{
		$pid=$q4[0];
	}
	$pid++;
	//auto no code finish...
	$query="insert into payment_detail values('$pid','$bid','$ctype','$bname','$cno','$cvvno','$name','$exdate','$amt')";
	if(mysql_query($query))
	{
		echo "<script type='text/javascript'>";
		echo "alert('Payment Successfully');";
		echo "window.location.href='user_view_booking_detail.php';";
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
          <h2>PAYMENT</h2>
          <p>We give you everything right here, where you need it.</p>
        </div>
     
		<div class="col-md-12">
			<div class="row contact-info">
        <div class="form col-md-6">
          <form method="post" name="form1" role="form" class="php-email-form">
		   <div class="form-group">
              <select class="form-control" name="selctype">
				<option value="0">--Select Card Type--</option>
				<option value="Debit Card">Debit Card</option>
				<option value="Credit Card">Credit Card</option>
			  </select>
              <div class="validate"></div>
            </div>
			<div class="form-group">
              <input type="text" class="form-control" name="txtbname" placeholder="Enter Bank Name" />
              <div class="validate"></div>
            </div>
			<div class="form-group">
              <input type="text" class="form-control" name="txtcno" placeholder="Enter Card No" />
              <div class="validate"></div>
            </div>
			<div class="form-group">
              <input type="text" class="form-control" name="txtcvvno" placeholder="Enter CVV No" />
              <div class="validate"></div>
            </div>
			
             <div class="form-group">
              <input type="text" class="form-control" name="txtname" placeholder="Enter Card Holder Name" />
              <div class="validate"></div>
            </div>
			<div class="form-row">
				<div class="col-md-6 form-group">
					<div align="left">Select Expiry Month</div>
					<select name="selexmonth" class="form-control">
					<option value="Jan">JAN</option>
					<option value="Feb">FEB</option>
					<option value="Mar">MAR</option>
					<option value="April">April</option>
					<option value="May">MAY</option>
					<option value="June">JUNE</option>
					<option value="July">JULY</option>
					<option value="Aug">AUG</option>
					<option value="Sep">SEP</option>
					<option value="Oct">OCT</option>
					<option value="Nov">NOV</option>
					<option value="Dec">DEC</option>
				</select>
					<div class="validate"></div>
				</div>
				<div class="col-md-6 form-group">
					<div align="left">Select Expiry Year</div>
				<select name="selexyear" class="form-control">
					<option value="2021">2021</option>
					<option value="2022">2022</option>
					<option value="2023">2023</option>
					<option value="2024">2024</option>
					<option value="2025">2025</option>
					<option value="2026">2026</option>
					<option value="2027">2027</option>
					<option value="2028">2028</option>
					<option value="2029">2029</option>
					<option value="2030">2030</option>
				</select>
					<div class="validate"></div>
				</div>
			</div>
          
			
            
            <div class="text-center">
			<button type="submit" name="btnpay" onclick="return validate();">PAY Rs. <?php echo $amt; ?> /-</button>
			</div>
          </form>
        </div>
		<div class="col-md-6">
			<img src="assets/img/pay1.webp" style="width:550px; height:450px;">
		</div>
      </div>
	  </div>
	  </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->



<?php
include("footer.php");
?>