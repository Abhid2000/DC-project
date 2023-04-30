<?php 

require('connection.php');
require('functions.php');

$view=mysqli_query($con, "select * from tbl_complaint where id='".$_GET['id']."' ");

if (isset($_POST['update_order_status'])) {
    $update_order_status=$_POST['update_order_status'];

    mysqli_query($con,"update tbl_complaint set status='$update_order_status' where id='".$_GET['id']."'");

}

require_once('sidebar.php');

?>

<section class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Complaints</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Manage Complaints</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ basic-table ] start -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Manage Complaints</h5>
                    </div>
                    <?php $row = mysqli_fetch_array($view);
                        // print_r($a);die();
                        ?>
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr class="text-center">
                                        <th>Date of Complaints</th>
                                        <th>Location Address</th>
                                        <th>Problem Description</th>
                                        <th>Location Image</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="text-center">
                                        
                                        <td><?php echo $row['doc']?></td>
                                        <td><?php echo $row['laddress']?></td>
                                        <td><?php echo $row['pdesc']?></td>
                                        <td><img src="../complaint/<?php echo $row['lphoto']?>" width="200px" height="100px"></td>
                                        <td><?php echo $row['status']?> <form method="post">
                                            <select class="form-control" name="update_order_status">
                                                <option>Select Status</option>
                                                <option value="Pending">Pending</option>
                                                <option value="Processing">Processing</option>
                                                <option value="Hold">Hold</option>
                                                <option value="Done">Done</option>
                                            </select>
                                                
                                            <input type="submit" name="submit" class="btn  btn-primary" value="Submit">
                                        </form></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php require_once('footer.php')?>