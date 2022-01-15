<?php include '.././shared/header.php';
include '../general/dbconnection.php';
$img = "";
$Cname = "";
$Cphone = "";
$Cmail = "";
$Cage = "";
$Dspec = "";
$fees = "";
$city = "";
$clinic = "";
$Cpass = "";
if (isset($_GET['edit'])) {
    $docID = $_GET['edit'];
    $show = "SELECT * FROM doctor WHERE ID = $docID ";
    $run = mysqli_query($conn, $show);
    $docRow = mysqli_fetch_assoc($run);
    $img = $docRow['img'];
    $Cname = $docRow['name'];
    $Cphone = $docRow['phone'];
    $Cmail = $docRow['email'];
    $Cage = $docRow['age'];
    $Dspec = $docRow['specialize'];
    $fees = $docRow['fees'];
    $city = $docRow['city'];
    $clinic = $docRow['clinic'];
    $Cpass = $docRow['password'];
    if (isset($_POST['update'])) {
        $Cname = $_POST['name'];
        $Cphone = $_POST['phone'];
        $img = $_POST['img'];
        $Cmail = $_POST['mail'];
        $Cage = $_POST['age'];
        $Dspec = $_POST['spec'];
        $fees = $_POST['fees'];
        $city = $_POST['city'];
        $clinic = $_POST['clinic'];
        $update = "UPDATE doctor SET `name` = '$Cname' , `phone`= '$Cphone', email = '$Cmail' , age = $Cage , specialize =  $Dspec,
    fees = $fees , city = '$city'  , img = '$img' WHERE ID = $docID ";
        mysqli_query($conn, $update);
        header("location:/medical-admin/doctors/all-doc.php");
    }
}
if (isset($_SESSION['admin'])) {
} else {
    header('location:/medical-admin/index.php');
}
?>

<div id="main-wrapper">
    <!-- shared Header -->
    <?php include '.././shared/head.php';
    include '.././shared/sidbar.php'; ?>

    <!-- End Shared Header -->

    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Profile</h4>
                        <span class="ml-1">Dr.<?php echo $Cname ?></span>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0">
                    <img src="<?php echo $img ?>" class="rounded-circle doc-img ">
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-xl-12 col-xxl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Form step</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST">
                                <div class="form-group">
                                    <label>Doctor Name </label>
                                    <input type="text" value="<?php echo $Cname ?>" placeholder="user name" class="form-control" name="name">
                                </div>
                                <div class="form-group">
                                    <label>Phone number </label>
                                    <input type="text" value="<?php echo $Cphone ?>" placeholder="phone" class="form-control" name="phone">
                                </div>
                                <div class="form-group">
                                    <label>E-mail </label>
                                    <input type="email" value="<?php echo $Cmail ?>" placeholder="example@domain.com" class="form-control" name="mail">
                                </div>
                                <div class="form-group">
                                    <label>Age </label>
                                    <input type="number" value="<?php echo $Cage ?>" placeholder="age" class="form-control" name="age">
                                </div>
                               
                                <div class="form-group">
                                    <label>Fees </label>
                                    <input type="number" value="<?php echo $fees ?>" placeholder="number" class="form-control" name="fees">
                                </div>
                                <div class="form-group">
                                    <label>City </label>
                                    <input type="city" value="<?php echo $city ?>" placeholder="text" class="form-control" name="city">
                                </div>
                                <div class="form-group">
                                    <label>Clinc Name </label>
                                    <input type="clinic name" value="<?php echo $clinic ?>" placeholder="text" class="form-control" name="clinic">
                                </div>
                                <div class="form-group">
                                    <label>specialize </label>
                                    <?php $listDeps = "SELECT * FROM specialize ";
                                    $spec = mysqli_query($conn, $listDeps); ?>
                                    <select value="<?php echo $Dspec ?>" name="spec" class="form-control">
                                        <?php foreach ($spec as $data) { ?>
                                            <option value="<?php echo $data['ID'] ?>"> <?php echo $data['name'] ?> </option>
                                        <?php }; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Image </label>
                                    <input type="url" placeholder="image" value="<?php echo $img ?>" class="form-control" name="img">
                                </div>
                                <button class="btn btn-info" name="update">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<?php include '../shared/footer.php'; ?>