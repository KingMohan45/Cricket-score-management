<!DOCTYPE html>
	<head>
		<title>AutoConnect</title>
<?php
	session_start();
	error_reporting(0);
	if($_SESSION['username'])
	{
		header("Location:admin.php");
	}
	$id=$_POST['id'];
	$pass=$_POST['password'];
	if(isset($_POST['login']))
	{
		if(md5($id)==md5("admin") and md5($pass)==md5("gnrkm"))
		{
			$_SESSION['username']="admin";
			header("Location:admin.php");
		}
		else $error="Please enter correct details";
	}
?>
		<style>
			*
			{
				margin:0;
				
				color:white;
			}
			.main
			{
				font-size:25px;
			}
			.form
			{
				position:relative;
				width:auto;
			}
			.col
			{
				display:inline;
				background-color: blue;
			}
			.login
			{
				margin:10% auto;
				margin-bottom:0;
				width:400px;
				height:auto;
				border-radius:20px;
				background-color:rgba(147, 143, 143);
				box-shadow:0 0 10px 10px rgba(0,0,0,0.2);
			}
			.logo
			{
				box-shadow:0 0 10px 10px rgba(0,0,0,0.2);
				position: relative;
				border-radius:50%;
				width:100px;
				height:100px;
				top:-60px;
				border:10px;
				z-index:4;
			}
			.icon
			{
				position:relative;
				top:42px;
				width:18px;
				height:20px;
				left:10px;
				border-bottom:1px solid white;
			}
			input
			{
				text-align:center;
				border:0px;
				border-bottom:1px solid white;
				z-index:1;			
				padding:8px;
				background-color:transparent;
			}
			input[type="submit"]
			{
				border:0;
				width:30%;
				margin:0 auto;
				background-image: linear-gradient(-19deg, #21D4FD 0%, #B721FF 70%);
				padding:13px;
				border-radius:5px;
			}
			input[type="text"],input[type="password"]
			{
				width:90%;
				float:right;
			}
			#note
			{
				color:red;
				position: relative;
			}
			  #logom
  {
    position: relative;
    top:10%;
    left: 0%;
    width: 100px;
    height: 50px;
  }
		</style>
	</head>
	<body>
		<a href="../index.php"><img src="../home.svg" id="logom" style="transform: rotateZ(180deg);position: fixed;left:5%;"></a>
		<div class="login" align="center">
			<img src="head.png" class="logo"/>
			<p class="main">Admin Login</p><br>
			<div class="form">
				<form method="post" name="Login">
					<table>
						<tr><td><img src="id.png" class="icon"/></td></tr>
						<tr><td><input type="text" name="id" placeholder="Admin ID" required="true"/><br></td></tr>
						<tr><td><img src="password.png" class="icon"/><br></td></tr>
						<tr><td><input type="password" name="password" placeholder="Password" required="true"/><br><br><br></td></tr>
						<tr><td align="center"><input type="submit" name="login" value="Login"/></td></tr>
					</table>
				</form>
			</div>
			<br><p id="note"></p><br>
		</div>
		<?php
			if($error!='')
			{
				echo "<script>document.getElementById('note').innerHTML='".$error."'</script>";
			}
		?>
	</body>
</html>