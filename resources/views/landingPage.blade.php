<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Our School</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        body {
            background-color: #f8f9fa;
            position: relative;
            min-height: 100vh;
            font-family: 'Poppins', sans-serif;
        }
        header {
            background-color: transparent;
            border-bottom: 2px solid #000076;
        }
        .navbar-brand {
            font-weight: bold;
            color: #000076;
            font-size: 24px;
        }
        .navbar-toggler-icon {
            background-color: #000076;
        }
        .jumbotron {
            
            background-color: white;
            padding: 2rem 1rem;
            margin-bottom: -30px;
            color: #000076;
            
            
        }
        .jumbotron-heading {
            Text-align: left;
            font-size: 5rem;
            font-family: 'Bebas Neue', sans-serif;
            font-weight: bold;
            color: #000076;
            /* padding-bottom:50px; */
        }
        .lead {
            font-size: 1.25rem;
            color: #000076;
            padding-top:25px;
        }
        .btn-primary {
            background-color: #E10000;
            border-color: #E10000;
        }
        .btn-primary:hover {
            background-color: #AB0000;
            border-color: #AB0000;
        }
        .btn-secondary {
            background-color: #000076;
            border-color: #000076;
        }
        .btn-secondary:hover {
            background-color: #00004c;
            border-color: #00004c;
        }
        .card {
            border: 1px solid rgba(0, 0, 0, 0.125);
            border-radius: 0.25rem;
            transition: box-shadow 0.3s ease-in-out;
        }
        .card:hover {
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }
        .card-body {
            padding: 2rem;
        }
        footer {
            background-color: #FCE300;
            padding: 2rem 0;
            position: absolute;
            bottom: 0;
            width: 100%;
            border-top: 2px solid #000076;
        }

        /* Additional Styling for New Sections */
        .mission-statement, .core-values, .our-community, .get-involved {
            background-color: #FFFFFF;
            padding: 40px 20px;
            margin-bottom: 30px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .mission-statement h2, .core-values h2, .our-community h2, .get-involved h2 {
            margin-bottom: 20px;
            color: #000076;
        }
        .mission-statement p, .core-values p, .our-community p, .get-involved p {
            margin-bottom: 0;
            color: #000076;
        }
        /* Adjustments for "Get Involved" section */
        .get-involved .container {
            margin-bottom: 80px; /* Increased margin for better visibility */
        }
        .get-involved img {
            max-width: 100%;
            height: auto;
            margin-bottom: 20px;
        }
        /* Core Values Icons */
        .core-values-icon {
            font-size: 2rem;
            margin-right: 10px;
            color: #000076;
        }
        .subTitle{
        font-size: 3rem;
            font-family: 'Bebas Neue', sans-serif;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="#">Cresmanage Hub</a>
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Request</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('admin/student/add') }}">Admissions</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('login') }}">Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main role="main">
        <section class="jumbotron text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <!-- Welcome Message and Details -->
                        <h1 class="jumbotron-heading">Welcome to Cresmanage Hub</h1>
                        <p class="lead text-left">Our school is committed to providing a nurturing and stimulating environment for students to thrive academically, socially, and emotionally. With a dedicated faculty and staff, state-of-the-art facilities, and a diverse range of extracurricular activities, we strive to cultivate a passion for learning and personal growth in every student.</p>
    </br>
    <div class="text-left" style="padding-bottom:50px;">
        <a href="#" class="btn btn-secondary mt-3">Learn More</a>
        <a href="#" class="btn btn-primary mt-3 mr-2">Admission</a>
    </div>
                    </div>
                    <div class="col-md-6">
                        <!-- Image -->
                        <img src="{{ url('\upload\profile\heroSection.png') }}" class="img-fluid" alt="School Image">
                    </div>
                </div>
            </div>
        </section>

        <section class="mission-statement">
            <div class="container">
                <h2 class="subTitle text-center">Mission Statement</h2>
                <p class="lead text-center">At Cresmanage Hub, we aim to empower students to become confident, compassionate, and lifelong learners who contribute positively to their communities. Through a comprehensive and innovative curriculum, we foster critical thinking, creativity, and leadership skills, preparing students for success in an ever-changing world.</p>
            </div>
        </section>
        <section class="core-values">
            <div class="container">
                <h2 class="subTitle text-center">Core Values</h2>
                <div class="row">
                    <div class="col-md-6">
                        <h4><i class="fas fa-star core-values-icon"></i> Excellence</h4>
                        <p>We uphold high standards of academic achievement and personal integrity.</p>
                        <h4><i class="fas fa-heart core-values-icon"></i> Respect</h4>
                        <p>We celebrate diversity and treat all individuals with dignity and respect.</p>
                    </div>
                    <div class="col-md-6">
                        <h4><i class="fas fa-handshake core-values-icon"></i> Collaboration</h4>
                        <p>We promote collaboration and teamwork among students, faculty, staff, and families.</p>
                        <h4><i class="fas fa-tasks core-values-icon"></i> Responsibility</h4>
                        <p>We encourage responsibility and accountability in all aspects of student life.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="our-community">
            <div class="container">
                <h2 class="subTitle text-center">Our Community</h2>
                <p class="lead text-center">Located in the heart of Cabuyao, Cresmanage Hub serves a vibrant and diverse community of students from various backgrounds and cultures. We believe that diversity enriches the educational experience and fosters a global perspective among our students.</p>
            </div>
        </section>

        <section class="get-involved">
            <div class="container">
                <h2 class="subTitle text-center">Get Involved</h2>
                <div class="row">
                    <div class="col-md-4">
                        <img src="{{ url('\upload\profile\seniorhigh.webp') }}" alt="Image 1">
                    </div>
                    <div class="col-md-4">
                    <img src="{{ url('\upload\profile\logo.webp') }}" alt="Image 3">
                        
                    </div>
                    <div class="col-md-4">
                    <img src="{{ url('\upload\profile\college.webp') }}" alt="Image 2">
                    </div>
                </div>
                <p class="lead text-center">We offer a wide range of extracurricular activities, clubs, and sports programs to engage students outside the classroom. From performing arts to STEM competitions, there's something for everyone to explore their interests and passions.</p>
            </div>
        </section>
    </main>

    <footer class="text-muted">
        <div class="container">
            <p class="float-right">
                <a href="#">Back to top</a>
            </p>
            <p>&copy; 2024 Cresmanage Hub</p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
