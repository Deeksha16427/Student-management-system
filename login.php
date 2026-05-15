<?php
session_start();

$loginMessage = "";
if(isset($_SESSION['loginMessage'])){
    $loginMessage = $_SESSION['loginMessage'];
    unset($_SESSION['loginMessage']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login form</title>
    <!-- Bootstrap -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
   <!-- Font Awesome -->
   <link rel="stylesheet" href="public/font-awesome/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="login.css">

</head>
<body>
     <nav>
        <label class="logo"><img class="" src="public/images/logo.png">Student Portal</label>
        <!-- HAMBURGER -->
    <div class="menu-toggle" id="menu-toggle">
        ☰
    </div>
        <ul id="nav-links" class="mt-2">
            <li><a href="index.php">Home</a></li>
            <li><a href="">Contact</a></li>
            <li><a href="">Admission</a></li>
            <li><a href="login.php" class="btn p-2"><i class="fa fa-user-o" aria-hidden="true"></i></i>&nbsp;Login</a></li>
        </ul>
    </nav>
    
    <!-- Login Form -->
    <div class="login-container">

    <h3 class="login-title">Login</h3>
    <h4>
       <?php if(!empty($loginMessage)) { ?>
    <div style="background:#fee2e2; color:#b91c1c; padding:8px; border-radius:6px; font-size:14px; text-align:center; margin-bottom:10px;">
        <?php echo $loginMessage; ?>
    </div>
<?php } ?>
    </h4>

    <form action="login_check.php" method="post">

        <div class="mb-3">
            <input type="email" name="email" class="form-control" placeholder="Email Address" required>
        </div>

        <div class="mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password" required>
        </div>

        <button type="submit" class="login-btn">
            <i class="fa fa-sign-in"></i> Login
        </button>

    </form>
     <div class="extra">
        <p>Don't have an account? <a href="index.php">Register</a></p>
    </div>
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
<script>

const menuToggle = document.getElementById("menu-toggle");
const navLinks = document.getElementById("nav-links");

menuToggle.addEventListener("click", () => {
    navLinks.classList.toggle("active");
});

</script>

</body>
</html>