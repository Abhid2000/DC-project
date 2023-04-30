<?php 

require('connection.php');
require('functions.php');

if (isset($_POST['submit'])) {
    // prx($_FILES);
    $title = get_safe_value($con,$_POST['title']);
    $ndate = get_safe_value($con,$_POST['ndate']);
    $puser = get_safe_value($con,$_POST['puser']);
    $shortdesc = get_safe_value($con,$_POST['shortdesc']);
    $longdesc = get_safe_value($con,$_POST['longdesc']);

        $images = $_FILES['images']['name'];
        $dir = "../news/".$images;
        move_uploaded_file($_FILES['images']['tmp_name'], $dir);
    $sql = mysqli_query($con,"INSERT INTO tbl_news(title,ndate,puser,images,shortdesc,longdesc) VALUES('$title','$ndate','$puser','$images','$shortdesc','$longdesc')");


        if ($sql==TRUE) {
            header("location:managenews.php");
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
                            <h5 class="m-b-10">News</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Add News</a></li>
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
                        <h5>Add News</h5>
                    </div>
                    <div class="card-body">
                        <form method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="Email">News Title</label>
                                        <input type="text" class="form-control" id="Email" placeholder="News Title" name="title">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="inputEmail4">News Images</label>
                                        <input type="file" class="form-control" name="images" required="required" >
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="Email">News Date</label>
                                        <input type="date" class="form-control" id="Email" placeholder="News Date" name="ndate">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="inputEmail4">Posted By User</label>
                                        <input type="text" class="form-control" name="puser" required="required" placeholder="Posted By User">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="Email">Short Description</label>
                                        <textarea class="form-control" id="Email" placeholder="Short Description" name="shortdesc"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="inputEmail4">Long Description</label>
                                        <textarea class="form-control" name="longdesc" required="required" placeholder="Long Description"></textarea>
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



<?php require_once('footer.php')?>