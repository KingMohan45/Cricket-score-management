<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
</head>
<?php
    $conn=mysqli_connect("localhost","root","","cspl3");
	if(isset($_POST['submit1']))
	{
		$players=$_POST['members'];
		if($players)
		{
			$play=explode(",",$players);
			$team=$_POST['team'];
			$pool=$_POST['pool'];
			$query="INSERT into teams(`name`,`pool`) VALUES ('$team','$pool')";
			$tid=0;
			if(mysqli_query($conn,$query))
			{
				$query="SELECT id from teams where name='$team'";
				$result=mysqli_fetch_array(mysqli_query($conn,$query));
				if($result)
				{
					$tid=$result[0];	
				}
			}
			else
			{
				echo "Error";	
			}
			$query="INSERT into `players`(`name`,`role`,`tid`) VALUES ";
			foreach ($play as $key) 
			{
				$var2=explode(":",$key);
				$query=$query."('".$var2[0]."','".$var2[1]."','".$tid."') ,";
			}
			$query=substr($query,0,strlen($query)-1);
			if(mysqli_query($conn,$query))
			{
				echo "Players inserted";
			}
			else
			{
				echo "error";
			}
		}
	}
	if(isset($_POST['submit2']))
	{
		$query="INSERT into matches(`t1`,`t1s`,`t2`,`t2s`) VALUES ('".$_POST['t1']."','0,0','".$_POST['t2']."','0,0')";
		if(mysqli_query($conn,$query))
		{
			echo "Match updated";
		}
		else "error";
	}
	if(isset($_POST['submit3']))
	{
		$who=explode(",",$_POST['who']);
		$mid=$_POST['mid'];
		$res=mysqli_fetch_array(mysqli_query($conn,"SELECT t1,t2 from matches where id='$mid'"));
		$query=0;
		if($who[0]!=$res[0])
		{
			$query="UPDATE matches set status=0,t1='".$who[0]."',t2='".$who[1]."' where id='$mid'";
		}
		else
			$query="UPDATE matches set status=0 where id='$mid'";
		mysqli_query($conn,$query);
	}
	if(isset($_POST['submit4']))
	{
		$mid=$_POST['mid'];
		$query="DELETE from matches where id='$mid'";
		mysqli_query($conn,$query);
	}
	if(isset($_POST['submit5']))
	{
		$mid=$_POST['mid'];
		$update=explode(",",$_POST['result']);
		$res=mysqli_fetch_array(mysqli_query($conn,"SELECT t1,t2 from matches where id='$mid'"));
		$query="";
		if($update[0]!=$res[0])
		{
			$res=mysqli_fetch_array(mysqli_query($conn,"SELECT matches,lost from teams where id='".$update[1]."'"));
			$update2=explode(",",$res[0]);
			$update2[0]=(int)$update2[0]+1;
            if(sizeof($update)==2)
            {
                $update2[1]=(int)$update2[1]+1;
            }
			else if(!mysqli_query($conn,"UPDATE teams set matches='".$update2[0]."',lost='".$update2[1]."' where id='".$update[1]."'"))
			{
				echo "error";
			}
			$res=mysqli_fetch_array(mysqli_query($conn,"SELECT matches,points from teams where id='".$update[0]."'"));
			$update2=explode(",",$res[0]);
			$update2[0]=(int)$update2[0]+1;
			if(sizeof($update)==2)
            {
                $update2[1]=(int)$update2[1]+2;
            }
			else if(!mysqli_query($conn,"UPDATE teams set matches='".$update2[0]."',points='".$update2[1]."' where id='".$update[0]."'"))
			{
				echo "error";
			}
			$query="UPDATE matches set status=-1,changed=".(sizeof($update)==2?1:-1)." where id='$mid'";
		}
		else
		{
			$query="UPDATE matches set status=-1,changed=".(sizeof($update)==2?0:-1)." where id='$mid'";	
		}
		mysqli_query($conn,$query);
		if(!mysqli_query($conn,$query))
		{
			echo "error";
		}
	}
	if(isset($_POST['submit6']))
	{
		$ini=$_POST['ini'];
        $ts=$ini==1?"t1s":"t2s";
		$action=$_POST['action'];
		$mtid=explode(",",$_POST['mtid']);
		$mid=$mtid[0];
		$tid=$mtid[1];
		$name=$mtid[2];
		$pid=$mtid[3];
		$performed=$_POST['performed'];
		$query="SELECT score FROM `scorecard` WHERE mid='$mid' and tid='$tid' and pid='$pid' and state='$action'";
		if($result=mysqli_fetch_array(mysqli_query($conn,$query)))
		{
			$old=explode(",",$result[0]);
			$new=explode(",",$performed);
			$update="";
			if(sizeof($new)==3)
			{
				for($i=0;$i<3;$i++)
				{
					$update=$update.((float)$old[$i]+(float)$new[$i]).",";
				}
			}
			else
			{
				$update="".((int)$old[0]+$new[0]).",".((int)$old[1]+$new[1]);
                $query=mysqli_fetch_array(mysqli_query($conn,"SELECT `$ts` from matches where id='$mid'"));
                $olds=explode(",",$query[0]);
                echo (((int)$olds[0]+$new[0]).",".((int)$olds[1]+$new[1])).$query[0];
                $query="UPDATE matches set $ts=\"".(((int)$olds[0]+$new[0]).",".((int)$olds[1]+$new[1]))."\" where id='$mid'";
                echo $query;
                if(!mysqli_query($conn,$query))
                {
                    echo "Error";
                }
				if($new[0]==4 and $new[1]==1)
				{
					$update=$update.",".((int)$old[2]+1).",".$old[3];
				}
				else if($new[0]==6 and $new[1]==1)
				{
					$update=$update.",".$old[2].",".((int)$old[3]+1);
				}
				else
				{
					$update=$update.",".$old[2].",".$old[3];
				}
			}
			$query="UPDATE scorecard set score='$update' where mid='$mid' and tid='$tid' and pid='$pid' and state='$action'";
			if(mysqli_query($conn,$query))
			{
				echo "Updated";
			}
		}
		else
		{
			$per2=explode(":",$performed);
			foreach ($per2 as $score) 
			{
				$per=explode(",",$score);
				if(sizeof($per)!=3)
				{
	                $query="UPDATE matches set $ts='".$score."' where id='$mid'";
	                if(!mysqli_query($conn,$query))
	                {
	                    echo $query."waergfew".$conn->error;
	                }
					if($per[0]==4 and $per[1]==1)
					{
						$score=$score.",1,0";
					}
					else if($per[0]==6 and $per[1]==1)
					{
						$score=$score.",0,1";
					}
					else
					{
						$score=$score.",0,0";
					}
				}
				$query="INSERT into scorecard(mid,tid,pid,name,score,state,innings) VALUES ('$mid','$tid','$pid','$name','$score','$action','$ini')";
				mysqli_query($conn,$query);
			}
		}
	}
	$image=$_FILES['image']['name'];
	if(isset($_FILES['image']['name']))
	{
		$targetfile='../gallery/images/'.$_FILES['image']['name'];
		if(!move_uploaded_file($_FILES['image']['tmp_name'],$targetfile))
		{
			echo "Error";
		}
		else
		{
			
			$season=$_POST['season'];
			$sql = "INSERT INTO gallery(image,season) VALUES ('$image','$season')";
			if (mysqli_query($conn,$sql))
			{
				echo "Uploaded";
			}
			else{
				echo "error";
			}
		}
	}
