<?php
session_start();
require_once 'connection/connect.php';

// Check if the user is logged in
if (!isset($_SESSION['user'])) {
    header('Location: login.php'); // Redirect to login page if not logged in
    exit;
}

$user_id = $_SESSION['user']['user_id'];

$cart_query = "SELECT c.cart_id, m.name, m.price, c.quantity FROM cart c INNER JOIN menu m ON c.menu_id = m.menu_id WHERE c.user_id = $user_id";
$cart_result = mysqli_query($conn, $cart_query);

// Calculate the total price of items in the cart
$total_price = 0;
while ($cart_item = mysqli_fetch_assoc($cart_result)) {
    $total_price += ($cart_item['price'] * $cart_item['quantity']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart - EatStreet</title>
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
            <li class="breadcrumb-item active">Cart</li>
        </ol>
    </nav>

    <!-- Cart Section -->
    <section class="container my-5">
    <div class="cart-container">
    <h2>Your Cart</h2>
    <?php if (mysqli_num_rows($cart_result) > 0) : ?>
        <table class="cart-table">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Restaurants</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Remove</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $cart_result = mysqli_query($conn, $cart_query);

                if (!$cart_result) {
                    echo "Error fetching cart items. Please try again.";
                }

                while ($cart_item = mysqli_fetch_assoc($cart_result)) : ?>
                    <tr>
                        <td><?php echo isset($cart_item['name']) ? $cart_item['name'] : ''; ?></td>
                        <td>Restaurant</td>
                        <td>$<?php echo isset($cart_item['price']) ? number_format($cart_item['price'], 2) : ''; ?></td>
                        <td>
                            <input type="number" value="<?php echo isset($cart_item['quantity']) ? $cart_item['quantity'] : ''; ?>" min="1">
                        </td>
                        <td>
                            $<?php echo isset($cart_item['price'], $cart_item['quantity']) ? number_format($cart_item['price'] * $cart_item['quantity'], 2) : ''; ?>
                        </td>
                        <td>
                            <button class="remove-button" onclick="removeFromCart(<?php echo isset($cart_item['cart_id']) ? $cart_item['cart_id'] : ''; ?>)">Remove</button>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <div class="cart-summary">
            <p>Total: <span id="cart-total">$<?php echo number_format($total_price, 2); ?></span></p>
            <a class="btn btn-primary">Proceed to Checkout</a>
        </div>
    <?php else : ?>
        <p>Your cart is empty.</p>
    <?php endif; ?>
</div>
    </section>

    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>

    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
    <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
</body>
</html>