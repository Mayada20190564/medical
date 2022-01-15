<?php include '../shared/header.php';
include '../general/dbconnection.php';
$Deps = "SELECT * FROM specialize ";
$retDeps = mysqli_query($conn, $Deps);
if(isset($_GET['specDel'])){
    $id = $_GET['specDel'];
    $delDoc = "DELETE FROM doctor WHERE `specialize` = $id";
    $runDel = mysqli_query($conn , $delDoc);
    // =======
    $delet = "DELETE FROM specialize WHERE `ID` = $id ";
    $run = mysqli_query($conn , $delet);
    header("location:/medical-admin/specs/all-spec.php");
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
                        <h4>Specialities</h4>
                        <span class="ml-1">All Specialities Table</span>
                    </div>
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Basic Datatable</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>specialize Name</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody class="t">
                                        <?php foreach ($retDeps as $data) { ?>
                                            <tr>
                                                <td> <a class="btn dep"><?php echo $data['name'] ?></a></td>
                                                <td><a href="/medical-admin/specs/edit-spec.php/?editSpec=<?php echo $data['ID'] ?>">Edit</a> </td>
                                                <td><a class="del" onclick="return confirm('Delete specialize from site?')" href="/medical-admin/specs/all-spec.php?specDel=<?php echo $data['ID'] ?>">Delete</a></td>
                                            </tr>
                                        <?php }; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<?php include '../shared/footer.php'; ?>