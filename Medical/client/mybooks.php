<?php include '../shared/header.php';
include '../shared/nav.php';
include '../general/dbConnection.php';
$exist = false;
if (isset($_SESSION['patient'])) {
    $id = $_SESSION['patient'];
    $mybooks = "SELECT doctor.name as doc  , client.name as cli_name , client.phone as cli_phone , books.ID , specialize.name
    FROM doctor , client , books , specialize
     WHERE doctor.ID = books.doctor AND client.ID = books.client AND client.ID = $id AND specialize.ID = doctor.specialize";
    $runbooks = mysqli_query($conn, $mybooks);
    $num = mysqli_num_rows($runbooks);
    if ($num > 0) {
        $exist = true;
    } else {
        $exist = false;
    }
}
// DELETE BOOK 
if (isset($_GET['cancel'])) {
    $can = $_GET['cancel'];
    $delete = "DELETE FROM books WHERE ID = $can";
    $run = mysqli_query($conn, $delete);
    header("location:/medical/client/mybooks.php");
}

if (isset($_SESSION['patient'])) {
} else {
    header('location:/medical/index.php');
}

?>

<div class="books">
    <div class="container bookTable mt-5 mb-5">
        <div class="col-md-12">
            <?php if ($exist) : ?>
                <table class="table ">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Book Number</th>
                            <th scope="col">Name</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">With Doctor</th>
                            <th scope="col">specialize in</th>
                            <th scope="col">Cancel</th>
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
                                <td> <a class="btn btn-info signUp" name="cancel" onclick="return confirm('Are you sure, you want to cancel this book')" href="/medical/client/mybooks.php?cancel=<?php echo $data['ID'] ?>">Cancel</a></td>
                            </tr>
                        <?php }; ?>
                    </tbody>
                </table>
        </div>
    <?php else : ?>
        <h1 class="text-center">You dont have any books,Yet!!!</h1>
    </div>
<?php endif; ?>
</div>





<?php
include '../shared/footer.php'; ?>