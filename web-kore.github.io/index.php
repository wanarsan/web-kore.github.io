<!DOCTYPE html>
<html>
<head>
	<title>Login Form</title>
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
		<form  name="formlogin" action="checklogin.php" method="POST" id="login" class="form-horizontal">	
				<img src="logoWebKore.png">
				<h2 class="title">WebKore</h2>
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
            	<a href="#">ลืมรหัสผ่าน?</a>
				<button type="submit" class="btn">Login</button>
			 <input type="button"class="btn" value="สมัครสมาชิก" onclick="window.location.href='member_form_add.php'" />
            </form>
        </div>
    </div>
</body>
</html>
