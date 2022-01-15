<?php include '../shared/header.php';
include '../shared/nav.php';
include '../general/dbConnection.php';
$allDoc = "SELECT doctor.name , specialize.name as spec , doctor.clinic, doctor.age , doctor.ID , doctor.phone , doctor.email , doctor.specialize , doctor.fees , doctor.city , doctor.img
 FROM doctor INNER JOIN specialize ON doctor.specialize = specialize.ID";
$docs = mysqli_query($conn, $allDoc);
if (isset($_GET['del'])) {
    $id = $_GET['del'];
    $delbooks = "DELETE FROM books WHERE doctor = $id";
    $run2 = mysqli_query($conn, $delbooks);
    $delete = "DELETE FROM doctor WHERE ID = $id";
    $run = mysqli_query($conn, $delete);
    header("location:/medical/doctors/all-doctors.php");
}

?>
<?php foreach ($docs as $data) { ?>
    <div class="Dcard">
        <div class="container col-md-8">
            <div class="row">
                <div class="col-md-2">
                    <div class="imgcard">
                        <img src="<?php echo $data['img'] ?>" class="img-fluid ">
                    </div>
                </div>
                <div class="col-md-6">
                    <h4 class="text-center">Dr/<?php echo $data['name'] ?></h4>
                    <h6><span><i class="fas fa-phone-volume"></i>:</span> <?php echo $data['phone'] ?> </h6>
                    <h6><span><i class="fas fa-at"></i></span>: <?php echo $data['email'] ?></h6>
                    <h6><span><i class="fas fa-user-tag"></i></span> specialized in: <?php echo $data['spec'] ?></h6>
                    <h6><span><i class="fas fa-map-marker-alt"></i></span>: <?php echo $data['city'] ?></h6>
                    <h6><span><i class="fas fa-city"></i></span>: <?php echo $data['clinic'] ?></h6>
                    <h6>Fees: <?php echo $data['fees'] ?>EGP</h6>
                </div>
            </div>
            <div class="row justify-content-end">
                <?php if (isset($_SESSION['patient'])) : ?>
                    <a class="btn signUp w-25" href="/medical/books/book.php?doc=<?php echo $data['ID'] ?>">Book</a>
                <?php endif; ?>
            </div>
        </div>
    </div>

<?php }; ?>



<?php
include '../shared/footer.php'; ?>