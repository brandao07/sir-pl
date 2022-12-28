<?php
require "../../utils/functions.php";
require "../../db/connection.php";

$pdo = pdo_connect_mysql();

if ($_SESSION["role"] != 1) {
    header("location: ../dashboard/dashboard.php");
    exit;
}

$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty(trim($_POST["username"]))){
        $username_err = "Please fill username.";
    }
    elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
        $username_err = "Wrong username pattern!";
    }
    else{
        $sql = "SELECT id FROM users WHERE username = :username";

        if($stmt = $pdo->prepare($sql)){
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
            $param_username = trim($_POST["username"]);

            if($stmt->execute()){
                if($stmt->rowCount() == 1){
                    $username_err = "Username already exists!";
                }
                else{
                    $username = trim($_POST["username"]);
                }
            }
            else{
                echo "Ups! Try again please.";
            }

            unset($stmt);
        }
    }

    if(empty(trim($_POST["password"]))){
        $password_err = "Please fill password.";
    }
    elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password need to be at least 6 characters.";
    }
    else{
        $password = trim($_POST["password"]);
    }

    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please fill confirm password.";
    }
    else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Passwords mismatch!";
        }
    }

    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){

        $sql = "INSERT INTO users (name, username, password, id_roles, id_me) VALUES (:name, :username, :password, :id_roles, 1)";

        if($stmt = $pdo->prepare($sql)){
            $stmt->bindParam(":name", $param_name);
            $stmt->bindParam(":username", $param_username);
            $stmt->bindParam(":password", $param_password);
            $stmt->bindParam(":id_roles", $param_id_roles);

            $param_name = $_POST["name"];
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT);
            $param_id_roles = $_POST["id_roles"];

            if($stmt->execute()){
                header("location: read.php");
            }
            else{
                echo "Ups! Try again please.";
            }

            unset($stmt);
        }
    }

    unset($pdo);
}
?>

<?=template_header('Create')?>

    <div class="content update">
        <h2>Create user</h2>
        <form action="create.php" method="post">
            <label for="name">Name</label>
            <input type="text" name="name" placeholder="Andre" id="name">
            <br>
            <label for="username">Username</label>
            <input type="text" name="username" placeholder="brandao07" id="username">
            <br>
            <label for="password">Password</label>
            <input type="password" name="password" placeholder="" id="password">
            <br>
            <label for="confirm_password">Confirm Password</label>
            <input type="password" name="confirm_password" placeholder="" id="confirm_password">
            <br>
            <label for="id_roles">Role</label>
            <input type="text" name="id_roles" placeholder="1 - ADMIN | 2 - MANAGER" id="id_roles">
            <br>
            <br>
            <input type="submit" value="Create">
        </form>
    </div>

<?=template_footer()?>