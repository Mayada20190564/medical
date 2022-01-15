<?php include 'shared/header.php';
include 'general/dbconnection.php';
$getBooks = "SELECT * FROM `books`";
$run1 = mysqli_query($conn, $getBooks);
$books = mysqli_num_rows($run1);
// ========
$getDoctors = "SELECT * FROM  `doctor`";
$run2 = mysqli_query($conn, $getDoctors);
$doctors = mysqli_num_rows($run2);
// ===========
$getClients = "SELECT * FROM  `client`";
$run3 = mysqli_query($conn, $getClients);
$clients = mysqli_num_rows($run3);
// =========
$getSpecs = "SELECT * FROM  `specialize`";
$run4 = mysqli_query($conn, $getSpecs);
$specs = mysqli_num_rows($run4);

// Get Name of All Senders
$getAllSenders = "SELECT DISTINCT `name` , chat.id as cID FROM client INNER JOIN chat WHERE client.ID = chat.client_id AND chat.res = '' ";
$AllSenders = mysqli_query($conn, $getAllSenders);
// Read All Messages
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $getAllMsgs = "SELECT * FROM `chat` WHERE chat.id= $id AND res = '' ";
    $AllMsgs = mysqli_query($conn, $getAllMsgs);
    if (isset($_POST['send'])) {
        $response = $_POST['msg'];
        $SendRes = "UPDATE `chat` SET `res` = '$response' WHERE id = $id ";
        $run = mysqli_query($conn, $SendRes);
    }
}

if (isset($_SESSION['admin'])) {
} else {
    header('location:/medical-admin/index.php');
}
?>

<div id="main-wrapper">
    <!-- shared Header -->
    <?php include 'shared/head.php';
    include 'shared/sidbar.php' ?>
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="stat-widget-two card-body">
                            <div class="stat-content">
                                <div class="stat-text">Doctors </div>
                                <div class="stat-digit"> <?php echo $doctors ?></div>
                            </div>
                            <div class="progress">
                                <div class="progress-bar progress-bar-success w-85" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="stat-widget-two card-body">
                            <div class="stat-content">
                                <div class="stat-text">Users</div>
                                <div class="stat-digit"> <?php echo $clients ?></div>
                            </div>
                            <div class="progress">
                                <div class="progress-bar progress-bar-primary w-75" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="stat-widget-two card-body">
                            <div class="stat-content">
                                <div class="stat-text">Books</div>
                                <div class="stat-digit"> <?php echo $books ?></div>
                            </div>
                            <div class="progress">
                                <div class="progress-bar progress-bar-warning w-50" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="stat-widget-two card-body">
                            <div class="stat-content">
                                <div class="stat-text">Specialities</div>
                                <div class="stat-digit"> <?php echo $specs ?></div>
                            </div>
                            <div class="progress">
                                <div class="progress-bar progress-bar-danger w-65" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                    <!-- /# card -->
                </div>
                <!-- /# column -->
            </div>
        </div>
        <!-- END CARDS =========== -->

        <div class="container-fluid">
            <div class="row">

                <div class="col-md-8">
                    <?php if (isset($AllMsgs)) : ?>
                        <div class="blank">
                            <div class="ask">
                                <?php foreach ($AllMsgs as $data) { ?>
                                    <div class="me">
                                        <div>
                                            <p><?php echo $data['ask'] ?></p>
                                        </div>
                                    </div>
                                    <?php  if (isset($_POST['send'])) : ?>
                                        <div class="response">
                                            <div>
                                                <p><?php echo  $response ?></p>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                <?php }; ?>
                            </div>
                        </div>
                        <div class="res">
                            <form method="POST">
                                <div class="row type justify-content-between">
                                    <textarea name="msg" placeholder="Ask your question" class="col-md-10" required></textarea>
                                    <div class="send col-md-2">
                                        <span class="bSend hide"><button href="/medical-admin/home.php" name="send"><i class="fas fa-paper-plane"></i></button></span>
                                    </div>
                                </div>

                            </form>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="col-md-3 all">
                    <?php foreach ($AllSenders as $data) { ?>
                        <li class="mb-2">
                            <div class="list d-flex justify-content-between">
                                <h6 class="d-inline"><?php echo $data['name'] ?></h6>
                                <a class="d-inline btn btn-info" name="id" href="/medical-admin/home.php?id=<?php echo $data['cID'] ?>">Answer</a>
                            </div>
                        </li>
                    <?php }; ?>
                </div>
            </div>

        </div>

    </div>
</div>





</div>
<?php include 'shared/footer.php'; ?>