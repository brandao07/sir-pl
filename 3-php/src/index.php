<?php
require "db/connection.php";

function debug_to_console($data): void
{
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}

$pdo = pdo_connect_mysql();

// ME
$stmt = $pdo->prepare('SELECT * FROM me WHERE id = 1');
$stmt->execute();
$me = $stmt->fetch(PDO::FETCH_ASSOC);

$stmt = $pdo->prepare('SELECT * FROM files WHERE id = ?');
$stmt->execute([$me["files_id"]]);
$me_image = $stmt->fetch(PDO::FETCH_ASSOC);
$me_image = $me_image["file_data"];
//FIXME: 414 (Request-URI Too Long
debug_to_console($me_image);

// ABOUT
$stmt = $pdo->prepare('SELECT * FROM abouts WHERE id_me = 1 AND is_deleted = 0');
$stmt->execute();
$abouts = $stmt->fetchAll(PDO::FETCH_ASSOC);

// EDUCATION

//
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
                        src=<?= $me_image ?>
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
        <div class="row">
            <div class="col-lg-10 col-sm-auto section-second-title">
                <h5>Polytechnic Institute of Viana do Castelo</h5>
            </div>
            <div class="col-auto section-second-title">
                <h5 class="education-date">2020-Present</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <p>Bachelor's Finalist, taking Computer Science and Engineering.</p>
                <p>
                    During my academic journey, I've found something that I truly love
                    and live for.
                </p>
                <p>
                    Backend Engineering is probably the area that I love the most.
                </p>
            </div>
        </div>
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
                <div class="carousel-item">
                    <img
                            alt="golang"
                            class="d-block skill-img mx-auto"
                            src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/go/go-original.svg"
                    />
                </div>
                <div class="carousel-item">
                    <img
                            alt="java"
                            class="d-block skill-img mx-auto"
                            src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/java/java-original-wordmark.svg"
                    />
                </div>
                <div class="carousel-item">
                    <img
                            alt="postgresql"
                            class="d-block skill-img mx-auto"
                            src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/postgresql/postgresql-plain-wordmark.svg"
                    />
                </div>
                <div class="carousel-item">
                    <img
                            alt="mongodb"
                            class="d-block skill-img mx-auto"
                            src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/mongodb/mongodb-plain-wordmark.svg"
                    />
                </div>
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
            <div class="carousel-item">
                <img
                        alt="web-bootcamp-course"
                        class="d-block course-img mx-auto"
                        src="./assets/bootcamp-course.png"
                />
            </div>
            <div class="carousel-item">
                <img
                        alt="react-graphql-course"
                        class="d-block course-img mx-auto"
                        src="./assets/graphql-react-course.png"
                />
            </div>
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
            <form>
                <div class="mb-3">
                    <label class="form-label" for="email">Email address</label>
                    <input
                            aria-describedby="emailHelp"
                            class="form-control"
                            id="email"
                            type="email"
                    />
                </div>
                <div class="mb-3">
                    <label class="form-label" for="subject">Subject</label>
                    <input class="form-control" id="subject" type="text"/>
                </div>
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea class="form-control" rows="3"></textarea>
                </div>
                <button class="btn btn-primary center-button" type="submit">
                    Submit
                </button>
            </form>
        </div>
    </div>
</section>
<!-- Footer Section -->
<section class="light-section">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-auto">
                <a
                        class="footer-link"
                        href="https://www.last.fm/user/sunkye"
                        target="_blank"
                >LastFM</a>
            </div>
            <div class="col-auto">
                <a
                        class="footer-link"
                        href="https://github.com/brandao07"
                        target="_blank"
                >GitHub</a>
            </div>
            <div class="col-auto">
                <a
                        class="footer-link"
                        href="https://www.linkedin.com/in/andre-brandao07/"
                        target="_blank"
                >LinkedIn</a>
            </div>
            <div class="col-auto">
                <a
                        class="footer-link"
                        href="https://www.instagram.com/brandao_237/"
                        target="_blank"
                >Instagram</a>
            </div>
            <div class="col-auto">
                <a
                        class="footer-link"
                        href="https://twitter.com/brandao_237"
                        target="_blank"
                >Twitter</a>
            </div>
        </div>
    </div>
</section>
</body>
</html>