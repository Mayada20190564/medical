<?php include '.././shared/header.php';
include '../general/dbconnection.php';
$exist = false;
$mybooks = "SELECT doctor.name as doc  , client.name as cli_name , client.phone as cli_phone , books.ID , specialize.name
    FROM doctor , client , books , specialize
     WHERE doctor.ID = books.doctor AND client.ID = books.client  AND specialize.ID = doctor.specialize";
$runbooks = mysqli_query($conn, $mybooks);
$num = mysqli_num_rows($runbooks);
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
                        <h4>ِBooks</h4>
                        <span class="ml-1">All books table</span>
                    </div>
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Books Info</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>Book Number</th>
                                            <th>Name</th>
                                            <th>Phone Number</th>
                                            <th>With Doctor</th>
                                            <th>specialize in</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($runbooks as $data) { ?>
                                            <tr>
                                                <th scope="row"><?php echo $data['ID'] ?></th>
                                                <td><?php echo $data['cli_name'] ?></td>
                                                <td><?php echo $data['cli_phone'] ?></td>
                                                <td><?php echo $data['doc'] ?></td>
                                                <td><?php echo $data['name'] ?></td>
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