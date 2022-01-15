<?php include '.././shared/header.php';
include '../general/dbconnection.php';
$img = "https://icon-library.com/images/person-image-icon/person-image-icon-7.jpg";
if (isset($_POST['add'])) {
    $Cname = $_POST['name'];
    $Cphone = $_POST['phone'];
    $Cmail = $_POST['mail'];
    $Cage = $_POST['age'];
    $Dspec = $_POST['spec'];
    $fees = $_POST['fees'];
    $city = $_POST['city'];
    $clinic = $_POST['clinic'];
    $img = $_POST['img'];
    $insertClient = "INSERT INTO doctor VALUES (NULL ,'$Cname','$Cphone',
    ' $Cmail',$Cage,$Dspec ,  $fees, ' $city', ' $clinic','$img')";
    mysqli_query($conn, $insertClient);
    header("location:/medical-admin/doctors/all-doc.php");
}
if (isset($_SESSION['admin'])) {
} else {
    header('location:/medical-admin/index.php');
}
?>

<div id="main-wrapper">
    <!-- shared Header -->
    <?php include '.././shared/head.php';
    include '.././shared/sidbar.php' ?>
    <!-- End Shared Header -->

    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Add New Doctor</h4>
                        <p class="mb-0">Complete this form to add a new doctor</p>
                    </div>
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
                                    <input type="text" placeholder="user name" class="form-control" name="name">
                                </div>
                                <div class="form-group">
                                    <label>Phone number </label>
                                    <input type="text" placeholder="phone" class="form-control" name="phone">
                                </div>
                                <div class="form-group">
                                    <label>E-mail </label>
                                    <input type="email" placeholder="example@domain.com" class="form-control" name="mail">
                                </div>
                                <div class="form-group">
                                    <label>Age </label>
                                    <input type="number" placeholder="age" class="form-control" name="age">
                                </div>
                                <!-- ======================== -->
                                <div class="form-group">
                                    <label>Fees </label>
                                    <input type="number" placeholder="Fees" class="form-control" name="fees">
                                </div>
                                <div class="form-group">
                                    <label>City </label>
                                    <input type="text" placeholder="city" class="form-control" name="city">
                                </div>
                                <div class="form-group">
                                    <label>Clinc / Hospital </label>
                                    <input type="text" placeholder="clinic / Hospital" class="form-control" name="clinic">
                                </div>
                                <div class="form-group">
                                    <label>specialize </label>
                                    <?php $listDeps = "SELECT * FROM specialize ";
                                    $spec = mysqli_query($conn, $listDeps); ?>
                                    <select name="spec" class="form-control">
                                        <?php foreach ($spec as $data) { ?>
                                            <option value="<?php echo $data['ID'] ?>"> <?php echo $data['name'] ?> </option>
                                        <?php }; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Image </label>
                                    <input type="url" placeholder="image" value="<?php echo $img ?>" class="form-control" name="img">
                                </div>
                                <button class="btn btn-info" name="add">Add Now</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<?php include '../shared/footer.php'; ?>