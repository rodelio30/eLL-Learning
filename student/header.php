<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
  <div class="container d-flex align-items-center">

    <!-- <h1 class="logo me-auto"><a href="index.php">e-LL Learning</a></h1> -->
    <!-- Uncomment below if you prefer to use an image logo -->
    <a href="index.php" class="logo me-auto"><img src="../public/assets/img/ell.png" alt="" class="img-fluid"></a>

    <nav id="navbar" class="navbar order-last order-lg-0">
      <ul>
        <li>
          <a href="about.php">About</a>
        </li>
        <li class="dropdown"><a href="resources.php"><span>e-Resources</span> <i class="bi bi-chevron-down"></i></a>
          <ul>
            <li class="dropdown"><a href="#"><span>Language</span> <i class="bi bi-chevron-right"></i></a>
              <ul>
                <li><a href="#">Deep Drop Down 1</a></li>
                <li><a href="#">Deep Drop Down 2</a></li>
              </ul>
            </li>
            <li class="dropdown"><a href="#"><span>Literature</span> <i class="bi bi-chevron-right"></i></a>
              <ul>
                <li><a href="#">Deep Drop Down 4</a></li>
                <li><a href="#">Deep Drop Down 5</a></li>
              </ul>
            </li>
            <!-- <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li> -->
          </ul>
        </li>
        <li class="dropdown"><a href="programs.php"><span>Programs</span> <i class="bi bi-chevron-down"></i></a>
          <ul>
            <?php

            include('../include/connect.php');
            $result = mysqli_query($conn, "select program_id, name from programs WHERE status!='archive' ORDER BY program_id DESC") or die("Query 1 is incorrect....");
            while (list($program_id, $name) = mysqli_fetch_array($result)) {
              echo "
            <li class='dropdown'><a href='program_view.php?ID=$program_id'><span>$name</span></a>
            </li>
              ";
            }
            ?>
            <!-- <li class="dropdown"><a href="program_mall.php"><span>MALL</span> <i class="bi bi-chevron-right"></i></a>
              <ul>
                <li><a href="#">Deep Drop Down 1</a></li>
                <li><a href="#">Deep Drop Down 2</a></li>
              </ul>
            </li> -->
            <!-- <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li> -->
          </ul>
        </li>
        <li><a href="faculty.php">Faculty</a></li>
        <li><a href="events.php">Events</a></li>

        <li><a href="contact.php">Contact</a></li>
        <li class="dropdown">
          <?php
          include 'profile_name_getter.php'
          ?>
          <ul>
            <li><a href="#"><span>Profile</span></i></a>
            </li>
            <li><a href="#"><span>Activity Log</span></a> </li>
            <!-- <li><a href="#">Drop Down 2</a></li> -->
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a href="../include/sign-out.php">Log Out</a></li>
          </ul>
        </li>
      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->



  </div>
</header><!-- End Header -->