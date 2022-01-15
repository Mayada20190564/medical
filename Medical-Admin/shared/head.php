<?php

if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
}
?>
<div class="nav-header">
    <a href="index.html" class="brand-logo">
        <h2>MEDICAL</h2>
    </a>

    <div class="nav-control">
        <div class="hamburger">
            <span class="line"></span><span class="line"></span><span class="line"></span>
        </div>
    </div>
</div>
<!-- ========== -->
<div class="header">
    <div class="header-content">
        <nav class="navbar navbar-expand">
            <div class="collapse navbar-collapse justify-content-between">
                <div class="header-left">
                    <div class="search_bar dropdown">
                        <span class="search_icon p-3 c-pointer" data-toggle="dropdown">
                            <i class="mdi mdi-magnify"></i>
                        </span>
                        <div class="dropdown-menu p-0 m-0">
                            <form>
                                <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                            </form>
                        </div>
                    </div>
                </div>

                <ul class="navbar-nav header-right">

                    <li class="nav-item dropdown header-profile">
                        <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                            <i class="mdi mdi-account"></i>
                        </a>
                        <?php if (isset($_SESSION['admin'])) : ?>
                            <div class="dropdown-menu dropdown-menu-right">
                                <form>
                                    <button name="logout" class="dropdown-item">Logout</button>
                                </form>

                            </div>
                        <?php endif; ?>
                    </li>

                </ul>

            </div>
        </nav>
    </div>
</div>