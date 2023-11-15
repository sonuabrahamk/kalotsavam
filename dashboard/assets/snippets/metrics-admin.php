

<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header" data-background-color="orange">
                <i class="material-icons">view_carousel</i>
            </div>
            <div class="card-content">
                <p class="category">No. of Fests</p>
                <h3 class="title"><?php echo $fests; ?></h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons">view_carousel</i> Total Fests created so far
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header" data-background-color="green">
                <i class="material-icons">perm_identity</i>
            </div>
            <div class="card-content">
                <p class="category">Users</p>
                <h3 class="title"><?php echo $team; ?></h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons">business</i> Registered Users
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header" data-background-color="blue">
                <i class="material-icons">pan_tool</i>
            </div>
            <div class="card-content">
                <p class="category">Participation</p>
                <h3 class="title"><?php echo $part; ?></h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons">contacts</i> for Events so far
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header" data-background-color="orange">
                <i class="fa fa-trophy"></i>
            </div>
            <div class="card-content">
                <p class="category">Institutions</p>
                <h3 class="title">+<?php echo $ins; ?></h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons">update</i> Just Updated
                </div>
            </div>
        </div>
    </div>
</div>