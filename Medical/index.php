<?php include 'shared/header.php';
include 'shared/nav.php';
include 'general/dbConnection.php';
if (isset($_SESSION['patient']) && isset($_POST['send'])) {
    $client_id = $_SESSION['patient'];
    $deleteOldMsg = "DELETE FROM chat WHERE `res`!= '' AND client_id = $client_id";
    $runDeleteOld = mysqli_query($conn , $deleteOldMsg);
    $msg = $_POST['msg'];
    $send = "INSERT INTO `chat` VALUES (NULL, $client_id, 1 , '$msg' , '')";
    mysqli_query($conn, $send);
}
if (isset($_SESSION['patient'])) {
    $client_id = $_SESSION['patient'];
    $read = "SELECT ask , res FROM `chat` WHERE `client_id` = $client_id";
    $msgs = mysqli_query($conn, $read);
}
?>

<section>
    <div class="h">
        <div class="container caption">
            <div class="row">
                <div class="col-md-6">
                    <div>
                        <h1>Providing Best Medical Care</h1>
                        <h3>The Best Doctors in Medicine!</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic quidem sed quos illum esse expedita distinctio doloremque similique quae
                            doloribus suscipit aliquid, velit quaerat pariatur. Autem dignissimos atque unde fuga.</p>
                        <?php if (isset($_SESSION['patient'])) : ?>
                        <?php else : ?>
                            <a class="btn btn-info login" href="/medical/Account/login.php">Login</a>
                            <a class="btn btn-info signUp" href="/medical/Account/signUp.php">Sign Up</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END CAPTION -->
<section>
    <div class="about">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card1 wow animate__flipInX">

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card2 wow animate__flipInX">

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card3 wow animate__flipInX">

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END ABOUT -->

<?php
include 'shared/footer.php' ?>