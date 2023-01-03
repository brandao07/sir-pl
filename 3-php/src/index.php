<?php
require "db/connection.php";

function debug_to_console($data): void
{
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('" . $output . "' );</script>";
}

$pdo = pdo_connect_mysql();

// ME
$stmt = $pdo->prepare('SELECT * FROM me WHERE id = 1');
$stmt->execute();
$me = $stmt->fetch(PDO::FETCH_ASSOC);

// ABOUT
$stmt = $pdo->prepare('SELECT * FROM abouts WHERE id_me = 1 AND is_deleted = 0');
$stmt->execute();
$abouts = $stmt->fetchAll(PDO::FETCH_ASSOC);

// EDUCATION
$stmt = $pdo->prepare('SELECT * from educations WHERE id_me = 1 AND is_deleted = 0');
$stmt->execute();
$educations = $stmt->fetchAll(PDO::FETCH_ASSOC);

// SKILLS
$stmt = $pdo->prepare('SELECT * from skills WHERE id_me = 1 AND is_deleted = 0');
$stmt->execute();
$skills = $stmt->fetchAll(PDO::FETCH_ASSOC);

// COURSES
$stmt = $pdo->prepare('SELECT * from certificates WHERE id_me = 1 AND is_deleted = 0');
$stmt->execute();
$certificates = $stmt->fetchAll(PDO::FETCH_ASSOC);

// SOCIAL MEDIAS
$stmt = $pdo->prepare('SELECT * from social_medias WHERE id_me = 1 AND is_deleted = 0');
$stmt->execute();
$medias = $stmt->fetchAll(PDO::FETCH_ASSOC);

