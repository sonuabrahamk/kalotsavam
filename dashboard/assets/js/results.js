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

    $('#searchBtn').click(function(){
        var cat = $('#catTxt').val();
        var pname = $('#nameTxt').val();
        var event = $('#eventTxt').val();
        var chno = $('#chTxt').val();
        var parish = $('#parishTxt').val();
        var forane = $('#foraneTxt').val();
        
        $.ajax({
            url: 'assets/snippets/resultsToPublish.php?cat='+cat+'&&event='+event+'&&pname='+pname+'&&chno='+chno+'&&forane='+forane+'&&parish='+parish,
            type:'get',
            success: function(data){
                data = JSON.parse(data);
                var txt ='';
                if(data.length <= 0) {
                    $('#scoreTbl').html('<tr><td colspan="7">No Data to display for this category! Select another category and event!</td></tr>');
                    demo.showNotification('top','center','Results are not published for this category!',3);
                    return;
                }
                $.each(data,function(i,x){
                    console.log(x.STATUS);
                    txt += '<tr><td class="chtNo">'+x.CHEST_NO+'</td><td>'+x.FULL_NAME+'</td><td>'+x.PARISH+'</td><td>'+x.FORANE+'</td><td>'+x.GRADE+'</td><td>'+x.RANK+'</td><td>'+x.POINTS+'</td></tr>';
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
        
        window.location.href = 'assets/snippets/exports/exportResult.php?cat='+cat+'&&event='+event+'&&pname='+pname+'&&chno='+chno+'&&forane='+forane+'&&parish='+parish;
                
    });

});