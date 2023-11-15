<div class="modal fade" id="elocutionModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-notice">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
                <strong><h3 class="modal-title" id="myModalLabel"><strong>Elocution | Solo Event</strong></h3></strong>
            </div>
            <div class="modal-body">
                <div class="instruction">
                    <div class="row">
                        <div class="col-md-12">
                            <strong>Description</strong>
                            <p> Only the topic given in advance shall be allowed. </p>
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
                            <p>Time limit: 5 minutes.</p><p>A warning bell (single bell) will be given 1 minute before the cut off time and the final bell (double bell), at the end of allowed time. Participant shall be disqualified if the performance exceeds the time limit.</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <strong>Criteria for Evaluation </strong>
                            <p>Content: 50 (Ideas, Structure, Language), Style: 50 (Presentation, Pronunciation, Clarity, modulation, Eye Contact) (Total: 100 marks) </p>
                            
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