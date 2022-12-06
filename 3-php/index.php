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
                <p class="hero-quote">Put a little light in your day</p>
            </div>
            <div class="col-auto my-auto">
                <img
                        alt="andre"
                        class="hero-img"
                        src="./assets/me.jpeg"
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
                <h1>Hi, I'm André !</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-sm-12">
                <p>
                    Computer Science Bachelor Finalist on IPVC-ESTG. I'm thinking
                    about taking my Master's Degree at Universidade do Minho in Braga.
                    Right now I'm mostly learning the Go language, and I'm loving it
                    so far!
                </p>
            </div>
            <div class="col-lg-4 col-sm-12">
                <p>
                    Ever since I was little, I had this huge passion for technology
                    and solving things which may seem complicated to others, thus why
                    I chose this field.
                </p>
            </div>
            <div class="col-lg-4 col-sm-12">
                <p>
                    I find myself in music, it helps me with all my emotions through
                    the good and hard times. It gives me the creativity and the
                    motivation that I need.
                </p>
            </div>
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
                    I'm a self-improvement enthusiast, I love exploring things by
                    myself and learn beautiful tech. On my free time I usually try to
                    improve or get comfortable with a specific technology. Knowledge
                    is power. I also am a good team-member, although I think it
                    depends mostly on whom I'm working with. Personally I think I'm
                    more into working on the backend side, styling and making things
                    pretty were never my thing. Although I love making clean code!
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
I speak native portuguese, but I'm also well fluent in english.
                    Usually all the work I do, I write it in english because I think
                    communication is key.
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
                In my extra time I love to explore and improve my skills. Courses
                give me a beginner boost to start building my knowledge around that
                tool.
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
                >
                    <i class="fa-brands fa-lastfm footer-icon"></i>
                </a>
            </div>
            <div class="col-auto">
                <a
                        class="footer-link"
                        href="https://github.com/brandao07"
                        target="_blank"
                >
                    <i class="fa-brands fa-github footer-icon"></i>
                </a>
            </div>
            <div class="col-auto">
                <a
                        class="footer-link"
                        href="https://www.linkedin.com/in/andre-brandao07/"
                        target="_blank"
                >
                    <i class="fa-brands fa-linkedin footer-icon"></i>
                </a>
            </div>
            <div class="col-auto">
                <a
                        class="footer-link"
                        href="https://www.instagram.com/brandao_237/"
                        target="_blank"
                >
                    <i class="fa-brands fa-instagram footer-icon"></i>
                </a>
            </div>
            <div class="col-auto">
                <a
                        class="footer-link"
                        href="https://twitter.com/brandao_237"
                        target="_blank"
                >
                    <i class="fa-brands fa-twitter footer-icon"></i>
                </a>
            </div>
        </div>
    </div>
</section>
</body>
</html>