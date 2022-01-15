<?php include '../shared/header.php';
include '../shared/nav.php';
include '../general/dbConnection.php';
if (isset($_SESSION['patient'])) {
    $id = $_SESSION['patient'];
    $getClient = "SELECT * FROM client WHERE ID = $id";
    $runGetClient = mysqli_query($conn, $getClient);
    $row = mysqli_fetch_assoc($runGetClient);
    $Cname = $row['name'];
    $Cphone = $row['phone'];
    $Cmail = $row['email'];
    $Cage = $row['age'];
    $Cpass = $row['password'];
    if (isset($_POST['update'])) {
        $Cname = $_POST['name'];
        $Cphone = $_POST['phone'];
        $Cmail = $_POST['mail'];
        $Cage = $_POST['age'];
        $Cpass = $_POST['pass'];
        $updateClient = "UPDATE client SET `name` = '$Cname' , phone = '$Cphone' ,
         email = '$Cmail' , age = $Cage , `password` = '$Cpass' WHERE ID = $id";
        mysqli_query($conn, $updateClient);
        header("location:/medical/index.php");
    }
}

if (isset($_SESSION['patient'])) {
} else {
    header('location:/medical/index.php');
}
?>
<div class="container">
    <div class="signCard ">
        <div class="card-body">
            <form method="POST">
                <div class="form-group">
                    <label>User Name </label>
                    <input type="text" placeholder="user name" value="<?php echo $Cname ?>" class="form-control" name="name">
                </div>
                <div class="form-group">
                    <label>Phone number </label>
                    <input type="text" placeholder="phone" value="<?php echo $Cphone ?>" class="form-control" name="phone">
                </div>
                <div class="form-group">
                    <label>E-mail </label>
                    <input type="email" placeholder="example@domain.com" value="<?php echo $Cmail ?>" class="form-control" name="mail">
                </div>
                <div class="form-group">
                    <label>Age </label>
                    <input type="number" placeholder="age" value="<?php echo $Cage ?>" class="form-control" name="age">
                </div>
                <div class="form-group">
                    <label>Password </label>
                    <input type="password" placeholder="password" value="<?php echo  $Cpass ?>" class="form-control" name="pass">
                </div>
                <button class="btn btn-info" name="update">Update</button>
            </form>
        </div>
    </div>
</div>

<?php
include '../shared/footer.php' ?>