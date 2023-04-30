<?php 

require('connection.php');
require('functions.php');

$view=mysqli_query($con, "select * from tbl_caste where id='".$_GET['id']."' ");

if (isset($_POST['update_order_status'])) {
    $update_order_status=$_POST['update_order_status'];

    mysqli_query($con,"update tbl_caste set status='$update_order_status' where id='".$_GET['id']."'");

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
                            <h5 class="m-b-10">Certificate</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Manage Caste Certificate</a></li>
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
                        <h5>Manage Caste Certificate</h5>
                    </div>
                    <?php $row = mysqli_fetch_array($view);
                        // print_r($a);die();
                        ?>
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr class="text-center">
                                        <th>Caste</th>
                                        <th>Date of Birth</th>
                                        <th>Photo</th>
                                        <th>Aadhaar Card</th>
                                        <th>Ration Card</th>
                                        <th>Birth Certificate</th>
                                        <th>Voter ID Card</th>
                                        <th>Residance Proof</th>
                                        <th>Income Certificate</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="text-center">
                                        
                                        <td><?php echo $row['caste']?></td>
                                        <td><?php echo $row['dob']?></td>
                                        <td><img src="../caste/<?php echo $row['photo']?>" width="200px" height="100px"></td>
                                        <td><img src="../caste/<?php echo $row['aadhaarpic']?>" width="200px" height="100px"></td>
                                        <td><img src="../caste/<?php echo $row['ration']?>" width="200px" height="100px"></td>
                                        <td><img src="../caste/<?php echo $row['birth']?>" width="200px" height="100px"></td>
                                        <td><img src="../caste/<?php echo $row['voter']?>" width="200px" height="100px"></td>
                                        <td><img src="../caste/<?php echo $row['residance']?>" width="200px" height="100px"></td>
                                        <td><img src="../caste/<?php echo $row['income']?>" width="200px" height="100px"></td>
                                        <td><?php echo $row['status']?> <form method="post">
                                            <select class="form-control" name="update_order_status">
                                                <option>Select Status</option>
                                                <option value="Pending">Pending</option>
                                                <option value="Reject">Reject</option>
                                                <option value="Done">Done</option>
                                                <option value="Hold">Hold</option>
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