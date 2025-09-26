<?php
// session_start();

// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     // Example: get form values (add validation as needed)
//     $name = $_POST['name'];
//     $email = $_POST['email'];
//     $address = $_POST['address'];
//     $city = $_POST['city'];
//     $zip = $_POST['zip'];
//     $paymentMethod = $_POST['payment_method'];

//     // You can now store these in session/database and redirect
//     $_SESSION['checkout'] = $_POST;

//     // For now, just simulate success
//     header("Location: thankyou.php");
//     exit;
// }
?>
<?php
include_once('components/header.php')
?>

<style>
    .checkout-form {
        /* width: 500px; */
        margin: 40px auto;
        background: white;
        padding: 30px;
        border-radius: 6px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    h2 {
        text-align: center;
        margin-bottom: 20px;
    }

    label {
        font-weight: bold;
        /* display: block; */
        margin-top: 15px;
    }

    input[type="text"],
    input[type="email"],
    select {
        width: 100%;
        padding: 10px;
        margin-top: 6px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .payment-methods {
        margin-top: 10px;
    }

    .payment-methods label {
        font-weight: normal;
    }

    button {
        margin-top: 25px;
        width: 100%;
        padding: 12px;
        background-color: #006666;
        color: white;
        border: none;
        border-radius: 4px;
        font-size: 16px;
    }

    button:hover {
        background-color: #004d4d;
    }
</style>

<main>
    <!-- Breadcrumb Start -->
    <div class="breadcrumb-section">
        <div class="container-fluid custom-container">
            <div class="breadcrumb-wrapper text-center">
                <h2 class="breadcrumb-wrapper__title">Checkout</h2>
                <ul class="breadcrumb-wrapper__items justify-content-center">
                    <li><a href="index.php">Home</a></li>
                    <li><span>Checkout</span></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- FAQ’s Start -->
    <div class="faq-section section-padding-2">
        <div class="container-fluid faq-container">
            <div class="checkout-form">
                <form method="POST" action="checkout.php">
                    <label for="name">Full Name *</label>
                    <input type="text" name="name" required>

                    <label for="email">Email *</label>
                    <input type="email" name="email" required>

                    <label for="address">Shipping Address *</label>
                    <input type="text" name="address" required>

                    <label for="city">City *</label>
                    <input type="text" name="city" required>

                    <label for="zip">ZIP / Postal Code *</label>
                    <input type="text" name="zip" required>

                    <label>Payment Method *</label>
                    <div class="payment-methods">
                        <input type="radio" name="payment_method" value="cod" checked> <label>Cash on Delivery</label><br>
                        <input type="radio" name="payment_method" value="card"> <label>Credit / Debit Card (Coming Soon)</label><br>
                        <input type="radio" name="payment_method" value="paypal"> <label>PayPal (Coming Soon)</label>
                    </div>

                    <button type="submit" class="btn product-view-btn">
                Place an Order
            </button>
                </form>
            </div>
        </div>
    </div>
    <!-- FAQ’s End -->
</main>

<?php
include("./components/footer.php");
?>