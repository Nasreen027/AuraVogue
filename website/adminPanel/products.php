<?php
include_once('header_admin.php');

?>
<div class="container pt-4">
    <div class="bg-light rounded p-4">
        <div class="row">
            <div class="col-12">
                <div class="bg-white rounded h-100 ">
                    <div class="d-flex bg-light justify-content-between">

                        <h4>Plant Products & Accessories</h4>

                        <div class="d-flex">
                            
                                  <div class="dropdown d-flex align-self-center ">
                                    <form method="post">
                                    <button class="btn bg-white text-dark dropdown-toggle p-2" type="button"
                                        id="dropdownMenuButton1"  data-bs-toggle="dropdown" aria-expanded="false">
                                        Sort
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li><button class="dropdown-item" href="#" name="sort-product-by-name">Sort by
                                                name</button></li>
                                        <li><button class="dropdown-item" href="#" name="sort-product-by-price">Sort by
                                                price</button></li>
                                        <li><button class="dropdown-item" href="#" ame="sort-product-by-category">Sort
                                                by category </button></li>
                                    </ul>
                                </form>
                                </div>
                                 <div>
                                    <button type="button" class="btn text-dark  bg-white  insert p-2" data-bs-toggle="modal"
                                data-bs-target="#insert-product-modal">Add product
                            </button>
                            </div>
                        </div>

                    </div>
                    <div class="table-responsive bg- ">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Price </th>
                                    <th scope="col">Stock </th>
                                    <th scope="col">Category </th>
                                    <th scope="col">Image </th>
                                    <th scope="col"> </th>

                                </tr>
                            </thead>
                            <tbody>

                                <?php
     if(isset($_POST['sort-product-by-name'])){
        $query = $pdo->query("SELECT * FROM products INNER JOIN categories ON products.categoryID = categories.categoryID ORDER BY products.productName ");
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
     }else if(isset($_POST['sort-product-by-price'])){
        $query = $pdo->query("SELECT * FROM products INNER JOIN categories ON products.categoryID = categories.categoryID ORDER BY products.productPrice ");
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
     }else if(isset($_POST['sort-product-by-category'])){
        $query = $pdo->query("SELECT * FROM products INNER JOIN categories ON products.categoryID = categories.categoryID ORDER BY categories.categoryName ");
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
     }else{                           
                                $query = $pdo->query("SELECT * FROM `products` INNER JOIN categories ON products.categoryID = categories.categoryID order BY products.productID");
                                $result = $query->fetchAll(PDO::FETCH_ASSOC);
     }
                                foreach ($result as $row) {
                                ?>
                                <tr class="tr-row">
                                    <th scope="row">
                                        <?php echo $row['productID'] ?>
                                    </th>

                                    <td>
                                        <?php echo $row['productName'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['productDescription'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['productPrice'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['productStock'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['categoryName'] ?>
                                    </td>
                                    <td>
                                        <img src="images/products/<?php echo $row['productImage'] ?>" width="50%" alt="">

                                    </td>


                                    <td class="">
                                        <button class="btn btn-white edit-btn " data-bs-toggle="modal"
                                            data-bs-target="#update-product-modal<?php echo $row['productID']  ?>">
                                            <i class="fa fa-edit"></i>
                                        </button>

                                        <button class="btn btn-white" data-bs-toggle="modal"
                                            data-bs-target="#delete-product-modal<?php echo $row['productID']  ?>">
                                            <i class="fa fa-trash"></i>
                                        </button>

                                    </td>
                                </tr>
                                      <!-------------------------------------------------                                         |                                                 |
                                        | modal for update products information           | 
                                        | [start]                                         |      
                                        -------------------------------------------------->
                                <div class="modal" id="update-product-modal<?php echo $row['productID'] ?>">
                                    <div class="modal-dialog modal-xl bg-light ">
                                        <div class="modal-content bg-light">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Edit Information</h4>
                                                <button type="button" class="btn-close  bg-white"
                                                    data-bs-dismiss="modal"></button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                <form method="post" action="" enctype="multipart/form-data">


                                                    <div class="mb-3 row">
                                                        <label for="inputPassword"
                                                            class="col-sm-2 col-form-label">ID</label>
                                                        <div class="col-sm-10">
                                                            <input value="<?php echo $row['productID'] ?>" readonly
                                                                class="form-control bg-white" name="update-product-id">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row form-group">
                                                        <label class="col-sm-2 col-form-label">Name</label>
                                                        <div class="col-sm-10">
                                                            <input value="<?php echo $row['productName'] ?>"
                                                                name="update-product-name" class="form-control"
                                                                type="text">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row form-group">
                                                        <label class="col-sm-2 col-form-label">Description</label>
                                                        <div class="col-sm-10">
                                                            <input value="<?php echo $row['productDescription'] ?>"
                                                                name="update-product-description" class="form-control"
                                                                type="text">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row form-group">
                                                        <label class="col-sm-2 col-form-label">Price</label>
                                                        <div class="col-sm-10">
                                                            <input value="<?php echo $row['productPrice'] ?>"
                                                                name="update-product-price" class="form-control"
                                                                type="text">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row form-group">
                                                        <label class="col-sm-2 col-form-label">Stock</label>
                                                        <div class="col-sm-10">
                                                            <input value="<?php echo $row['productStock'] ?>"
                                                                name="update-product-stock" class="form-control"
                                                                type="text">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row form-group">
                                                        <label class="col-sm-2 col-form-label">Category</label>
                                                        <div class="col-sm-10">
                                                            <?php
                                                            $sqlc = "SELECT * FROM categories";
                                                            $resultc = $pdo->query($sqlc);
                                                            $categories = $resultc->fetchAll(PDO::FETCH_ASSOC);
                                                            ?>

                                                            <select name="update-product-category" class="form-control">
                                                                <?php foreach ($categories as $category) { ?>
                                                                <?php $selected = ($row['categoryID'] == $category['categoryID']) ? "selected" :                                                          ""; ?>
                                                                <option <?php echo $selected; ?> value="
                                                                    <?php echo $category['categoryID']; ?>">
                                                                    <?php echo $category['categoryName']; ?>
                                                                </option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3  row form-group">
                                                        <label for="" class="col-sm-2 col-form-label">Change
                                                            Image</label>
                                                        <div class="col-sm-10">
                                                            <input type="file" name="update-product-image"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row form-group">
                                                        <label for="" class="col-sm-2 col-form-label">Product
                                                            Image</label>
                                                        <div class="col-sm-10"><img width="50%"
                                                                src="images/products/<?php echo $row['productImage']  ?>"
                                                                alt="">
                                                        </div>

                                                    </div>
                                                    <!-- Modal footer -->
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-dark text-white"
                                                            name="update_product_info">
                                                            Update</button>
                                                        <button type="button" class="btn btn-danger"
                                                            data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                        <!-------------------------------------------------
                                        | modal for update products information           | 
                                        | [end]                                           |
                                        -------------------------------------------------->
                                        <!-------------------------------------------------
                                        | modal for delete category information           | 
                                        | [start]                                         |
                                        -------------------------------------------------->
                                <div class="modal " id="delete-product-modal<?php echo $row['productID'] ?>">
                                    <div class="modal-dialog modal-xl bg-light w-50">
                                        <div class="modal-content bg-light">
                                            <div class="modal-header">
                <h4 class="modal-title">Delete products</h4>
                <button type="button" class="btn-close  bg-white"
                    data-bs-dismiss="modal"></button>
            </div>
                                            <!-- Modal body -->
                                            <div class="modal-body ">
                                                <form method="post">
                                                    <div class="d-flex justify-centre">
                                                        <div>
                                                            <input type="hidden" name="delete_product_id"
                                                                value="<?php echo $row['productID']; ?>">
                                                            <span class="text-bold">'
                                                                <?php echo $row['productName'] ?>'
                                                            </span>
                                                            <span> will also delete from database. <span>
                                                                    <p>Are you sure you want to permanently delete this?
                                                                    </p>
                                                        </div>
                                                    </div>

                                                    <!-- Modal footer -->
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-dark text-white"
                                                            name="delete_product_info">
                                                            Yes</button>
                                                        <button type="button" class="btn btn-danger"
                                                            data-bs-dismiss="modal">No</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                        <!-------------------------------------------------
                                        |                                                 |
                                        | modal for delete category information           | 
                                        | [end]                                           |
                                        |                                                 |      
                                        -------------------------------------------------->
                                <?php
                                };

                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

                                       <!-------------------------------------------------                                                              |                                                 |
                                        | modal for insert category information           | 
                                        | [start]                                         |
                                        |                                                 |      
                                        -------------------------------------------------->
<div class="modal" id="insert-product-modal">
    <div class="modal-dialog modal-xl bg-white">
        <div class= "modal-content bg-white">
            <div class="modal-header">
                <h4 class="modal-title">Add Category</h4>
                <button type="button" class="btn-close bg-white" data-bs-dismiss="modal"></button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form method="post" action="" enctype="multipart/form-data">

                    <div class="mb-3 row form-group">
                        <label for="" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10"> <input placeholder="Insert product name.." class="form-control bg-white"
                                name="insert-product-name"></div>
                    </div>
                    <div class="mb-3 row form-group">
                        <label for="" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10"> <input placeholder="Add description" class="form-control bg-white"
                                name="insert-product-description"></div>
                    </div>
                    <div class="mb-3 row form-group">
                        <label for="" class="col-sm-2 col-form-label">Price</label>
                        <div class="col-sm-10"> <input placeholder="Enter price" class="form-control bg-white"
                                name="insert-product-price"></div>
                    </div>
                    <div class="mb-3 row form-group">
                        <label for="" class="col-sm-2 col-form-label">Stock</label>
                        <div class="col-sm-10"> <input placeholder="Add number of stock" class="form-control bg-white"
                                name="insert-product-stock"></div>
                    </div>
                    <div class="mb-3 row form-group">
                        <label for="" class="col-sm-2 col-form-label">Category</label>
                        <div class="col-sm-10">
                            <?php
                            $sqlc = "SELECT * FROM categories";
                            $resultc = $pdo->query($sqlc);
                            $classes = $resultc->fetchAll(PDO::FETCH_ASSOC);
                            ?>

                            <select name="insert-product-category" class="form-control ">
                                <?php foreach ($classes as $rowc) { ?>

                                <option value="<?php echo $rowc['categoryID']; ?>">
                                    <?php echo $rowc['categoryName']; ?>
                                </option>
                                <?php
                                };
                                ?>
                            </select>

                        </div>
                    </div>

                    <div class="mb-3 row form-group">
                        <label for="" class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-10">
                            <input type="file" name="insert-product-image" class="form-control bg-white">
                        </div>
                    </div>



                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" name="insertProduct" class="btn btn-dark text-white">Add</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

                                        <!-------------------------------------------------
                                        |                                                 |
                                        | modal for insert category information           | 
                                        | [end]                                           |
                                        |                                                 |      
                                        -------------------------------------------------->

<script src="js/script.js"></script>
<script>
    function togglePasswordVisibility() {
        const passwordInput = document.querySelector('.password-input');
        const eyeIcon = document.querySelector('.toggle-password i');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            eyeIcon.classList.add('visible');
        } else {
            passwordInput.type = 'password';
            eyeIcon.classList.remove('visible');
        }
        // alert('hello');
    }
</script>
<?php
include('footer.php');
?>