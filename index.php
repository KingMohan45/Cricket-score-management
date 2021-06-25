<!DOCTYPE html>
	<head>
		<title>CSPL 3.0</title>
		<script src="jquery.min.js"></script>
		<style>
			*
			{
				margin:0;
				box-sizing:border-box;
				font-family: 'Raleway', sans-serif;
				overflow: hidden;
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
				overflow: hidden;
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
				box-shadow:0 0 10px 10px rgba(255,255,255,0.2);
			}
			.logout
			{
				position: fixed;
				top:90px;
				left:40px;
				width:50px;
				height:50px;
			}
			.letter
			{
				display:inline-block;
				animation: hello 0.5s linear;
			}
			@keyframes hello
			{
				0%{font-size:100px;}
				100%{font-size:10px;transform: rotateZ(360deg);}
			}
			#view1
			{
				margin-top:60px;
				background-size: cover;
			}
			#view2
			{
				overflow: auto;
			}
			#i1,#i2,#i3
			  {
			    background-color: #cc00cc;
			    width: 13px;
			    height: 13px;
			    border-radius: 23px;
			    padding-top: 6px;
			    margin:8px;
			    z-index: 2;
			  }
			  #i1
			  {
			    background-color: #00cc00;
			  }
			#nav
		    {
		      position: fixed;
		      right: 33px;
		      top: 45%;
		      height: 72px;
		      margin:0 auto;
		      background-color: rgb(50,50,50);
		      border-radius:30px;
		      z-index:2;
		      box-shadow:0 0 10px 10px rgba(255,255,255,0.4);
		    }
		    #about
		    {
		    	border:1px solid black;
		    	border-radius:40px 10px;
		    	width:50%;
		    	margin-top:130px;
		    	font-size:17px;
		    	background-color:rgba(47, 50, 56,0.7);
		    	color:white;
		    	padding:20px 10px 20px 20px;
		    	line-height: 30px;
		    	margin-left:30px;
		    }
		    #logi,#regi
			  {
			    position: fixed;
			    top: 130px;
			    right: 20px; 
			    width: 50px;
			    height: 50px;
			    border-radius: 50%;
			    box-shadow:0 0 10px 10px rgba(255,255,255,0.5);
			    z-index: 3;
			  }
			  #regi
			  {
			    top: 385px ;
			  }
			  #txt1,#txt2
			  {
			    position: fixed;
			    font-family: 'Raleway';
			    z-index:3;
			    background-color: rgba(255, 255, 255, 0.6);
			     box-shadow:0 0 10px 10px rgba(255,255,255,0.6);
			   }
			  #txt1
			  {
			    top: 190px;
			    right: 23px;
			  }
			  #txt2
			  {
			    top: 445px;
			    right: 16px;
			  }
			  .scroll
			  {
			  	width: 100%;
			  	height: 100%;
			  }
			  .img
			  {
			  	/*display: none;*/
			  }
			 	a
			  {
			  	text-decoration: none;
			  	color: white;
			  }
		      .link {
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
				#view3
				{
					overflow: auto;
					background-color:rgb(47, 79, 79)
				}
				.flex-col {
			    width: 160px;
			    height: auto;
			    border-radius: 10px;
			    text-align: center;
			    margin: 10px;
			    flex: 1 0 auto;
			}
			#pool,#score {
			    width: 50%;
			    height: auto;
			    background-color: rgb(36, 39, 41);
				color:white;
			    font-size: 13px;
			    background-color: rgba(0,0,0,0.1);
			    margin-top:20px;
			    overflow: auto;
			    border-radius: 20px;
			    padding:30px;
			    box-shadow:0 0 10px 10px rgba(255,255,255,0.2);
			}
			#pool
			{
				margin-top: 5%;
			}
			#score
			{
				width: 70%;	
			}
			#pool > div,#score> div {
			    display: flex;
			}
			.team
			{
				background-color: rgba(63, 242, 234, 0.7);
			}
			.team,.points
			{
				font-size: 15px;
				border-radius: 20px;
				padding:10px;
				margin:10px 0;
				color: black;

			}
			table,td,th
			{
				border-bottom:1px solid white;
				border-collapse: collapse;
			}
			.scoreT,th
			{
				color: white;
				font-size: 13px;
				border-collapse: collapse;
				padding: 15px;
			}
			#logo
			  {
			    position: fixed;
			    top:1%;
			    left: 2%;
			    width: 100px;
			    height: auto;
			  }
			 #view2
			 {
			 	background-image: url("home.jpg");
			 	background-size: cover;
			 }
			 #body
			 {
			 	display: none;
			 }
			 #ball
		{
			width: 30px;height: 30px;
			animation:hit 2s cubic-bezier(.86,0,.07,1) 0s;
			position: fixed;
			top: 140px;
			left: 50px;
			z-index: 5;
			border-radius: 50%;
		}
		@keyframes hit
		{
			0%{width: 800px;height: 800px;}
			50%{width: 20px;height: 20px;top: 100px;transform: rotateZ(360deg);}
			100%{width: 2000px;height: 2000px;left: 2000px;top: 100px;transform:rotateZ(360deg);}
		}
		#bat
		{
			width:350px;
			height: 500px;
			top: 100px;
			position: fixed;
			animation:turn 1s cubic-bezier(.86,0,.07,1) 0s;
		}
		@keyframes turn
		{
			0%{transform: rotateY(0.5turn);}
			100%{transform: rotateY(0turn);}
		}
		#greet
		{
			margin: 0 auto;
			width: 100%;
			top: 100px;

			position: fixed;
		}
		#head1
		{
			font-size: 50px;
		}
		#sub
		{
			font-size: 30px;
		}
		@font-face 
		{
		    font-family: 'Raleway';
		    font-style: normal;
		    font-weight: 300;
		    src: local('Raleway'), url(font1.woff2) format('woff2');
		    /*unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2212, U+2215;*/
		}
		#t1,#t2
		{
			width: 400px;
			height: 300px;
		}
		#view1
		{
			background-image: url("view1/1.jpg");
		}
		#fm
		{
			width: 100%;
		}
		.final
		{
			border: 0;
			margin: 100px;
			display: inline-block;
			box-shadow:0 0 10px 10px rgba(255,255,255,0.2);
		}
		#mh
		{
			font-size: 20px;
			color: white;
			margin-top: 20px;
		}
		</style>
	</head>
	<script>
		document.documentElement.scrollTop=0;
		function resize()
		{
			for(i=1;i<=3;i++)
			{
				document.getElementById("view"+i).style.height=window.innerHeight-60+"px";
			}
			document.documentElement.scrollTop=0;
		}
		var enter=1;
		$('html').on('DOMMouseScroll', 
			function(e)
			{
		      	var z= document.documentElement;
				var j=Math.round(document.documentElement.scrollTop/document.documentElement.clientHeight);
				k=Math.round(z.scrollTop/document.documentElement.clientHeight);
				if(enter)
		      	{
		      		enter=0;
					setTimeout(function()
					{
						enter=1;
					}
					,1700);
				    if(e.originalEvent.detail < 0)
				    {//up
				    	if(k-1>=0)
				    	{
				    		update_scroll(k);
				    	}
				    }
			        else 
			        {
			          //down
			          	if(k+2<=3)
			          	{
			          		update_scroll(k+2);
			          	}
			        }
	    		}
    		});	
	function update_scroll(e)
    {
        for (var i = 1; i <=3; i++) 
        {
          if(i!=e)
          {
            document.getElementById('i'+i).style.backgroundColor='#cc00cc';        
          }
        }
        document.getElementById('i'+e).style.backgroundColor='#00cc00';
        $("html").stop().animate({scrollTop:document.documentElement.clientHeight*(e-1)-60}, 1800, 'swing');
    };
	</script>
	<body onresize="resize()" onscroll="">
		<div id="greet">
			<img src="451-4518754_cricket-vector-png-cricket-batsman-vector-png.png" id="bat">
	<img src="151-1518093_cricket-ball-png-transparent-background-cricket-ball-png.png" id="ball">
	<div id="greet" align="center">
		<p id="head1">CSPL 3.0</p>
		<p id="sub">Thanks to Chancellor sir and all the dignitaries</p>
	</div>
	<script type="text/javascript">
		setTimeout(function(){document.getElementById("ball").style.display="none";},2000);
	</script>
		</div>
		<div id="body">
		<div id="header">
			<a href="home.php"><img src="logo.png" id="logo"></a>  
			<a class="link" onclick="update_scroll(1)">Home</a>
			<a class="link" onclick="update_scroll(2)">Pools</a>
			<a class="link" onclick="update_scroll(3)">Points Table</a>
			<a class="link" href="gallery/gallery.php">Gallery</a>
			<a class="link" href="gallery/gallery.php?season=2">CSPL 2.0 Gallery</a>
			<a class="link" href="matches.php">Matches</a>
			<a class="link" href="score.php">Go Live</a>
		</div>
		<div id="nav">
		    <div id="i1" onclick="update_scroll(1)"></div>
		    <div id="i2" onclick="update_scroll(2)"></div>
		    <div id="i3" onclick="update_scroll(3)"></div>
		</div>
		<div class="view" id="view1" align="center">
			<p id="mh">: : Final Match : :<br>Bug Hunters VS Gangstars</p>
			<div align="center" id="fm">
				<div class="final">
					<img src="team1.jpg" id="t1">	
				</div>
				<div class="final">
					<img src="team2.jpg" id="t2">	
				</div>
			</div>
		</div>
		<div  class="view" id="view2" align="center">
			<div id="pool">
				<h1>Teams</h1>
				<div align="center">
					<div class="flex-col">
						<h3>Pool A</h3>
						<?php
							$conn=mysqli_connect("localhost","root","","cspl3");
							$query="SELECT name from teams where pool=0";
							$res=mysqli_query($conn,$query);
							while($result=mysqli_fetch_array($res))
							{
								echo "<p class='team'>".$result['name']."</p>";
							}
						?>
					</div>
					<div class="flex-col">
						<h3>Pool B</h3>
						<?php
							$conn=mysqli_connect("localhost","root","","cspl3");
							$query="SELECT name from teams where pool=1";
							$res=mysqli_query($conn,$query);
							while($result=mysqli_fetch_array($res))
							{
								echo "<p class='team'>".$result['name']."</p>";
							}
						?>
					</div>
			    </div>
			</div>
		</div>
		<div align="center" class="view" id="view3"><br>
			<h1 style="color: white">Points Table</h1>
			<div id="score">
				<h2>Teams</h2>
				<div align="center">
					<div class="flex-col" align="center">
						<h3>Pool-A</h3>
						<?php
							$conn=mysqli_connect("localhost","root","","cspl3");
							$query="SELECT name,points,matches,lost from teams where pool=0 order by points DESC";
							$res=mysqli_query($conn,$query);
							echo "<table>
									<tr>
										  <th>Name</th>
										  <th>Matches</th>
										  <th>Won</th>
										  <th>Lost</th>
										  <th>Points</th>
									<tr>";
							while($result=mysqli_fetch_array($res))
							{
								$own=$result['matches']-$result['lost'];
								echo "<tr>
										<td class='scoreT'>".$result['name']."</td>
									  	<td class='scoreT'>".$result['matches']."</td>
									  	<td class='scoreT'>".$own."</td>
									  	<td class='scoreT'>".$result['lost']."</td>
									  	<td class='scoreT'>".$result['points']."</td>
									  </tr>";
							}
							echo "</table>";
						?>
					</div>
					<div class="flex-col" align="center">
						<h3>Pool B</h3>
						<?php
							$conn=mysqli_connect("localhost","root","","cspl3");
							$query="SELECT name,points,matches,lost from teams where pool=1 order by points DESC";
							$res=mysqli_query($conn,$query);
							echo "<table>
									<tr>
										  <th>Name</th>
										  <th>Matches</th>
										  <th>Won</th>
										  <th>Lost</th>
										  <th>Points</th>
									<tr>";
							while($result=mysqli_fetch_array($res))
							{
								$own=$result['matches']-$result['lost'];
								echo "<tr>
										<td class='scoreT'>".$result['name']."</td>
									  	<td class='scoreT'>".$result['matches']."</td>
									  	<td class='scoreT'>".$own."</td>
									  	<td class='scoreT'>".$result['lost']."</td>
									  	<td class='scoreT'>".$result['points']."</td>
									  </tr>";
							}
							echo "</table>";
						?>
					</div>
			    </div>
			</div>
		</div>
		<script>
			resize();
			var x=0,n=2,o=1,prev=1;
			function slide()
			{
				$("#img"+((x+1)%n+1)).fadeIn(200);
				$("#img"+((x+n)%n+1)).fadeOut(100);
				x++;
			}
			function show()
			{
				$("#greet").fadeOut(200);
				$("#body").fadeIn(200);
			}
			setTimeout(function() {show();},1000);
			//setInterval(slide, 4000);
		</script>
	</div>
	</body>
</html>