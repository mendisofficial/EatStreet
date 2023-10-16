<?php
session_start();
require_once '../connection/connect.php';

if (isset($_SESSION['user'])) {
    $user_id = $_SESSION['user']['user_id'];

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        // Get the cart_id from the query string
        if (isset($_GET['cart_id']) && is_numeric($_GET['cart_id'])) {
            $cart_id = mysqli_real_escape_string($conn, $_GET['cart_id']);

            // Check if the item exists in the cart for the user
            $checkCartQuery = "SELECT * FROM cart WHERE user_id = $user_id AND cart_id = $cart_id";
            $checkCartResult = mysqli_query($conn, $checkCartQuery);

            if (mysqli_num_rows($checkCartResult) > 0) {
                // If the item exists, remove it from the cart
                $deleteCartItemQuery = "DELETE FROM cart WHERE user_id = $user_id AND cart_id = $cart_id";
                if (mysqli_query($conn, $deleteCartItemQuery)) {
                    echo "Item removed from the cart.";
                } else {
                    echo "Failed to remove item from the cart.";
                }
            } else {
                echo "Item not found in the cart.";
            }
        } else {
            echo "Invalid cart_id provided.";
        }
    } else {
        echo "Invalid request method.";
    }
} else {
    echo "You need to be logged in to remove items from your cart.";
}
?>
