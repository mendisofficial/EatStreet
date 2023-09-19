<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Name - EatStreet</title>
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
            <li class="breadcrumb-item"><a href="#">Select your restaurant</a></li>
            <li class="breadcrumb-item active" aria-current="page">Select your menu</li>
        </ol>
    </nav>

    <!-- Restaurant Information Section -->
    <section class="container my-5">
        <div class="row">
            <div class="col-md-6">
                <h2>Restaurant Name</h2>
                <p><strong>Cuisine Type:</strong> Cuisine A</p>
                <p><strong>Rating:</strong> 4.3/5</p>
                <p><strong>Address:</strong> 123 Main Street, City, State 12345</p>
                <p><strong>Phone:</strong> (123) 456-7890</p>
                <p><strong>Opening Hours:</strong> Monday-Sunday: 10:00 AM - 9:00 PM</p>
            </div>
            <div class="col-md-6">
                <img src="https://via.placeholder.com/400x300" alt="Restaurant Image" class="img-fluid">
            </div>
        </div>
    </section>

    <!-- Menu Items Section -->
    <section class="container my-5">
        <h2>Menu</h2>

        <!-- Category Filters -->
        <div class="btn-group mb-4">
            <button type="button" class="btn btn-primary active" data-category="all">All</button>
            <button type="button" class="btn btn-outline-primary" data-category="burgers">Burgers</button>
            <button type="button" class="btn btn-outline-primary" data-category="beverages">Beverages</button>
            <button type="button" class="btn btn-outline-primary" data-category="desserts">Desserts</button>
            <!-- Add more category buttons as needed -->
        </div>

        <!-- Menu Items with Categories and Images -->
        <div class="row" id="menuItems">
            <!-- Menu Item 1 -->
            <div class="col-md-4 mb-4" data-category="burgers">
                <div class="card">
                    <img src="https://via.placeholder.com/400x300" class="card-img-top" alt="Burger 1">
                    <div class="card-body">
                        <h5 class="card-title">Burger 1</h5>
                        <p class="card-text">Description of the burger.</p>
                        <p class="card-text">Price: $10.99</p>
                        <a href="#" class="btn btn-primary">Add to Cart</a>
                    </div>
                </div>
            </div>

            <!-- Menu Item 2 -->
            <div class="col-md-4 mb-4" data-category="beverages">
                <div class="card">
                    <img src="https://via.placeholder.com/400x300" class="card-img-top" alt="Beverage 1">
                    <div class="card-body">
                        <h5 class="card-title">Beverage 1</h5>
                        <p class="card-text">Description of the beverage.</p>
                        <p class="card-text">Price: $2.99</p>
                        <a href="#" class="btn btn-primary">Add to Cart</a>
                    </div>
                </div>
            </div>

            <!-- Menu Item 3 -->
            <div class="col-md-4 mb-4" data-category="desserts">
                <div class="card">
                    <img src="https://via.placeholder.com/400x300" class="card-img-top" alt="Dessert 1">
                    <div class="card-body">
                        <h5 class="card-title">Dessert 1</h5>
                        <p class="card-text">Description of the dessert.</p>
                        <p class="card-text">Price: $5.99</p>
                        <a href="#" class="btn btn-primary">Add to Cart</a>
                    </div>
                </div>
            </div>

            <!-- Add more menu items with categories and images here -->
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
