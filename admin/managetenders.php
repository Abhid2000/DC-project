<?php 

require('connection.php');
require('functions.php');

if (isset($_GET['type']) && $_GET['type']!='') {
    $type = get_safe_value($con,$_GET['type']);
    if ($type=='delete') {
        $id = get_safe_value($con,$_GET['id']);

        $delete_sql = "DELETE FROM tbl_tender WHERE id = '$id'";
        mysqli_query($con,$delete_sql);
    }
}

$sql = "SELECT * FROM tbl_tender order by id desc";
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
                            <h5 class="m-b-10">Tenders</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Manage Tenders</a></li>
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
                        <h5>Manage Tenders</h5>
                    </div>
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr class="text-center">
                                        <th>Tender ID</th>
                                        <th>Tender Images</th>
                                        <th>Tender Title</th>
                                        <th>Tender Headings</th>
                                        <th>Tender Descriptions</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while($row = mysqli_fetch_assoc($res)) {?>
                                    <tr class="text-center">
                                        <td><a href="tenderdetails.php?id=<?php echo $row['id']?>" class="btn btn-success"><?php echo $row['id']?></a></td>
                                        <td><img src="../tenders/<?php echo $row['images']?>" width="200px" height="100px"></td>
                                        <td><?php echo $row['title']?></td>
                                        <td><?php echo $row['headings']?></td>
                                        <td><?php echo $row['description']?></td>
                                        <td>
                                             <?php 
                                            
                                                echo "<a href='edittenders.php?id=".$row['id']."' style='color:green;font-weight:bold;font-size:18px;'><i class='fas fa-edit'></i></a>&nbsp;&nbsp;&nbsp;";

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

<script type="text/javascript">

var total_image = 1;
    function add_more_images(){
        total_image++;
        var html='<div class="col-md-6" style="margin-top:20px;" id="add_image_box_'+total_image+'"><label for="inputEmail4">Tender Images</label><input type="file" class="form-control" name="tender_images[]" required="required"><a href="javascript:void(0)" class="btn btn-danger" style="margin-top:10px" onclick=remove_images("'+total_image+'")>Remove</a></div>'
        jQuery('#image-box').append(html);
    }

function remove_images(id){
    jQuery('#add_image_box_'+id).remove();
}
</script>

<script type="text/javascript">

var total_text = 1;
    function add_more_text(){
        total_text++;
        var html='<div class="col-lg-12" id="add_text_box_'+total_text+'"><div class="row"><div class="col-md-4" style="margin-top:20px;"><label for="inputEmail4">Headings '+total_text+'</label><input type="text" class="form-control" name="headingsd[]" required="required"></div><div class="col-md-6" style="margin-top:20px;"><label for="inputEmail4">Description '+total_text+'</label><textarea class="form-control" name="descriptiond[]" required="required"></textarea></div><div class="col-lg-2"><a href="javascript:void(0)" class="btn btn-danger" style="margin-top:10px;margin-bottom:20px" onclick=remove_text("'+total_text+'")>Remove</a></div></div></div>'
        jQuery('#text-box').append(html);
    }

function remove_text(id){
    jQuery('#add_text_box_'+id).remove();
}
</script>

<?php require_once('footer.php')?>