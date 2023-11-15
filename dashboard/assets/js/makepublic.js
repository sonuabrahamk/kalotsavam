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
                url: 'assets/snippets/viewmakepublished.php?cat='+cat+'&&event='+event,
                type:'get',
                success: function(data){
                    console.log(data);
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
                            $('#scoreTbl').html('<tr><td colspan="11">No Data to display for this category! Select another category and event!</td></tr>');
                            return;
                        }
                        $('input[name="secDisplay"]').val(data[0].SECTION);
                        $('#wizTitle').text(event+' ('+cat+')');
                        $.each(data,function(i,x){
                            if(x.RANK == 1){
                                txt += '<tr style="background-color: #d1d8e0; font-weight: bold;"><td class="alignData">'+x.CHEST_NO+'</td><td class="alignData">'+x.STATUS+'</td><td class="alignData">'+x.JUDGE_1+'</td><td class="alignData">'+x.JUDGE_2+'</td><td class="alignData">'+x.JUDGE_3+'</td><td class="alignData">'+x.MARKS+'</td><td class="alignData">'+x.GRADE+'</td><td class="alignData">'+x.GRADE_POINTS+'</td><td class="alignData">'+x.RANK+'</td><td class="alignData">'+x.RANK_POINTS+'</td><td class="alignData">'+x.POINTS+'</td></tr>';
                            }
                            else if(x.RANK == 2){
                                txt += '<tr style="background-color: #d1d8e0; font-weight: bold;"><td class="alignData">'+x.CHEST_NO+'</td><td class="alignData">'+x.STATUS+'</td><td class="alignData">'+x.JUDGE_1+'</td><td class="alignData">'+x.JUDGE_2+'</td><td class="alignData">'+x.JUDGE_3+'</td><td class="alignData">'+x.MARKS+'</td><td class="alignData">'+x.GRADE+'</td><td class="alignData">'+x.GRADE_POINTS+'</td><td class="alignData">'+x.RANK+'</td><td class="alignData">'+x.RANK_POINTS+'</td><td class="alignData">'+x.POINTS+'</td></tr>';
                            }
                            else if(x.RANK == 3){
                                txt += '<tr style="background-color: #d1d8e0; font-weight: bold;"><td class="alignData">'+x.CHEST_NO+'</td><td class="alignData">'+x.STATUS+'</td><td class="alignData">'+x.JUDGE_1+'</td><td class="alignData">'+x.JUDGE_2+'</td><td class="alignData">'+x.JUDGE_3+'</td><td class="alignData">'+x.MARKS+'</td><td class="alignData">'+x.GRADE+'</td><td class="alignData">'+x.GRADE_POINTS+'</td><td class="alignData">'+x.RANK+'</td><td class="alignData">'+x.RANK_POINTS+'</td><td class="alignData">'+x.POINTS+'</td></tr>';
                            }
                            else if(x.STATUS == 'ABSENT'){
                                txt += '<tr style="background-color: #dfe6e9;"><td class="alignData">'+x.CHEST_NO+'</td><td class="alignData">'+x.STATUS+'</td><td class="alignData">'+x.JUDGE_1+'</td><td class="alignData">'+x.JUDGE_2+'</td><td class="alignData">'+x.JUDGE_3+'</td><td class="alignData">'+x.MARKS+'</td><td class="alignData">'+x.GRADE+'</td><td class="alignData">'+x.GRADE_POINTS+'</td><td class="alignData">'+x.RANK+'</td><td class="alignData">'+x.RANK_POINTS+'</td><td class="alignData">'+x.POINTS+'</td></tr>';
                            }
                            else if(x.STATUS == 'DISQUALIFIED'){
                                txt += '<tr style="background-color: #fab1a0;"><td class="alignData">'+x.CHEST_NO+'</td><td class="alignData">'+x.STATUS+'</td><td class="alignData">'+x.JUDGE_1+'</td><td class="alignData">'+x.JUDGE_2+'</td><td class="alignData">'+x.JUDGE_3+'</td><td class="alignData">'+x.MARKS+'</td><td class="alignData">'+x.GRADE+'</td><td class="alignData">'+x.GRADE_POINTS+'</td><td class="alignData">'+x.RANK+'</td><td class="alignData">'+x.RANK_POINTS+'</td><td class="alignData">'+x.POINTS+'</td></tr>';
                            }
                            else{
                                txt += '<tr><td class="alignData">'+x.CHEST_NO+'</td><td class="alignData">'+x.STATUS+'</td><td class="alignData">'+x.JUDGE_1+'</td><td class="alignData">'+x.JUDGE_2+'</td><td class="alignData">'+x.JUDGE_3+'</td><td class="alignData">'+x.MARKS+'</td><td class="alignData">'+x.GRADE+'</td><td class="alignData">'+x.GRADE_POINTS+'</td><td class="alignData">'+x.RANK+'</td><td class="alignData">'+x.RANK_POINTS+'</td><td class="alignData">'+x.POINTS+'</td></tr>';
                            }
                        });
                        $('#scoreTbl').html(txt);
                    }
                },
                error: function(){
                    alert('error');
                }
            });
        }
        

    });


    $('#uptScores').click(function(){
        if($('input[name="secDisplay"]').val() == 'section'){
            demo.showNotification('top','center','Select Category and Event to approve the data!',3);
        }
        else{
            $.ajax({
                url:'assets/snippets/publishresult.php?section='+$('input[name="secDisplay"]').val(),
                type:'get',
                success: function(data){
                    demo.showNotification('top','center',data,2);
                    $('#scoreTbl').html('<tr><td colspan="11">No Data to display for this category! Select another category and event!</td></tr>');
                },
                error: function(){
                    demo.showNotification('top','center','Error in establishing connection to DB!',4);
                }
            });
        }
        console.log($('#scoreVals').serialize());
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
                    $('#scoreTbl').html('<tr><td colspan="11">No Data to display for this category! Select another category and event!</td></tr>');
                },
                error: function(){
                    demo.showNotification('top','center','Error in establishing connection to DB!',4);
                }
            });
        }
    });

    $('#scoreTbl').on('focus','.verifyTxt',function(){
        var x = $(this).attr('name');
        x = x.substr(0, x.indexOf('_'));
        $('#'+x+'_status').text('refresh');
        $('#'+x+'_status').removeClass('green');
        $('#'+x+'_status').addClass('red');
    });

    $('#scoreTbl').on('blur','.verifyTxt',function(){
        
        var x = $(this).attr('name');
        x = x.substr(0, x.indexOf('_'));
        var rank, section;
        section = $('input[name="secDisplay"]').val();
        rank = $('#'+x+'_rank').val();

        $.ajax({
            url: 'assets/snippets/updateRank.php?ID='+x+'&RANK='+rank+'&SECTION='+section,
            type: 'get',
            success: function(data){
                $('#categoryBtn').trigger('change');
            },
            error: function(){
                alert('There seem to be some error!');
            }
        })
        
    });


    $('#scoreTbl').on('click','.editScore',function(){
        if($(this).text() == 'refresh'){
            var x = $(this).attr('id');
            x = x.substr(0, x.indexOf('_'));
            
            var j1,j2,j3;
            j1 = $('#'+x+'_J1').val();
            j2 = $('#'+x+'_J2').val();
            j3 = $('#'+x+'_J3').val();

            $.ajax({
                url: 'assets/snippets/updateScore.php?ID='+x+'&J1='+j1+'&J2='+j2+'&J3='+j3,
                type: 'get',
                success: function(data){
                    data = JSON.parse(data);
                    $.each(data,function(i,y){
                        $('#'+x+'_tot').val(y.MARKS);
                        $('#'+x+'_grade').val(y.GRADE);
                        $('#'+x+'_status').text('check_box');
                        $('#'+x+'_status').removeClass('red');
                        $('#'+x+'_status').addClass('green');
                    });
                },
                error: function(){
                    alert('There seem to be some error!');
                }
            })
        }
    });

});
