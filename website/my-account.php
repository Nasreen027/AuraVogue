<?php
include("./components/sessionHeader.php");
if (!isset($_SESSION['USER'])) {
    redirectWindow('login.php');
}
// if(isset($_POST['cancelOrder'])){
//     $
// }
?>
<style>
    .profile img {
        width: 18rem;
        height: 16rem;
        border-radius: 50%;
        margin-left: 3rem;
    }

    .profile {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .name {
        margin-left: 3rem !important;
    }

    #signout_btn {
        width: 20rem !important;
        height: 4rem;
    }

    #delete_btn {
        width: 20rem !important;
        height: 4rem;
        background-color: rgb(208, 60, 78) !important;
        border: none;
    }
</style>

</div>

<main>
    <!-- Breadcrumb Start -->
    <div class="breadcrumb-section">
        <div class="container-fluid custom-container">
            <div class="breadcrumb-wrapper text-center">
                <h2 class="breadcrumb-wrapper__title">My Account</h2>
                <ul class="breadcrumb-wrapper__items justify-content-center">
                    <li><a href="index.php">Home</a></li>
                    <li><span>My Account</span></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- My Account Start -->
    <div class="my-account-section section-padding-2">
        <div class="container-fluid custom-container">
            <!-- My Account Tabs Start -->
            <div class="my-account-tab">
                <!-- My Account Tabs Menu Start -->
                <div class="my-account-tab__menu">
                    <ul class="nav justify-content-center">
                        <li>
                            <button class="account-btn active" data-bs-toggle="tab" data-bs-target="#dashboard" type="button">
                                Profile
                            </button>
                        </li>
                        <li>
                            <button class="account-btn" data-bs-toggle="tab" data-bs-target="#orders" type="button">
                                Orders
                            </button>
                        </li>
                        <li>
                            <button class="account-btn" data-bs-toggle="tab" data-bs-target="#delete-account" type="button">
                                Delete Your Account
                            </button>
                        </li>
                        <li>
                            <button class="account-btn" data-bs-toggle="tab" data-bs-target="#logout" type="button">
                                Logout
                            </button>
                        </li>
                    </ul>
                </div>
                <!-- My Account Tabs Menu End -->

                <div class="tab-content">

                    <!-- account update section start -->
                    <div class="tab-pane fade show active" id="dashboard">
                        <!-- My Account Dashboard Start -->
                        <?php
                        $user = $_SESSION['USER'];
                        // print_r($user);
                        foreach ($user as $item) {
                            $userID = $item['userID'];
                            // echo '<script>alert("'.$userID.'")</script>';
                        }
                        $query = $pdo->prepare('select * from users where userID = :id');
                        $query->bindParam('id', $userID);
                        $query->execute();
                        $result = $query->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($result as $value) {

                            $userName = $value['firstName'];
                            $lastName = $value['lastName'];
                            $emailAddress = $value['userEmail'];
                        }
                        ?>
                        <div class="my-account-dashboard">
                            <form action="#" method='post'>
                                <div class="container mt-3">
                                    <div class="row">
                                        <div class="col-md-3"></div>

                                        <div class="col-md-6">
                                            <input type="hidden" name="userID" value="<?php echo $userID ?>">
                                            <div class="single-form">
                                                <label class="single-form__label">First Name *</label>
                                                <input class="single-form__input" type="text" name="username" value="<?php echo $userName ?>" />

                                                <!-- Single Form Start -->
                                            </div>
                                            <!-- Single Form Start -->
                                            <div class="single-form">
                                                <label class="single-form__label">Last Name *</label>
                                                <input class="single-form__input" type="text" name="fullname" value="<?php echo $lastName ?>" />
                                            </div>

                                            <div class="single-form">
                                                <label class="single-form__label">Email Address *</label>
                                                <input class="single-form__input" type="text" name="email" value="<?php echo $emailAddress ?>" />

                                                <!-- Single Form Start -->
                                            </div>
                                            <!-- Single Form Start -->
                                            <div class="single-form">
                                                <button class="single-form__btn btn" name="edit">
                                                    Save Change
                                                </button>
                                            </div>

                                        </div>
                                        <div class="col-md-3"></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!--  update account section end -->
                    <!-- orders section start -->
                    <div class="tab-pane fade" id="orders">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <h4 class="h4 mb-3">Orders Details</h4>

                                    <div class="single-form">
                                    <div class="col-md-12 mt-4">
                                    <?php
                        // if (isset($_SESSION['USER'])) {
                        //     $user = $_SESSION['USER'];
                        //     foreach ($user as $user) {
                                // echo '<script>alert("'.$user['userID'].'")</script>';
                                // $userID = $user['userID'];
                                // $query = $pdo->prepare("Select * from orders where orderDate =:orderDate AND customerID =:customerID");
                                // $query->bindParam("orderDate",$orderDate);
                                // $query->bindParam("customerID",$userID);
                                // $query->execute();
                                // $orderData = $query->fetchAll(PDO::FETCH_ASSOC);
                                // foreach($orderData as $singleOrder){
                                //     $orderProductID = $singleOrder['productID'];
                                //     $query = $pdo->prepare("Select * from products where productID = :orderProductID");
                                //     $query->bindParam("orderProductID",$orderProductID);
                                //     $query->execute();
                                //     $productData = $query->fecthAll(PDO::FETCH_ASSOC);
                                //     foreach($productData as $singleProductData){
                                        ?>
                                        <?php
                                    // }
                                    ?>
                                     <h4 class="contact-info-item__title">
                                     Order # :
                                    </h4>
                                    <p>
                                        We’re available from 10 am – 10
                                        pm EST, 7 days a week.
                                    </p>
                                    <form action="" method='post'>
                                    <button class="wishlist-table__btn btn" name='cancelOrder'>Cancel Order</button>
                                    </form>
                                    <?php
                                // }
                                ?>

                                    <div class="contact-info-item__service mt-4">
                    </div>
                                <?php
                            // }
                        // }
                        ?>
                    </div>
                </div>
                                    </div>
                                </div>
                                <div class="col-md-4"></div>
                            </div>
                        </div>
                    </div>
                                        <!-- orders section end -->

                    <!-- account delete section start -->
                    <div class="tab-pane fade my-4" id="delete-account">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4 mt-5">
                                    <h5 class="h5 mb-3">Are you sure you want to Delete Your
                                        <br> Account ?</h5>

                                    <div class="single-form mt-4">
                                        <form action="" method="post">
                                            <?php
                                            $users = $_SESSION['USER'];
                                            foreach ($users as $user) {
                                                $userID = $user['userID'];
                                            }
                                            // echo '<script>alert("'.$userID.'")</script>';
                                            ?>
                                            <input type="hidden" name="deleteID" value="<?php echo $userID ?>" id="">
                             
                                            <button class="single-form__btn btn" type="submit" name="delete-account" id='delete_btn'>
                                                <h4 class='h6'>Delete Account ?</h4>
                                            </button>
                                    
                                        </form>
                                    </div>
                                </div>
                                <div class="col-md-4"></div>
                            </div>
                        </div>
                    </div>
                    <!-- account delete section end -->

                    <!-- logout section start -->

                    <div class="tab-pane fade" id="logout">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <h5 class="h5 mb-3">Are you sure you want to sign out?</h5>

                                    <div class="single-form">
                                        <a href="logout.php">
                                            <button class="single-form__btn btn" id='signout_btn'>
                                                <h4 class='h6'>Sign Out ?</h4>
                                            </button>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-4"></div>
                            </div>
                        </div>
                    </div>
                    <!-- logout section end  -->

                </div>
            </div>
        </div>
        <!-- My Account Tabs End -->
    </div>
    </div>
    <!-- My Account End -->

    
</main>

<?php
include_once('components/footer.php')
?>
</body>

</html>