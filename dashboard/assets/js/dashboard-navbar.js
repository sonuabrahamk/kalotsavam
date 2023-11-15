$(document).ready(function(){

    var eventScores;

    $('.catOpt').click(function(){
        $('#categoryBtn').val($(this).text());
    });

    $('.eventOpt').click(function(){
        $('#eventBtn').val($(this).text());
    });


    $('#uptScores').click(function(){

        $.ajax({
            url:'assets/snippets/addScores.php',
            type:'get',
            data: $('#scoreVals').serialize(),
            success: function(data){
                demo.showNotification('top','center',data);
                $('#scoreVals').trigger('reset');
                console.log(data);
            },
            error: function(){
                console.log('Error accessing the file.');
            }
        });
        // console.log($('#scoreVals').serialize());
    });

    $('#searchBtn').click(function(){
        var event = $('#eventBtn').val();
        var category = $('#categoryBtn').val();
        if((event == "")||(category=="")){
            demo.showNotification('top','center','Please select event and category!');
        }
        else{
            $.ajax({
                url: 'assets/snippets/createEvent.php?cat='+category+'&&event='+event,
                type:'get',
                success: function(data){
                    if(data == '1'){
                        demo.showNotification('top','center','This Category and Event is already moved for verification!',3);
                    }
                    else if(data == '0'){
                        demo.showNotification('top','center','No records to Display!',3);
                    }
                    else if(data == 'error'){
                        demo.showNotification('top','center','Error in DB!',2);
                    }
                    else{
                        data = JSON.parse(data);
                        eventScores = data;
                        var J1 ='';
                        var J2 ='';
                        var J3 ='';
                        if(data.length <= 0) {
                            $('#scoreTbl').html('<tr><td colspan="4">No Data to display for this category! Select another category and event!</td></tr>');
                            return;
                        }
                        $('#wizTitle').text(event+' ('+category+')');

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
                            J1 += '<div class="col-sm-2 score"><div class="input-group"><div class="form-group label-floating is-empty"><label class="control-label">'+x.CHEST_NO+'</label><input name="name" type="text" class="form-control" autocomplete="off" name="'+x.ID+'_J1" id="'+x.ID+'_J1" /></div></div></div>';
                            J2 += '<div class="col-sm-2 score"><div class="input-group"><div class="form-group label-floating is-empty"><label class="control-label">'+x.CHEST_NO+'</label><input name="name" type="text" class="form-control" autocomplete="off" name="'+x.ID+'_J2" id="'+x.ID+'_J2" /></div></div></div>';
                            J3 += '<div class="col-sm-2 score"><div class="input-group"><div class="form-group label-floating is-empty"><label class="control-label">'+x.CHEST_NO+'</label><input name="name" type="text" class="form-control" autocomplete="off" name="'+x.ID+'_J3" id="'+x.ID+'_J3" /></div></div></div>';
                        });
                        $('#JL1').html(J1);
                        $('#JL2').html(J2);
                        $('#JL3').html(J3);
                    }
                },
                error: function(){
                    alert('error');
                }
            });
        }
    });

    $('#nxtBtn').click(function(){
        if($('#J1_Pane').hasClass('active')){
            $('#J2_Pane a').trigger('click');
        }
        else if($('#J2_Pane').hasClass('active')){
            $('#J3_Pane a').trigger('click');
        }
        else if($('#J3_Pane').hasClass('active')){
            $('#SM_Pane a').trigger('click');
        }
        else{
            alert('Summary');
        }
    });

    $('#J1_Pane a').click(function(){
        $('.wizard-navigation .nav-pills li').removeClass('active');
        $('.tab-content .tab-pane').removeClass('active');
        $('#J1_Pane').addClass('active');
        $('#judge1').addClass('active');
        $('#nxtBtn').css('display','block');
        $('#submitBtn').css('display','none');
    });

    $('#J2_Pane a').click(function(){
        if((validateScores('judge1'))){
            demo.showNotification('top','center','Please correct invalid Input Found!',4);
        }
        else{
            $('.wizard-navigation .nav-pills li').removeClass('active');
            $('.tab-content .tab-pane').removeClass('active');
            $('#J2_Pane').addClass('active');
            $('#judge2').addClass('active');
            $('#nxtBtn').css('display','block');
            $('#submitBtn').css('display','none');
        }
    });

    $('#J3_Pane a').click(function(){
        if((validateScores('judge1'))||(validateScores('judge2'))){
            demo.showNotification('top','center','Please correct invalid Input Founds!',4);
        }
        else{
            $('.wizard-navigation .nav-pills li').removeClass('active');
            $('.tab-content .tab-pane').removeClass('active');
            $('#J3_Pane').addClass('active');
            $('#judge3').addClass('active');
            $('#nxtBtn').css('display','block');
            $('#submitBtn').css('display','none');
        }
    });

    $('#SM_Pane a').click(function(){
        if((validateScores('judge1'))||(validateScores('judge3'))||(validateScores('judge2'))){
            demo.showNotification('top','center','Invalid inputs entered!',4);
        }
        else{
            $('.wizard-navigation .nav-pills li').removeClass('active');
            $('.tab-content .tab-pane').removeClass('active');
            $('#SM_Pane').addClass('active');
            $('#summary').addClass('active');

            updateSummaryTab();

        }
    });

    $('#prvBtn').click(function(){
        if($('#J2_Pane').hasClass('active')){
            $('#J1_Pane a').trigger('click');
        }
        else if($('#J3_Pane').hasClass('active')){
            $('#J2_Pane a').trigger('click');
        }
        else if($('#SM_Pane').hasClass('active')){
            $('#J3_Pane a').trigger('click');
            $('#nxtBtn').css('display','block');
            $('#submitBtn').css('display','none');
        }
        else{
            return;
        }
    });

    $('#submitBtn').click(function(){
        $.ajax({
            url:'assets/snippets/addScores.php',
            type:'get',
            data: $('#scoreVals').serialize(),
            success: function(data){
                if (parseInt(data.trim()) >  0){
                    demo.showNotification('top','center','Successfully recorded the scores and moved for Verification!');
                    $('.wizard-navigation .nav-pills li').removeClass('active');
                    $('.tab-content .tab-pane').removeClass('active');
                    $('#J1_Pane').addClass('active');
                    $('#judge1').addClass('active');
                    $('#nxtBtn').css('display','block');
                    $('#submitBtn').css('display','none');
                    $('#JL1').empty();
                    $('#JL2').empty();
                    $('#JL3').empty();
                    $('#scoreTbl').empty();
                }
                else{
                    demo.showNotification('top','center','Connection to DB lost!',4);
                }
                console.log(data);
            },
            error: function(){
                console.log('Error accessing the file.');
            }
        });
    });


    function updateSummaryTab () {
        $('#nxtBtn').css('display','none');
        $('#submitBtn').css('display','block');

        $('input[name="secDisplay"]').val(eventScores[0].SECTION);

        var txt = "";
        $.each(eventScores,function(i,x){
            txt += '<tr><td>'+x.CHEST_NO+'</td><td><div class="form-group is-empty"><input type="text" name="'+x.ID+'_J1" value="'+$('#'+x.ID+'_J1').val()+'" class="form-control" readonly /></div></td><td><div class="form-group is-empty"><input type="text" name="'+x.ID+'_J2" value="'+$("#"+x.ID+"_J2").val()+'" class="form-control" readonly /></div></td><td><div class="form-group is-empty"><input type="text" name="'+x.ID+'_J3" value="'+$("#"+x.ID+"_J3").val()+'" class="form-control" readonly /></div></td></tr>';
        });

        $('#scoreTbl').html(txt);
    }


    function validateScores (judge){
        count=0;
        $('#'+judge+' .form-group .form-control').each(function(index){
            if((parseInt($(this).val()) > 100) || (parseInt($(this).val()) < 0) || (!$.isNumeric($(this).val()))){
                $(this).css('border-bottom','1px solid red');
                count++;
            }
            else{
                $(this).css('border-bottom','none');
            }
        });
        if (count > 0){
            return true;
        }
        else{
            return false;
        }
    }
    
});
