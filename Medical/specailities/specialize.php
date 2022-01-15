<?php include '../shared/header.php';
include '../shared/nav.php';
include '../general/dbConnection.php';
$Deps = "SELECT * FROM specialize ";
$retDeps = mysqli_query($conn, $Deps);
?>

<div class="container spec">
    <div class="row">
        <div class="col-md-3">
            <?php $listDeps = "SELECT ID FROM specialize WHERE `name` = 'Dermatology' ";
            $ID = mysqli_query($conn, $listDeps);
            $row = mysqli_fetch_assoc($ID);
            $DepID = $row['ID']; ?>
            <div class="skin">
                <a class="btn btn-info" href="/medical/doctors/doctor.php?specid=<?php echo $DepID ?>">Dermatology</a>
            </div>
        </div>
        <div class="col-md-3">
            <?php $listDeps = "SELECT ID FROM specialize WHERE `name` = 'Dentistry' ";
            $ID = mysqli_query($conn, $listDeps);
            $row = mysqli_fetch_assoc($ID);
            $DepID = $row['ID']; ?>
            <div class="dental">
                <a class="btn btn-info" href="/medical/doctors/doctor.php?specid=<?php echo $DepID ?>">Dentistry</a>
            </div>
        </div>
        <div class="col-md-3">
            <?php $listDeps = "SELECT ID FROM specialize WHERE `name` = 'Child' ";
            $ID = mysqli_query($conn, $listDeps);
            $row = mysqli_fetch_assoc($ID);
            $DepID = $row['ID']; ?>
            <div class="child">
                <a class="btn btn-info" href="/medical/doctors/doctor.php?specid=<?php echo $DepID ?>">Child</a>
            </div>
        </div>
        <div class="col-md-3">
            <?php $listDeps = "SELECT ID FROM specialize WHERE `name` = 'Bones' ";
            $ID = mysqli_query($conn, $listDeps);
            $row = mysqli_fetch_assoc($ID);
            $DepID = $row['ID']; ?>
            <div class="bones">
                <a class="btn btn-info" href="/medical/doctors/doctor.php?specid=<?php echo $DepID ?>">Bones</a>
            </div>
        </div>
        <div class="col-md-3">
            <?php $listDeps = "SELECT ID FROM specialize WHERE `name` = 'Brain And Nerves' ";
            $ID = mysqli_query($conn, $listDeps);
            $row = mysqli_fetch_assoc($ID);
            $DepID = $row['ID']; ?>
            <div class="brain">
                <a class="btn btn-info" href="/medical/doctors/doctor.php?specid=<?php echo $DepID ?>">Brain And Nerves</a>
            </div>
        </div>
        <div class="col-md-3">
            <?php $listDeps = "SELECT ID FROM specialize WHERE `name` = 'Ophthalmology'";
            $ID = mysqli_query($conn, $listDeps);
            $row = mysqli_fetch_assoc($ID);
            $DepID = $row['ID']; ?>
            <div class="eye">
                <a class="btn btn-info" href="/medical/doctors/doctor.php?specid=<?php echo $DepID ?>">Ophthalmology</a>
            </div>
        </div>
        <div class="col-md-3">
            <?php $listDeps = "SELECT ID FROM specialize WHERE `name` = 'Cardiology' ";
            $ID = mysqli_query($conn, $listDeps);
            $row = mysqli_fetch_assoc($ID);
            $DepID = $row['ID']; ?>
            <div class="heart">
                <a class="btn btn-info" href="/medical/doctors/doctor.php?specid=<?php echo $DepID ?>">Cardiology</a>
            </div>
        </div>
        <div class="col-md-3">
            <?php $listDeps = "SELECT ID FROM specialize WHERE `name` = 'Psychiatry' ";
            $ID = mysqli_query($conn, $listDeps);
            $row = mysqli_fetch_assoc($ID);
            $DepID = $row['ID']; ?>
            <div class="mental">
                <a class="btn btn-info" href="/medical/doctors/doctor.php?specid=<?php echo $DepID ?>">Psychiatry</a>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row justify-content-start">
        <?php foreach ($retDeps as $data) { ?>
            <div class="mr-2 ml-2 mt-3">
                <div>
                    <a class="btn dep" href="/medical/doctors/doctor.php?specid=<?php echo $data['ID'] ?>"><?php echo $data['name'] ?></a>
                </div>
            </div>
        <?php }; ?>
    </div>
</div>


<?php
include '../shared/footer.php' ?>