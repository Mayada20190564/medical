<?php include '../shared/header.php';
include '../shared/nav.php';
include '../general/dbConnection.php';
// Get Name of All Senders
$getAllSenders = "SELECT DISTINCT `name` , chat.id as cID FROM client INNER JOIN chat WHERE client.ID = chat.client_id";
$AllSenders = mysqli_query($conn, $getAllSenders);
// Read All Messages
if (isset($_SESSION['patient']) && isset($_POST['send'])) {
    $client_id = $_SESSION['patient'];
    $msg = $_POST['msg'];
    $send = "INSERT INTO `chat` VALUES (NULL, $client_id, 1 , '$msg' , '')";
    mysqli_query($conn, $send);
}
if (isset($_SESSION['patient'])) {
    $client_id = $_SESSION['patient'];
    $read = "SELECT ask , res FROM `chat` WHERE `client_id` = $client_id";
    $msgs = mysqli_query($conn, $read);
    $getName = "SELECT name FROM client WHERE ID = $client_id";
    $runGetName = mysqli_query($conn , $getName);
    $row = mysqli_fetch_assoc($runGetName);
    $Name = $row['name'];
}
if (isset($_SESSION['patient'])) {
} else {
    header('location:/medical/index.php');
}
?>


<div class="container client-ask">
    <div class="row">
        <div class="col-md-10">
            <div class="blank">
                <div class="ask">
                    <ul>
                        <?php if (isset($_SESSION['patient'])) : ?>
                            <li>
                                <div class="response">
                                    <div>
                                        <p>Hello,<?php echo $Name ?></p>
                                    </div>
                                </div>
                            </li>
                        <?php endif; ?>
                        <?php foreach ($msgs as $data) { ?>
                            <li>
                                <div class="me">
                                    <div>
                                        <p><?php echo $data['ask'] ?></p>
                                    </div>
                                </div>
                            </li>

                            <?php if ($data['res'] != "") : ?>
                                <li>
                                    <div class="response">
                                        <div>
                                            <p><?php echo $data['res'] ?></p>
                                        </div>
                                    </div>
                                </li>
                            <?php endif; ?>
                        <?php }; ?>
                    </ul>
                </div>
            </div>
            <div class="res">
                <form method="POST">
                    <div class="row type justify-content-between">
                        <textarea name="msg" placeholder="Ask your question" class="col-md-10" required></textarea>
                        <div class="send col-md-2">
                            <span class="bSend "><button name="send">Send</button></span>
                        </div>
                    </div>

                </form>
            </div>

        </div>

        <!-- <div class="col-md-3 all">
            <?php foreach ($AllSenders as $data) { ?>
                <li class="mb-2">
                    <div class="list d-flex justify-content-between">
                        <h6 class="d-inline"><?php echo $data['name'] ?></h6>
                        <a class="d-inline btn btn-info" name="id" href="/medical/client/Ask.php?id=<?php echo $data['cID'] ?>">Answer</a>
                    </div>
                </li>
            <?php }; ?>
        </div> -->
    </div>

</div>










<?php
include '../shared/footer.php'; ?>