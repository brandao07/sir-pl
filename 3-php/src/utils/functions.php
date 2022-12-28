<?php

session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../../auth/login.php");
    exit;
}

function template_header($title) {
	$username  = $_SESSION["username"];
    $role = $_SESSION["role"];

    echo sprintf(
    '<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>26244 - CMS</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<link href="/utils/styles.css" rel="stylesheet" type="text/css">
	</head>
	<body>
    <nav class="navtop">
    	<div>
    		<h1>Hello %s</h1>
    		%s
    		%s
    		<a href="../medias/read.php"><i class="fas fa-address-book"></i>Medias</a>
    		<a href="../certificates/read.php"><i class="fas fa-address-book"></i>Certificates</a>
    		<a href="../skills/read.php"><i class="fas fa-address-book"></i>Skills</a>
    		<a href="../educations/read.php"><i class="fas fa-address-book"></i>Educations</a>
    		<a href="../abouts/read.php"><i class="fas fa-address-book"></i>Abouts</a>
    		<a href="../dashboard/dashboard.php"><i class="fas fa-address-book"></i>Dashboard</a>
			<a href="../../auth/logout.php">Logout</a>
    	</div>
    </nav>',
    $username,
    $role == 1 ? '<a href="../messages/read.php"><i class="fas fa-address-book"></i>Messages</a>' : '',
    $role == 1 ? '<a href="../users/read.php"><i class="fas fa-address-book"></i>Users</a>' : ''
);
}
function template_footer() {
echo <<<EOT
    </body>
</html>
EOT;
}
