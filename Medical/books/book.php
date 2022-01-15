<?php include '../shared/header.php';
include '../shared/nav.php';
include '../general/dbConnection.php';

if (isset($_SESSION['patient']) && isset($_GET['doc'])) {
    $userID = $_SESSION['patient'];
    $DocID = $_GET['doc'];
    $select = "SELECT name FROM doctor WHERE ID = $DocID";
    $docName = mysqli_query($conn, $select);
    $Drow = mysqli_fetch_assoc($docName);
    $docName = $Drow['name'];
    // ========================
    $select = "SELECT name , email , phone FROM client WHERE ID = $userID";
    $cliName = mysqli_query($conn, $select);
    $Crow = mysqli_fetch_assoc($cliName);
    $cliName = $Crow['name'];
    $cliMail = $Crow['email'];
    $cliPhone = $Crow['phone'];
    if (isset($_POST['book'])) {
    
        
        $createBook = "INSERT INTO books VALUES (NULL , $userID , $DocID )";
        mysqli_query($conn, $createBook);
        header("location:/medical/client/mybooks.php");
    }
}


if ($_SESSION['patient']) {
} else {
    header("location:/medical/Account/login.php");
}
?>
<form method="POST">
    <div class="container book col-md-5">
        <div>
            <h6>book with doctor:<?php echo $docName ?> </h6>
            <div class="endLine2"></div>
            <h6>Name: <?php echo $cliName ?> </h6>
            <div class="endLine2"></div>
            <h6>E-mail: <?php echo $cliMail ?></h6>
            <div class="endLine2"></div>
            <h6>Mobile Number: <?php echo $cliPhone ?></h6>
            <div class="endLine2"></div>
            <button class="btn btn-danger w-25 m-auto " name="book">Book</button>
            <a class="btn btn-dark w-25 m-auto" href="/medical/index.php">Cancel</a>
        </div>
    </div>
</form>


<?php
include '../shared/footer.php' ?>