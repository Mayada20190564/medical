<?php include '../shared/header.php';
include '../shared/nav.php';
include '../general/dbConnection.php';
if (isset($_POST['sign'])) {
    $Cname = $_POST['name'];
    $Cphone = $_POST['phone'];
    $Cmail = $_POST['mail'];
    $Cage = $_POST['age'];
    $Cpass = $_POST['pass'];
    $insertClient = "INSERT INTO client VALUES (NULL ,'$Cname','$Cphone',' $Cmail',$Cage,'$Cpass')";
    mysqli_query($conn, $insertClient);
    $_SESSION['patient'] = $userID;
    header("location:/medical/index.php");
}
?>
<div class="container">
    <div class="signCard ">
        <h2 class="text-center">Sign Up</h2>
        <div class="card-body">
            <form method="POST">
                <div class="form-group">
                    <label>User Name </label>
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
                <div class="form-group">
                    <label>Password </label>
                    <input type="password" placeholder="password" class="form-control" name="pass">
                </div>
                <button class="btn btn-info" name="sign">Join Now</button>
            </form>
        </div>
    </div>
</div>

<?php
include '../shared/footer.php' ?>