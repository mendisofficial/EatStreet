<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Include your custom CSS styles here -->
</head>
<body>
    <!-- Header -->
    <?php include '../includes/header.php'; ?>

    <!-- Navigation Menu -->
    <?php include '../includes/navbar.php'; ?>

    <!-- Breadcrumb Navigation -->
    <nav aria-label="breadcrumb" class="container my-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
    </nav>

    <!-- Dashboard Sidebar -->
    <?php include '../includes/sidebar.php'; ?>

    <!-- Main Content -->
    <div class="container my-5">
        <div class="row">
            <div class="col-md-8">
                <!-- Restaurant Profile Section -->
                <h2>Restaurant Profile</h2>
                <!-- Display restaurant profile information here -->
                <!-- Provide options to edit the profile -->

                <!-- Menu Management Section -->
                <h2>Menu Management</h2>
                <!-- Display a list of menu items -->
                <!-- Provide options to add, edit, and delete menu items -->

                <!-- Additional Dashboard Widgets -->
                <!-- Add widgets such as order summary, revenue, reviews, etc. -->

            </div>
            <div class="col-md-4">
                <!-- Restaurant Info Sidebar -->
                <h2>Restaurant Info</h2>
                <!-- Display summary information about the restaurant -->

                <!-- Add more widgets or information as needed -->

            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include '../includes/footer.php'; ?>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Include your custom JavaScript here -->

</body>
</html>
