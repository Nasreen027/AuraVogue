<?php
include_once('header_admin.php');
?>

<div class="container pt-4">
    <div class="bg-light rounded p-4">
        <div class="row">
            <div class="col-12">
                <div class="bg-white rounded h-100 ">
                    <div class="d-flex bg-light justify-content-between">

                        <h4>My Profile</h4>
                    </div>
                    <div class="p-3 ">
                        <table>

                            <tbody>
                                <?php
                                 $admin = $_SESSION['Admin'];

                                 foreach($admin as  $value){
                                    $U_ID =   $value['adminID'];
                                  $query = $pdo->prepare("SELECT * FROM admins WHERE adminID = :iD ");
                                  $query->bindParam(':iD',  $U_ID);
                                  $query->execute();
                                  $result = $query->fetchAll(PDO::FETCH_ASSOC);
                                 }
                                  foreach ($result as $row) {
                                 

                        ?>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Name</label>
                                    <input type="text" class="form-control" readonly
                                        value="<?php echo $row['adminName'] ?>" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">

                                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                                    <input type="email" class="form-control" readonly
                                        value="<?php echo $row['adminEmail'] ?>" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Password</label>
                                    <input type="password" readonly class="form-control"
                                        value="<?php echo $row['password'] ?>" id="exampleInputPassword1">
                                </div>

                                <button class="btn  edit-btn " data-bs-toggle="modal"
                                    data-bs-target="#update-admin-modal<?php echo $row['adminID']  ?>">
                                    Update Account
                                </button>
                                <button class="btn  text-danger edit-btn mr-5 " data-bs-toggle="modal"
                                    data-bs-target="#delete-admin-modal<?php echo $row['adminID']  ?>">Delete account
                                    
                                </button>

                                        <!-------------------------------------------------
                                        | modal for update admin information              | 
                                        | [start]                                         |    
                                        -------------------------------------------------->
                                <div class="modal" id="update-admin-modal<?php echo $row['adminID'] ?>">
                                    <div class="modal-dialog modal-xl bg-light ">
                                        <div class="modal-content bg-light">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Update Account</h4>
                                                <button type="button" class="btn-close  bg-white"
                                                    data-bs-dismiss="modal"></button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                <form method="post" action="" enctype="multipart/form-data">

                                                    <input value="<?php echo $row['adminID'] ?>" name="model-admin-ID"
                                                        class="form-control" type="hidden">
                                                    <?php
                                                    if($row['adminImage']){
                                                           ?>

                                                    <div class="mb-3 row">
                                                        <label class="col-sm-2 col-form-label">Profile picture</label>
                                                        <div class="col-sm-10 rounded-circle">
                                                            <img class=" rounded-circle me-lg-2"
                                                                src="img/<?php echo $row['adminImage'] ?>"
                                                                style="width: 150px; height: 150px;">

                                                        </div>
                                                    </div>
                                                    <?php
                                                    }?>
                                                    <div class="mb-3 row">
                                                        <label class="col-sm-2 col-form-label">Name</label>
                                                        <div class="col-sm-10">
                                                            <input value="<?php echo $row['adminName'] ?>"
                                                                id="modal-category-name" name="model-admin-name"
                                                                class="form-control" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label class="col-sm-2 col-form-label">Email</label>
                                                        <div class="col-sm-10">
                                                            <input value="<?php echo $row['adminEmail'] ?>"
                                                                name="modal-admin-email" class="form-control"
                                                                type="text">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label class="col-sm-2 col-form-label">Password</label>
                                                        <div class="col-sm-10 password-div">
                                                            <input value="<?php echo $row['password'] ?>"
                                                                name="modal-admin-password"
                                                                class="form-control password-input" type="password">
                                                            <span class="toggle-password"
                                                                onclick="togglePasswordVisibility()">
                                                                <i class="fa fa-eye"></i>
                                                            </span>
                                                        </div>
                                                    </div>

                                                    <?php
                                                    if(empty($row['adminImage'])){
                                                    ?>
                                                    <div class="mb-3 row">
                                                        <label class="col-sm-2 col-form-label">Add profile
                                                            picture</label>
                                                        <div class="col-sm-10">
                                                            <input type="file" name="modal-admin-image"
                                                                class="form-control bg-white">

                                                        </div>
                                                    </div>

                                                    <?php
 }
 ?>
                                                    <?php
                                                    if($row['adminImage']){
                                                           ?>
                                                    <div class="mb-3 row">
                                                        <div class="d-flex">
                                                        <label class="col-sm-2 col-form-label">Update profile
                                                            picture</label>
                                                        <div class="col-sm-10 d">
                                                            <input type="file" name="modal-admin-image"
                                                                class="form-control bg-white">
                                                            </div>
                                                            
                                                        
                                                      
                                                        </div>
                                                    </div>
                                                    <?php
                                                    }
                                                    ?>


                                                    <!-- Modal footer -->
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-dark text-white"
                                                            name="update_admin_info">
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
                                        | modal for update admin information              | 
                                        | [end]                                           |     
                                        -------------------------------------------------->

                                
                                       

                                        <!-------------------------------------------------
                                        | modal for delete admin information              | 
                                        | [start]                                         |    
                                        -------------------------------------------------->
                                <div class="modal " id="delete-admin-modal<?php echo $row['adminID'] ?>">
                                    <div class="modal-dialog modal-xl bg-light w-50">
                                        <div class="modal-content bg-light">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Delete Account </h4>
                                                <button type="button" class="btn-close  bg-white"
                                                    data-bs-dismiss="modal"></button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                <form method="post" action="" enctype="multipart/form-data">

                                                 
                                                <div class="d-flex justify-centre">
                                                        <div>
                                                            <input type="hidden" name="delete_admin_account"
                                                                value="<?php echo $row['adminID']; ?>">
                                                            <span class="text-bold">
                                                                <?php echo ucfirst($row['adminName']) ?>
                                                            </span>
                                                            <span>are you sure you want to delete your account?</span>
                                                        </div>
                                                    </div>


                                                    <!-- Modal footer -->
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-danger text-white"
                                                            name="delete_admin_info">
                                                            Delete</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                        <!-------------------------------------------------
                                        | modal for delete admin information              | 
                                        |  [end]                                          |     
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
include('footer.php')
?>