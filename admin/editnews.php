<?php 
require('connection.php');
require('functions.php');

$view=mysqli_query($con, "select * from tbl_news where id='".$_GET['id']."' ");

if (isset($_POST['submit'])) {
    $title = get_safe_value($con,$_POST['title']);
    $ndate = get_safe_value($con,$_POST['ndate']);
    $puser = get_safe_value($con,$_POST['puser']);
    $shortdesc = get_safe_value($con,$_POST['shortdesc']);
    $longdesc = get_safe_value($con,$_POST['longdesc']);
		$images = $_FILES['images']['name'];

// prx($_POST);die();

    $sql = mysqli_query($con,"UPDATE tbl_news set title='$title',ndate='$ndate', puser='$puser', shortdesc='$shortdesc', longdesc='$longdesc', images='$images' WHERE id='".$_GET['id']."'");
    
    $dir1='../news/'.$images;

    if ($sql==TRUE) {
    	 move_uploaded_file($_FILES['images']['tmp_name'],$dir1);
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
                            <li class="breadcrumb-item"><a href="#!">Edit News</a></li>
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
                        <h5>Edit News</h5>
                    </div>
                    <div class="card-body">
                        <form method="post" enctype="multipart/form-data">
                        <?php $row = mysqli_fetch_array($view);
                        // print_r($a);die();
                        ?>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="Email">News Title</label>
                                        <input type="text" class="form-control" id="Email" placeholder="Event Title" name="title" value="<?php echo $row['title']?>">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="inputEmail4">News Images</label>
                                        <input type="file" class="form-control" name="images" required="required" value="<?php echo $row['images']?>">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <img src="../news/<?php echo $row['images']?>" width="80px">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="Email">News Date</label>
                                        <input type="date" class="form-control" id="Email" placeholder="Event Date" name="ndate" value="<?php echo $row['ndate']?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="inputEmail4">Posted By User</label>
                                        <input type="text" class="form-control" name="puser" required="required" placeholder="Posted By User" value="<?php echo $row['puser']?>">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="Email">Short Description</label>
                                        <textarea class="form-control" id="Email" placeholder="Short Description" name="shortdesc"><?php echo $row['shortdesc']?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="inputEmail4">Long Description</label>
                                        <textarea class="form-control" name="longdesc" required="required" placeholder="Long Description"><?php echo $row['longdesc']?></textarea>
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