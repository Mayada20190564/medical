<?php
session_start();
$Host = "localhost";
$dbName = "medical";
$pass = "";
$user = "root";
$conn = mysqli_connect($Host, $user, $pass, $dbName);

if (isset($_GET['out'])) {
  session_unset();
  session_destroy();
}
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top mb-5">
  <a class="navbar-brand" href="#">MEDICAL</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/medical/index.php">Home</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="/medical/doctors/all-doctors.php">Doctors</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="/medical/specailities/specialize.php">Specialities</a>
      </li>
      <!-- =========USER Droodown============== -->
      <?php if (isset($_SESSION['patient'])) {
        $id = $_SESSION['patient'];
        $getName = "SELECT name FROM client WHERE ID = $id";
        $n = mysqli_query($conn, $getName);
        $row = mysqli_fetch_assoc($n);
        $name = $row['name']; ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
            <?php echo $name ?>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="/medical/client/profile.php">My Profile</a>
            <a class="dropdown-item" href="/medical/client/mybooks.php">My Books</a>
            <a class="dropdown-item" href="/medical/client/Ask.php">Ask</a>
          </div>
        </li>
      <?php }; ?>
      <!-- ================================= -->
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <?php if (isset($_SESSION['patient'])) : ?>
        <button class="btn btn-info signUp" name="out">Log Out</button>
      <?php endif; ?>
    </form>
  </div>
</nav>
