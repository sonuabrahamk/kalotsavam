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
            url: 'assets/snippets/absense.php?cat='+cat+'&&event='+event+'&&chno='+chno,
            type:'get',
            success: function(data){
                console.log(data);
                if(data == "0"){
                    demo.showNotification('top','center','Please check if the results for the event are published or No Data to view!',3);
                    $('#scoreTbl').html('<tr><td colspan="6">No Data to display for this category! Select another category and event!</td></tr>');
                    return;
                }
                else{
                    data = JSON.parse(data);
                    var txt ='';
                    if(data.length <= 0) {
                        demo.showNotification('top','center','Please check if the results for the event are published or No Data to view!',3);
                        $('#scoreTbl').html('<tr><td colspan="6">No Data to display for this category! Select another category and event!</td></tr>');
                        return;
                    }
                    $.each(data,function(i,x){
                        console.log(x.STATUS);
                        if(x.STATUS == "ABSENT"){
                            txt += '<tr style="background-color: #dfe6e9"><td style="padding:0;width: 15px;"><div class="checkbox"><label><input type="checkbox" name="optionsCheckboxes" class="rowSelect"><span class="checkbox-material"><span class="check"></span></span></label></div></td><td class="chtNo">'+x.CHEST_NO+'</td><td>'+x.NAME+'</td><td>'+x.CATEGORY+'</td><td>'+x.SECTION+'</td><td><select class="partStatus"><option value="PRESENT">PRESENT</option><option value="ABSENT" selected="selected">ABSENT</option><option value="DISQUALIFIED">DISQUALIFIED</option></select></td></tr>';
                        }
                        else if (x.STATUS == "DISQUALIFIED"){
                            txt += '<tr style="background-color: #fab1a0"><td style="padding:0;width: 15px;"><div class="checkbox"><label><input type="checkbox" name="optionsCheckboxes" class="rowSelect"><span class="checkbox-material"><span class="check"></span></span></label></div></td><td class="chtNo">'+x.CHEST_NO+'</td><td>'+x.NAME+'</td><td>'+x.CATEGORY+'</td><td>'+x.SECTION+'</td><td><select class="partStatus"><option value="PRESENT">PRESENT</option><option value="ABSENT">ABSENT</option><option value="DISQUALIFIED" selected="selected">DISQUALIFIED</option></select></td></tr>';
                        }                    
                        else{
                            txt += '<tr><td style="padding:0;width: 15px;"><div class="checkbox"><label><input type="checkbox" name="optionsCheckboxes" class="rowSelect"><span class="checkbox-material"><span class="check"></span></span></label></div></td><td class="chtNo">'+x.CHEST_NO+'</td><td>'+x.NAME+'</td><td>'+x.CATEGORY+'</td><td>'+x.SECTION+'</td><td><select class="partStatus"><option value="PRESENT">PRESENT</option><option value="ABSENT">ABSENT</option><option value="DISQUALIFIED">DISQUALIFIED</option></select></td></tr>';
                        }
                    });
                    $('#scoreTbl').html(txt);
                }
            },
            error: function(){
                alert('error');
            }
        });
    });

    $('#export').click(function(){
        var cat = $('#catTxt').val();
        var event = $('#eventTxt').val();
        var chno = $('#chTxt').val();

        
        window.location.href = 'assets/snippets/exports/exportAbsense.php?cat='+cat+'&&event='+event+'&&chno='+chno;
        
        
    });

    $('.partTable').on('change','.partStatus',function(){
        $(this).parents('tr').css('background-color','#f5f5f5');
        // $('.rowSelect').attr('checked','checked');
        $(this).parents('tr').find('.rowSelect').attr('checked','checked');
    });

    $('.partTable').on('click','.rowSelect',function(){
        if($(this).prop('checked')){
            $(this).parents('tr').css('background-color','#f5f5f5');
        }
        else{
            $(this).parents('tr').css('background-color','#fff');
        }
    });


    $('#partUpt').click(function(){
        var txt='[';
        var count=0;
        $('.rowSelect').each(function(){
            if($(this).prop('checked')){
                if(count == 0){
                    txt+='{"chestno":"'+$(this).parents('tr').find('.chtNo').text()+'","val":"'+$(this).parents('tr').find('.partStatus').val()+'" }';
                    count++;
                }
                else{
                    txt+=',{"chestno":"'+$(this).parents('tr').find('.chtNo').text()+'","val":"'+$(this).parents('tr').find('.partStatus').val()+'" }';
                    count++;
                }
               
            }
        });

        txt+=']';
        
        $.ajax({
            url: 'assets/snippets/updateStatus.php',
            type: 'get',
            data: {passData: txt},
            success: function(data){
                demo.showNotification('top','center',data);
                $('#searchBtn').trigger('click');
            },
            error: function(){
                demo.showNotification('top','center','Connection to Backend lost!',4);
            }
        });

    });

});