?>
<body>
	<h3>Team</h3>
	<form method="POST">
		<input type="text" name="team" placeholder="Team name">
		<select name="pool">
			<option>--SELECT--</option>
			<option value="0">Pool-A</option>
			<option value="1">Pool-B</option>
		</select>
		<input type="" name="members" placeholder="Team">
		<input type="submit" name="submit1">
		<p>Ex. Player1:Role,Player2:role...</p>
		<p>Roles::Bowler-1,Batsmen-2,All-rounder-3,Wicket-keeper and Batsmen-4</p>
	</form>
	<h3>Match</h3>
	<form method="POST">
		<select name="t1">
			<option>--Select--</option>
			<?php
			$conn=mysqli_connect("localhost","root","","cspl3");
			$query="SELECT name,id from teams where 1";
			$res=mysqli_query($conn,$query);
			while($result=mysqli_fetch_array($res))
			{
				echo "<option value='".$result['id']."'>".$result['name']."</option>";
			}
			echo "error";
			?>
		</select>
		<select name="t2">
			<option>--Select--</option>
			<?php
				$conn=mysqli_connect("localhost","root","","cspl3");
				$query="SELECT name,id from teams where 1";
				$res=mysqli_query($conn,$query);
				while($result=mysqli_fetch_array($res))
				{
					echo "<option value='".$result['id']."'>".$result['name']."</option>";
				}
			?>
		</select>
		<input type="submit" name="submit2">
	</form>
	<p>Match status</p>
	<h3>::Start Match::</h3>
		<form method="POST">
			<select name="mid">
				<option value="-1">--Select--</option>
				<?php
					$conn=mysqli_connect("localhost","root","","cspl3");
					$query="SELECT id,t1,t2 from matches where status=1";
					$res=mysqli_query($conn,$query);
					while($result=mysqli_fetch_array($res))
					{
						$var=$result[1];
						$var2=$result[2];
						$query="SELECT `name` from `teams` where `id`='".$var."'";
						$res2=mysqli_fetch_array(mysqli_query($conn,$query));
						$query=$query="SELECT `name` from `teams` where `id`='".$var2."'";
						$res3=mysqli_fetch_array(mysqli_query($conn,$query));
						echo "<option value='".$result['id']."'>".$var.".".$res2['name']." Vs ".$var2.".".$res3['name']."</option>";
					}
					echo "error";
				?>
			</select>
			<input type="text" name="who">
			<input type="submit" name="submit3">
			<p>Ex.1,2 means 1 bats first</p>
		</form>
	<h3>::Delete Match::</h3>
		<form method="POST">
			<select name="mid">
				<option value="-1">--Select--</option>
				<?php
					$conn=mysqli_connect("localhost","root","","cspl3");
					$query="SELECT id,t1,t2 from matches where status!=-1";
					$res=mysqli_query($conn,$query);
					while($result=mysqli_fetch_array($res))
					{
						$var=$result[1];
						$var2=$result[2];
						$query="SELECT `name` from `teams` where `id`='".$var."'";
						$res2=mysqli_fetch_array(mysqli_query($conn,$query));
						$query=$query="SELECT `name` from `teams` where `id`='".$var2."'";
						$res3=mysqli_fetch_array(mysqli_query($conn,$query));
						echo "<option value='".$result['id']."'>".$var.".".$res2['name']." Vs ".$var2.".".$res3['name']."</option>";
					}
					echo "error";
				?>
			</select>
			<select name="change">
				<option>--Select--</option>
				<option value="-1">Delete match</option>
			</select>
			<input type="submit" name="submit4">
		</form>
	<h3>::End Match::</h3>
		<form method="POST">
			<select name="mid">
				<option value="-1">--Select--</option>
				<?php
					$conn=mysqli_connect("localhost","root","","cspl3");
					$query="SELECT id,t1,t2 from matches where status=0";
					$res=mysqli_query($conn,$query);
					while($result=mysqli_fetch_array($res))
					{
						$var=$result[1];
						$var2=$result[2];
						$query="SELECT `name` from `teams` where `id`='".$var."'";
						$res2=mysqli_fetch_array(mysqli_query($conn,$query));
						$query=$query="SELECT `name` from `teams` where `id`='".$var2."'";
						$res3=mysqli_fetch_array(mysqli_query($conn,$query));
						echo "<option value='".$result['id']."'>".$var.".".$res2['name']." Vs ".$var2.".".$res3['name']."</option>";
					}
					echo "error";
				?>
			</select>
			<input type="text" name="result" placeholder="Enter match result">
			<input type="submit" name="submit5">
			<p>Match result ex.:team-id1,team-id2 means 1 own on 2</p>
		</form>
		<h3>Update score</h3>
		<form method="POST">
			<select name="mtid">
				<option value="-1">--Select--</option>
				<?php
					$conn=mysqli_connect("localhost","root","","cspl3");
					$query="SELECT id,t1,t2 from matches where status=0";
					$res=mysqli_query($conn,$query);
					while($result=mysqli_fetch_array($res))
					{
						for ($i=1; $i <=2; $i++) { 
							$query="SELECT `name`,id from `players` where `tid`=".$result[$i];
							echo $query;
							$res2=mysqli_query($conn,$query);
							while($result2=mysqli_fetch_array($res2))
							{
								$query="SELECT name from teams where id='".$result[$i]."'";
								$res3=mysqli_fetch_array(mysqli_query($conn,$query));
								echo "<option value='".$result['id'].",".$result[$i].",".$result2['name'].",".$result2['id']."'>".$res3[0]."::".$result2['name']."</option>";
								//mid,tid,pid,name
							}
						}
					}
					echo "error";
				?>
			</select>
			<select name="ini">
				<option value="-1">Innings</option>
				<option value="1">1st</option>
				<option value="2">2nd</option>
			</select>
			<select name="action">
				<option value="-1">Batting/Bowling</option>
				<option value="batting">Batting</option>
				<option value="bowling">Bowling</option>
			</select>
			<input type="text" name="performed">
			<input type="submit" name="submit6">
			<p>For bowler runs,overs,wickets<br>For Batsmen runs,balls</p>
		</form>
		<h3>Upload image</h3>
		<form  method="POST" enctype="multipart/form-data" >
			<input type="file" name="image" style="max-width: 230px;">
			<select name="season">
				<option value="3">CSPL 3.0</option>
				<option value="2">CSPL 2.0</option>
			</select>
			<input type="submit" name="submit7">
		</form>
</body>
</html>
