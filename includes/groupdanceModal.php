<div class="modal fade" id="groupdanceModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-notice">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
                <strong><h3 class="modal-title" id="myModalLabel"><strong>Group Dance | Group Event</strong></h3></strong>
            </div>
            <div class="modal-body">
                <div class="instruction">
                    <div class="row">
                        <div class="col-md-12">
                            <strong>Description</strong>
                            <p> Only biblical theme dance allowed. Only Malayalam song is allowed. Fusion of songs is not allowed. Dance should be purely folk. Only one team (which may include students from Std I to XII) is allowed from each parish. Minimum number of participants is 5 and maximum number of participants is 9. </p>
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
                            <p><strong>Time limit: 10 minutes.</strong></p>
                            <p>The pen drive contains only the song (in MP3 format) or a soft copy (MP3 format) should be submitted before 06 Nov 2022 to the secretary of the CFTs. The Forane secretaries are responsible to submit the soft copies (named with chest numbers) of all the teams participating from their Forane on or before 13 Nov 2022 tothe CBC. The team leader should hold a pen drive contains only the song (in MP3 format) as a back-up and the same should be submitted to the control room in order to address any unexpected technical issues during the event.</p>
                            <p>No live orchestra is allowed. No warning bell or final bell will be there during the performance. The CFT secretaries are responsible to check the play time of the song before the submission to CBC. if the play time exceeds the time limit, the team shall be disqualified and shall not be allowed to perform.</p>
                            <p><strong>Criteria for Evaluation:</strong> Performance (coordination, rhythm, movements): 75, Theme: 20, Make-up & Costume: 5 </p>
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