<?php include '.././shared/header.php';
include '../general/dbconnection.php';
$spec = "";
if(isset($_GET['editSpec'])){
    $id = $_GET['editSpec'];
    $raed = "SELECT * FROM specialize WHERE ID = $id ";
    $run = mysqli_query($conn , $raed);
    $row = mysqli_fetch_assoc($run);
    $spID = $row['ID'];
    $spec = $row['name'];
    if(isset($_POST['add'])){
        $spec = $_POST['name'];
        $edit = "UPDATE specialize SET `name` = '$spec' WHERE ID = $id ";
        $run2 = mysqli_query($conn , $edit);
        header("location:/medical-admin/specs/all-spec.php");
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
    include '.././shared/sidbar.php' ?>
    <!-- End Shared Header -->

    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Add New Specialize</h4>
                        <p class="mb-0">Enter Specialize Name</p>
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
                                    <label>specialize Name </label>
                                    <input type="text" value="<?php echo $spec ?>" placeholder="specialize name" class="form-control" name="name">
                                </div>
                                <button class="btn btn-info" name="add">Edit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<?php include '../shared/footer.php'; ?>