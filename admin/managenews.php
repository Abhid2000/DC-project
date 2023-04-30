<?php 

require('connection.php');
require('functions.php');

if (isset($_GET['type']) && $_GET['type']!='') {
    $type = get_safe_value($con,$_GET['type']);
    if ($type=='delete') {
        $id = get_safe_value($con,$_GET['id']);

        $delete_sql = "DELETE FROM tbl_news WHERE id = '$id'";
        mysqli_query($con,$delete_sql);
    }
}

$sql = "SELECT * FROM tbl_news order by id desc";
$res = mysqli_query($con,$sql);


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
                            <h5 class="m-b-10">News</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Manage News</a></li>
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
                        <h5>Manage News</h5>
                    </div>
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr class="text-center">
                                        <th>News Images</th>
                                        <th>News Title</th>
                                        <th>News Date</th>
                                        <th>Posted By User</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while($row = mysqli_fetch_assoc($res)) {?>
                                    <tr class="text-center">
                                        <td><img src="../news/<?php echo $row['images']?>" width="200px" height="100px"></td>
                                        <td><?php echo $row['title']?></td>
                                        <td><?php echo $row['ndate']?></td>
                                        <td><?php echo $row['puser']?></td>
                                        <td>
                                             <?php 
                                            
                                                echo "<a href='editnews.php?id=".$row['id']."' style='color:green;font-weight:bold;font-size:18px;'><i class='fas fa-edit'></i></a>&nbsp;&nbsp;&nbsp;";

                                                echo "<a href='?type=delete&id=".$row['id']."' style='color:red;font-weight:bold;font-size:18px;'><i class='fas fa-trash'></i></a>";
                                            ?>
                                        </td>
                                    </tr>
                                    <?php $i++;}?>
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