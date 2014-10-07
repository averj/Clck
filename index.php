<!DOCTYPE HTML>
<html lang="en">
	<head>
		<title>Clck</title>
		<link href="public/css/style.css" rel="stylesheet">
	</head>
	<body>
		<div class="click-animation"></div>
		<p class="total">clicks: <span id="click-count">0</span></p>
		<p class="time">time: <span id="click-time">30</span></p>
		<div class="click-circle"></div>
		<ul class="stats">
			<li>Top Scores</li>
			<?php
			$conn = new PDO('mysql:host=localhost;dbname=avej', 'root', 'Jhajhajha1!?1', array(PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
			$count = 1;
			foreach($conn->query("SELECT * FROM `clck_logs` ORDER BY `clicks` DESC LIMIT 5")->fetchAll() as $stat) {
				echo '<li>' . $count++ . '. ' . $stat['clicks'] . '</li>';
			}
			?>
		</ul>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script src="public/js/script.js"></script>
	</body>
</html>