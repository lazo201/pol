<!DOCTYPE html>
<html>

<head>
    <title>Portfolio</title>
    <!-- css files -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.3.1/css/bulma.min.css">
    <link rel="stylesheet" type="text/css" href="profstyle.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <!-- Navbar -->
    <nav class="nav container void-background">
        <div class="nav-left">
            <a class="nav-item" href="#about">
                <span class="icon">
                    <i class="fa fa-info-circle"></i>
                </span>
            </a>
            <a class="nav-item" href="#projects">
                <span class="icon">
                    <i class="fa fa-briefcase"></i>
                </span>
            </a>
            <!-- Removed the social media buttons -->
        </div>

        <div class="nav-right nav-menu">
            <!-- ... (unchanged) ... -->
        </div>

        <span class="nav-toggle">
            <span></span>
            <span></span>
            <span></span>
        </span>
    </nav>

    <!-- Welcome Section -->
    <section class="section section-welcome">
        <div class="container has-text-centered">
            <h1 class="title is-1">Welcome to Zildjian's Profile</h1>
        </div>
    </section>

    <!-- About Me -->
    <section id="about" class="section section-1">
        <div class="container has-text-centered">
            <!-- Source: https://flic.kr/p/pAZBNK -->
            <img class="avatar" src="profile.png">
        </div>
        <div class="container"></br>
            <p class="intro">
                I'm Zildjian Lazo currently taking BSIT-MI in National University, Capable in two programming languages namely Java and python
            </p>
        </div>
    </section>

    <!-- Projects -->
    <section id="projects" class="section section-2">
        <div class="container">
            <div class="has-text-centered">
                <h3 class="title is-3">PORTFOLIO</h3>
            </div>

            <div class="columns is-multiline is-desktop">
                <!-- Project 1 -->
                <div class="column">
                    <div class="box project-text">
                        <article>
                            <div>
                                <figure class="image project-figure">
                                    <img src="project-1.jpg" alt="Image">
                                </figure>
                            </div>
                            <div>
                                <p>
                                    This project we created is a workout app that tracks your fitness progress and helps you as you move forward into a healthier lifestyle.
                                </p>
                            </div>
                        </article>
                    </div>
                </div>
                <!-- Project 2 -->
                <div class="column">
                    <div class="box project-text">
                        <article>
                            <div>
                                <figure class="image project-figure">
                                    <img src="project-2.jpg" alt="Image">
                                </figure>
                            </div>
                            <div>
                                <p>
                                    This next project is an app that gives you updates on our local basketball league, giving you fresh stats and news from the court.
                                </p>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <section class="section-4 has-text-centered container">
        <!-- No text in the footer -->
    </section>

    <!-- Comment Section -->
    <div id="comment-section">
        <h2>Leave a comment</h2>
        <form action="comment.php" method="POST">
            <label for="commenter_name">Your Name:</label><br>
            <input type="text" id="commenter_name" name="commenter_name" required><br>
            <label for="comment_text">Comment:</label><br>
            <textarea id="comment_text" name="comment_text" rows="4" required></textarea><br>
            <button type="submit">Submit</button>
        </form>
    </div>

    <!-- Logout Button -->
    <button onclick="logout()">Logout</button>

    <!-- Logout Script -->
    <script>
        function logout() {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "logout.php", true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    window.location.href = "login.php";
                }
            };
            xhr.send();
        }
    </script>

    <!-- Scripts -->
    <script src="controller.js"></script>
</body>

</html>
