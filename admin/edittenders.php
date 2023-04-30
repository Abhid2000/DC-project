<?php 

require('connection.php');
require('functions.php');

$multipleTenderArr=[];
$id = $_GET['id'];

if (isset($_GET['pi']) && $_GET['pi']>0) {
        $pi = get_safe_value($con,$_GET['pi']);

        $delete_sql = "DELETE FROM tbl_tender_details WHERE id = '$pi'";
        mysqli_query($con,$delete_sql);
    }

    $view=mysqli_query($con, "select * from tbl_tender where id='".$_GET['id']."' ");

$resImages = mysqli_query($con,"select * from tbl_tender_details where tender_id = '".$_GET['id']."'");

if(mysqli_num_rows($resImages)>0) {
            $jj=0;
        while($rowImages=mysqli_fetch_assoc($resImages)){
            $multipleTenderArr[$jj]['tender_images']=$rowImages['tender_images'];
            $multipleTenderArr[$jj]['id']=$rowImages['id'];
            $multipleTenderArr[$jj]['tender_id']=$rowImages['tender_id'];
            $multipleTenderArr[$jj]['headingsd']=$rowImages['headingsd'];
            $multipleTenderArr[$jj]['descriptiond']=$rowImages['descriptiond'];
            $jj++;
        }
       
    }


    if (isset($_POST['submit'])) {
        $title = get_safe_value($con,$_POST['title']);
    $headings = get_safe_value($con,$_POST['headings']);
    $description = get_safe_value($con,$_POST['description']);
            $images = $_FILES['images']['name'];
    
    
    

    if (isset($_GET['id']) && $_GET['id']!='') {
        foreach($_POST['headingsd'] as $key=>$val){
            if ($_POST['headingsd'][$key]!='') {
                if (isset($_POST['tender_images_id'][$key])) {
                    $pheadings=$_POST['headingsd'][$key];
                    $pdescriptiond=$_POST['descriptiond'][$key];
                    $pimages = rand(111111,99999999).'_'.$_FILES['tender_images']['name'][$key];
                    $dir = "../tender_images/".$pimages;
                    move_uploaded_file($_FILES['tender_images']['tmp_name'][$key], $dir);

                    $sql1=mysqli_query($con,"UPDATE tbl_tender_details set tender_images='$pimages',headingsd='$pheadings',descriptiond='$pdescriptiond' where id='".$_POST['tender_images_id'][$key]."'");
                   
                }else{
                    $pheadings=$_POST['headingsd'][$key];
                    $pdescriptiond=$_POST['descriptiond'][$key];
                    $pimages = rand(111111,99999999).'_'.$_FILES['tender_images']['name'][$key];
                    $dir = "../tender_images/".$pimages;
                    move_uploaded_file($_FILES['tender_images']['tmp_name'][$key], $dir);

                    mysqli_query($con,"INSERT INTO tbl_tender_details(tender_id,tender_images,headingsd,descriptiond) VALUES('$id','$pimages','$headingsd','$descriptiond')");
                }
            }
        }
    }
// print_r($_POST);die();

    // print_r($_FILES);die();
    $sql = mysqli_query($con,"UPDATE tbl_tender set title='$title',headings='$headings', description='$description', images='$images' WHERE id='".$_GET['id']."'");
    
    $dir1='../tenders/'.$images;

    if ($sql==TRUE) {
    	 move_uploaded_file($_FILES['images']['tmp_name'],$dir1);
        header("location:managetenders.php");
        die();
    }

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
                            <h5 class="m-b-10">Tenders</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Edit Tenders</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Edit Tenders</h5>
                    </div>
                    <div class="card-body">
                        <form method="post" enctype="multipart/form-data">
                        <?php $row = mysqli_fetch_array($view);
                        // print_r($a);die();
                        ?>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="Email">Tender Title</label>
                                        <input type="text" class="form-control" id="Email" placeholder="Tender Title" name="title" value="<?php echo $row['title']?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                <div class="row" id="image-box">
                                    <div class="col-md-8">
                                            <label for="inputEmail4">Tender Images</label>
                                            <input type="file" class="form-control" name="images" required="required" value="<?php echo $row['images']?>">
                                        </div>
                                        <div class="col-md-2">
                                            <img src="../tenders/<?php echo $row['images']?>" width="80px">
                                        </div>
                                        <div class="col-md-2">
                                            <a href="javascript:void(0)" class="btn btn-primary" onclick="add_more_images()" style="margin-top: 25px;">Add More</a>
                                        </div>
                                        <?php 
                                        if (isset($multipleTenderArr[0])) {
                                            foreach($multipleTenderArr as $list){
                                                echo '<div class="col-md-6" style="margin-top:20px;" id="add_text_box_'.$list['id'].'"><label for="inputEmail4">Tender Images</label><input type="file" class="form-control" name="tender_images[]"><a href="edittenders.php?id='.$id.'&pi='.$list['id'].'" class="btn btn-danger" style="margin-top:10px">Remove</a>';
                                                echo '<img src="../tender_images/'.$list['tender_images'].'" width="80px">';
                                                echo '<input type="hidden" name="tender_images_id[]" value="'.$list['id'].'"></div>';
                                            }
                                        }
                                    ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="row" id="text-box">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                    <label for="password">Headings</label>
                                                    <input type="text" class="form-control" placeholder="Headings" name="headings" value="<?php echo $row['headings']?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="password">Description</label>
                                                <textarea class="form-control" placeholder="Description" name="description"><?php echo $row['description']?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <a href="javascript:void(0)" class="btn btn-primary" onclick="add_more_text()" style="margin-top: 25px;">Add More</a>
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                                <?php 
                                        if (isset($multipleTenderArr[0])) {
                                            foreach($multipleTenderArr as $list){
                                                echo '<div class="col-lg-12" id="add_text_box_'.$list['id'].'"><div class="row"><div class="col-md-4" style="margin-top:20px;"><label for="inputEmail4">Tender Headings</label><input type="text" class="form-control" name="headingsd[]" value="'.$list['headingsd'].'"></div>';
                                                echo '<div class="col-md-6" style="margin-top:20px;"><label for="inputEmail4">Tender Description</label><textarea class="form-control" name="descriptiond[]">'.$list['descriptiond'].'</textarea>';
                                                echo '<input type="hidden" name="tender_images_id[]" value="'.$list['id'].'"></div><div class="col-lg-2"><a href="edittenders.php?id='.$id.'&pi='.$list['id'].'" class="btn btn-danger" style="margin-top:10px">Remove</a></div></div></div>';
                                            }
                                        }
                                    ?>
                            </div>
                                <button type="submit" class="btn btn-primary mb-4" name="submit">Submit</button>
                                <button type="reset" class="btn btn-danger mb-4">Cancel</button>
                        </form>
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