<?php include('h.php');?>
<!DOCTYPE html>
<html>
<head>
	<title>Animated Login Form</title>
	<link rel="stylesheet" type="text/css" href="css/style2.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<img class="wave" src="img/wave.png">
	<div class="container">
		<div class="img">
		</div>
		<div class="login-content">
			<form id="register" name="register" action="member_form_add_db.php" method="POST" class="form-horizontal" onSubmit = "return checkPassword(this)">	
				<img src="logoWebKore.png">
				<h2 class="title">register system</h2>
				<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<input  name="m_name" type="text" id="m_name" placeholder="ชื่อในระบบ" pattern="^[a-zA-Z0-9]+$"/>
            	   </div>
				</div>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<input  name="m_user" type="text" required class="form-control" id="m_user" placeholder="ชื่อผู้ใช้" pattern="^[a-zA-Z0-9]+$" title="ภาษาอังกฤษหรือตัวเลขเท่านั้น" minlength="2"  />
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<input name="m_pass" type="password" class="password" id="m_pass" placeholder="รหัสผ่าน" pattern="^[a-zA-Z0-9]+$" minlength="2" />
            	   </div>
				</div>
				<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<input  name="m_pass2" type="password" class="confirmpassword" id="m_passconfirm" placeholder="ยืนยันรหัสผ่าน" pattern="^[a-zA-Z0-9]+$" minlength="2" />
				   </div>
				</div>
				<a href="member_form_rwd.php">ลืมรหัสผ่าน?</a>
				<div class="div">
				<p>เพื่อความโปร่งใส ขอแนะนำให้ผู้ใช้ตั้ง username password ไม่เหมือน หรือ ไม่ใกล้เคียงกับบัญชีที่ใช้อยู่ในปัจจุบัน</p>
				</div>
				<button type="submit" class="btn" id="btn_register">สร้างบัญชีผู้ใช้</button>
			</form>
        </div>
	</div>
	<script> 
	// Function เพื่อตรวจสอบรหัสผ่านว่าตรงกันหรือไม่
	function checkPassword(form) { 
		password1 = form.m_pass.value; 
		password2 = form.m_pass2.value; 

		// ถ้าช่่องรหัสผ่านไม่ถูกกรอก
		if (password1 == '') 
			return false; 
					
		// ถ้าช่่องยืนยันรหัสผ่านไม่ถูกกรอก
		else if (password2 == '') 
			return false; 
						
		//ถ้าทั้งสองช่องไม่ตรงกัน   ให้แจ้งผู้ใช้  และ  return false
		else if (password1 != password2) { 
			alert ("\nPassword และ Confirm Password ไม่ตรงกัน...") 
			return false; 
			} 

		//ถ้าทั้งสองช่องตรงกัน  return true
		else{ 
				return true; 
			} 
	} 
</script> 
</body>
</html>