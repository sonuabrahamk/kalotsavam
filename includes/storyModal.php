<div class="modal fade" id="storyModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-notice">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
                <strong><h3 class="modal-title" id="myModalLabel"><strong>Story Writing | Solo Event</strong></h3></strong>
            </div>
            <div class="modal-body">
                <div class="instruction">
                    <div class="row">
                        <div class="col-md-12">
                            <strong>Description</strong>
                            <p>The area for reference for the Story Writing competition of each section is intimated already. The actual topic of Story will be based on this and the same will be announced only at the time of competition. The medium of the competition is English.</p>
                        </div>
                    </div>
                </div>
                <div class="instruction">
                    <div class="row">
                        <div class="col-md-12">
                            <strong>General Rules</strong>
                            <ul>
                                <li ng-repeat="rule in event.rules"> {{ rule.line }}</li>
                            </ul>  
                            <p>Time limit:1 hour, Maximum 450 words/ 3 pages (excluding the title).</p>                        
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <strong>Criteria for Evaluation </strong>
                            <p>Creative Writing: 60, Language & Structure: 40 (Total: 100 marks)</p>
                        </div>
                    </div>
                        </div>
                    </div>
                </div>
                <p>If you have more questions, don't hesitate to contact us! We're here to help!</p>
                <div class="instruction">
                    <div class="row">
                        <div ng-repeat="coordinator in event.coordinators">
                            <div ng-if="coordinator.designation == 'Staff'">

                                <div class="col-md-4 col-md-offset-4 text-center" >
                                    <small class="text-info">{{ coordinator.designation }} Coordinator</small><br>
                                    <h6>{{ coordinator.name }}</h6>
                                    <small>{{ coordinator.contact }}</small>
                                    <!--<p>{{ coordinator.email }}</p>-->
                                </div>
                                <div class="col-md-4 text-center" >
                                    <small>&nbsp;</small><br>
                                    <h6>&nbsp;</h6>
                                    <small>&nbsp;</small>
                                    <!--<p>{{ coordinator.email }}</p>-->
                                </div>
                                <hr>
                            </div>
                            <div ng-if="coordinator.designation != 'Staff'">
                                <div class="col-md-4 text-center" >
                                    <small class="text-info">{{ coordinator.designation }} Coordinator</small><br>
                                    <h6>{{ coordinator.name }}</h6>
                                    <small>{{ coordinator.contact }}</small>
                                    <!--<p>{{ coordinator.email }}</p>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer text-center hide">
                <button type="button" class="btn btn-info btn-round" data-dismiss="modal">Sounds good!</button>
            </div>
        </div>
    </div>
</div>