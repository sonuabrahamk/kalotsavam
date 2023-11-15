$(document).ready( function() {

    $('.catOpt').click(function(){
        $('#catTxt').val($(this).text());
    });

    $('.eventOpt').click(function(){
        $('#eventTxt').val($(this).text());
    });

    $('.foraneOpt').click(function(){
        $('#foraneTxt').val($(this).text());
    });

    $('.parishOpt').click(function(){
        $('#parishTxt').val($(this).text());
    });

    $('.statusOpt').click(function(){
        $('#statusTxt').val($(this).text());
    });

    $('#searchBtn').click(function(){
        var cat = $('#catTxt').val();
        var pname = $('#nameTxt').val();
        var event = $('#eventTxt').val();
        var chno = $('#chTxt').val();
        var parish = $('#parishTxt').val();
        var forane = $('#foraneTxt').val();
        var status = $('#statusTxt').val();
        
        $.ajax({
            url: 'assets/snippets/participants.php?cat='+cat+'&&event='+event+'&&pname='+pname+'&&chno='+chno+'&&forane='+forane+'&&parish='+parish+'&&status='+status,
            type:'get',
            success: function(data){
                data = JSON.parse(data);
                var txt ='';
                if(data.length <= 0) {
                    $('#scoreTbl').html('<tr><td colspan="6">No Data to display for this category! Select another category and event!</td></tr>');
                    return;
                }
                $.each(data,function(i,x){
                    console.log(x.STATUS);
                    if(x.STATUS == "ABSENT"){
                        txt += '<tr style="background-color: #e17055"><td class="chtNo">'+x.CHEST_NO+'</td><td>'+x.FULL_NAME+'</td><td>'+x.PARISH+'</td><td>'+x.FORANE+'</td><td>'+x.SECTION+'</td><td>'+x.STATUS+'</td></tr>';
                    }
                    else if (x.STATUS == "DISQUALIFIED"){
                        txt += '<tr style="background-color: #e17055"><td class="chtNo">'+x.CHEST_NO+'</td><td>'+x.FULL_NAME+'</td><td>'+x.PARISH+'</td><td>'+x.FORANE+'</td><td>'+x.SECTION+'</td><td>'+x.STATUS+'</td></tr>';
                    }                    
                    else{
                        txt += '<tr><td class="chtNo">'+x.CHEST_NO+'</td><td>'+x.FULL_NAME+'</td><td>'+x.PARISH+'</td><td>'+x.FORANE+'</td><td>'+x.SECTION+'</td><td>'+x.STATUS+'</td></tr>';
                    }
                });
                $('#scoreTbl').html(txt);
            },
            error: function(){
                alert('error');
            }
        });
    });

    $('#export').click(function(){
        var cat = $('#catTxt').val();
        var pname = $('#nameTxt').val();
        var event = $('#eventTxt').val();
        var chno = $('#chTxt').val();
        var parish = $('#parishTxt').val();
        var forane = $('#foraneTxt').val();
        var status = $('#statusTxt').val();

        
        window.location.href = 'assets/snippets/exports/exportParticipant.php?cat='+cat+'&&event='+event+'&&pname='+pname+'&&chno='+chno+'&&forane='+forane+'&&parish='+parish+'&&status='+status;
        
        
    });

});