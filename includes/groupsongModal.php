<div class="modal fade" id="groupsongModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-notice">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
                <strong><h3 class="modal-title" id="myModalLabel"><strong>Group Song | Group Event</strong></h3></strong>
            </div>
            <div class="modal-body">
                <div class="instruction">
                    <div class="row">
                        <div class="col-md-12">
                            <strong>Description</strong>
                            <p> Only Christian devotional Malayalam songs are allowed. Fusion of songs may be allowed. Only one team (which may include students from Std Ito XII) is allowed from each parish. Minimum number of participants is 5 and maximum number of participants is 9. No instruments shall be allowed. 3 mikes will be provided for Group Song.   </p>
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
                            <p>Time limit: 8 minutes.</p>
                            <p>A warning bell (single bell) will be given 1 minute before the cut off time and the final bell (double bell), at the end of allowed time. The team shall be disqualified if the performance exceeds the time limit.</p>
                            <p><strong>Criteria for Evaluation:</strong> Melody: 60, Rhythm: 30, Synchronization: 10 </p>
                            <p>(Total: 100 marks)</p>
                        </div>
                    </div>
                </div>                
            </div>
            <div class="modal-footer">
                <a href="results.php">
                    <button class="btn btn-result btn-info btn-round" id="">View Result</button>
                </a>
            </div>
        </div>
    </div>
</div>