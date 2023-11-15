$(document).ready( function() {

    $('.catOpt').click(function(){
        $('#categoryBtn').val($(this).text());
    });

    $('.eventOpt').click(function(){
        $('#eventBtn').val($(this).text());
    });

    $('#searchBtn').click(function(){
        var cat = $('#categoryBtn').val();
        var event = $('#eventBtn').val();
        if((cat == '')||(event == '')){
            demo.showNotification('top','center','Select Category and Event to display the scores!',3);
        }
        else{
            $.ajax({
                url: 'assets/snippets/createVerifyTbl.php?cat='+cat+'&&event='+event,
                type:'get',
                success: function(data){
                    if(data == '1'){
                        demo.showNotification('top','center','This Category and Event is not yet available for verification!',3);
                    }
                    else if(data == '0'){
                        demo.showNotification('top','center','No records to Display!',3);
                    }
                    else if(data == 'error'){
                        demo.showNotification('top','center','Error in DB!',2);
                    }
                    else{
                        data = JSON.parse(data);
                        var txt ='';
                        if(data.length <= 0) {
                            $('#scoreTbl').html('<tr><td colspan="7">No Data to display for this category! Select another category and event!</td></tr>');
                            return;
                        }
                        $('input[name="secDisplay"]').val(data[0].SECTION);
                        $('#wizTitle').text(event+' ('+cat+')');

                        // comment to be checked

                        $.ajax({
                            url: 'assets/snippets/cmtcheck.php?section='+data[0].SECTION,
                            type: 'get',
                            success: function(data){
                                if(data == ''){
                                    return;
                                }
                                else{
                                    demo.showNotification('top','center','Rejected scores for: <br/>'+data,3);
                                }
                            },
                            error: function(){
                                demo.showNotification('top','center','Error to load comment!',2);
                            }
                        });

                        $.each(data,function(i,x){
                            if(x.RANK == 1){
                                txt += '<tr style="background-color: #ffda79;font-weight: bold;"><td>'+x.CHEST_NO+'</td><td><div class="form-group form-info form-info is-empty"><input type="text" name="'+x.ID+'_J1" id="'+x.ID+'_J1" class="form-control verifyTxt" value="'+x.JUDGE_1+'"></div></td><td><div class="form-group form-info is-empty"><input type="text" name="'+x.ID+'_J2" id="'+x.ID+'_J2" class="form-control verifyTxt" value="'+x.JUDGE_2+'"></div></td><td><div class="form-group form-info is-empty"><input type="text" name="'+x.ID+'_J3" id="'+x.ID+'_J3" class="form-control verifyTxt" value="'+x.JUDGE_3+'"></div></td><td><div class="form-group form-info is-empty"><input type="text" name="'+x.ID+'_tot" id="'+x.ID+'_tot" class="form-control" style="font-weight: bold;" value="'+x.MARKS+'" readonly/></div></td><td><div class="form-group form-info is-empty"><input type="text" name="'+x.ID+'_grade" id="'+x.ID+'_grade" class="form-control" style="font-weight: bold;" value="'+x.GRADE+'" readonly/></div></td><td><div class="form-group form-info is-empty"><input type="text" name="'+x.ID+'_RK" id="'+x.ID+'_RK" class="form-control verifyTxt" style="font-weight: bold;" value="'+x.RANK+'" readonly></div></td><td><div class="form-group form-info is-empty"><i class="material-icons text-primary editScore red" id="'+x.ID+'_status">cancel_presentation</i></div></td></tr>';
                            }
                            else if(x.RANK == 2){
                                txt += '<tr style="background-color: #ffda79;font-weight: bold;"><td>'+x.CHEST_NO+'</td><td><div class="form-group form-info form-info is-empty"><input type="text" name="'+x.ID+'_J1" id="'+x.ID+'_J1" class="form-control verifyTxt" value="'+x.JUDGE_1+'"></div></td><td><div class="form-group form-info is-empty"><input type="text" name="'+x.ID+'_J2" id="'+x.ID+'_J2" class="form-control verifyTxt" value="'+x.JUDGE_2+'"></div></td><td><div class="form-group form-info is-empty"><input type="text" name="'+x.ID+'_J3" id="'+x.ID+'_J3" class="form-control verifyTxt" value="'+x.JUDGE_3+'"></div></td><td><div class="form-group form-info is-empty"><input type="text" name="'+x.ID+'_tot" id="'+x.ID+'_tot" class="form-control" style="font-weight: bold;" value="'+x.MARKS+'" readonly/></div></td><td><div class="form-group form-info is-empty"><input type="text" name="'+x.ID+'_grade" id="'+x.ID+'_grade" class="form-control" style="font-weight: bold;" value="'+x.GRADE+'" readonly/></div></td><td><div class="form-group form-info is-empty"><input type="text" name="'+x.ID+'_RK" id="'+x.ID+'_RK" class="form-control verifyTxt" style="font-weight: bold;" value="'+x.RANK+'" readonly></div></td><td><div class="form-group form-info is-empty"><i class="material-icons text-primary editScore red" id="'+x.ID+'_status">cancel_presentation</i></div></td></tr>';
                            }
                            else if(x.RANK == 3){
                                txt += '<tr style="background-color: #ffda79;font-weight: bold;"><td>'+x.CHEST_NO+'</td><td><div class="form-group form-info form-info is-empty"><input type="text" name="'+x.ID+'_J1" id="'+x.ID+'_J1" class="form-control verifyTxt" value="'+x.JUDGE_1+'"></div></td><td><div class="form-group form-info is-empty"><input type="text" name="'+x.ID+'_J2" id="'+x.ID+'_J2" class="form-control verifyTxt" value="'+x.JUDGE_2+'"></div></td><td><div class="form-group form-info is-empty"><input type="text" name="'+x.ID+'_J3" id="'+x.ID+'_J3" class="form-control verifyTxt" value="'+x.JUDGE_3+'"></div></td><td><div class="form-group form-info is-empty"><input type="text" name="'+x.ID+'_tot" id="'+x.ID+'_tot" class="form-control" style="font-weight: bold;" value="'+x.MARKS+'" readonly/></div></td><td><div class="form-group form-info is-empty"><input type="text" name="'+x.ID+'_grade" id="'+x.ID+'_grade" class="form-control" style="font-weight: bold;" value="'+x.GRADE+'" readonly/></div></td><td><div class="form-group form-info is-empty"><input type="text" name="'+x.ID+'_RK" id="'+x.ID+'_RK" class="form-control verifyTxt" style="font-weight: bold;" value="'+x.RANK+'" readonly></div></td><td><div class="form-group form-info is-empty"><i class="material-icons text-primary editScore red" id="'+x.ID+'_status">cancel_presentation</i></div></td></tr>';
                            }
                            else{
                                txt += '<tr><td>'+x.CHEST_NO+'</td><td><div class="form-group form-info is-empty"><input type="text" name="'+x.ID+'_J1" id="'+x.ID+'_J1" class="form-control verifyTxt" value="'+x.JUDGE_1+'"></div></td><td><div class="form-group form-info is-empty"><input type="text" name="'+x.ID+'_J2" id="'+x.ID+'_J2" class="form-control verifyTxt" value="'+x.JUDGE_2+'"></div></td><td><div class="form-group form-info is-empty"><input type="text" name="'+x.ID+'_J3" id="'+x.ID+'_J3" class="form-control verifyTxt" value="'+x.JUDGE_3+'"></div></td><td><div class="form-group form-info is-empty"><input type="text" name="'+x.ID+'_tot" id="'+x.ID+'_tot" class="form-control" value="'+x.MARKS+'" readonly/></div></td><td><div class="form-group form-info is-empty"><input type="text" name="'+x.ID+'_grade" id="'+x.ID+'_grade" class="form-control" value="'+x.GRADE+'" readonly/></div></td><td><div class="form-group form-info is-empty"><input type="text" name="'+x.ID+'_RK" id="'+x.ID+'_RK" class="form-control verifyTxt" value="'+x.RANK+'"></div></td><td><div class="form-group form-info is-empty"><i class="material-icons text-primary editScore red" id="'+x.ID+'_status">cancel_presentation</i></div></td></tr>';
                            }
                        });
                        $('#scoreTbl').html(txt);
                    }
                },
                error: function(){
                    demo.showNotification('top','center','Error in network connection!',2);
                }
            });
        }
    });


    $('#uptScores').click(function(){
        if($('input[name="secDisplay"]').val() == 'section'){
            demo.showNotification('top','center','Select Category and Event to verify the scores!',3);
        }
        else{
            count=0;
            $('.editScore').each(function(){
                if($(this).text() == 'cancel_presentation'){
                    count++;
                }
            });

            if(count > 0){
                demo.showNotification('top','center','Verify all scores to proceed!',3);
            }
            else{

                var section = $('input[name="secDisplay"]').val();

                $.ajax({
                    url: 'assets/snippets/approve.php?section='+section,
                    type: 'get',
                    success: function(data){
                        demo.showNotification('top','center',data,2);
                        $('#scoreTbl').html('<tr><td colspan="7">No Data to display for this category! Select another category and event!</td></tr>');
                    },
                    error: function(){
                        demo.showNotification('top','center','Error accessing the DB!',4);
                    }
                });
            }
        }
    });


    $('#clrScores').click(function(){
        if($('input[name="secDisplay"]').val() == 'section'){
            demo.showNotification('top','center','Select Category and Event to Reject the data!',3);
        }
        else{

            $('#myModal').css('display','block');
            $('#myModal').addClass('in');

            // $.ajax({
            //     url:'assets/snippets/rejectLevel.php?section='+$('input[name="secDisplay"]').val(),
            //     type:'get',
            //     success: function(data){
            //         demo.showNotification('top','center',data,2);
            //         $('#scoreTbl').html('<tr><td colspan="4">No Data to display for this category! Select another category and event!</td></tr>');
            //     },
            //     error: function(){
            //         demo.showNotification('top','center','Error in establishing connection to DB!',4);
            //     }
            // });
        }
    });

    $('.close').click(function(){
        $('#myModal').css('display','none');
        $('#myModal').removeClass('in');
    });

    $('.dismiss').click(function(){
        $('.close').trigger('click');
    });

    $('#cfmReject').click(function(){
        var comment = $('#cmtBox').val();
        var section = $('input[name="secDisplay"]').val();

        if(comment == ''){
            demo.showNotification('top','center','Add comment to confirm REJECTION!',3);
        }
        else{
            $.ajax({
                url:'assets/snippets/rejectLevel.php?section='+section+'&comment='+comment,
                type:'get',
                success: function(data){
                    demo.showNotification('top','center',data,2);
                    $('.close').trigger('click');
                    $('#scoreTbl').html('<tr><td colspan="7">No Data to display for this category! Select another category and event!</td></tr>');
                },
                error: function(){
                    demo.showNotification('top','center','Error in establishing connection to DB!',4);
                }
            });
        }
    });

    $('#scoreTbl').on('change','.verifyTxt',function(){
        var x = $(this).attr('id');
        x = x.substr(0, x.indexOf('_'));

        $('#'+x+'_status').text('cancel_presentation');
        $('#'+x+'_status').removeClass('green');
        $('#'+x+'_status').addClass('red');
    });


    $('#scoreTbl').on('click','.editScore',function(){
        
        if($(this).text() == 'cancel_presentation'){
            var x = $(this).attr('id');
            x = x.substr(0, x.indexOf('_'));
            
            var j1,j2,j3;
            j1 = $('#'+x+'_J1').val();
            j2 = $('#'+x+'_J2').val();
            j3 = $('#'+x+'_J3').val();

            if((j1 == '')||(j2 == '')||(j3 == '')||(!$.isNumeric(j1))||(!$.isNumeric(j2))||(!$.isNumeric(j3))||
                (parseInt(j1) > 100)||(parseInt(j2) > 100)||(parseInt(j3) > 100)||(parseInt(j1) < 0)||(parseInt(j2) < 0)||(parseInt(j3) < 0)
            ){
                demo.showNotification('top','center','Invalid Fields!',4);
            }
            else{

                $.ajax({
                    url: 'assets/snippets/updateScore.php?ID='+x+'&J1='+j1+'&J2='+j2+'&J3='+j3,
                    type: 'get',
                    success: function(data){
                        data = JSON.parse(data);
                        $.each(data,function(i,y){
                            $('#'+y.ID+'_tot').val(y.MARKS);
                            $('#'+y.ID+'_grade').val(y.GRADE);
                            $('#'+y.ID+'_RK').val(y.RANK);
                            $('#'+x+'_status').text('check_box');
                            $('#'+x+'_status').removeClass('red');
                            $('#'+x+'_status').addClass('green');
                        });
                    },
                    error: function(){
                        alert('There seem to be some error!');
                    }
                });
            }
        }
    });

});
