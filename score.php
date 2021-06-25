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
				object-fit: contain;
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
	  	color: white;
	  }
			.team
			{
				width: 350px;
				font-size: 15px;
				background-color: orange;
				border-radius: 20px;
				padding:10px;
				margin:10px 0;
			}
			.cord{
				padding: 40px;
			    display: inline-block;
			    vertical-align: middle;
			    width: 500px;
			    height: auto;
			    align-items: center;
			    background-color: rgba(0,0,0,0.7);
				border-radius: 10px;
				box-shadow: 0 0 10px 10px rgba(255,255,255,0.3);
			    margin: 30px;
			    color: white;
			}
			td
			{
				width: 150px;
			}
			table,td,th
			{
				font-size: 15px;
				padding: 10px;
				border-bottom:1px solid white;
				border-collapse: collapse;
			}
            #logo
			  {
			    position: fixed;
			    top:1%;
			    left: 2%;
			    width: 100px;
			    height: auto;
			  }
</style>
</head>
<body>
	<div id="header">
            <a href="index.php"><img src="logo.png" id="logo"></a>  
			<a class="link" href="index.php">Home</a>
			<a class="link" href="index.php">Pools</a>
			<a class="link" href="index.php">Points Table</a>
			<a class="link" href="matches.php">Matches</a>
			<a class="link" href="score.php">Go Live</a>
			<a class="link" href="gallery/gallery.php">Gallery</a>
			<a class="link" href="gallery/gallery.php?season=2">CSPL 2.0 Gallery</a>
	</div>
	<br><br><br>
	<div id="pool" align="center"><br>
        <h2 id="title" style="background-color: coral;width: 400px;padding: 10px;border-radius: 10px;"></h2><br>
        <h3 id="result"></h3>
		<div>
			<div><br><br>
				<h3>First Innings</h3>
				<div align="center" class="cord">
					<?php
						error_reporting(0);
						$conn=mysqli_connect("localhost","root","","cspl3");
						$mid=-1;
						if($_GET['mid'])
						{
							if($res=mysqli_fetch_array(mysqli_query($conn,"SELECT id from matches where id='".$_GET['mid']."' and status!=1")))
                            {
								$mid=$res[0];
                            }
						}
						else if($res=mysqli_fetch_array(mysqli_query($conn,"SELECT id from matches where status=0")))
						{
							$mid=$res[0];
						}
						if($mid!=-1)
						{
							$title=mysqli_fetch_array(mysqli_query($conn,"SELECT t1,t2,changed,status from matches where id='$mid'"));
							$res1=mysqli_fetch_array(mysqli_query($conn,"SELECT name from teams where id='".$title['t1']."'"));
							$res2=mysqli_fetch_array(mysqli_query($conn,"SELECT name from teams where id='".$title['t2']."'"));
                            echo "<script>document.getElementById('title').innerHTML=\"".$res1[0]." Vs ".$res2[0]."\"</script>";
                            if($title['status']==-1)
                            {
                                $print="Match is drawn";
                                if($title['changed']==0)
                                {
                                    $print=$res1[0]." Won on ".$res2[0];
                                }
                                else if($title['changed']==1)
                                {
                                    $print=$res2[0]." Won on ".$res1[0];
                                }
                                echo "<script>document.getElementById('result').innerHTML=\"".$print."\"</script>";
                            }
							$query="SELECT name,score,state,innings from scorecard where mid='$mid' and state='batting' and innings=1";
							$query2="SELECT name from teams where id in (select t1 from matches where id='$mid')";
							$teamName=mysqli_fetch_array(mysqli_query($conn,$query2));
                            $tscore=mysqli_fetch_array(mysqli_query($conn,"SELECT t1s from matches where id='$mid'"));
                            $wck=mysqli_fetch_array(mysqli_query($conn,"SELECT COUNT(name) from scorecard where mid='$mid' and state='batting' and innings=1"));
                            $tscore=explode(",",$tscore[0]);
							echo "<h4>".$teamName[0]."     ".$tscore[0]."/".((int)$wck[0]>2?(int)$wck[0]-2:0)."  (".((int)($tscore[1]/6)).".".((int)$tscore[1]%6).")</h4><br>";
							$res=mysqli_query($conn,$query);
							echo "<table>
									<tr>
										  <th>Name</th>
										  <th>Score</th>
										  <th>Balls</th>
										  <th>4's</th>
										  <th>6's</th>
										  <th>SR</th>
									<tr>";
							while($result=mysqli_fetch_array($res))
							{
								$split=explode(",",$result['score']);
								$score=$split[0];
								$balls=$split[1];
								$fours=$split[2];
								$sixes=$split[3];
								$sr=number_format(((float)$score/(float)$balls)*100,2,'.','');
								echo "<tr>
										<td>".$result['name']."</td>
									  	<td>".$score."</td>
									  	<td>".$balls."</td>
									  	<td>".$fours."</td>
									  	<td>".$sixes."</td>
									  	<td>".$sr."</td>
									  </tr>";
							}
							echo "</table>
					</div>
					<div align='center' class='cord'>";
							$conn=mysqli_connect("localhost","root","","cspl3");
							$query="SELECT name,score,state,innings from scorecard where mid='$mid' and state='bowling' and innings=1";
							$query2="SELECT name from teams where id in (select t2 from matches where id='$mid')";
							$teamName=mysqli_fetch_array(mysqli_query($conn,$query2));
							echo "<h4>".$teamName[0]."</h4><br>";
							$res=mysqli_query($conn,$query);
							echo "<table>
									<tr>
										  <th>Name</th>
										  <th>Runs</th>
										  <th>Overs</th>
										  <th>Wickets</th>
									<tr>";
							while($result=mysqli_fetch_array($res))
							{
								$split=explode(",",$result['score']);
								$runs=$split[0];
								$overs=$split[1];
								$wickets=$split[2];
								echo "<tr>
										<td>".$result['name']."</td>
									  	<td>".$runs."</td>
									  	<td>".((int)($overs/6)).".".((int)$overs%6)."</td>
									  	<td>".$wickets."</td>
									  </tr>";
							}
							echo "</table>
					</div>
				</div>
			</div>
			<div>
					<h3>Second Innings</h3>
					<div align='center' class='cord'>";
							$conn=mysqli_connect("localhost","root","","cspl3");
							$query="SELECT name,score,state,innings from scorecard where mid='$mid' and state='batting' and innings=2";
							$query2="SELECT name from teams where id in (select t2 from matches where id='$mid')";
							$teamName=mysqli_fetch_array(mysqli_query($conn,$query2));
							$tscore=mysqli_fetch_array(mysqli_query($conn,"SELECT t2s from matches where id='$mid'"));
                            $wck=mysqli_fetch_array(mysqli_query($conn,"SELECT COUNT(name) from scorecard where mid='$mid' and state='batting' and innings=2"));
                            $tscore=explode(",",$tscore[0]);
							echo "<h4>".$teamName[0]."     ".$tscore[0]."/".((int)$wck[0]>2?(int)$wck[0]-2:0)."  (".((int)($tscore[1]/6)).".".((int)$tscore[1]%6).")</h4><br>";
							$res=mysqli_query($conn,$query);
							echo "<table>
									<tr>
										  <th>Name</th>
										  <th>Score</th>
										  <th>Balls</th>
										  <th>4's</th>
										  <th>6's</th>
										  <th>SR</th>
									<tr>";
							while($result=mysqli_fetch_array($res))
							{
								$split=explode(",",$result['score']);
								$score=$split[0];
								$balls=$split[1];
								$fours=$split[2];
								$sixes=$split[3];
								$sr=number_format(((float)$score/(float)$balls)*100,2,'.','');
								echo "<tr>
										<td>".$result['name']."</td>
									  	<td>".$score."</td>
									  	<td>".$balls."</td>
									  	<td>".$fours."</td>
									  	<td>".$sixes."</td>
									  	<td>".$sr."</td>
									  </tr>";
							}
							echo "</table>
					</div>
					<div align='center' class='cord'>";
							$conn=mysqli_connect("localhost","root","","cspl3");
							$query="SELECT name,score,state,innings from scorecard where mid='$mid' and state='bowling' and innings=2";
							$query2="SELECT name from teams where id in (select t1 from matches where id='$mid')";
							$teamName=mysqli_fetch_array(mysqli_query($conn,$query2));
							echo "<h4>".$teamName[0]."</h4><br>";
							$res=mysqli_query($conn,$query);
							echo "<table>
									<tr>
										  <th>Name</th>
										  <th>Runs</th>
										  <th>Overs</th>
										  <th>Wickets</th>
									<tr>";
							while($result=mysqli_fetch_array($res))
							{
								$split=explode(",",$result['score']);
								$runs=$split[0];
								$overs=$split[1];
								$wickets=$split[2];
								echo "<tr>
										<td>".$result['name']."</td>
									  	<td>".$runs."</td>
									  	<td>".((int)($overs/6)).".".((int)$overs%6)."</td>
									  	<td>".$wickets."</td>
									  </tr>";
							}
							echo "</table>";
						}
						else
                        {
							echo "<p>Selected match scorecard isn't available</p><br>";
							if($_GET['mid'])
								echo "<h3><a href='score.php'>Go Live</a></h3>";
                        }
					?>
				</div>
			</div>
		</div>
	</div>
</body>
</html>