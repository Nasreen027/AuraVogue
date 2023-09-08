<?php
include("./components/header.php");
?>




<!-- Cart Sidebar Start -->
<!-- Cart Offcanvas Start -->

<!-- Cart Offcanvas End -->

<!-- Cart Sidebar End -->


<main>
    <!-- Breadcrumb Start -->
    <div class="breadcrumb-section">
        <div class="container-fluid custom-container">
            <div class="breadcrumb-wrapper text-center">
                <?php
                if (isset($_GET['id'])) {
                    $ctg_id = $_GET['id'];
                    // echo $ctg_id;
                    // $product = $authModel->showSingleProduct($ctg_id, $pdo);
                    // print_r($product);
                    $query = $pdo->prepare("Select categoryName from categories where categoryID = :id");
                    $query->bindParam("id", $ctg_id);
                    $query->execute();
                    $categoryTitle = $query->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($categoryTitle as $title) {
                        ?>
                        <h2 class="breadcrumb-wrapper__title">
                            <?php echo $title['categoryName'] ?>
                        </h2>
                        <?php
                    }
                    ?>
                    <ul class="breadcrumb-wrapper__items justify-content-center">
                        <li><a href="index.html">Home</a></li>
                        <li><span>Shop</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Breadcrumb End -->

        <!-- Shop Start -->
        <div class="shop-section section-padding-2">
            <div class="container-fluid custom-container">
                <!-- Shop Filter Start -->
                <div class="shop-filter align-items-center">
                    <!-- Shop Filter Default Start -->
                    <div class="shop-filter-default justify-content-between align-items-center">
                        <!-- Shop Filter Count Start -->
                        <div class="shop-filter-count d-none d-sm-block">
                            <!-- Showing 1–12 of 90 results -->
                        </div>
                        <!-- Shop Filter Count End -->
                        <!--Search products start-->
                        <li class="search d-none d-lg-block">
                                    
                                        <div class="meta-search meta-search--dark">
                                            <input type="text" id="taskFilter"  placeholder="Search function" />
                                            <button aria-label="search">
                                                <i class="lastudioicon-zoom-1"></i>
                                            </button>
                                        </div>
                                    
                                </li>
                        <!-- Search products  end-->
                        <!-- Shop Filter Sort By Start -->
                        <div class="shop-filter-sort-by">
                            <div class="shop-filter-sort-by__label">
                                <form action="" method='post'>
                                    <button name='sortByPrice' class="btn btn-secondary text-light bg-dark">Sort by Price </button>
                                </form>
                                <!-- <i class="lastudioicon-down-arrow"></i> -->
                            </div>
                        </div>
                        <!-- Shop Filter Sort By End -->
                    </div>
                    
                    <!-- Shop Filter Default End -->



                    <!-- Shop Filter widget Start -->
                    <div class="shop-filter-widget">
                        <div class="filter-widget-row">
                            <div class="filter-widget-col">
                                <!-- widget Item Start -->

                                <!-- widget Item End -->
                            </div>
                            <div class="filter-widget-col">
                                <!-- widget Item Start -->
                                <!-- widget Item End -->
                            </div>
                            <div class="filter-widget-col">
                                <!-- widget Item Start -->
                                <!-- widget Item End -->
                            </div>
                            <div class="filter-widget-col">
                                <!-- widget Item Start -->
                                <!-- widget Item End -->
                            </div>
                            <div class="filter-widget-col">
                                <!-- widget Item Start -->

                                <!-- widget Item End -->
                            </div>
                        </div>
                    </div>
                    <!-- Shop Filter widget End -->
                </div>
                <!-- Shop Filter End -->

                <!-- Shop Wrapper Start -->
                <div class="shop-wrapper">
                    <div class="row">
                        <?php
                        if (isset($_POST['sortByPrice'])) {
                            $products = $authModel->showSingleProductByPriceSort($ctg_id, $pdo);
                        } else {
                            $products = $authModel->showSingleProduct($ctg_id, $pdo);

                        }
                        foreach ($products as $item) {
                            ?>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <!-- Single product Start -->
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
                                        <a href="?wishlist=<?php echo $item['productID'] ?>&userId=<?php echo $userID ?>"
                                            data-bs-tooltip="tooltip" data-bs-placement="top"
                                            data-bs-title="Add to wishlist" data-bs-custom-class="p-meta-tooltip"
                                            aria-label="wishlist">
                                            <i class="lastudioicon-heart-2"></i>
                                        </a>

                                    </div>
                                            <div class="single-product__thumbnail--holder">
                                                <a href="product-single.php?id=<?php echo $item['productID'] ?>">
                                                    <img src="./adminPanel/images/products/<?php echo $item['productImage'] ?>"
                                                        alt="Product" width="344" height="370" />
                                                </a>
                                            </div>
                                        </div>
                                        <div class="single-product__info text-center">
                                            <h3 class="single-product__info--title tr-row">
                                                <a href="product-single.php?id=<?php echo $item['productID'] ?>">
                                                
                                                <?php echo $item['productName'] ?>
                                    
                                                </a>
                                            </h3>
                                            <div class="single-product__info--price">
                                                <ins>
                                                    <?php echo $item['productPrice'] ?>
                                                </ins>
                                            </div>
                                            <div>
                                                <p>
                                                    <?php echo $item['productDescription'] ?>
                                                </p>
                                            </div>
                                        </div>
                                </div>
                                <!-- Single product End -->
                            </div>

                            <?php
                        }
                }
                ?>

                </div>
            </div>
            <!-- Shop Wrapper End -->
        </div>
    </div>
    <!-- Shop End -->

    <!-- Newsletter Start -->
    <div class="newsletter-section">
        <div class="newsletter-left" style="
                        background-image: url(assets/images/newsletter-bg-1.jpg);
                    ">
            <div class="newsletter-social">
                <h4 class="newsletter-social__label">Follow us on</h4>
                <ul class="newsletter-social__list">
                    <li>
                        <a href="#" aria-label="facebook"><i class="lastudioicon-b-facebook"></i></a>
                    </li>
                    <li>
                        <a href="#" aria-label="twitter"><i class="lastudioicon-b-twitter"></i></a>
                    </li>
                    <li>
                        <a href="#" aria-label="instagram"><i class="lastudioicon-b-instagram"></i></a>
                    </li>
                    <li>
                        <a href="#" aria-label="vimeo"><i class="lastudioicon-b-vimeo"></i></a>
                    </li>
                    <li>
                        <a href="#" aria-label="envato"><i class="lastudioicon-envato"></i></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="newsletter-right" style="
                        background-image: url(assets/images/newsletter-bg-2.jpg);
                    ">
            <!-- Newsletter Wrapper Start -->
            <div class="newsletter-wrapper text-center">
                <h4 class="newsletter-wrapper__title-2">
                    10% off when you sign up
                </h4>
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
</main>
<script src="assets/js/app.js"></script>
<script>
    // search items start

const taskFilter =document.querySelector('#taskFilter');
taskFilter.addEventListener("input",filterInput);
function filterInput(event){
   
    // console.log('clicked');
event.preventDefault();
const currentValue = event.target.value;
// console.log(currentValue);
const filterValue = currentValue.toLowerCase();
// console.log(filterValue);
const listItem = document.querySelectorAll('.tr-row');

listItem.forEach(function (singleLi){
    // console.log(singleLi)
    const singleLiText = singleLi.innerText.toLowerCase();
// console.log(singleLiText);
if(singleLiText.indexOf(filterValue) === -1){
       singleLi.parentElement.parentElement.parentElement.style.display = "none";
}else{
    singleLi.parentElement.parentElement.parentElement.style.display  = "";
}
   
});

};


// search items end

</script>
<?php
include("./components/footer.php");
?>