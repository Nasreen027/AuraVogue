<?php
//  session_start();
include("./components/sessionHeader.php");

?>

<main>

    <!-- Breadcrumb Start -->
    <div class="breadcrumb-section">
        <div class="container-fluid custom-container">
            <div class="breadcrumb-wrapper text-center">
                <h2 class="breadcrumb-wrapper__title">Cart</h2>
                <ul class="breadcrumb-wrapper__items justify-content-center">
                    <li><a href="index.php">Home</a></li>
                    <li><span>Cart</span></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Cart Start -->
    <div class="cart-section section-padding-2">
        <div class="container-fluid custom-container">
            <!-- Cart Wrapper Start-->
            <div class="cart-wrapper">
                <!-- Cart Form Start-->
                <div class="cart-form">
                    <!-- Cart Table Start-->
                    <div class="cart-table table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="cart-product-remove">
                                        &nbsp;
                                    </th>
                                    <th class="cart-product-thumbnail">
                                        &nbsp;
                                    </th>
                                    <th class="cart-product-name">
                                        Product
                                    </th>
                                    <th class="cart-product-price text-center">
                                        Price
                                    </th>
                                    <th class="cart-product-quantity text-center">
                                        Quantity
                                    </th>
                                    <th class="cart-product-subtotal text-center">
                                        Subtotal
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $grandTotal = 0;
                                // $cartCount = 0;
                                foreach ($_SESSION['cartTwo'] as $item) {
                                    $totalAmount = $item['getPrice'] * $item['getQty'];
                                    $grandTotal += $totalAmount;
                                    ?>
                                    <tr class="cart-item">
                                        <td class="cart-product-remove">
                                            <a href="?removeFromCart=<?php echo $item['getId'] ?>" class="remove">×</a>
                                        </td>

                                        <td class="cart-product-thumbnail">
                                            <a href="product-single.php">
                                                <img src="./adminPanel/images/products/<?php echo $item['getImage'] ?>"
                                                    alt="Product" width="70" height="89" />
                                            </a>
                                        </td>

                                        <td class="cart-product-name">
                                            <a href="product-single.html">
                                                <?php echo $item['getName'] ?>
                                            </a>
                                        </td>

                                        <td class="cart-product-price text-md-center" data-title="Price">
                                            <span class="price-amount">
                                                <ins>
                                                    $
                                                    <?php echo $item['getPrice'] ?>
                                                </ins>
                                            </span>
                                        </td>

                                        <td class="cart-product-quantity text-md-center" data-title="Quantity">
                                            <div class="cart-table__quantity product-quantity">
                                                <!-- <button type="button" class="decrease">
                                                    <i class="lastudioicon-i-delete-2"></i>
                                                </button> -->
                                                <input class="quantity-input" type="text"
                                                    value="<?php echo $item['getQty'] ?>" />
                                                <!-- <button type="button" class="increase">
                                                    <i class="lastudioicon-i-add-2"></i>
                                                </button> -->
                                            </div>
                                        </td>

                                        <td class="cart-product-subtotal text-md-center" data-title="Subtotal">
                                            <span class="price-amount">
                                                $
                                                <?php echo $item['getPrice'] * $item['getQty'];
                                                // echo $getUser;
                                            
                                                ?>
                                            </span>
                                        </td>
                                    </tr>
                                    <?php
                                    // $cartCount++;
                                    // echo $cartCount;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- Cart Table Start-->
                </div>
                <!-- Cart Form End-->

                <!-- Cart Collaterals Start-->
                <div class="cart-collaterals">
                    <!-- Cart Totals Start-->
                    <div class="cart-totals">
                        <h3 class="cart-totals__title">Cart totals</h3>

                        <div class="cart-totals__table table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr class="order-total">
                                        <th>Total Amount</th>
                                        <td>
                                            <strong>
                                                <?php echo $grandTotal ?>
                                            </strong>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="cart-totals__checkout">
                            <?php
                            if (isset($_SESSION['USER'])) {
                                $user = $_SESSION['USER'];
                                foreach ($user as $user) {
                                    // echo '<script>alert("'.$user['userID'].'")</script>';
                                    $userID = $user['userID'];
                                }
                                ?>
                                <a href="?checkout.php=<?php echo $userID ?>">Proceed to checkout</a>
                                <?php
                            }
                            else {
                                ?>
                                <a href="login.php">Proceed to checkout</a>
                                <?php

                            }
                            ?>

                        </div>
                    </div>
                    <!-- Cart Totals End-->
                </div>
                <!-- Cart Collaterals End-->
            </div>
            <!-- Cart Wrapper End -->
        </div>
    </div>
    <!-- Cart End -->
</main>

<?php
include("./components/footer.php");
?>