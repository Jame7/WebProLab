<?php
	include("db.php");
	include("userclass.php");
  session_start();
	if(isset($_POST['insert'])){
		$user = new user();
		$user->connect();
		$user->user_name = $_POST['user_name'];
		$user->user_email = $_POST['user_email'];
		$user->insert();

		$_SESSION['user_name'] = $_POST['user_name'];
		$_SESSION['user_email'] = $_POST['user_email'];
		echo"<meta http-equiv='refresh' content=\"0;URL='chatpage.php'\">";
	}
	if(!isset($_SESSION['user_name'])){
	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type='text/css' href='mystyle.css'>
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  	<style>
  		@keyframes slide {
    0% {
      opacity: 0;
      transform: translateY(70%);
    } 
    100% {
      opacity: 1;
      transform: translateY(0%);
    }
  }
  @-webkit-keyframes slide {
    0% {
      opacity: 0;
      -webkit-transform: translateY(70%);
    } 
    100% {
      opacity: 1;
      -webkit-transform: translateY(0%);
    }
  }
  @media screen and (max-width: 768px) {
    .col-sm-4 {
      text-align: center;
      margin: 25px 0;
    }
    .btn-lg {
        width: 100%;
        margin-bottom: 35px;
    }
  }
  @media screen and (max-width: 480px) {
    .logo {
        font-size: 150px;
    }
  }
  button {
	  float:right;
	  height: 121px;
	  width: 61.9px;
	  border: 2px;
	  background: #e74c3c;
	  border-radius:7px;
	  padding: 10px;
	  color:white;
	  font-size:22px;
}
  	</style>
</head>
<body>
	<div class="jumbotron text-center">
  		<h1>REALTIME CHAT</h1> 
  		<p>WELCOME</p> 
  	</div>
  	<div class="bg-1">
  		<div class="container">
  			<h3 class="text-center">CHAT ROOM</h3>
	  		<form action="index.php" method="POST">
				<h2>Login</h2>
				<button class="submit" name="insert">login</button>
				  
				<input type="text" class="user" name="user_name" placeholder="username"/>
				 
				<input type="email" class="pass" name="user_email" placeholder="E-mail"/>
			</form>
		<div class="bg-1">
			<div class="container">
		    <p class="text-center">CHATROOM REALTIME<br> ยินดีต้อนรับทุกท่านเข้าสู่เว็บห้องแชทออนไลน์!<br>
		    &copy;จัดทำโดย นางสาวศุภิสรา พันสร้อย 58660096 นายกฤตเมธ เชิดชู 58660126 นายรัตติกร เฮงพลอย 58660136</p>
		    </div>
		</div>	
  		</div>
  	</div>

  	
</div>
</body>
</html>
<?php }else{

}
?>