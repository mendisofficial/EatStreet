<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - EatStreet</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <!-- Header -->
    <header class="bg-dark text-white py-3">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-3">
                    <h1 class="mb-0"><a href="#" class="text-white">EatStreet</a></h1>
                </div>
                <div class="col-md-6">
                    <form class="search-form">
                        <div class="input-group">
                            <input type="text" class="form-control" id="cityInput" placeholder="Enter your city">
                            <div class="input-group-append">
                                <button class="btn btn-primary" id="searchButton">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-3 text-right">
                    <ul class="list-inline">
                        <li class="list-inline-item"><a href="#" class="text-white">Login</a></li>
                        <li class="list-inline-item"><a href="#" class="text-white">Register</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

    <!-- Navigation Menu -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Breadcrumb Navigation -->
    <nav aria-label="breadcrumb" class="container my-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Signup</li>
        </ol>
    </nav>

    <!-- Signup Form Section -->
    <section class="container my-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2>Sign Up</h2>

                <form id="signupForm" method="POST" onsubmit="signup(); return false;">
                    <div class="row">
                        <!-- First Name -->
                        <div class="col-md-6 form-group">
                            <label for="firstName">First Name</label>
                            <input type="text" class="form-control" id="firstName" name="firstName" required>
                        </div>

                        <!-- Last Name -->
                        <div class="col-md-6 form-group">
                            <label for="lastName">Last Name</label>
                            <input type="text" class="form-control" id="lastName" name="lastName" required>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Email -->
                        <div class="col-md-6 form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>

                        <!-- Contact Number -->
                        <div class="col-md-6 form-group">
                            <label for="contactNumber">Contact Number</label>
                            <input type="text" class="form-control" id="contactNumber" name="contactNumber">
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>

                    <!-- Confirm Password -->
                    <div class="form-group">
                        <label for="confirmPassword">Confirm Password</label>
                        <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
                    </div>

                    <!-- Gender -->
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select class="form-control" id="user_gender" name="gender">
                        <?php
                        require_once 'connection/connect.php';
                        $sql = "SELECT * FROM `gender`";
                        $result = mysqli_query($conn, $sql);
                        $rows = mysqli_num_rows($result);

                        for($x = 0; $x < $rows; $x++){
                            $data = mysqli_fetch_assoc($result);
                            ?>
                            <option value="<?php echo $data["gender_id"]; ?>"><?php echo $data["gender_name"]; ?></option>
                            <?php
                        }
                        ?>
                        </select>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary">Sign Up</button>
                </form>
                
                <br>
                <!-- Display Error Messages -->
                <div id="errorMessage" class="alert alert-danger" style="display: none;">
                    <span id="errorMessageText"></span>
                </div>

                <!-- Display Success Message -->
                <div id="successMessage" class="alert alert-success" style="display: none;">
                    Sign up successful
                </div>

            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>Contact Us</h5>
                    <address>
                        123 Main Street<br>
                        City, State 12345<br>
                        Email: info@eatstreet.com<br>
                        Phone: (123) 456-7890
                    </address>
                </div>
                <div class="col-md-4">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Menu</a></li>
                        <li><a href="#">Categories</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Follow Us</h5>
                    <ul class="list-inline">
                        <li class="list-inline-item"><a href="#"><i class="fab fa-facebook"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>
