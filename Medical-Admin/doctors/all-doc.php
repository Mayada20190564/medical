<?php include '.././shared/header.php';
include '../general/dbconnection.php';
$allDoc = "SELECT doctor.name , specialize.name as spec , doctor.clinic, doctor.age , doctor.ID , doctor.phone , doctor.email , doctor.specialize , doctor.fees , doctor.city , doctor.img
 FROM doctor INNER JOIN specialize ON doctor.specialize = specialize.ID";
$docs = mysqli_query($conn, $allDoc);
if (isset($_GET['del'])) {
    $id = $_GET['del'];
    $delbooks = "DELETE FROM books WHERE doctor = $id";
    $run2 = mysqli_query($conn, $delbooks);
    $delete = "DELETE FROM doctor WHERE ID = $id";
    $run = mysqli_query($conn, $delete);
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
                        <h4>Doctors</h4>
                        <span class="ml-1">All Doctors Table</span>
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
                                            <th colspan="2">Doctor</th>
                                            <th>Mobile Phone</th>
                                            <th>E-mail</th>
                                            <th>specialized in</th>
                                            <th>Profile</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody class="t">
                                        <?php foreach ($docs as $data) { ?>
                                            <tr>
                                                <td><img src="<?php echo $data['img'] ?>" class="rounded-circle doc-img "></td>
                                                <td>Dr/<?php echo $data['name'] ?></td>
                                                <td><?php echo $data['phone'] ?></td>
                                                <td><?php echo $data['email'] ?></td>
                                                <td><?php echo $data['spec'] ?></td>
                                                <td><a href="/medical-admin/doctors/profile.php/?edit=<?php echo $data['ID'] ?>">Follow</a> </td>
                                                <td><a class="del" onclick="return confirm('Delete doctor from site?')" href="/medical-admin/doctors/all-doc.php?del=<?php echo $data['ID'] ?>">Delete</a></td>
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