<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In - EatStreet</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <!-- Include the header -->
    <?php include 'includes/header.php'; ?>

    <!-- Include the navigation menu -->
    <?php include 'includes/navbar.php'; ?>

    <!-- Breadcrumb Navigation -->
    <nav aria-label="breadcrumb" class="container my-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Sign In</li>
        </ol>
    </nav>

    <!-- Sign In Form Section -->
    <section class="container my-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2>Sign In</h2>

                <!-- Sign In Form -->
                <form id="user_signInForm" method="POST" onsubmit="signIn(event); return false;">
                    <!-- Email -->
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="user_signInEmail" name="user_signInEmail" required>
                    </div>

                    <!-- Password -->
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="user_signInPassword" name="user_signInPassword" required>
                    </div>

                    <!-- Remember Me Checkbox -->
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="user_signInRememberMe" name="user_signInRememberMe" value="1">
                        <label class="form-check-label" for="rememberMe">Remember Me</label>
                    </div>

                    <!-- Forgot Password Link -->
                    <div class="form-group">
                        <a href="forgot_password.php">Forgot Password?</a>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary">Sign In</button>
                </form>

                <br>
                <!-- Display Error Messages -->
                <div id="user_signInErrorMessage" class="alert alert-danger" style="display: none;">
                    <span id="errorMessageText"></span>
                </div>

                <!-- Display Success Message -->
                <div id="user_signInSuccessMessage" class="alert alert-success" style="display: none;">
                    Sign in successful. Redirecting...
                </div>

            </div>
        </div>
    </section>

    <!-- Include the footer -->
    <?php include 'includes/footer.php'; ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>
