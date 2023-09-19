<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EatStreet - Discover Local Restaurants</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <!-- Header -->
    <?php include 'includes/header.php'; ?>

    <!-- Navigation Menu -->
    <?php include 'includes/navbar.php'; ?>

    <!-- Introductory Content -->
    <section class="container my-5">
        <div class="row">
            <div class="col-md-6">
                <h2>Welcome to EatStreet</h2>
                <p>Discover the best local restaurants in your city. From fast food to fine dining, we've got it all covered.</p>
                <p>Explore menus, read reviews, and place your order for delivery or pickup.</p>
                <a href="#" class="btn btn-primary">Get Started</a>
            </div>
            <div class="col-md-6">
                <img src="https://picsum.photos/600/400" alt="Food Image" class="img-fluid">
            </div>
        </div>
    </section>

    <!-- Horizontal Rule -->
    <hr>

    <!-- Recently Added Restaurants Section with Pagination (Placeholder) -->
    <section class="container my-5">
        <h2>Recently Added Restaurants</h2>

        <div class="row">
            <!-- Placeholder restaurant cards for the current page -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="https://picsum.photos/200/150" class="card-img-top" alt="Restaurant 1">
                    <div class="card-body">
                        <h5 class="card-title">Restaurant Name 1</h5>
                        <p class="card-text">Cuisine Type: Cuisine 1</p>
                        <p class="card-text">Rating: 4.5/5</p>
                        <a href="#" class="btn btn-primary">View Menu</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="https://picsum.photos/200/150" class="card-img-top" alt="Restaurant 2">
                    <div class="card-body">
                        <h5 class="card-title">Restaurant Name 2</h5>
                        <p class="card-text">Cuisine Type: Cuisine 2</p>
                        <p class="card-text">Rating: 4/5</p>
                        <a href="#" class="btn btn-primary">View Menu</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="https://picsum.photos/200/150" class="card-img-top" alt="Restaurant 3">
                    <div class="card-body">
                        <h5 class="card-title">Restaurant Name 3</h5>
                        <p class="card-text">Cuisine Type: Cuisine 1</p>
                        <p class="card-text">Rating: 4.9/5</p>
                        <a href="#" class="btn btn-primary">View Menu</a>
                    </div>
                </div>
            </div>

            <!-- Add more placeholder restaurant cards for the current page here -->
        </div>

        <!-- Pagination -->
        <ul class="pagination">
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#">Next</a>
            </li>
        </ul>
    </section>

    <!-- Horizontal Rule -->
    <hr>

    <!-- Recommended Dishes Section with Pagination (Placeholder) -->
    <section class="container my-5">
        <h2>Recommended Dishes</h2>

        <div class="row">
            <!-- Placeholder cards for recommended dishes for the current page -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="https://picsum.photos/200/150" class="card-img-top" alt="Dish 1">
                    <div class="card-body">
                        <h5 class="card-title">Recommended Dish 1</h5>
                        <p class="card-text">Description of the dish.</p>
                        <p class="card-text">Price: $10.99</p>
                        <a href="#" class="btn btn-primary">Order Now</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="https://picsum.photos/200/150" class="card-img-top" alt="Dish 2">
                    <div class="card-body">
                        <h5 class="card-title">Recommended Dish 2</h5>
                        <p class="card-text">Description of the dish.</p>
                        <p class="card-text">Price: $10.99</p>
                        <a href="#" class="btn btn-primary">Order Now</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="https://picsum.photos/200/150" class="card-img-top" alt="Dish 3">
                    <div class="card-body">
                        <h5 class="card-title">Recommended Dish 2</h5>
                        <p class="card-text">Description of the dish.</p>
                        <p class="card-text">Price: $10.99</p>
                        <a href="#" class="btn btn-primary">Order Now</a>
                    </div>
                </div>
            </div>

            <!-- Add more placeholder cards for recommended dishes for the current page here -->
        </div>

        <!-- Pagination (Recommended Dishes) -->
        <ul class="pagination">
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#">Next</a>
            </li>
        </ul>
    </section>

    <!-- Horizontal Rule -->
    <hr>

    <!-- Call to Action for Restaurant Registration -->
    <section class="container my-5 text-center">
        <h2>Are you a restaurant owner?</h2>
        <p>If you own a restaurant, you can register it on EatStreet and reach more customers.</p>
        <a href="#" class="btn btn-primary">Register Your Restaurant</a>
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
