<?php
include("function/session.php");
include("db/dbconn.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['cart'])) {
    $customer_id = $_SESSION['id'];
    $total = $_POST['total'];
    $order_stat = 'Pending';
    $order_date = date("M d, Y");

    // Insert order into transaction table
    $conn->query("INSERT INTO `transaction` (customerid, amount, order_stat, order_date) VALUES ('$customer_id', '$total', '$order_stat', '$order_date')");

    // Check for errors
    if ($conn->errno) {
        echo "Error: " . $conn->error;
        exit; // Exit script if there's an error
    }

    $transaction_id = $conn->insert_id;

    // Insert order details and update stock
    foreach ($_SESSION['cart'] as $id => $qty) {
        $result = $conn->query("SELECT * FROM product WHERE product_id = $id");
        $product = $result->fetch_array();
        $price = $product['product_price'];

        // Insert order details
        $conn->query("INSERT INTO transaction_detail (product_id, order_qty, transaction_id) VALUES ('$id', '$qty', '$transaction_id')");

        // Update stock
        $conn->query("UPDATE stock SET qty = qty - $qty WHERE product_id = $id");

        // Check for errors
        if ($conn->errno) {
            echo "Error: " . $conn->error;
            exit; // Exit script if there's an error
        }
    }

    // Clear cart
    unset($_SESSION['cart']);

    // Redirect to confirmation page or order summary
    header("Location: summary.php?tid=$transaction_id");
    exit;
} else {
    header("Location: cart.php");
    exit;
}
?>
