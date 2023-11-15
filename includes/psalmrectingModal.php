<div class="modal fade" id="psalmrectingModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-notice">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
                <strong><h3 class="modal-title" id="myModalLabel"><strong>Psalm Recting | Solo Event</strong></h3></strong>
            </div>
            <div class="modal-body">
                <div class="instruction">
                    <div class="row">
                        <div class="col-md-12">
                            <strong>Description</strong>
                            <p>Language: Malayalam only, Reference: POC Bible</p>
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
                            <p>Time Limit: 3 minutes. No warning bell will be given. The final bell (double bell) will be given at the end of allowed time. Participant shall be disqualified if the performance exceeds the time limit.</p>
                            <p>The Psalm should be recited by-heart and by joining the hands together. Exact Bible verses should be recited, no changes and modifications are allowed. Back ground or play back music is not allowed. Start with Psalm number and end with "Glory be to the Father....". POC samkeerthanam chanting style should be followed. Do not follow Malayalam poetry recitation style.</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <strong>Criteria for Evaluation </strong>
                            <p>If you have more questions, don't hesitate to contact us! We're here to help!</p>
                            <p>Melody & Chanting: 60, Style: 40 (Devotion, Clarity). (Total marks: 100)</p>
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