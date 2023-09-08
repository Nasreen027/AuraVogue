<?php

class Auth
{
//function for insert category;
    function insertCategory($category_name, $category_image, $pdo)
    {
        $query = $pdo->prepare('INSERT into categories(categoryName,categoryImage) values(:c_name,:c_image)');
        $query -> bindParam('c_name', $category_name);
        $query -> bindParam('c_image', $category_image);
        $query -> execute();
    }

//function for update category on image selection;    
    function updateCategory( $category_id,$category_name, $category_image, $pdo)
    {    
        $query= $pdo -> prepare("update categories set categoryName = :category_name,categoryImage=:category_image where categoryID = :category_id");
        $query -> bindParam('category_id', $category_id);
        $query -> bindParam('category_name', $category_name);
        $query -> bindParam('category_image', $category_image);
        $query -> execute();
    }

//function for update category without image selection;    
    function updateCategoryInelse( $category_id,$category_name,  $pdo)
    {    
        $query= $pdo -> prepare("update categories set categoryName = :category_name where categoryID = :category_id");
        $query -> bindParam('category_id', $category_id);
        $query -> bindParam('category_name', $category_name);
        $query -> execute();
    }
//function for delete category;    
    function deleteCategory( $category_delete_id, $pdo)
    {    
      $query = $pdo->prepare(" DELETE FROM categories WHERE categoryID = :id");
      $query->bindParam('id', $category_delete_id);
      $query->execute();
    }
//function for insert products;
function insertProducts($product_name, $product_description,$product_price,$product_stock, $product_category, $product_image, $pdo)
    {
        $query = $pdo->prepare('INSERT into products(productName,productDescription,productPrice,productImage,productStock,categoryID) values(:product_name,:product_desc,:product_price,:product_image,:product_stock,:product_category)');
        $query -> bindParam('product_name', $product_name);
        $query -> bindParam('product_desc', $product_description);
        $query -> bindParam('product_price', $product_price);
        $query -> bindParam('product_image', $product_image);
        $query -> bindParam('product_stock', $product_stock);
        $query -> bindParam('product_category', $product_category);
        $query -> execute();
    }
//function for update products;
function updateProducts( $product_id,$product_name,$product_description,$product_price, $product_image,$product_stock,$product_category, $pdo)
    {
        $query = $pdo->prepare('update products set productName = :product_name,productDescription =:product_description,productPrice=:product_price,productImage=:product_image,productStock=:product_stock,categoryID=:product_category where productID = :product_id');
        $query -> bindParam('product_id', $product_id);
        $query -> bindParam('product_name', $product_name);
        $query -> bindParam('product_description', $product_description);
        $query -> bindParam('product_price', $product_price);
        $query -> bindParam('product_image', $product_image);
        $query -> bindParam('product_stock', $product_stock);
        $query -> bindParam('product_category', $product_category);
        $query -> execute();
    }
//function for update products;
function updateProductsInelse( $product_id,$product_name,$product_description,$product_price,$product_stock,$product_category, $pdo)
    {
        $query = $pdo->prepare('update products set productName = :product_name,productDescription =:product_description,productPrice=:product_price,productStock=:product_stock,categoryID=:product_category where productID = :product_id');
        $query -> bindParam('product_id', $product_id);
        $query -> bindParam('product_name', $product_name);
        $query -> bindParam('product_description', $product_description);
        $query -> bindParam('product_price', $product_price);
        $query -> bindParam('product_stock', $product_stock);
        $query -> bindParam('product_category', $product_category);
        $query -> execute();
    }
//function for delete products;    
function deleteProducts( $product_delete_id, $pdo)
    {    
      $query = $pdo->prepare(" DELETE FROM products WHERE productID = :id");
      $query->bindParam('id', $product_delete_id);
      $query->execute();
    }
//function for update admin profile;
function updateAdminProfile($admin_ID,$admin_name,$admin_email,$admin_password,$admin_image,$pdo){
    $query= $pdo -> prepare("update admins set adminName = :name,adminEmail = :email, password = :password,adminImage = :image where adminID = :_id");
    $query -> bindParam('name', $admin_name);
    $query -> bindParam('email', $admin_email);
    $query -> bindParam('password', $admin_password);
    $query -> bindParam('image', $admin_image);
    $query -> bindParam('_id', $admin_ID);
    $query -> execute();
}
//function for update admin profile without image;
function updateAdminProfileWithoutImage($admin_ID,$admin_name,$admin_email,$admin_password,$pdo){
    $query= $pdo -> prepare("update admins set adminName = :name,adminEmail = :email, password = :password where adminID = :_id");
    $query -> bindParam('name', $admin_name);
    $query -> bindParam('email', $admin_email);
    $query -> bindParam('password', $admin_password);
    $query -> bindParam('_id', $admin_ID);
    $query -> execute();
}
//function for approve order on notification page;
function approveOrderNotificatio( $id,$pdo){
    $query = $pdo->prepare("UPDATE orders SET orderStatus = 'approved' WHERE orderID = :_id");
    $query->bindParam('_id', $id);
    $query->execute();
}
//function for reject order on notification page;
function rejectOrderNotification($id,$pdo){
    $query = $pdo->prepare("UPDATE orders SET orderStatus = 'rejected' WHERE orderID = :_id");
    $query->bindParam('_id', $id);
    $query->execute();

}
// functions for approve order on order
function   approveOrder($id,$pdo){
    $query = $pdo->prepare("UPDATE orders SET orderStatus = 'approved' WHERE orderID = :_id");
    $query->bindParam('_id', $id);
    $query->execute();
}
// functions for reject order on order
function   rejectOrder($id,$pdo){
    $query = $pdo->prepare("UPDATE orders SET orderStatus = 'rejected' WHERE orderID = :_id");
    $query->bindParam('_id', $id);
    $query->execute();
}
//function for delete products;    
function deleteAdmin(  $admin_delete_id, $pdo)
    {    
      $query = $pdo->prepare(" DELETE FROM admins WHERE adminID = :id");
      $query->bindParam('id', $admin_delete_id);
      $query->execute();
      redirectWindow('signIn.php');
    }

function findUserWithEmail($email, $pdo)
{
    $query = $pdo->prepare('select * from admins where adminEmail = :email');
    $query->bindParam(':email', $email);
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
    

   
// //function for delete admin profile picture;    
// function deleteAdminProfile($admin_delete_id, $pdo)
//     {    
//       $query = $pdo->prepare("update admins set adminImage =' ' where adminID = :_id");
//       $query->bindParam('_id', $admin_delete_id);
//       $query->execute();
//     }
   

}

?>