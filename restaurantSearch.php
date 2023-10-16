<?php
require_once 'connection/connect.php';
session_start();

if (isset($_SESSION['user'])){
    if (isset($_GET['city'])) {
        // Get the user's input city
        $city = $_GET['city'];
    
        // Perform a database query to search for restaurants in the given city
        $sql = "SELECT * FROM restaurants WHERE city = '$city'";
        $result = mysqli_query($conn, $sql);
    
        // Check if there are any results
        if (mysqli_num_rows($result) > 0) {
            // Display restaurant listings
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Search Results - EatStreet</title>
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
                <link rel="stylesheet" href="css/styles.css">
            </head>
            <body>
                <!-- Header -->
                <?php include 'includes/header.php'; ?>
    
                <!-- Navigation Menu -->
                <?php include 'includes/navbar.php'; ?>
    
                <!-- Breadcrumb Navigation -->
                <nav aria-label="breadcrumb" class="container my-3">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Select your restaurant</li>
                    </ol>
                </nav>
    
                <!-- Search Results Section -->
                <section class="container my-5">
                    <h2>Restaurants in <?php echo $city; ?></h2>
    
                    <!-- Restaurant Listings -->
                    <div class="row">
                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                            // Display each restaurant listing
                            echo '<div class="col-md-4 mb-4">';
                            echo '<div class="card">';
                            echo '<img src="https://via.placeholder.com/200x150" class="card-img-top" alt="Restaurant Image">';
                            echo '<div class="card-body">';
                            echo '<h5 class="card-title">' . $row['name'] . '</h5>';
                            echo '<p class="card-text">Description: ' . $row['description'] . '</p>';
                            echo '<p class="card-text">Address: ' . $row['address'] . '</p>';
                            // You can display more restaurant details here
    
                            // Pass restaurant_id to menu.php as a query parameter
                        $restaurant_id = $row['restaurant_id'];
                        echo '<a href="menu.php?restaurant_id=' . $restaurant_id . '" class="btn btn-primary">View Menu</a>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                        }
                        ?>
                    </div>
                </section>
    
                <!-- Footer -->
                <?php include 'includes/footer.php'; ?>
    
                <!-- Bootstrap JS and jQuery -->
                <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
                <script src="js/script.js"></script>
            </body>
            </html>
            <?php
        } else {
            // If no restaurants were found in the city
            echo "No restaurants found in $city.";
        }
    } else {
        // If the city is not provided, you can show a message or redirect back to the homepage
        echo "Please enter a city to search for restaurants.";
        // Alternatively, you can redirect to the homepage like this:
        // header("Location: index.php");
        // exit();
    }
} else {
    echo ("You need to be logged in to add items to your cart.");
}


