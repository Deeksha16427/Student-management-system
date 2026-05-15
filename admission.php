
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admission Form</title>

<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"> -->
 <!-- Bootstrap -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
   <!-- Font Awesome -->
   <link rel="stylesheet" href="public/font-awesome/font-awesome/css/font-awesome.min.css">
   <link rel="stylesheet" href="admission.css">
</head>
<body>
     <nav>
        <label class="logo"><img class="" src="public/images/logo.png">Student Portal</label>
        <div class="hamburger" onclick="toggleNav()">☰</div>
        <ul class="mt-2" id="navLinks">
            <li><a href="">Home</a></li>
            <li><a href="">Contact</a></li>
            <li><a href="">Admission</a></li>
            <li><a href="" class="btn p-2"><i class="fa fa-user-o" aria-hidden="true"></i></i>&nbsp;Login</a></li>
        </ul>
    </nav>

<div class="form-container">

    <h2 class="form-title">Student Admission Form</h2>

    <form action="admission_process.php" method="post" enctype="multipart/form-data">

        <!-- PERSONAL DETAILS -->
        <h5 class="section-title">Personal Details</h5>
        <div class="row">
            <div class="col-md-6">
                <input type="text" name="name" class="form-control mb-3" placeholder="Full Name" required>
            </div>
            <div class="col-md-6">
                <input type="date" name="dob" class="form-control mb-3" required>
            </div>
            <div class="col-md-6">
                <select class="form-control mb-3" name="gender">
                    <option>Gender</option>
                    <option>Male</option>
                    <option>Female</option>
                </select>
            </div>
            <div class="col-md-6">
                <input type="text" name="aadhaar" class="form-control mb-3" placeholder="Aadhaar Number">
            </div>
        </div>

        <!-- FAMILY DETAILS -->
        <h5 class="section-title">Family Details</h5>
        <div class="row">
            <div class="col-md-6">
                <input type="text" name="father" class="form-control mb-3" placeholder="Father Name">
            </div>
            <div class="col-md-6">
                <input type="text" name="mother" class="form-control mb-3" placeholder="Mother Name">
            </div>
        </div>

        <!-- CONTACT DETAILS -->
        <h5 class="section-title">Contact Details</h5>
        <div class="row">
            <div class="col-md-6">
                <input type="email" name="email" class="form-control mb-3" placeholder="Email">
            </div>
            <div class="col-md-6">
                <input type="text" name="phone" class="form-control mb-3" placeholder="Phone Number">
            </div>
            <div class="col-12">
                <textarea class="form-control mb-3" name="address" placeholder="Full Address"></textarea>
            </div>
        </div>

        <!-- ACADEMIC DETAILS -->
        <h5 class="section-title">Academic Details</h5>
        <div class="row">
            <div class="col-md-6">
                <input type="text" name="school" class="form-control mb-3" placeholder="Last School/College">
            </div>
            <div class="col-md-6">
                <input type="text" name="percentage" class="form-control mb-3" placeholder="Percentage / CGPA">
            </div>
            <div class="col-md-6">
                <select class="form-control mb-3" name="course">
                    <option>Select Course</option>
                    <option>BCA</option>
                    <option>BBA</option>
                    <option>B.Tech</option>
                    <option>MCA</option>
                    <option>Bcom</option>
                    <option>MBA</option>
                </select>
            </div>
            <div class="col-md-6">
                <select class="form-control mb-3" name="year">
                    <option>Year</option>
                    <option>1st Year</option>
                    <option>2nd Year</option>
                    <option>3rd Year</option>
                    <option>4th Year</option>
                </select>
            </div>
        </div>

        <!-- DOCUMENT UPLOAD -->
        <h5 class="section-title">Documents</h5>
        <input type="file" name="photo" class="form-control mb-3">

        <!-- SUBMIT -->
        <button type="submit" class="submit-btn btn-center">Submit</button>

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