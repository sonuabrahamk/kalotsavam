<div class="team-3"  ng-controller="TeamsController"  id="section-schedule">

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center">
                <h2 class="title">Kalotsavam Schedule</h2>
                <!-- <h5 class="description">A group of people who found a way to merge their passion and belief by using their complimentary skills with a common purpose in mind.</h5> -->
            </div>
        </div>

        <div class="row">                            
            <div class="col-lg-12 col-md-12">
                <!-- Tabs with icons on Card -->
                <div class="card card-nav-tabs">
                    <div class="header header-info">
                        <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
                        <div class="nav-tabs-navigation hidden-sm hidden-xs">
                            <div class="nav-tabs-wrapper">
                                <ul class="nav nav-tabs text-center" data-tabs="tabs">
                                    <li class="active">
                                        <a href="index.html#lower" data-toggle="tab">
                                            <i class="material-icons">schedule</i>
                                            Lower Primary
                                        </a>
                                    </li>
                                    <li>
                                        <a href="index.html#upper" data-toggle="tab">
                                            <i class="material-icons">schedule</i>
                                            Upper Primary
                                        </a>
                                    </li>
                                    <li>
                                        <a href="index.html#high" data-toggle="tab">
                                            <i class="material-icons">schedule</i>
                                            High School
                                        </a>
                                    </li>
                                    <li>
                                        <a href="index.html#higher" data-toggle="tab">
                                            <i class="material-icons">schedule</i>
                                            Higher Secondary School
                                        </a>
                                    </li>
                                    <li>
                                        <a href="index.html#group" data-toggle="tab">
                                            <i class="material-icons">schedule</i>
                                            Group
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="nav-tabs-navigation hidden-md hidden-lg">
                            <div class="nav-tabs-wrapper">
                                <ul class="nav nav-tabs text-center" data-tabs="tabs">
                                    <li class="active">
                                        <a href="index.html#lower" data-toggle="tab">
                                            <i class="material-icons">schedule</i>
                                            LP
                                        </a>
                                    </li>
                                    <li>
                                        <a href="index.html#upper" data-toggle="tab">
                                            <i class="material-icons">schedule</i>
                                            UP
                                        </a>
                                    </li>
                                    <li>
                                        <a href="index.html#high" data-toggle="tab">
                                            <i class="material-icons">schedule</i>
                                            HS
                                        </a>
                                    </li>
                                    <li>
                                        <a href="index.html#higher" data-toggle="tab">
                                            <i class="material-icons">schedule</i>
                                            HSS
                                        </a>
                                    </li>
                                    <li>
                                        <a href="index.html#group" data-toggle="tab">
                                            <i class="material-icons">schedule</i>
                                            Group
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="content">
                        <div class="tab-content text-center">
                            <div class="tab-pane active" id="lower">
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered">
                                        <tr>
                                            <?php
                                                for($i=1;$i <= 23;$i++){
                                                    echo'<td style="height: 1px;padding: 0!important;"></td>';
                                                }
                                            ?>
                                        </tr>
                                        <thead class="text-info">
                                            <th>TIME</th>
                                            <th colspan='2'>08:00</th>
                                            <th colspan='2'>09:00</th>
                                            <th colspan='2'>10:00</th>
                                            <th colspan='2'>11:00</th>
                                            <th colspan='2'>12:00</th>
                                            <th colspan='2'>13:00</th>
                                            <th colspan='2'>14:00</th>
                                            <th colspan='2'>15:00</th>
                                            <th colspan='2'>16:00</th>
                                            <th colspan='2'>17:00</th>
                                            <th colspan='2'>18:00</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                                require("dashboard/assets/snippets/connect.php");
                                                if($res = mysqli_query($connect,"SELECT * FROM `events` WHERE CATEGORY='Lower Primary' AND VENUE<>''")){
                                                    $color='#f2c40f';
                                                    $count=1;
                                                    while($row = mysqli_fetch_array($res)){

                                                        $venue = $row['VENUE'];

                                                        $st_time = explode(":",$row['START_TIME']);
                                                        $ed_time = explode(":",$row['END_TIME']);

                                                        $st_hh = (int)$st_time[0] - 7;
                                                        $st_mm = (int)$st_time[1];
                                                        $ed_hh = (int)$ed_time[0] - 7;
                                                        $ed_mm = (int)$ed_time[1];

                                                        if($st_mm > 0){
                                                            if($st_hh == 1){$start = 2;}else{
                                                                $start = ($st_hh * 2);
                                                            }
                                                        }
                                                        else{
                                                            if($st_hh == 1){$start = 1;}else{
                                                                $start = ($st_hh * 2) - 1;
                                                            }
                                                        }

                                                        if($ed_mm > 0){
                                                            $end = ($ed_hh * 2) -1;
                                                        }
                                                        else{
                                                            $end = ($ed_hh * 2) - 2;
                                                        }


                                                        $next = 22 - $end;
                                                        $prev = $start - 1;
                                                        $time = ($end - $start)+1;


                                                        ?>
                                                        <tr>
                                                            <td class="event"><?php echo $row['NAME'];  ?></td>
                                                            <?php
                                                                if($prev != 0){
                                                                    echo '<td colspan="'.$prev.'"></td>';
                                                                }
                                                                switch($count){
                                                                    case 1:
                                                                        $color = '#bec3c7';
                                                                        $count++;
                                                                        break;
                                                                    case 2:
                                                                        $color = '#3598dc';
                                                                        $count++;
                                                                        break;
                                                                    case 3:
                                                                        $color = '#a86fc0';
                                                                        $count++;
                                                                        break;
                                                                    case 4:
                                                                        $color = '#f39c11';
                                                                        $count++;
                                                                        break;
                                                                    case 5:
                                                                        $color = '#f2c40f';
                                                                        $count++;
                                                                        break;
                                                                    case 6:
                                                                        $color = '#19bd9b';
                                                                        $count++;
                                                                        break;
                                                                    case 7:
                                                                        $color = '#e84c3d';
                                                                        $count=1;
                                                                        break;
                                                                }
                                                            ?>
                                                            <td style="background-color: <?php echo $color; ?>" colspan="<?php echo $time; ?>"><strong><?php echo $venue; ?></strong></td>
                                                            <?php
                                                                if($next != 0){
                                                                    echo '<td colspan="'.$next.'"></td>';
                                                                }
                                                            ?>
                                                        </tr>

                                                        <?php
                                                    }
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane" id="upper">
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered">
                                        <tr>
                                            <?php
                                                for($i=1;$i <= 23;$i++){
                                                    echo'<td style="height: 1px;padding: 0!important;"></td>';
                                                }
                                            ?>
                                        </tr>
                                        <thead class="text-info">
                                            <th>TIME</th>
                                            <th colspan='2'>08:00</th>
                                            <th colspan='2'>09:00</th>
                                            <th colspan='2'>10:00</th>
                                            <th colspan='2'>11:00</th>
                                            <th colspan='2'>12:00</th>
                                            <th colspan='2'>13:00</th>
                                            <th colspan='2'>14:00</th>
                                            <th colspan='2'>15:00</th>
                                            <th colspan='2'>16:00</th>
                                            <th colspan='2'>17:00</th>
                                            <th colspan='2'>18:00</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                                require("dashboard/assets/snippets/connect.php");
                                                if($res = mysqli_query($connect,"SELECT * FROM `events` WHERE CATEGORY='Upper Primary' AND VENUE<>''")){
                                                    $color='#f2c40f';
                                                    $count=1;
                                                    while($row = mysqli_fetch_array($res)){

                                                        $venue = $row['VENUE'];

                                                        $st_time = explode(":",$row['START_TIME']);
                                                        $ed_time = explode(":",$row['END_TIME']);

                                                        $st_hh = (int)$st_time[0] - 7;
                                                        $st_mm = (int)$st_time[1];
                                                        $ed_hh = (int)$ed_time[0] - 7;
                                                        $ed_mm = (int)$ed_time[1];

                                                        if($st_mm > 0){
                                                            if($st_hh == 1){$start = 2;}else{
                                                                $start = ($st_hh * 2);
                                                            }
                                                        }
                                                        else{
                                                            if($st_hh == 1){$start = 1;}else{
                                                                $start = ($st_hh * 2) - 1;
                                                            }
                                                        }

                                                        if($ed_mm > 0){
                                                            $end = ($ed_hh * 2) -1;
                                                        }
                                                        else{
                                                            $end = ($ed_hh * 2) - 2;
                                                        }


                                                        $next = 22 - $end;
                                                        $prev = $start - 1;
                                                        $time = ($end - $start)+1;


                                                        ?>
                                                        <tr>
                                                            <td class="event"><?php echo $row['NAME'];  ?></td>
                                                            <?php
                                                                if($prev != 0){
                                                                    echo '<td colspan="'.$prev.'"></td>';
                                                                }
                                                                switch($count){
                                                                    case 1:
                                                                        $color = '#bec3c7';
                                                                        $count++;
                                                                        break;
                                                                    case 2:
                                                                        $color = '#3598dc';
                                                                        $count++;
                                                                        break;
                                                                    case 3:
                                                                        $color = '#a86fc0';
                                                                        $count++;
                                                                        break;
                                                                    case 4:
                                                                        $color = '#f39c11';
                                                                        $count++;
                                                                        break;
                                                                    case 5:
                                                                        $color = '#f2c40f';
                                                                        $count++;
                                                                        break;
                                                                    case 6:
                                                                        $color = '#19bd9b';
                                                                        $count++;
                                                                        break;
                                                                    case 7:
                                                                        $color = '#e84c3d';
                                                                        $count=1;
                                                                        break;
                                                                }
                                                            ?>
                                                            <td style="background-color: <?php echo $color; ?>" colspan="<?php echo $time; ?>"><strong><?php echo $venue; ?></strong></td>
                                                            <?php
                                                                if($next != 0){
                                                                    echo '<td colspan="'.$next.'"></td>';
                                                                }
                                                            ?>
                                                        </tr>

                                                        <?php
                                                    }
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane" id="high">
                            <div class="table-responsive">
                                    <table class="table table-hover table-bordered">
                                        <tr>
                                            <?php
                                                for($i=1;$i <= 23;$i++){
                                                    echo'<td style="height: 1px;padding: 0!important;"></td>';
                                                }
                                            ?>
                                        </tr>
                                        <thead class="text-info">
                                            <th>TIME</th>
                                            <th colspan='2'>08:00</th>
                                            <th colspan='2'>09:00</th>
                                            <th colspan='2'>10:00</th>
                                            <th colspan='2'>11:00</th>
                                            <th colspan='2'>12:00</th>
                                            <th colspan='2'>13:00</th>
                                            <th colspan='2'>14:00</th>
                                            <th colspan='2'>15:00</th>
                                            <th colspan='2'>16:00</th>
                                            <th colspan='2'>17:00</th>
                                            <th colspan='2'>18:00</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                                require("dashboard/assets/snippets/connect.php");
                                                if($res = mysqli_query($connect,"SELECT * FROM `events` WHERE CATEGORY='High School' AND VENUE<>''")){
                                                    $color='#f2c40f';
                                                    $count=1;
                                                    while($row = mysqli_fetch_array($res)){

                                                        $venue = $row['VENUE'];

                                                        $st_time = explode(":",$row['START_TIME']);
                                                        $ed_time = explode(":",$row['END_TIME']);

                                                        $st_hh = (int)$st_time[0] - 7;
                                                        $st_mm = (int)$st_time[1];
                                                        $ed_hh = (int)$ed_time[0] - 7;
                                                        $ed_mm = (int)$ed_time[1];

                                                        if($st_mm > 0){
                                                            if($st_hh == 1){$start = 2;}else{
                                                                $start = ($st_hh * 2);
                                                            }
                                                        }
                                                        else{
                                                            if($st_hh == 1){$start = 1;}else{
                                                                $start = ($st_hh * 2) - 1;
                                                            }
                                                        }

                                                        if($ed_mm > 0){
                                                            $end = ($ed_hh * 2) -1;
                                                        }
                                                        else{
                                                            $end = ($ed_hh * 2) - 2;
                                                        }


                                                        $next = 22 - $end;
                                                        $prev = $start - 1;
                                                        $time = ($end - $start)+1;


                                                        ?>
                                                        <tr>
                                                            <td class="event"><?php echo $row['NAME'];  ?></td>
                                                            <?php
                                                                if($prev != 0){
                                                                    echo '<td colspan="'.$prev.'"></td>';
                                                                }
                                                                switch($count){
                                                                    case 1:
                                                                        $color = '#bec3c7';
                                                                        $count++;
                                                                        break;
                                                                    case 2:
                                                                        $color = '#3598dc';
                                                                        $count++;
                                                                        break;
                                                                    case 3:
                                                                        $color = '#a86fc0';
                                                                        $count++;
                                                                        break;
                                                                    case 4:
                                                                        $color = '#f39c11';
                                                                        $count++;
                                                                        break;
                                                                    case 5:
                                                                        $color = '#f2c40f';
                                                                        $count++;
                                                                        break;
                                                                    case 6:
                                                                        $color = '#19bd9b';
                                                                        $count++;
                                                                        break;
                                                                    case 7:
                                                                        $color = '#e84c3d';
                                                                        $count=1;
                                                                        break;
                                                                }
                                                            ?>
                                                            <td style="background-color: <?php echo $color; ?>" colspan="<?php echo $time; ?>"><strong><?php echo $venue; ?></strong></td>
                                                            <?php
                                                                if($next != 0){
                                                                    echo '<td colspan="'.$next.'"></td>';
                                                                }
                                                            ?>
                                                        </tr>

                                                        <?php
                                                    }
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane" id="higher">
                            <div class="table-responsive">
                                    <table class="table table-hover table-bordered">
                                        <tr>
                                            <?php
                                                for($i=1;$i <= 23;$i++){
                                                    echo'<td style="height: 1px;padding: 0!important;"></td>';
                                                }
                                            ?>
                                        </tr>
                                        <thead class="text-info">
                                            <th>TIME</th>
                                            <th colspan='2'>08:00</th>
                                            <th colspan='2'>09:00</th>
                                            <th colspan='2'>10:00</th>
                                            <th colspan='2'>11:00</th>
                                            <th colspan='2'>12:00</th>
                                            <th colspan='2'>13:00</th>
                                            <th colspan='2'>14:00</th>
                                            <th colspan='2'>15:00</th>
                                            <th colspan='2'>16:00</th>
                                            <th colspan='2'>17:00</th>
                                            <th colspan='2'>18:00</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                                require("dashboard/assets/snippets/connect.php");
                                                if($res = mysqli_query($connect,"SELECT * FROM `events` WHERE CATEGORY='Higher Secondary School' AND VENUE<>''")){
                                                    $color='#f2c40f';
                                                    $count=1;
                                                    while($row = mysqli_fetch_array($res)){

                                                        $venue = $row['VENUE'];

                                                        $st_time = explode(":",$row['START_TIME']);
                                                        $ed_time = explode(":",$row['END_TIME']);

                                                        $st_hh = (int)$st_time[0] - 7;
                                                        $st_mm = (int)$st_time[1];
                                                        $ed_hh = (int)$ed_time[0] - 7;
                                                        $ed_mm = (int)$ed_time[1];

                                                        if($st_mm > 0){
                                                            if($st_hh == 1){$start = 2;}else{
                                                                $start = ($st_hh * 2);
                                                            }
                                                        }
                                                        else{
                                                            if($st_hh == 1){$start = 1;}else{
                                                                $start = ($st_hh * 2) - 1;
                                                            }
                                                        }

                                                        if($ed_mm > 0){
                                                            $end = ($ed_hh * 2) -1;
                                                        }
                                                        else{
                                                            $end = ($ed_hh * 2) - 2;
                                                        }


                                                        $next = 22 - $end;
                                                        $prev = $start - 1;
                                                        $time = ($end - $start)+1;


                                                        ?>
                                                        <tr>
                                                            <td class="event"><?php echo $row['NAME'];  ?></td>
                                                            <?php
                                                                if($prev != 0){
                                                                    echo '<td colspan="'.$prev.'"></td>';
                                                                }
                                                                switch($count){
                                                                    case 1:
                                                                        $color = '#bec3c7';
                                                                        $count++;
                                                                        break;
                                                                    case 2:
                                                                        $color = '#3598dc';
                                                                        $count++;
                                                                        break;
                                                                    case 3:
                                                                        $color = '#a86fc0';
                                                                        $count++;
                                                                        break;
                                                                    case 4:
                                                                        $color = '#f39c11';
                                                                        $count++;
                                                                        break;
                                                                    case 5:
                                                                        $color = '#f2c40f';
                                                                        $count++;
                                                                        break;
                                                                    case 6:
                                                                        $color = '#19bd9b';
                                                                        $count++;
                                                                        break;
                                                                    case 7:
                                                                        $color = '#e84c3d';
                                                                        $count=1;
                                                                        break;
                                                                }
                                                            ?>
                                                            <td style="background-color: <?php echo $color; ?>" colspan="<?php echo $time; ?>"><strong><?php echo $venue; ?></strong></td>
                                                            <?php
                                                                if($next != 0){
                                                                    echo '<td colspan="'.$next.'"></td>';
                                                                }
                                                            ?>
                                                        </tr>

                                                        <?php
                                                    }
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane" id="group">
                            <div class="table-responsive">
                                    <table class="table table-hover table-bordered">
                                        <tr>
                                            <?php
                                                for($i=1;$i <= 23;$i++){
                                                    echo'<td style="height: 1px;padding: 0!important;"></td>';
                                                }
                                            ?>
                                        </tr>
                                        <thead class="text-info">
                                            <th>TIME</th>
                                            <th colspan='2'>08:00</th>
                                            <th colspan='2'>09:00</th>
                                            <th colspan='2'>10:00</th>
                                            <th colspan='2'>11:00</th>
                                            <th colspan='2'>12:00</th>
                                            <th colspan='2'>13:00</th>
                                            <th colspan='2'>14:00</th>
                                            <th colspan='2'>15:00</th>
                                            <th colspan='2'>16:00</th>
                                            <th colspan='2'>17:00</th>
                                            <th colspan='2'>18:00</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                                require("dashboard/assets/snippets/connect.php");
                                                if($res = mysqli_query($connect,"SELECT * FROM `events` WHERE CATEGORY='Group' AND VENUE<>''")){
                                                    $color='#f2c40f';
                                                    $count=1;
                                                    while($row = mysqli_fetch_array($res)){

                                                        $venue = $row['VENUE'];

                                                        $st_time = explode(":",$row['START_TIME']);
                                                        $ed_time = explode(":",$row['END_TIME']);

                                                        $st_hh = (int)$st_time[0] - 7;
                                                        $st_mm = (int)$st_time[1];
                                                        $ed_hh = (int)$ed_time[0] - 7;
                                                        $ed_mm = (int)$ed_time[1];

                                                        if($st_mm > 0){
                                                            if($st_hh == 1){$start = 2;}else{
                                                                $start = ($st_hh * 2);
                                                            }
                                                        }
                                                        else{
                                                            if($st_hh == 1){$start = 1;}else{
                                                                $start = ($st_hh * 2) - 1;
                                                            }
                                                        }

                                                        if($ed_mm > 0){
                                                            $end = ($ed_hh * 2) -1;
                                                        }
                                                        else{
                                                            $end = ($ed_hh * 2) - 2;
                                                        }


                                                        $next = 22 - $end;
                                                        $prev = $start - 1;
                                                        $time = ($end - $start)+1;


                                                        ?>
                                                        <tr>
                                                            <td class="event"><?php echo $row['NAME'];  ?></td>
                                                            <?php
                                                                if($prev != 0){
                                                                    echo '<td colspan="'.$prev.'"></td>';
                                                                }
                                                                switch($count){
                                                                    case 1:
                                                                        $color = '#bec3c7';
                                                                        $count++;
                                                                        break;
                                                                    case 2:
                                                                        $color = '#3598dc';
                                                                        $count++;
                                                                        break;
                                                                    case 3:
                                                                        $color = '#a86fc0';
                                                                        $count++;
                                                                        break;
                                                                    case 4:
                                                                        $color = '#f39c11';
                                                                        $count++;
                                                                        break;
                                                                    case 5:
                                                                        $color = '#f2c40f';
                                                                        $count++;
                                                                        break;
                                                                    case 6:
                                                                        $color = '#19bd9b';
                                                                        $count++;
                                                                        break;
                                                                    case 7:
                                                                        $color = '#e84c3d';
                                                                        $count=1;
                                                                        break;
                                                                }
                                                            ?>
                                                            <td style="background-color: <?php echo $color; ?>" colspan="<?php echo $time; ?>"><strong><?php echo $venue; ?></strong></td>
                                                            <?php
                                                                if($next != 0){
                                                                    echo '<td colspan="'.$next.'"></td>';
                                                                }
                                                            ?>
                                                        </tr>

                                                        <?php
                                                    }
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Tabs with icons on Card -->
            </div>
        </div>

    </div>
</div>