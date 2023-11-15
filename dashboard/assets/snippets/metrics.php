<?php

require('assets/snippets/connect.php');

$calculated = 0;
$verified = 0;
$approved = 0;
$published = 0;
$pending = 0;

if($res = mysqli_query($connect,"SELECT STATUS, count(ID) as CNT FROM `events` GROUP BY STATUS ")){
    while($row = mysqli_fetch_array($res)){
        switch($row['STATUS']){
            case 'CALCULATED':
                $calculated = $row['CNT'];
            break;
            case 'VERIFIED':
                $verified = $row['CNT'];
            break;
            case 'APPROVED':
                $approved = $row['CNT'];
            break;
            case 'PUBLISHED':
                $published = $row['CNT'];
            break;
            case 'PENDING':
                $pending = $row['CNT'];
            break;
        }
    }
}

$total = $calculated+$verified+$approved+$published+$pending;

?>
<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-12">
        <div class="card card-stats">
            <div class="card-header" data-background-color="purple">
                <i class="material-icons">view_carousel</i>
            </div>
            <div class="card-content">
                <p class="category">Results Entered</p>
                <h3 class="title"><?php echo $calculated; ?></h3>
            </div>
            <?php
                if(($_SESSION['category'] == 'DATA_ENTRY')||($_SESSION['category'] == 'SUPERADMIN')){
            ?>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons text-primary">add</i> <a href="data_entry.php">Add Scores</a>
                </div>
            </div>
            <?php
                }
                else{
            ?>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons text-primary">access_time</i> <?php echo $pending.' more awaiting' ?>
                </div>
            </div>
            <?php
                }
            ?>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-12">
        <div class="card card-stats">
            <div class="card-header" data-background-color="orange">
                <i class="material-icons">perm_identity</i>
            </div>
            <div class="card-content">
                <p class="category">Results Verified</p>
                <h3 class="title"><?php echo $verified; ?></h3>
            </div>
            <?php
                if(($_SESSION['category'] == 'VERIFIER')||($_SESSION['category'] == 'SUPERADMIN')){
            ?>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons text-primary">add</i> <a href="verify.php">Verify Scores</a>
                </div>
            </div>
            <?php
                }
                else{
            ?>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons text-primary">access_time</i> <?php echo ($pending+$calculated).' more awaiting' ?>
                </div>
            </div>
            <?php
                }
            ?>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-12">
        <div class="card card-stats">
            <div class="card-header" data-background-color="blue">
                <i class="material-icons">pan_tool</i>
            </div>
            <div class="card-content">
                <p class="category">Results Approved</p>
                <h3 class="title"><?php echo $approved; ?></h3>
            </div>
            <?php
                if(($_SESSION['category'] == 'APPROVER')||($_SESSION['category'] == 'SUPERADMIN')){
            ?>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons text-primary">add</i> <a href="publish.php">Approve Scores</a>
                </div>
            </div>
            <?php
                }
                else{
            ?>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons text-primary">access_time</i> <?php echo ($pending+$calculated+$verified).' more awaiting' ?>
                </div>
            </div>
            <?php
                }
            ?>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-12">
        <div class="card card-stats">
            <div class="card-header" data-background-color="green">
                <i class="material-icons">perm_identity</i>
            </div>
            <div class="card-content">
                <p class="category">Results Published</p>
                <h3 class="title"><?php echo $published; ?></h3>
            </div>
            <?php
                if(($_SESSION['category'] == 'PUBLISHER')||($_SESSION['category'] == 'SUPERADMIN')){
            ?>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons text-primary">add</i> <a href="makepublic.php">Publish Scores</a>
                </div>
            </div>
            <?php
                }
                else{
            ?>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons text-primary">access_time</i> <?php echo ($pending+$calculated+$verified).' more awaiting' ?>
                </div>
            </div>
            <?php
                }
            ?>
        </div>
    </div>
</div>