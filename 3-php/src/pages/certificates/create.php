<?php
require "../../utils/functions.php";
require "../../db/connection.php";

$pdo = pdo_connect_mysql();
$msg = '';
if (!empty($_POST)) {
    $target_dir = "../../assets/";
    $target_file = $target_dir . $_FILES["image"]["name"];
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
    } else {
        $uploadOk = 0;
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    $bd_upload = "3-php/src/assets/";
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $name = $_POST['name'] ?? '';
            $stmt = $pdo->prepare('INSERT INTO certificates (image, name, id_me) VALUES (?, ?, ?)');
            $stmt->execute([$bd_upload.$_FILES["image"]["name"], $name, 1]);
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>

<?=template_header('Create')?>

    <div class="content update">
        <h2>Create certificate</h2>
        <form action="create.php" method="post" enctype="multipart/form-data">
            <label for="name">Name</label>
            <input type="text" name="name" placeholder="Twitter" id="name">
            <br>
            <label for="image">Image</label>
            <input type="file" name="image" id="image">
            <br>
            <br>
            <input type="submit" value="Create">
        </form>
        <?php if ($msg): ?>
            <p><?=$msg?></p>
        <?php endif; ?>
    </div>

<?=template_footer()?>