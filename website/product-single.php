<?php
include("./components/header.php");
?>
<style>
    #comment {
        margin-top: 0.5rem;
    }

    #name-letter {
        height: 3.5rem !important;
        width: 3.5rem !important;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        margin-right: 2rem;
    }

    #single-li {
        display: flex;
        justify-content: space-between;
    }

    #delete-btn {
        border: none;
        background-color: white;
    }
</style>
<main>
    <?php
    if (isset($_GET['id'])) {
        $getProductId = $_GET['id'];
        $_SESSION['productReviewID'] = $getProductId;
        // echo $getProductId;
        ?>

        <!-- Breadcrumbs Start -->
        <?php
        $query = $pdo->prepare("Select * from products where productID = :id");
        $query->bindParam("id", $getProductId);
        $query->execute();
        $singleProduct = $query->fetchAll(PDO::FETCH_ASSOC);
        foreach ($singleProduct as $title) {
            ?>
            <div class="single-breadcrumbs">
                <div class="container-fluid custom-container">
                    <ul class="single-breadcrumbs-list">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="allProducts.php">Shop</a></li>
                        <li><span>
                                <?php echo $title['productName'] ?>
                            </span></li>
                    </ul>
                </div>
            </div>
            <?php
        }
        ?>
        <!-- Breadcrumbs End -->

        <!-- Product Single Start -->
        <div class="product-single-section section-padding-2">
            <div class="container-fluid custom-container">
                <!-- Product Single Wrapper Start -->
                <?php
                $query = $pdo->prepare("Select * from products where productID = :id");
                $query->bindParam("id", $getProductId);
                $query->execute();
                $singleProduct = $query->fetchAll(PDO::FETCH_ASSOC);
                foreach ($singleProduct as $singleItem) {
                    ?>

                    <div class="product-single-wrapper">
                        <div class="product-single-col-1">
                            <!-- Product Single image Start -->
                            <div class="product-single-image">
                                <div class="product-single-slide-item swiper-slide">
                                    <img src="./adminPanel/images/products/<?php echo $singleItem['productImage'] ?>"
                                        width="694" height="728" />
                                </div>
                            </div>
                            <!-- Product Single image End -->
                        </div>

                        <div class="product-single-col-2">
                            <!-- Product Single content Start -->
                            <div class="product-single-content">
                                <h2 class="product-single-content__title">
                                    <?php echo $singleItem['productName'] ?>
                                </h2>
                                <div class="product-single-content__price-stock">
                                    <div class="product-single-content__price">
                                        <ins>
                                            <?php echo $singleItem['productPrice'] ?>
                                        </ins>
                                    </div>
                                    <div class="product-single-content__stock">
                                        <span class="stock-icon">
                                            <i class="dlicon ui-1_check-circle-08"></i>
                                        </span>
                                        <span class="stock-text">
                                            <?php echo $singleItem['productStock'] ?> in stock
                                        </span>
                                    </div>
                                </div>
                                <div class="product-single-content__short-description">
                                    <p>
                                        <?php echo $singleItem['productDescription'] ?>
                                    </p>
                                </div>
                                <form action="cart.php" method="post">
                                    <input type="hidden" name="productID" id="" value='<?php echo $singleItem['productID'] ?>'>
                                    <input type="hidden" name="productName" id=""
                                        value='<?php echo $singleItem['productName'] ?>'>
                                    <input type="hidden" name="productPrice" id=""
                                        value='<?php echo $singleItem['productPrice'] ?>'>
                                    <input type="hidden" name="productDescription" id=""
                                        value='<?php echo $singleItem['productDescription'] ?>'>
                                    <input type="hidden" name="productImage" id=""
                                        value='<?php echo $singleItem['productImage'] ?>'>
                                    <div class="product-single-content__add-to-cart-wrapper">
                                        <div class="product-single-content__quantity-add-to-cart">
                                            <div class="product-single-content__quantity product-quantity">
                                                <button type="button" class="decrease">
                                                    <i class="lastudioicon-i-delete-2"></i>
                                                </button>
                                                <input class="quantity-input" name="getQty" type="text" value="1" />
                                                <button type="button" class="increase">
                                                    <i class="lastudioicon-i-add-2"></i>
                                                </button>
                                            </div>
                                            <button name='addToCartBtn' class="product-single-content__add-to-cart btn">
                                                Add to cart
                                            </button>
                                        </div>
                                        <!-- <a href="#" class="product-add-wishlist">
                                            Add to Wishlist
                                        </a> -->
                                    </div>
                                </form>
                                <div class="product-single-content__meta">
                                    <div class="product-single-content__meta--item">
                                        <div class="label">Category:</div>
                                        <div class="content">
                                            <?php
                                            // echo $getProductId;
                                            // echo $singleItem['categoryID'];
                                            $getCategoryId = $singleItem['categoryID'];
                                            $query = $pdo->prepare("Select categoryName from categories where categoryID = :id");
                                            $query->bindParam("id", $getCategoryId);
                                            $query->execute();
                                            $getCategoryName = $query->fetchAll(PDO::FETCH_ASSOC);
                                            foreach ($getCategoryName as $singleCtgName) {
                                                ?>
                                                <a href="#">
                                                    <?php echo $singleCtgName['categoryName'] ?>
                                                </a>
                                                <?php

                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-single-content__social">
                                        <div class="label">Share</div>
                                        <ul class="socail-icon">
                                            <li>
                                                <a href="#" aria-label="facebook">
                                                    <i class="lastudioicon-b-facebook"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" aria-label="twitter">
                                                    <i class="lastudioicon-b-twitter"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" aria-label="linkedin">
                                                    <i class="lastudioicon-b-linkedin"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- Product Single content End -->
                            </div>
                        </div>

                        <!-- Product Single Wrapper End -->
                    </div>
                </div>
                <!-- Product Single End -->

                <!-- Product Single Tabs Start -->
                <div class="product-single-tabs-section section-padding-2">
                    <div class="container-fluid custom-container">
                        <!-- Product Single Tabs Start -->
                        <div class="product-single-tabs">
                            <ul class="nav justify-content-center">
                                <!-- <li>
                            <button class="active" data-bs-toggle="pill" data-bs-target="#description" type="button">
                                Description
                            </button>
                        </li> -->
                                <!-- <li>
                            <button data-bs-toggle="pill" data-bs-target="#additionalInformation " type="button">
                                Additional information
                            </button>
                        </li> -->

                                <?php
                                // Assuming you have a valid session_start() before accessing session variables
                                $productID = $_SESSION['productReviewID'];

                                $query = $pdo->prepare('SELECT COUNT(*) AS reviewCount FROM productreviews WHERE productID = :p_ID');
                                $query->bindParam(':p_ID', $productID, PDO::PARAM_INT);
                                $query->execute();
                                $result = $query->fetch(PDO::FETCH_ASSOC);

                                $reviewCount = $result['reviewCount']; // Extracting the review count from the result
                    
                                ?>

                                <li>
                                    <button data-bs-toggle="pill" data-bs-target="#reviews" type="button">
                                        Reviews (
                                        <?php echo $reviewCount; ?>)
                                    </button>
                                </li>

                            </ul>

                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="description">
                                    <div class="tab-pane fade" id="reviews">
                                        <!-- Product Single Review Start -->
                                        <div class="product-single-review">
                                            <!-- Product Comment Start -->
                                            <div class="product-comment">

                                                <h3 class="comment-title">
                                                    <?php echo $reviewCount; ?>
                                                    review for Product
                                                    <?php echo $singleItem['productName'] ?>

                                                </h3>

                                                <!-- Comment Items Start -->
                                                <ul class="comment-items">
                                                    <?php
                                                    // $loggedInUser = $_SESSION['USER'][0]; // Use a more meaningful variable name
                                                    // $userID = $loggedInUser['userID'];
                                        
                                                    $query = $pdo->prepare('SELECT * FROM productreviews WHERE productID = :p_ID');
                                                    $query->bindParam(':p_ID', $productID);
                                                    // echo '<sccript>alert("'.$productID.'")</script>';
                                                    $query->execute();
                                                    $result = $query->fetchAll(PDO::FETCH_ASSOC);

                                                    foreach ($result as $reviews) {
                                                        $userID = $reviews['userID'];

                                                        $userQuery = $pdo->prepare('SELECT * FROM users WHERE userID = :id');
                                                        $userQuery->bindParam(':id', $userID);
                                                        $userQuery->execute();
                                                        $userResult = $userQuery->fetch(PDO::FETCH_ASSOC);

                                                        $firstName = $userResult['firstName'];
                                                        $lastName = $userResult['lastName'];
                                                        $reviewText = htmlspecialchars($reviews['reviews']); // Sanitize user input
                                        
                                                        ?>

                                                        <li class="comment-item">
                                                            <!-- <div class="comment-item__author"> -->
                                                            <div class="initial-avatar rounded-circle bg-dark text-light"
                                                                id='name-letter'>
                                                                <?php echo substr($firstName, 0, 1) . substr($lastName, 0, 1); ?>
                                                                <!-- </div> -->
                                                            </div>
                                                            <div class="comment-item__content" id="single-li">
                                                                <div>
                                                                    <p class="comment-item__description" id="comment">
                                                                        <?php echo $reviewText; ?>
                                                                    </p>
                                                                    <p class="comment-item__meta">
                                                                        <strong>
                                                                            <?php echo $firstName . ' ' . $lastName; ?>
                                                                        </strong>
                                                                        <?php echo $reviews['date']; ?>
                                                                    </p>
                                                                </div>
                                                                <div>
                                                                    <form action="" method="post">
                                                                        <input type="hidden" name="userReviewID"
                                                                            value="<?php echo $reviews['userID'] ?>" id="">
                                                                        <?php
                                                                        if (isset($_SESSION['USER'])) {
                                                                            $users = $_SESSION['USER'];
                                                                            foreach ($users as $user) {
                                                                                $userID = $user['userID'];
                                                                            }
                                                                            if ($userID == $reviews['userID']) {
                                                                                ?>
                                                                                <input type="hidden" name="reviewID"
                                                                                    value="<?php echo $reviews['reviewID'] ?>" id="">
                                                                                <input type="hidden" name="reviewID"
                                                                                    value="<?php echo $reviews['reviewID'] ?>" id="">
                                                                                <button id="delete-btn" name='delete-review'
                                                                                    type="submit"><i><img src="assets/images/icon/trash.svg"
                                                                                            title="Delete you review" alt="trash"></i></button>
                                                                                <?php
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </li>

                                                        <?php
                                                    }
                                                    ?>
                                                </ul>
                                                <!-- Comment Items End -->

                                                <!-- Comment Items End -->
                                            </div>
                                            <?php

                                            if (isset($_SESSION['USER'])) {
                                                $users = $_SESSION['USER'];
                                                foreach ($users as $user) {
                                                    $userID = $user['userID'];
                                                } ?>
                                                <div class="product-comment-form">
                                                    <h3 class="comment-title">
                                                        Add a review
                                                    </h3>
                                                    <form action="#" method='post'>
                                                        <!-- comment Form Start -->
                                                        <div class="comment-form">
                                                            <input type="hidden" value="<?php echo $userID ?>" name="userID" id="">
                                                            <input type="hidden" value="<?php echo $productID ?>" name="productID"
                                                                id="">
                                                            <!-- Single Form Start -->
                                                            <div class="single-form">
                                                                <label class="single-form__label">Your review *</label>
                                                                <textarea class="single-form__input" name="review"></textarea>
                                                            </div>
                                                            <!-- Single Form Start -->

                                                            <div class="single-form">
                                                                <button class="single-form__btn btn" type="submit" name="submit-review">
                                                                    Submit
                                                                </button>
                                                            </div>
                                                            <!-- Single Form Start -->
                                                        </div>
                                                        <!-- comment Form End -->
                                                    </form>
                                                </div>
                                                <?php
                                            }
                                            if (!isset($_SESSION['USER'])) {
                                                ?>
                                                <a href="login.php">write your review.</a>
                                                <?php
                                            }
                                            ?>
                                            <!-- Product Comment Form End -->
                                        </div>
                                        <!-- Product Single Review End -->
                                    </div>
                                </div>
                            </div>
                            <!-- Product Single Tabs End -->
                        </div>
                    </div>

                    <!-- Related Product Start -->
                    <div class="related-product-section section-padding-2">
                        <div class="container-fluid custom-container">
                            <!-- Related Title Start -->
                            <div class="related-title text-center">
                                <h2 class="related-title__title">Related Products</h2>
                            </div>
                            <!-- Related Title End -->

                            <!-- Related Product Start -->
                            <!-- <div class="related-product-active swiper-dot-style-1"> -->
                            <!-- <div class="swiper"> -->
                            <!-- <div class="swiper-wrapper"> -->
                            <div class="row">


                                <?php
                                $query = $pdo->prepare("Select * from products where categoryID = :id");
                                $query->bindParam("id", $getCategoryId);
                                $query->execute();
                                $relatedProducts = $query->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($relatedProducts as $singleRelatedItem) {
                                    ?>
                                    <div class="col-md-3">
                                        <div class="single-product js-scroll ShortFadeInUp">

                                            <div class="single-product__thumbnail">
                                                <div class="single-product__thumbnail--meta-3">
                                                    <?php
                                                    if (isset($_SESSION['USER'])) {
                                                        $user = $_SESSION['USER'];
                                                        foreach ($user as $user) {
                                                            // echo '<script>alert("'.$user['userID'].'")</script>';
                                                            $userID = $user['userID'];
                                                        }
                                                    }
                                                    ?>
                                                    <a href="?wishlist=<?php echo $singleRelatedItem['productID'] ?>&userId=<?php echo $userID ?>"
                                                        data-bs-tooltip="tooltip" data-bs-placement="top"
                                                        data-bs-title="Add to wishlist" data-bs-custom-class="p-meta-tooltip"
                                                        aria-label="wishlist">
                                                        <i class="lastudioicon-heart-2"></i>
                                                    </a>

                                                </div>

                                                <div class="single-product__thumbnail--holder">
                                                    <a href="product-single.php?id=<?php echo $singleRelatedItem['productID'] ?>">
                                                        <img src="./adminPanel/images/products/<?php echo $singleRelatedItem['productImage'] ?>"
                                                            alt="Product" />
                                                    </a>
                                                </div>
                                                <div>
                                                </div>
                                            </div>
                                            <div class="single-product__info text-center">
                                                <div class="single-product__info--tags">
                                                    <a href="#">Plant</a>
                                                </div>
                                                <h3 class="single-product__info--title">
                                                    <a href="product-single.php?id=<?php echo $singleRelatedItem['productID'] ?>">
                                                        <?php echo $singleRelatedItem['productName'] ?>
                                                    </a>
                                                </h3>
                                                <div class="single-product__info--price">
                                                    <ins>
                                                        <?php echo $singleRelatedItem['productPrice'] ?>
                                                    </ins>
                                                </div>

                                            </div>

                                        </div>
                                        <!-- Single product End -->
                                        <!-- </div> -->
                                    </div>

                                    <?php
                                }
                                            }
                }
    }
    ?>
                </div>

                <!-- </div> -->
                <!-- <div class="swiper-pagination"></div> -->
                <!-- </div> -->
                <!-- </div> -->
                <!-- Related Product End -->
            </div>
        </div>

        <!-- Related Product End -->

        <!-- Newsletter Start -->
        <!-- Newsletter Start -->
        <div class="newsletter-section">
            <div class="newsletter-left" style="background-image: url(assets/images/newsletter-bg-1.jpg)">
                <!-- Newsletter Wrapper Start -->
                <div class="newsletter-wrapper text-center">
                    <h4 class="newsletter-wrapper__title">Follow us on</h4>
                    <p>
                        Proin volutpat vitae libero at tincidunt. Maecenas sapien
                        lectus, vehicula vel euismod sed, vulputate
                    </p>

                    <div class="newsletter-social">
                        <ul class="newsletter-social__list">
                            <li>
                                <a href="#" aria-label="facebook">
                                    <i class="lastudioicon-b-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" aria-label="twitter">
                                    <i class="lastudioicon-b-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" aria-label="instagram">
                                    <i class="lastudioicon-b-instagram"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" aria-label="vimeo">
                                    <i class="lastudioicon-b-vimeo"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" aria-label="envato">
                                    <i class="lastudioicon-envato"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Newsletter Wrapper End -->
            </div>
            <div class="newsletter-right" style="background-image: url(assets/images/newsletter-bg-2.jpg)">
                <!-- Newsletter Wrapper Start -->
                <div class="newsletter-wrapper text-center">
                    <h4 class="newsletter-wrapper__title">10% off when you sign up</h4>
                    <p>
                        Proin volutpat vitae libero at tincidunt. Maecenas sapien
                        lectus, vehicula vel euismod sed, vulputate
                    </p>
                    <form action="#">
                        <div class="newsletter-form-style-1">
                            <input type="text" placeholder="Enter your email address..." />
                            <button>Subscribe</button>
                        </div>
                    </form>
                </div>
                <!-- Newsletter Wrapper End -->
            </div>
        </div>
        <!-- Newsletter End -->

        <!-- Newsletter End -->
</main>

<?php
include("./components/footer.php");
?>