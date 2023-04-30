<?php 

require('connection.php');
require('functions.php');

if (isset($_POST['submit'])) {
    // prx($_FILES);
    $title = get_safe_value($con,$_POST['title']);
    $headings = get_safe_value($con,$_POST['headings']);
    $description = get_safe_value($con,$_POST['description']);

        $images = $_FILES['images']['name'];
        $dir = "../tenders/".$images;
        move_uploaded_file($_FILES['images']['tmp_name'], $dir);
    $sql = mysqli_query($con,"INSERT INTO tbl_tender(title,headings,description,images) VALUES('$title','$headings','$description','$images')");
        
        $id = mysqli_insert_id($con);
        if (isset($_POST['headingsd']) && $_POST['descriptiond']) {
             foreach($_POST['headingsd'] as $key=>$val){
                $images = rand(111111,99999999).'_'.$_FILES['tender_images']['name'][$key];
                $headingsd = get_safe_value($con,$_POST['headingsd'][$key]);
                $descriptiond = get_safe_value($con,$_POST['descriptiond'][$key]);
                $dir = "../tender_images/".$images;
                move_uploaded_file($_FILES['tender_images']['tmp_name'][$key], $dir);

                mysqli_query($con,"INSERT INTO tbl_tender_details(tender_id,tender_images,headingsd,descriptiond) VALUES('$id','$images','$headingsd','$descriptiond')");
            }
        }


        if ($sql==TRUE) {
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
                            <li class="breadcrumb-item"><a href="#!">Add Tenders</a></li>
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
                        <h5>Add Tenders</h5>
                    </div>
                    <div class="card-body">
                        <form method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="Email">Tender Title</label>
                                        <input type="text" class="form-control" id="Email" placeholder="Tender Title" name="title">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                <div class="row" id="image-box">
                                    <div class="col-md-10">
                                            <label for="inputEmail4">Tender Images</label>
                                            <input type="file" class="form-control" name="images" required="required" >
                                        </div>
                                        <div class="col-md-2">
                                            <a href="javascript:void(0)" class="btn btn-primary" onclick="add_more_images()" style="margin-top: 25px;">Add More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="row" id="text-box">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                    <label for="password">Headings</label>
                                                    <input type="text" class="form-control" placeholder="Headings" name="headings">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="password">Description</label>
                                                <textarea class="form-control" placeholder="Description" name="description"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <a href="javascript:void(0)" class="btn btn-primary" onclick="add_more_text()" style="margin-top: 25px;">Add More</a>
                                        </div>
                                    </div>
                                </div>
                                
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