<?php
include('header_admin.php')
?>
<div class="container pt-4">
    <div class="bg-light rounded p-4">
        <div class="row">
            <div class="col-12">
                <div class="bg-white rounded h-100 ">
                    <div class="d-flex bg-light justify-content-between">

                        <h4>Reviews</h4>




                    </div>
                    <div class="table-responsive bg- ">
                        <table class="table">
                        <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Reviews</th>
                                    <th scope="col">Product</th>
                                    <th scope="col">User </th>
                                    <th scope="col">Date </th>
                                    <th scope="col"> </th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                        $query = $pdo->query("SELECT * FROM productreviews INNER JOIN products ON  productreviews.productID = products.productID  INNER JOIN users ON productreviews.userID=users.userID");
                        $result = $query->fetchAll(PDO::FETCH_ASSOC);
               
                        foreach($result as $row){
                        ?>
                                <tr class="tr-row">
                                <th scope="row">
                                            <?php echo $row['reviewID'] ?>
                                        </th>
                                    <td>
                                    <?php echo $row['reviews'] ?>
                                       

                                    </td>
                                    <td>
                                    <?php echo ucfirst($row['productName'])?>
                                       

                                    </td>
                                    <td>
                                    <?php echo ucfirst($row['firstName'] )?>
                                    <?php echo ucfirst($row['lastName'] )?>
                                       

                                    </td>
                                    <td>
                                    <?php echo $row['date'] ?>
                                       

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