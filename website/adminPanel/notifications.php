<?php
include('header_admin.php')
?>
<div class="container pt-4">
    <div class="bg-light rounded p-4">
        <div class="row">
            <div class="col-12">
                <div class="bg-white rounded h-100 ">
                    <div class="d-flex bg-light justify-content-between">

                        <h4>Orders notifications</h4>




                    </div>
                    <div class="table-responsive bg- ">
                        <table class="table">

                            <tbody>
                                
                                <?php
                        $query = $pdo->query("SELECT * from orders INNER JOIN users on orders.userID = users.userID INNER JOIN products on orders.productID = products.productID where orderStatus = 'pending'");
                        $result = $query->fetchAll(PDO::FETCH_ASSOC);
               
                        foreach($result as $row){
                        ?>
                                <tr class="tr-row">

                                    <td class="d-flex justify-content-around">
                                        <span class="flex-grow-1">
                                            <a href="orders.php" class="link-secondary">
                                                <?php echo ucfirst($row['firstName'])?> 
                                                placed an order 
                                            </a>
                                        </span>
                                        <form method="post">
                                            <input type="hidden" name="notification-order-id"
                                                value="<?php echo $row['orderID']?>">
                                            <button class="approve-btn btn btn-secondary"
                                                name='order-approve-btn'
                                                onclick="approveRow(this)">Approve</button>


                                            <button class="reject-btn btn btn-light"
                                                name='order-reject-btn'
                                                onclick="rejectRow(this)">Reject</button>
                                        </form>
                                    </td>

                                </tr>


                                <?php
                        }if(empty($result)){
                            ?>
                                <tr>

                                    <td class="d-flex justify-content-center p-5">
                                        
                                            <p>
                                                No Orders

                                            </p>
                                        
                                    </td>
                                </tr>
                                <?php
                        }

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