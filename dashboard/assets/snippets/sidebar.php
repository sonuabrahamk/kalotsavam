<div class="sidebar" data-color="blue" data-image="assets/img/sidebar-1.jpg">
    <!--
Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

Tip 2: you can also add an image using data-image tag
-->

    <div class="logo" style="text-align: center;">
        <a href="#" class="simple-text">
            <img src="../assets/img/logo.png" class="img-responsive" style="height: 100px; margin: auto" />
        </a>
    </div>

    <div class="sidebar-wrapper">
        <ul class="nav">
            <li>
                <a href="index.php">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>
            <?php
                if(($_SESSION['category'] == 'SUPERADMIN')||($_SESSION['category'] == 'DATA_ENTRY')){
            ?>
            <li>
                <a href="data_entry.php">
                    <i class="material-icons">assignments</i>
                    <p>Scoresheet Entry</p>
                </a>
            </li>
            <?php
                }
                if(($_SESSION['category'] == 'SUPERADMIN')||($_SESSION['category'] == 'VERIFIER')){
            ?>
            <li>
                <a href="verify.php">
                    <i class="material-icons">assignment_turned_in</i>
                    <p>Verify Scores</p>
                </a>
            </li>
            <?php
                }
                if(($_SESSION['category'] == 'SUPERADMIN')||($_SESSION['category'] == 'APPROVER')){
            ?>
            <li>
                <a href="publish.php">
                    <i class="material-icons">done_all</i>
                    <p>Approve Results</p>
                </a>
            </li>
            <?php
                }
                if(($_SESSION['category'] == 'SUPERADMIN')||($_SESSION['category'] == 'PUBLISHER')){
            ?>
            <li>
                <a href="makepublic.php">
                    <i class="material-icons">done_all</i>
                    <p>Publish Results</p>
                </a>
            </li>
            <?php
                }
                if(($_SESSION['category'] == 'SUPERADMIN')||($_SESSION['category'] == 'DATA_ENTRY')){
            ?>
            <li>
                <a href="absense.php">
                    <i class="material-icons">assignments</i>
                    <p>Mark Absence</p>
                </a>
            </li>
            <?php
                }
            ?>
            <li>
                <a href="participants.php">
                    <i class="material-icons">widgets</i>
                    <p>Participant list</p>
                </a>
            </li>
            <li>
                <a href="points.php">
                    <i class="material-icons">assignments</i>
                    <p>Points Table</p>
                </a>
            </li>
            <li class="drop-down">
                <a href="results.php">
                    <i class="material-icons">emoji_events</i>
                    <p>Results</p>
                </a>
            </li>
            <?php
                if(($_SESSION['category'] == 'SUPERADMIN')||($_SESSION['category'] == 'CERTIFICATE')){
            ?>
            <li class="drop-down">
                <a href="assets/snippets/exports/exportResultAll.php">
                    <i class="material-icons">emoji_events</i>
                    <p>Consolidated Results</p>
                </a>
            </li>
            <?php
                }
                if(($_SESSION['category'] == 'SUPERADMIN')){
            ?>
            <li>
                <a href="schedule.php">
                    <i class="material-icons">schedule</i>
                    <p>Schedule</p>
                </a>
            </li>
            <?php
                }
                if(($_SESSION['category'] == 'SUPERADMIN')){
            ?>
            <li>
                <a href="usermanagement.php">
                    <i class="material-icons">account_box</i>
                    <p>User Management</p>
                </a>
            </li>
            <?php
                }
                if(($_SESSION['category'] == 'SUPERADMIN')){
            ?>
            <li>
                <a href="dump.php">
                    <i class="material-icons">account_box</i>
                    <p>Backup Script</p>
                </a>
            </li>
            <?php
                }
            ?>
            <li>
                <a href="view.php">
                    <i class="material-icons">cast</i>
                    <p>View</p>
                </a>
            </li>
            <li>
                <a href="assets/snippets/logout.php">
                    <i class="material-icons">power_settings_new</i>
                    <p>Logout</p>
                </a>
            </li>
        </ul>
    </div>
</div>