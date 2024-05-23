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
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap');

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
            background-color: #ffffff;
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
            padding-top: 25px;
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
        .mission-statement,
        .core-values,
        .our-community,
        .get-involved {
            background-color: #FFFFFF;
            padding: 40px 20px;
            margin-bottom: 30px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .mission-statement{
            background-color: #000076;
            padding: 150px 20px;
            margin-bottom: 30px;
            border: 1px solid #ddd;
            border-radius: 5px;

        }

        .mission-statement h2,.mission-statement p{

            color: #FFFFFF;
        }
        .core-values h2,
        .our-community h2,
        .get-involved h2 {
            margin-bottom: 20px;
            color: #000076;
        }

       
        .core-values p,
        .our-community p,
        .get-involved p {
            margin: 0px;

            color: #000076;
        }

       

        /* Adjustments for "Get Involved" section */
        .get-involved .container {
            margin-bottom: 80px;
            /* Increased margin for better visibility */
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
            color: #E10000;
        }

        .subTitle {
            font-size: 3rem;
            font-family: 'Bebas Neue', sans-serif;
            font-weight: bold;
        }

        /* Custom Style for Welcome Message */
        .welcome-message {
            font-family: 'Playfair Display', serif;
            padding: 0;
            margin: 0px;
            font-size: 40px;
            
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ url('\upload\profile\WITIlogo.png') }}"
                        class="img-fluid" alt="School Image" style="width: 75px; height: 75px;">
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
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
                            <a class="nav-link" href="#">Admissions</a>
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
                        <p class="lead text-left welcome-message">Welcome to Westbridge</p>


                        <h1 class="jumbotron-heading"> Institute of Technology, Inc. </h1>
                        <p class="lead text-left">Westbridge Institute of Technology Inc. (WITI) provides a quality
                            education in Cabuyao City, Laguna. The institution regularly observes an increase in
                            enrollment, which can be attributed to its well-regarded reputation, affordable tuition,
                            and dedication to offering a high standard of education that is integrated with modern
                            technology.</p>
                        </br>
                        <div class="text-left" style="padding-bottom:50px;">
                            <a href="#" class="btn btn-secondary mt-3">Learn More</a>
                            <a href="#" class="btn btn-primary mt-3 mr-2">Admission</a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <!-- Image -->
                        <img src="{{ url('\upload\profile\WITIlogo.png') }}" class="img-fluid d-none d-md-block" alt="School Image">

                    </div>
                </div>
            </div>
        </section>

        <section class="mission-statement">
            <div class="container">
                <h2 class="subTitle text-center">Mission Statement</h2>
                <p class="lead text-center">At Cresmanage Hub, we aim to empower students to become confident,
                    compassionate, and lifelong learners who contribute positively to their communities. Through a
                    comprehensive and innovative curriculum, we foster critical thinking, creativity, and leadership
                    skills, preparing students for success in an ever-changing world.</p>
            </div>
        </section>
        <section class="core-values">
    <div class="container">
        <h2 class="subTitle text-center">Core Values</h2>
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <h4 class="card-title"><i class="fas fa-star core-values-icon"></i> Quality Education</h4>
                        <p class="card-text">WITI is committed to providing a quality education that integrates modern technology.</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"><i class="fas fa-heart core-values-icon"></i> Affordability</h4>
                        <p class="card-text">We strive to make our education accessible and affordable to all students.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <h4 class="card-title"><i class="fas fa-handshake core-values-icon"></i> Community</h4>
                        <p class="card-text">At WITI, we value our community and promote collaboration among students, faculty, and staff.</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"><i class="fas fa-tasks core-values-icon"></i> Excellence</h4>
                        <p class="card-text">We uphold high standards of excellence in academics and personal development.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



        <section class="our-community">
            <div class="container">
                <h2 class="subTitle text-center">Our Community</h2>
                <p class="lead text-center">Join our vibrant community at Westbridge Institute of Technology Inc.
                    (WITI) in Cabuyao City, Laguna. Here, you'll find a welcoming environment that fosters learning and
                    growth. Our diverse student body, coupled with our commitment to excellence, ensures a rich
                    educational experience for all.</p>
            </div>
        </section>


        <section class="get-involved">
            <div class="container">
                <h2 class="subTitle text-center">Get Involved</h2>
                <div class="row">
                    <div class="col-md-4">
                        <img src="{{ url('\upload\profile\seniorhigh.png') }}" alt="Image 1">
                    </div>
                    <div class="col-md-4">
                        <img src="{{ url('\upload\profile\WITIlogo.png') }}" alt="Image 3">

                    </div>
                    <div class="col-md-4">
                        <img src="{{ url('\upload\profile\college.png') }}" alt="Image 2">
                    </div>
                </div>
                <p class="lead text-center">We offer a wide range of extracurricular activities, clubs, and sports
                    programs to engage students outside the classroom. From performing arts to STEM competitions, there's
                    something for everyone to explore their interests and passions.</p>
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
