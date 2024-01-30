<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="style.css">
<style type="text/css">
			*
			{
				margin:0;
				box-sizing:border-box;
				font-family: 'Raleway', sans-serif;
				box-sizing: border-box;
			}
			@font-face 
			{
			    font-family: 'Raleway';
			    font-style: normal;
			    font-weight: 300;
			    src: local('Raleway Light'), url(font1.woff2) format('woff2');
			    /*unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2212, U+2215;*/
			}
			body
			{
				background-color:#52ACFF;
			}
	#header
	{
		font-size:20px;
		position:fixed;
		width:100%;
		text-align: center;
		text-align:center;
		color:white;
		background-color:#353535;
		top:0px;
		padding:20px;
		z-index:5;
		display:inline-block;
		height:60px;
	}
	.link 
	{
			display: inline-block;
			text-decoration: none;
		 	color: 
			white;
			margin: 0 10px;
			border: 0px;
			background-color:
		    transparent;
		    font-size: 15px;
		    cursor: pointer;
	}
	 a
	  {
	  	text-decoration: none;
	  	color: black;
	  }
			#pool {
				margin: 0 auto;
			}
			.team
			{
				width: 350px;
				font-size: 15px;
				background-color: orange;
				border-radius: 20px;
				padding:10px;
				margin:10px 0;
				color: black;
			}
			#sub
			{
				color:white;
			    padding-top: 10px;
			    font-size: 13px;
			    margin-top:50px;
			    border-radius: 20px;
			    padding:30px;
				background-color: rgba(0,0,0,0.5);
				width: 400px;
			}
			#logo
			{
			    position: fixed;
			    top:1%;
			    left: 2%;
			    width: 100px;
			    height: auto;
			}
			#credits
			{
				position: fixed;
				top:1%;
				right: 2%;
				width: 50px;
				height: auto;
			}
</style>
</head>
<body>
	<div id="header">
			<a href="home.php"><img src="logo.png" id="logo"></a>  
			<a class="link" href="index.php">Home</a>
			<a class="link" href="index.php">Pools</a>
			<a class="link" href="index.php">Points Table</a>
			<a class="link" href="matches.php">Matches</a>
			<a class="link" href="gallery/gallery.php">Gallery</a>
			<a class="link" href="gallery/gallery.php?season=2">CSPL 2.0 Gallery</a>
			<a class="link" href="score.php">Go Live</a>
			<a href="https://github.com/KingMohan45" target="_blank"><img src="credits.png" id="credits"></a>  
	</div>
	<br><br><br>
	<div id="pool" align="center">
		
		<div align="center">
			<?php
				$conn=mysqli_connect("localhost","root","","cspl3");
				$query="SELECT id,t1,t2 from matches where status=0";
				$res=mysqli_query($conn,$query);
				echo "<div id='sub' align='center'>
						<h3>Live Matches</h3>";
				while($result=mysqli_fetch_array($res))
				{
					$var=$result[1];
					$var2=$result[2];
					$query="SELECT `name` from `teams` where `id`='".$var."'";
					$res2=mysqli_fetch_array(mysqli_query($conn,$query));
					$query=$query="SELECT `name` from `teams` where `id`='".$var2."'";
					$res3=mysqli_fetch_array(mysqli_query($conn,$query));
					echo "<p class='team'><a href='score.php?mid=".$result['id']."'>".$res2['name']." Vs ".$res3['name']."</a></p>";
				}
			?>
		</div>
		<div align="center">
			<?php
				$conn=mysqli_connect("localhost","root","","cspl3");
				$query="SELECT id,t1,t2 from matches where status=-1";
				$res=mysqli_query($conn,$query);
				echo "<div id='sub' align='center'>
						<h3>Previous Matches</h3>";
				while($result=mysqli_fetch_array($res))
				{
					$var=$result[1];
					$var2=$result[2];
					$query="SELECT `name` from `teams` where `id`='".$var."'";
					$res2=mysqli_fetch_array(mysqli_query($conn,$query));
					$query=$query="SELECT `name` from `teams` where `id`='".$var2."'";
					$res3=mysqli_fetch_array(mysqli_query($conn,$query));
					echo "<p class='team'><a href='score.php?mid=".$result['id']."'>".$res2['name']." Vs ".$res3['name']."</a></p>";
				}
			?>
		</div>
		<div align="center">
			<?php
				$conn=mysqli_connect("localhost","root","","cspl3");
				$query="SELECT id,t1,t2 from matches where status=1";
				$res=mysqli_query($conn,$query);
				echo "<div id='sub' align='center'>
						<h3>Upcoming Matches</h3>";
				while($result=mysqli_fetch_array($res))
				{
					$var=$result[1];
					$var2=$result[2];
					$query="SELECT `name` from `teams` where `id`='".$var."'";
					$res2=mysqli_fetch_array(mysqli_query($conn,$query));
					$query=$query="SELECT `name` from `teams` where `id`='".$var2."'";
					$res3=mysqli_fetch_array(mysqli_query($conn,$query));
					echo "<p class='team'><a href='score.php?mid=".$result['id']."'>".$res2['name']." Vs ".$res3['name']."</a></p>";
				}
			?>
		</div><br><br>
	</div>
</body>
</html>
