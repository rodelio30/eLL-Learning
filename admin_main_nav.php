<nav class="navbar navbar-expand navbar-light navbar-bg">
  <a class="sidebar-toggle js-sidebar-toggle">
    <i class="hamburger align-self-center"></i>
  </a>

  <div class="navbar-collapse collapse">
    <h3 class="align-middle mt-1"><strong>Language and Literature e-Learning Resources</strong></h3>
    <ul class="navbar-nav navbar-align">
      <?php include 'admin_nav_notif.php' ?>
      <li class="nav-item dropdown">
        <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
          <i class="align-middle" data-feather="settings"></i>
        </a>

        <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
          <?php include 'greet.php' ?>
        </a>
        <?php include 'settings.php' ?>
      </li>
    </ul>
  </div>
</nav>