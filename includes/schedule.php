<div class="subscribe-line subscribe-line-image" style="background-image: url('assets/img/bg/bg-2.jpg');"  id="section-teams" ng-controller="RulesController">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2 class="title">Basic Information</h2>
            </div>

            <div class="col-md-12">
                <!--                <h3><small>Tabs with Icons on Card</small></h3>-->

                <!-- Tabs with icons on Card -->
                <div class="card card-nav-tabs">
                    <div class="header header-info">
                        <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
                        <div class="nav-tabs-navigation">
                            <div class="nav-tabs-wrapper">
                                <ul class="nav nav-tabs text-center" data-tabs="tabs">
                                    <li class="active">
                                        <a href="index.html#day1" data-toggle="tab">
                                            <i class="material-icons">map</i>
                                            Venue map
                                        </a>
                                    </li>
                                    <li>
                                        <a href="index.html#day2" data-toggle="tab">
                                            <i class="material-icons">map</i>
                                            Road map
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="content">
                        <div class="tab-content text-center">
                            <div class="tab-pane active" id="day1">
                                <img src="assets/img/VenueMap.jpg" class="img-responsive" style="width:100%;" />
                            </div>
                            <div class="tab-pane" id="day2">
                                <img src="assets/img/DirectionMap.jpg" class="img-responsive" style="width:100%;" />
                            </div>
                            <div class="tab-pane" id="rules">
                                <div class="row">
                                    <div class="col-md-8 col-md-offset-2">
                                        <h3 class="text-left">General Rules</h3>
                                        <ul class="text-left">
                                            <li ng-repeat="rule in rules">{{ rule.text }}</li>
                                        </ul>
                                    </div>
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