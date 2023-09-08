<?php
include_once('header_admin.php');

?>
<div class="container pt-4">
    <div class="bg-light rounded p-4">
        <div class="row">
            <div class="col-12">
                <div class="bg-white rounded h-100 ">
                    <div class="d-flex bg-light justify-content-between">

                        <h4>Category</h4>
                        <div class="d-flex">

                            <form method="post">

                                <div class="dropdown d-flex align-self-center">
                                    <button class="btn text-dark  bg-white mb-2 dropdown-toggle" type="button"
                                        id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        SORT
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li><button class="dropdown-item" href="#" name="sort-category-by-name">Sort by
                                                name</button></li>

                                    </ul>
                                </div>


                            </form>
                        
                        <div>
                            <button type="button" class="btn text-dark  bg-white mb-2 insert" data-bs-toggle="modal"
                                data-bs-target="#insert-category-modal">Add category
                            </button>
                        </div>
                        </div>
                    </div>
                    <div class="table-responsive bg- ">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Category Name</th>
                                    <th scope="col">Image</th>
                                    <th scope="col"> </th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
     if(isset($_POST['sort-category-by-name'])){
        $query = $pdo->query("SELECT * FROM categories ORDER BY categoryName");
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        }else{
                          $query = $pdo->query("SELECT * FROM categories");
                        $result = $query->fetchAll(PDO::FETCH_ASSOC);
     }
                        foreach($result as $row){
                        ?>
                                <tr class="tr-row">
                                    <th scope="row">
                                        <?php echo $row['categoryID'] ?>
                                    </th>

                                    <td>
                                        <?php echo $row['categoryName'] ?>
                                    </td>
                                    <td style="width: 50%;">
                                        <img src="images/category/<?php echo $row['categoryImage'] ?>" width="50%"
                                            alt="">

                                    </td>


                                    <td class="">
                                        <button class="btn btn-white edit-btn " data-bs-toggle="modal"
                                            data-bs-target="#update-category-modal<?php echo $row['categoryID']  ?>">
                                            <i class="fa fa-edit"></i>
                                        </button>

                                        <button class="btn btn-white" data-bs-toggle="modal"
                                            data-bs-target="#delete-category-modal<?php echo $row['categoryID']  ?>">
                                            <i class="fa fa-trash"></i>
                                        </button>

                                    </td>
                                </tr>
                                        <!-------------------------------------------------                                         |                                                 |
                                        | modal for update category information           | 
                                        | [start]                                         |      
                                        -------------------------------------------------->
                                <div class="modal" id="update-category-modal<?php echo $row['categoryID'] ?>">
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
                                                            <input value="<?php echo $row['categoryID'] ?>" readonly
                                                                class="form-control bg-white" name="update-category-id">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row form-group">
                                                        <label class="col-sm-2 col-form-label">Name</label>
                                                        <div class="col-sm-10">
                                                            <input value="<?php echo $row['categoryName'] ?>"
                                                                id="modal-category-name" name="update-category-name"
                                                                class="form-control" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3  row form-group">
                                                        <label for="" class="col-sm-2 col-form-label">Change
                                                            Image</label>
                                                        <div class="col-sm-10">
                                                            <input type="file" name="update-category-image"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row form-group">
                                                        <label for="" class="col-sm-2 col-form-label">Category
                                                            Image</label>
                                                        <div class="col-sm-10"><img width="50%"
                                                                src="images/category/<?php echo $row['categoryImage']  ?>"
                                                                alt="">
                                                        </div>

                                                    </div>
                                                    <!-- Modal footer -->
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-dark text-white"
                                                            name="update_category_info">
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
                                        | modal for update category information           | 
                                        | [end]                                           |
                                        -------------------------------------------------->
                                        <!-------------------------------------------------
                                        | modal for delete category information           | 
                                        | [start]                                         |
                                        -------------------------------------------------->
                                <div class="modal " id="delete-category-modal<?php echo $row['categoryID'] ?>">
                                    <div class="modal-dialog modal-xl bg-light w-50">
                                        <div class="modal-content bg-light">
                                        <div class="modal-header">
                <h4 class="modal-title">Delete Category</h4>
                <button type="button" class="btn-close  bg-white"
                    data-bs-dismiss="modal"></button>
            </div>
                                            <!-- Modal body -->
                                            <div class="modal-body ">
                                                <form method="post">
                                                    <div class="d-flex justify-centre">
                                                        <div>
                                                            <input type="hidden" name="delete_category_id"
                                                                value="<?php echo $row['categoryID']; ?>">
                                                            <span class="text-bold">'
                                                                <?php echo $row['categoryName'] ?>'
                                                            </span>
                                                            <span> will also delete from database. <span>
                                                                    <p>Are you sure you want to permanently delete this?
                                                                    </p>
                                                        </div>
                                                    </div>

                                                    <!-- Modal footer -->
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-dark text-white"
                                                            name="delete_category_info">
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
                                        | modal for delete category information           | 
                                        | [end]                                           |     
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

                                        <!-------------------------------------------------
                                        | modal for insert category information           | 
                                        | [start]                                         |     
                                        -------------------------------------------------->
<div class="modal" id="insert-category-modal">
    <div class="modal-dialog modal-xl bg-white">
        <div class="modal-content bg-white">
            <div class="modal-header">
                <h4 class="modal-title">Add Category</h4>
                <button type="button" class="btn-close bg-white" data-bs-dismiss="modal"></button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form method="post" action="" enctype="multipart/form-data">

                    <div class="mb-3 row form-group">
                        <label for="" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10"> <input placeholder="Enter category name.." class="form-control bg-white"
                                name="insert-category-name"></div>
                    </div>

                    <div class="mb-3 row form-group">
                        <label for="" class="col-sm-2 col-form-label"> Image</label>
                        <div class="col-sm-10">
                            <input type="file" name="insert-category-image" class="form-control bg-white">
                        </div>
                    </div>



                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" name="insertCategory" class="btn btn-dark text-white">Add</button>
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