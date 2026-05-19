<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   <!-- Bootstrap -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
   <!-- Font Awesome -->
   <link rel="stylesheet" href="public/font-awesome/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav>
        <label class="logo"><img class="" src="public/images/logo.png">Student Portal</label>
        <div class="hamburger" onclick="toggleNav()">☰</div>
        <ul class="mt-2" id="navLinks">
            <li><a href="index.php">Home</a></li>
            <li><a href="">Contact</a></li>
            <li><a href="">Admission</a></li>
            <li><a href="login.php" class="btn p-2"><i class="fa fa-user-o" aria-hidden="true"></i></i>&nbsp;Login</a></li>
        </ul>
    </nav>
    <div class="section1">
        <img class="main_img" src="public/images/frontimg.png">
    </div>
    <div class="container mt-5">
        <div class="row">
        <div class="col-md-5 mt-5">
            <img src="public/images/school.png">
        </div>
        <div class="col-md-1"></div>
         <div class="about-text col-md-6 mt-2">
            <h1>About Student Portal</h1>
            <p>The Student Portal is a modern and user-friendly platform designed to simplify the process of student admission and management. It allows students to easily apply for admission by filling out online forms and submitting their details without any hassle. This system helps in reducing paperwork and ensures that all student information is stored in an organized and secure manner.

           With this platform, administrators can efficiently manage student records, review applications, and maintain important data in one centralized location. The portal improves communication, saves time, and increases overall efficiency in handling academic processes. It is a smart solution that bridges the gap between students and administration, making the entire system faster, easier, and more reliable.</p>
         </div>
       </div>
    </div>
    <div class="center mt-5">
       <h1>Our Teachers</h1>
    </div>
    <div class="container">
        <div class="row1">
            <div class="col-md-3">
                <img src="public/images/teacher4.png">
                <h5 class="mt-3">Mrs. Priya Sharma</h5>
                <p><i>Mathematics Teacher</i></p>
                <p>Expert in simplifying complex concepts and helping students build strong problem-solving skills.</p>
            </div>
            <div class="col-md-3">
                <img src="public/images/teacher1.png">
                <h5 class="mt-3">Ms. Emily Johnson</h5>
                <p><i>English Lecturer</i></p>
                <p>Focused on improving communication skills and building confidence in students.</p>
            </div>
            <div class="col-md-3">
                <img src="public/images/teacher2.png">
                <h5 class="mt-3">Mr. David Wilson</h5>
                <p><i>Science Faculty</i></p>
                <p>Passionate about teaching science with practical examples and real-life applications.</p>
            </div>
            <div class="col-md-3">
                <img src="public/images/teacher3.png">
                <h5 class="mt-3">Mr. Michael Brown</h5>
                <p><i>Computer Instructor</i></p>
                <p>Guides students in technology and programming with hands-on learning methods.</p>
            </div>
        </div>
    </div>
  <div class="center mt-4">
       <h1>Our Courses</h1>
    </div>
    <div class="container">
       <div class="row2">
         <div class="col-md-3">
            <img src="public/images/web.jpg">
            <h6>Web Developer</h6>
         </div>
         <div class="col-md-3">
            <img src="public/images/graphic_design.png">
            <h6>Graphic Design</h6>
         </div>
         <div class="col-md-3">
            <img src="public/images/digital_marketing.png">
            <h6>Digital Marketing</h6>
         </div>
       </div>
    </div>
    <div class="center mt-5">
       <h1>Registration Form</h1>
    </div>
    <div class="register_form">
       <form action="register.php" method="post" class="form-box">
        
        <input type="text" name="name" placeholder="Full Name" required>
        <input type="email" name="email" placeholder="Email Address" required>
        <input type="text" name="phone" placeholder="Phone Number" required>
        <input type="password" name="password" placeholder="Password" required>

        <button type="submit">Register</button>

    </form>
    </div>
    <footer class="footer">
    <div class="container">
        <div class="row">

            <!-- About -->
            <div class="col-md-4">
                <h4>Student Portal</h4>
                <p>
                    A smart platform for managing student admissions, records, 
                    and academic data efficiently in one place.
                </p>
            </div>

            <!-- Quick Links -->
            <div class="col-md-4">
                <h4>Quick Links</h4>
                <ul class="footer-links">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Admission</a></li>
                    <li><a href="#">Courses</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>

            <!-- Contact -->
            <div class="col-md-4">
                <h4>Contact Us</h4>
                <p><i class="fa fa-envelope"></i> Email: info@studentportal.com</p>
                <p><i class="fa fa-phone"></i> Phone: +91 98765 43210</p>
                <p><i class="fa fa-map-marker"></i> Location: India</p>
            </div>

        </div>

        <hr>

        <div class="footer-bottom">
            <p>© 2026 Student Portal | All Rights Reserved</p>
        </div>
    </div>
</footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script>
    function toggleNav(){
    document.getElementById("navLinks").classList.toggle("open");
}
</script>
</body>
</html>