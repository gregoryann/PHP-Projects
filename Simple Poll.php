<!DOCTYPE html>
<html>
	<head>
		<title>Simple Poll</title>
		<style type="text/css">
			.outer {
				width: 300px;
				height: 10px;
				border: 1px solid #000;
				background-color: #fff;
			}
			.inner {
				height: 10px;
				background-color: #690;
			}
		</style>
	</head>
<body>
		
		
		<?php

			// suppress error notices
			error_reporting(E_ALL & ~E_NOTICE);
            
	          // database credentials
			$db_user = 'root';
			$db_password = '';
			$db_host = 'localhost';
			$db_name = 'dw'; 
// connect to database
$db = mysqli_connect ($db_host, $db_user, $db_password, $db_name) OR die ('Could not connect to MySQL: ' . mysqli_connect_error());

	                 // has a vote occurred?
			if(isset($_POST['submit']))
			{
				$error = array();
				
				// let's make sure they voted
			 	if(empty($_POST['nextpresident']))
				{
					$error['vote'] = 'You must vote. It is part of your civic responsibility.';	
				}
				
				// if no errors
				if(sizeof($error) == 0)
					
					
					
					// insert the vote
					$sql = "INSERT INTO poll (
								vote_id, 
								vote
							) VALUES (
								null, 
								'{$_POST['nextpresident']}'
							)";
					mysqli_query($db, $sql);
				
				// how many votes for trump?
					$sql = "SELECT COUNT(*) AS numvotes FROM poll WHERE vote = 'Trump'";
					$result = mysqli_query($db, $sql);
					$row = mysqli_fetch_assoc($result);
					$numtrump = $row['numvotes'];
					
					// how many votes for bernie?
					$sql = "SELECT COUNT(*) AS numvotes FROM poll WHERE vote = 'Bernie'";
					$result = mysqli_query($db, $sql);
					$row = mysqli_fetch_assoc($result);
					$numbernie = $row['numvotes'];
					
					
					// how many votes for hillary?
					$sql = "SELECT COUNT(*) AS numvotes FROM poll WHERE vote = 'Hillary'";
					$result = mysqli_query($db, $sql);
					$row = mysqli_fetch_assoc($result);
					$numhillary = $row['numvotes'];
				
				        // display raw number of votes
					echo "<p>Trump: {$numtrump}</p>";
					echo "<p>Bernie: {$numbernie}</p>";
					echo "<p>Hillary: {$numhillary}</p>";
				
				        // get the total number of votes
					$total = $numtrump + $numbernie + $numhillary;
					
					// calculate the percentages for each candidate
					$percentagetrump = ($numtrump / $total) * 100;
					$percentagebernie = ($numbernie / $total) * 100;
					$percentagehillary = ($numhillary / $total) * 100;
				
				// display the percentages as text
					echo "<p>Trump: {$percentagetrump}%</p>";
					echo "<p>Bernie: {$percentagebernie}%</p>";
					echo "<p>Hillary: {$percentagehillary}%</p>";
					// display the percentages as bar graphs
					echo "<h1>Trump</h1>";
					echo "<div class=\"outer\">";
					echo "<div class=\"inner\" style=\"width: {$percentagetrump}%\"></div>";
					echo "</div>";
					
					echo "<h1>Bernie</h1>";
					echo "<div class=\"outer\">";
					echo "<div class=\"inner\" style=\"width: {$percentagebernie}%\"></div>";
					echo "</div>";
					
					echo "<h1>Hillary</h1>";
					echo "<div class=\"outer\">";
					echo "<div class=\"inner\" style=\"width: {$percentagehillary}%\"></div>";
					echo "</div>";	
				}	
			}
		?>
