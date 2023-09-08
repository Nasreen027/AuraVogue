<?php
session_start();
include_once('models/config.php');
include_once("models/auth.php");
?>

<?php
//php code start
$authModel = new Auth();
// $getUser = ;
?>

<?php
// signup
if (isset($_POST['signup'])) {
    if (empty($_POST['username'])) {
        redirectWindow('signup.php');
    }
    if (empty($_POST['fullname'])) {
        redirectWindow('signup.php');
    }
    if (empty($_POST['email'])) {
        redirectWindow('signup.php');
    }
    if (empty($_POST['password'])) {
        redirectWindow('signup.php');
    }
    $username = $_POST['username'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    //checking if user already exists
    $user = $authModel->findUserWithEmail($email, $pdo);
    if ($user) {
        redirectWindow("signup.php?error=Email already exists");
    }

    $authModel->signup($username, $fullname, $email, $password, $pdo);
    $user = $authModel->findUserWithEmail($email, $pdo);

    if ($user) {
        $_SESSION['USERMain'] = $user;
        redirectWindow('login.php');
    } else {
        redirectWindow("signup.php?error=Something went wrong");
    }
}
?>

<!-- //signin -->
<?php
if (isset($_POST['login'])) {
    if (empty($_POST['email'])) {
        redirectWindow('login.php?error=email is required');
    }
    if (empty($_POST['password'])) {
        redirectWindow('login.php?error=password is required');
    }
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = $authModel->findUserWithEmail($email, $pdo);
    if (password_verify($password, $user[0]['userPassword'])) {
        $_SESSION['USER'] = $user;
        redirectWindow('index.php');
    } else {
        redirectWindow('login.php?error=invalid credentials');
    }
}

if (isset($_POST['edit'])) {
    $userID = $_POST['userID'];
    $userName = $_POST['username'];
    $fullName = $_POST['fullname'];
    $emailAddress = $_POST['email'];
    $authModel->update($userName, $fullName, $emailAddress, $userID, $pdo);
    redirectWindow('my-account.php');
};

if (isset($_POST['submit-review'])) {
    $userID = $_POST['userID'];
    $productID = $_POST['productID'];
    $review = $_POST['review'];
    // echo '<script>alert("' . $productID .$userID.$review. '")</script>';
    $authModel->submitReview($review, $productID, $userID, $pdo);
    redirectWindow('index.php');
};

//add to cart
if (isset($_POST['addToCartBtn'])) {
        if (isset($_SESSION['cartTwo'])) {
            $count = count($_SESSION['cartTwo']);
            // echo "<script>alert($count)</script>";

            $productId = array_column($_SESSION['cartTwo'], 'getId');
            if (in_array($_POST['productID'], $productId)) {
                echo "<script>alert('Product already exists in the cart')</script>";
            } else {
                $count = count($_SESSION['cartTwo']);
                $_SESSION['cartTwo'][$count] = array('getId' => $_POST['productID'], 'getName' => $_POST['productName'], 'getPrice' => $_POST['productPrice'], 'getDescription' => $_POST['productDescription'], 'getImage' => $_POST['productImage'], 'getQty' => $_POST['getQty']);
                echo "<script>alert('Product added into cart')
                location.assign('index.php');
                </script>";
            }
        } else {

            $_SESSION['cartTwo'][0] = array('getId' => $_POST['productID'], 'getName' => $_POST['productName'], 'getPrice' => $_POST['productPrice'], 'getDescription' => $_POST['productDescription'], 'getImage' => $_POST['productImage'], 'getQty' => $_POST['getQty']);
            echo "<script>alert('Product added into cart');
        location.assign('index.php');
        </script>";
        }
    }
;
//remove from cart
if (isset($_GET['removeFromCart'])) {
    foreach ($_SESSION['cartTwo'] as $key => $value) {
        if ($_GET['removeFromCart'] == $value['getId']) {
            unset($_SESSION['cartTwo'][$key]);
            $_SESSION['cartTwo'] = array_values($_SESSION['cartTwo']);
            echo "<script>alert('Product successfully deleted from the cart')
        location.assign('cart.php');
        </script>";
        }
    }
}
;
//add to wishlist
if (isset($_GET['wishlist'])) {
    $getWishlistId = $_GET['wishlist'];
    $getUserIdForWishlist = $_GET['userId'];
    //  $query = $pdo->prepare("Select wishlistProductID from wishlist");
    //  $query->execute();
    //  $getWishListData = $query->fetchAll(PDO::FETCH_ASSOC);
    //  echo "<script>alert($getWishListData)</script>";
    //  if(isset($getWishListData)){
    //     $productId = array_column($getWishListData['wishlistProductID'],$getWishlistId);
    //     echo "<script>alert('product already exists')</script>";
    //  }
    //  else{
    $authModel->addWishList($pdo, $getWishlistId, $getUserIdForWishlist);
    header('location:wishlist.php');
    // echo "<script>alert('Item added to wishlist')</script>";


    //  }
    echo "<script>alert('working')</script>";
}
;
if (isset($_GET['removeFromWishlist'])) {
    $deleteWishlistProduct = $_GET['removeFromWishlist'];
    // echo "<script>alert($deleteWishlistProduct)</script>";
    $query = $pdo->prepare("delete from wishlist where wishlistProductID = :removeProductFromWishlist");
    $query->bindParam("removeProductFromWishlist", $deleteWishlistProduct);
    $query->execute();
    echo "<script>alert('Item removed from wishlist')</script>";
}
//checkout
if (isset($_GET['checkout'])) {
    $getUserId = $_GET['checkout'];
    foreach ($_SESSION['cartTwo'] as $key => $value) {
        $id = $value['getId'];
        // $name = $value['getName'];
        $orderPrice = $value['getPrice'];
        $qty = $value['getQty'];
        $totalAmount = $value['getQty'] * $value['getPrice'];
        $query = $pdo->prepare('insert into orders(userID,productID,orderPrice,productQuantity,totalAmount) values(:userID,:productID, :orderPrice, :productQuantity, :totalAmount)');
        $query->bindParam("userID", $getUserId);
        $query->bindParam("productID", $id);
        $query->bindParam("orderPrice", $orderPrice);
        $query->bindParam("productQuantity", $qty);
        $query->bindParam("totalAmount", $totalAmount);
        $query->execute();

        echo "<script>alert('order added successfully');
    location.assign('index.php');
    </script>";
        unset($_SESSION['cartTwo']);
    }
};

if (isset($_POST['delete-review'])) {
    $reviewID = $_POST['reviewID'];
    $authModel->deleteReview($reviewID, $pdo);
};

if (isset($_POST['delete-account'])) {
    $deleteAccountID = $_POST['deleteID'];
    $authModel->deleteAccount($deleteAccountID,$pdo);
echo '<script>alert("Your has been deleted.")</script>';
    redirectWindow('logout.php');
    }
