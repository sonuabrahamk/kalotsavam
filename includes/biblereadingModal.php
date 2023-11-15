<div class="modal fade" id="biblereadingModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-notice">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
                <strong><h3 class="modal-title" id="myModalLabel"><strong>Bible Reading | Solo Event</strong></h3></strong>
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
                            <p>Time Limit: maximum 3 minutes. (actual time may vary based on the Bible portion asked to read). No warning bell will be given. The final bell (double bell) will be given at the end of allowed time.</p>
                            <p>The reverence to Bible and the style of reading will be noticed. Do not mention book, chapter, verses etc. The participant should read the Bible portion which is given to them by the judges on the stage. POC Sampoorna Bible will be provided on stage. Reciting and chanting of the portion are not allowed.</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <strong>Criteria for Evaluation </strong>
                            <p>Clarity & Language: 70, Style: 30 (Devotion, Structure). (Total marks: 100)</p>
                            <p>If you have more questions, don't hesitate to contact us! We're here to help!</p>
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