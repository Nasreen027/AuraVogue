<?php
include_once('header_admin.php')
?>
<div class="container pt-4">
    <div class="bg-light rounded p-4">
        <div class="row">
            <div class="col-12">
                <div class="bg-white rounded h-100 ">
                    <div class="d-flex bg-light justify-content-between">

                        <h4>User Details  </h4>




                    </div>
                    <div class="table-responsive bg- ">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>

                                    <td>First Name</td>
                                    <td>Last Name</td>
                                    <td>Email </td>
                                    

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                        $query = $pdo->query("SELECT * FROM users");
                        $result = $query->fetchAll(PDO::FETCH_ASSOC);
               
                        foreach($result as $row){
                        ?>
                                <tr class="tr-row">
                                    <th scope="row">
                                        <?php echo $row['userID'] ?>
                                    </th>

                                    <td>
                                        <?php echo ucfirst($row['firstName']) ?>
                                    </td>
                                    <td>
                                        <?php echo ucfirst($row['lastName'] )?>
                                    </td>
                                   
                                    <td>
                                        <?php echo $row['userEmail'] ?>
                                    </td>
                                    
                                   

                                </tr>


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
<script src="js/script.js"></script>

<?php
include('footer.php')
?>