// SUBMIT MESSAGE
if (!empty($_POST)) {
    $email = $_POST['email'] ?? '';
    $subject= $_POST['subject'] ?? '';
    $description = $_POST['description'] ?? '';
    $stmt = $pdo->prepare('INSERT INTO contact_requests (email, subject, description, id_me) VALUES (?, ?, ?, ?)');
    $stmt->execute([$email, $subject,$description, 1]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta
            content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"
            name="viewport"
    />
    <meta content="ie=edge" http-equiv="X-UA-Compatible"/>
    <title>Portfolio</title>
    <!-- Bootstrap CSS -->
    <link
            crossorigin="anonymous"
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"
            integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor"
            rel="stylesheet"
    />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect"/>
    <link crossorigin href="https://fonts.gstatic.com" rel="preconnect"/>
    <link
            href="https://fonts.googleapis.com/css2?family=Merriweather:wght@700&family=Montserrat:wght@400;500;600&family=Poppins:ital@1&display=swap"
            rel="stylesheet"
    />
    <!-- Font Awesome -->
    <script
            crossorigin="anonymous"
            src="https://kit.fontawesome.com/3ae97c3eed.js"
    ></script>
    <!-- Bootstrap JS -->
    <script
            crossorigin="anonymous"
            defer
            integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
    ></script>
    <!--External CSS -->
    <link href="styles.css" rel="stylesheet"/>
    <!--External JS -->
    <script src="script.js" defer></script>
</head>
<body>
<!-- Hero Section -->
<section class="dark-section">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-auto col-lg-4">
                <p class="hero-quote"><?= $me["quote"] ?></p>
            </div>
            <div class="col-auto my-auto">
                <img
                        alt=<?= $me["name"] ?>
                        class="hero-img"
                        src=<?= $me["image"]?>
                        width="250"
                />
            </div>
        </div>
    </div>
</section>
<!-- About Me Section -->
<section class="light-section">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-auto section-title">
                <h1>Hi, I'm <?= $me["name"] ?> !</h1>
            </div>
        </div>
        <div class="row">
            <?php foreach ($abouts as $a): ?>
                <div class="col-lg-4 col-sm-12">
                    <p>
                        <?= $a['description'] ?>
                    </p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<!-- Education Section -->
<section class="dark-section">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-auto section-title">
                <h1>Education</h1>
            </div>
        </div>
        <?php foreach ($educations as $e): ?>
            <div class="row">
                <div class="col-lg-10 col-sm-auto section-second-title">
                    <h5><?=$e["name"]?></h5>
                </div>
                <div class="col-auto section-second-title">
                    <h5 class="education-date"><?=$e["duration"]?></h5>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <p><?=$e["description"]?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>
<!-- Skills Section -->
<section class="light-section">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-auto section-title">
                <h1>Skills</h1>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <p>
                    <?= $me["skills_description"] ?>
                </p>
            </div>
        </div>
        <div
                class="carousel slide"
                data-bs-ride="carousel"
                id="carouselSkills"
        >
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img
                            alt="typescript"
                            class="d-block skill-img mx-auto"
                            src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/typescript/typescript-original.svg"
                    />
                </div>
                <?php foreach ($skills as $s): ?>
                    <div class="carousel-item">
                        <img
                                alt="<?= $s["name"]?>"
                                class="d-block skill-img mx-auto"
                                src="<?= $s["image"]?>"
                        />
                    </div>
                <?php endforeach; ?>
            </div>
            <button class="carousel-control-prev" data-bs-slide="prev" data-bs-target="#carouselSkills" type="button">
                <span aria-hidden="true" class="carousel-control-prev-icon"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" data-bs-slide="next" data-bs-target="#carouselSkills" type="button">
                <span aria-hidden="true" class="carousel-control-next-icon"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</section>
<!-- Languages Section -->
<section class="dark-section">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-auto section-title">
                <h1>Languages</h1>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <p>
                    <?= $me["languages_description"] ?>
                </p>
            </div>
        </div>
    </div>
</section>
<!-- Courses Section -->
<section class="light-section">
    <div class="row justify-content-center">
        <div class="col-auto section-title">
            <h1>Courses</h1>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <p>
                <?= $me["certificates_description"] ?>
            </p>
        </div>
    </div>
    <div
            class="carousel slide"
            data-bs-ride="carousel"
            id="carouselCourses"
    >
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img
                        alt="typescript-course"
                        class="d-block course-img mx-auto"
                        src="./assets/typescript-course.png"
                />
            </div>
            <?php foreach ($certificates as $c): ?>
                <div class="carousel-item">
                    <img
                            alt="<?= $c["name"]?>"
                            class="d-block skill-img mx-auto"
                            src="<?= $c["image"]?>"
                    />
                </div>
            <?php endforeach; ?>
        </div>
        <button class="carousel-control-prev" data-bs-slide="prev" data-bs-target="#carouselCourses" type="button">
            <span aria-hidden="true" class="carousel-control-prev-icon"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" data-bs-slide="next" data-bs-target="#carouselCourses" type="button">
            <span aria-hidden="true" class="carousel-control-next-icon"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>
<!-- Get In Touch Section -->
<section class="dark-section">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-auto section-title">
                <h1>Get In Touch</h1>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <p>
                    If you want to discuss cool tech, or even music you can mail me.
                    Job Offers contact me on LinkedIn.
                </p>
            </div>
        </div>
        <div class="col-12 col-md-12 col-lg-6 center-form">
            <form action="index.php" method="post">
                <div class="mb-3">
                    <label class="form-label" for="email">Email address</label>
                    <input
                            aria-describedby="emailHelp"
                            class="form-control"
                            name="email"
                            type="email"
                    />
                </div>
                <div class="mb-3">
                    <label class="form-label" for="subject">Subject</label>
                    <input class="form-control" name="subject" type="text"/>
                </div>
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea class="form-control" name="description" rows="3"></textarea>
                </div>
                <button id="form-submit" class="btn btn-primary center-button" type="submit">Submit</button>
            </form>
        </div>
    </div>
</section>
<!-- Footer Section -->
<section class="light-section">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <?php foreach ($medias as $m): ?>
                <div class="col-auto">
                    <a
                            class="footer-link"
                            href="<?=$m["url"]?>"
                            target="_blank"
                    ><?=$m["name"]?></a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
</body>
</html>