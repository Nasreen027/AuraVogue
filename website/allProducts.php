<?php
include("./components/header.php");
?>

<main>

    <div class="container-fluid custom-container mt-5 section-padding-1">
                 <!--Search products start-->
                 <ul class="mb-5">
                 <li class="search d-none d-lg-block">
                                    
                                    <div class="meta-search meta-search--dark">
                                        <input type="text" id="taskFilter"  placeholder="Search function" />
                                        <button aria-label="search">
                                            <i class="lastudioicon-zoom-1"></i>
                                        </button>
                                    </div>
                                
                            </li>
</ul>
                    <!-- Search products  end-->
        <div class="section-title text-center js-scroll ShortFadeInUp">
            <h3 class="section-title__title">Products</h3>
        </div>

        <div class="row">

            <!-- Single product Start -->
            <?php
            $query = $pdo->query("Select * from products");
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            foreach ($result as $plants) {
                ?>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-product js-scroll ShortFadeInUp scrolled">
                      
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
                                        <a href="?wishlist=<?php echo $plants['productID'] ?>&userId=<?php echo $userID ?>"
                                            data-bs-tooltip="tooltip" data-bs-placement="top"
                                            data-bs-title="Add to wishlist" data-bs-custom-class="p-meta-tooltip"
                                            aria-label="wishlist">
                                            <i class="lastudioicon-heart-2"></i>
                                        </a>

                                    </div>
                <a href="product-single.php?id=<?php echo $plants['productID'] ?>">
                                <div class="single-product__thumbnail--holder">
                                    <img src="./adminPanel/images/products/<?php echo $plants['productImage'] ?>" alt="Product"
                                        width="344" height="370" loading="lazy" />
                                </div>
                                    </a>
                            </div>
                            <div class="single-product__info">
                                <div class="single-product__info--tags">
                                    <a href="#">Plant</a>
                                </div>
                                <h3 class="single-product__info--title tr-row">
                                    <a href="product-single.php?id=<?php echo $plants['productID'] ?>">
                                        <?php echo $plants['productName'] ?>
                                    </a>
                                </h3>
                                <div class="single-product__info--price">
                                    <ins>$
                                        <?php echo $plants['productPrice'] ?>
                                    </ins>
                                </div>
                            </div>
                                  
                    </div>
                </div>
                </a>

                <?php
            }
            ?>

            <!-- Single product End -->


        </div>
        <!-- </div> -->
    </div>
    <!-- Product Wrapper End -->

    <!-- </div> -->
    </div>
    </div>
    <hr>
    </hr>
    <!-- Show Some Product End -->
</main>

<!-- Footer Start -->
<?php
include_once('components/footer.php')
    ?>
<!-- Footer End -->

<!-- JS Vendor, Plugins & Activation Script Files -->

<!-- Bootstrap JS -->
<script src="assets/js/bootstrap.bundle.min.js"></script>

<!-- Plugins JS -->
<script src="assets/js/swiper-bundle.min.js"></script>
<script src="assets/js/masonry.pkgd.min.js"></script>
<script src="assets/js/glightbox.min.js"></script>
<script src="assets/js/nice-select2.js"></script>

<!-- Activation JS -->
<script src="assets/js/main.js"></script>

</body>

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
<!-- Mirrored from htmldemo.net/plantfy/plantfy/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 08 Aug 2023 21:00:32 GMT -->

</html>