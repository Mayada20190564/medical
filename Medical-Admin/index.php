<?php
include 'shared/header.php';
include 'general/dbconnection.php';
$alert = false;
if (isset($_POST['login'])) {
    $Cname = $_POST['name'];
    $Cpass = $_POST['pass'];
    if ($Cname == "Mayada Mohamed" && $Cpass == "mayada234") {
        $_SESSION['admin'] = $Cname;
        header('location:/medical-admin/home.php');
        $alert = true;
    }
}
?>
<section>
    <div class="h">
        <div class="container caption">
            <div class="row">
                <div class="col-md-9">
                    <div class="signCard ">
                        <h2 class="text-center">Login</h2>
                        <div class="card-body">
                            <?php if ($alert) : ?>
                                <h6 class="alert alert-danger">Please enter your correct user name and password</h6>
                            <?php endif; ?>
                            <form method="POST">
                                <div class="form-group">
                                    <label>User Name </label>
                                    <input type="text" placeholder="Name" class="form-control" name="name">
                                </div>
                                <div class="form-group">
                                    <label>Password </label>
                                    <input type="password" placeholder="password" class="form-control" name="pass">
                                </div>
                                <button class="btn btn-info" name="login">login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'shared/footer.php'; ?>