<div class="modal fade" id="extemporeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-notice">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
                <strong><h3 class="modal-title" id="myModalLabel"><strong>Extempore | Solo Event</strong></h3></strong>
            </div>
            <div class="modal-body">
                <div class="instruction">
                    <div class="row">
                        <div class="col-md-12">
                            <strong>Description</strong>
                            <p>Subject will be given 5 minutes the time allotted for each candidate. Participants are not allowed to use any references like books, mobile phone etc. and to communicate with any other person.</p>
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
                            <p>Time limit: 5 minutes. A warning bell (single bell) will be given 1 minute before the cut off timeand the final bell (double bell), at the end of allowed time. Participant shall be disqualified if the performance exceeds the time limit.</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <strong>Criteria for Evaluation </strong>
                            <p>Content: 60 (Ideas, Structure, Language), Style: 40 (Presentation, Pronunciation, Clarity, modulation, Fluency, Eye Contact) (Total: 100 marks) </p>
                            
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