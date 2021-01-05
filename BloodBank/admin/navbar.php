<nav class="navbar navbar-expand-lg navbar-dark bg-secondary font-weight-bold">
    <a class="navbar-brand" href="#">Blood Bank</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <!--doctor-->
            <li class="nav-item dropdown">
                <a class="dropdown-toggle text-white nav-link nav-tabs" data-toggle="dropdown" href="#">DOCTOR</a>
                    <ul class="dropdown-menu text-center">
                        <li><a class="btn" href="add_doctor.php" id="navbarDropdown">New Doctor</a></li>
                        <li><a class="btn" href="info_doctor.php">Doctor Info</a></li>
                    </ul>
            </li>
            <!--user-->
            <li class="nav-item dropdown">
                <a class="dropdown-toggle text-white nav-link nav-tabs" data-toggle="dropdown" href="#">USER</a>
                    <ul class="dropdown-menu text-center">
                        <li><a class="btn" href="add_user.php" id="navbarDropdown">New User</a></li>
                        <li><a class="btn" href="info_user.php">User Info</a></li>
                    </ul>
            </li>
            <!--donar-->
            <li class="nav-item dropdown">
                <a class="dropdown-toggle text-white nav-link nav-tabs" data-toggle="dropdown" href="#">DONAR</a>
                    <ul class="dropdown-menu text-center">
                        <li><a class="btn" href="add_donar.php" id="navbarDropdown">New Donar</a></li>
                        <li><a class="btn" href="info_donar.php">Donar Info</a></li>
                    </ul>
            </li>
            <!--patient-->
            <li class="nav-item dropdown">
                <a class="dropdown-toggle text-white nav-link nav-tabs" data-toggle="dropdown" href="#">PATIENT</a>
                    <ul class="dropdown-menu text-center">
                        <li><a class="btn" href="add_patient.php" id="navbarDropdown">New Patient</a></li>
                        <li><a class="btn" href="info_patient.php">Patient Info</a></li>
                    </ul>
            </li>
            <!--recipient-->
            <li class="nav-item dropdown">
                <a class="dropdown-toggle text-white nav-link nav-tabs" data-toggle="dropdown" href="#">RECIPIENT</a>
                    <ul class="dropdown-menu text-center">
                        <li><a class="btn" href="add_recipient.php" id="navbarDropdown">New Recipient</a></li>
                        <li><a class="btn" href="info_recipient.php">Recipient Info</a></li>
                    </ul>
            </li>
            
            <li class="nav-item mx-2">
                <a class="nav-link text-white" href="logout.php">Logout</a>
            </li>
        </ul>

    </div>
</nav>