<?php include '../shared/header.php';
include '../shared/nav.php';
include '../general/dbConnection.php';
$alert = false;
if (isset($_POST['login'])) {
    $Cname = $_POST['name'];
    $Cpass = $_POST['pass'];

    $login = "SELECT * FROM `client` WHERE `name` = '$Cname' and `password` = '$Cpass' ";
    $log = mysqli_query($conn, $login);
    $row = mysqli_fetch_assoc($log);
    $userID = $row['ID'];
    $numRow = mysqli_num_rows($log);
    if ($numRow > 0) {
        $_SESSION['patient'] = $userID;
        $alert = false;
        header('location:/medical/index.php');
    } else {
        $alert = true;
    }
}

?>

<div class="container col-md-6">
    <div class="signCard ">
        <h2 class="text-center">Login</h2>
        <div class="card-body">
            <?php if ($alert) : ?>
                <h6 class="alert alert-danger">Please enter your correct user name and password</h6>
            <?php endif; ?>
            <form method="POST">
               
                <div class="form-group">
                    <label>User Name </label>
                    <input type="text" placeholder="user name" class="form-control" name="name">
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

<?php
include '../shared/footer.php' ?>