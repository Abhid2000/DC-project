<?php 
require('connection.php');
require('functions.php');

$view=mysqli_query($con, "select * from tbl_councilor where id='".$_GET['id']."' ");

if (isset($_POST['submit'])) {
    $name = get_safe_value($con,$_POST['name']);
    $designation = get_safe_value($con,$_POST['designation']);
    $fblink = get_safe_value($con,$_POST['fblink']);
    $instalink = get_safe_value($con,$_POST['instalink']);
    $twitterlink = get_safe_value($con,$_POST['twitterlink']);
    $linkedin = get_safe_value($con,$_POST['linkedin']);
		$images = $_FILES['images']['name'];

// prx($_POST);die();

    $sql = mysqli_query($con,"UPDATE tbl_councilor set name='$name',designation='$designation', fblink='$fblink', instalink='$instalink', twitterlink='$twitterlink', linkedin='$linkedin', images='$images' WHERE id='".$_GET['id']."'");
    
    $dir1='../employee/'.$images;

    if ($sql==TRUE) {
    	 move_uploaded_file($_FILES['images']['tmp_name'],$dir1);
        header("location:managecouncilor.php");
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
                            <h5 class="m-b-10">Councilor</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Edit Councilor</a></li>
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
                        <h5>Edit Councilor</h5>
                    </div>
                    <div class="card-body">
                        <form method="post" enctype="multipart/form-data">
                        <?php $row = mysqli_fetch_array($view);
                        // print_r($a);die();
                        ?>
                             <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="Email">Name</label>
                                        <input type="text" class="form-control" id="Email" placeholder="Name" name="name" value="<?php echo $row['name']?>">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="inputEmail4">Designation</label>
                                        <input type="text" class="form-control" name="designation" required="required" placeholder="Designation" value="<?php echo $row['designation']?>">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label for="inputEmail4">Images</label>
                                        <input type="file" class="form-control" name="images" required="required" value="<?php echo $row['images']?>">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <img src="../employee/<?php echo $row['images']?>" width="80px">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="Email">Facebook Profile Link</label> 
                                        <input type="text" class="form-control" id="Email" placeholder="Facebook Profile Link" name="fblink" value="<?php echo $row['fblink']?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="inputEmail4">Instagram Profile Link</label>
                                        <input type="text" class="form-control" name="instalink" required="required" placeholder="Instagram Profile Link" value="<?php echo $row['instalink']?>">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="inputEmail4">Twitter Profile Link</label>
                                        <input type="text" class="form-control" name="twitterlink" required="required" placeholder="Twitter Profile Link" value="<?php echo $row['twitterlink']?>">
                                    </div>
                                </div>
                                
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="inputEmail4">LinkedIn Profile Link</label>
                                        <input type="text" class="form-control" name="linkedin" required="required" placeholder="LinkedIn Profile Link" value="<?php echo $row['linkedin']?>">
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