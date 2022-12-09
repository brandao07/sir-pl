<?php

session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../../auth/login.php");
    exit;
}

function template_header($title) {
	$username  = $_SESSION["username"];

echo <<<EOT
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>My CMS</title>
		<link href="/utils/styles.css" rel="stylesheet" type="text/css">
	</head>
	<body>
    <nav class="navtop">
    	<div>
    		<h1>Hello $username</h1>
    		<a href="../messages/read.php"><i class="fas fa-address-book"></i>Messages</a>
    		<a href="../certificates/read.php"><i class="fas fa-address-book"></i>Certificates</a>
    		<a href="../skills/read.php"><i class="fas fa-address-book"></i>Skills</a>
    		<a href="../educations/read.php"><i class="fas fa-address-book"></i>Educations</a>
    		<a href="../abouts/read.php"><i class="fas fa-address-book"></i>Abouts</a>
    		<a href="../dashboard/dashboard.php"><i class="fas fa-address-book"></i>Dashboard</a>
    		<a href="../users/read.php"><i class="fas fa-address-book"></i>Users</a>
			<a href="../../auth/logout.php">Logout</a>
    	</div>
    </nav>
EOT;
}
function template_footer() {
echo <<<EOT
    </body>
</html>
EOT;
}
