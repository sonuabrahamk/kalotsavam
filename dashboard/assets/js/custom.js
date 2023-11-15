$(document).ready(function(){

    $('#categoryBtn').change(function(){
        var cat = $('#categoryBtn').val();
        var event = $('#eventBtn').val();
        $.ajax({
            url: 'assets/snippets/createEvent.php?cat='+cat+'&&event='+event,
            type:'get',
            success: function(data){
                data = JSON.parse(data);
                var txt ='';
                if(data.length <= 0) {
                    $('#scoreTbl').html('<tr><td colspan="4">No Data to display for this category! Select another category and event!</td></tr>');
                    return;
                }
                $('input[name="secDisplay"]').val(data[0].SECTION);
                $.each(data,function(i,x){
                    txt += '<tr><td>'+x.CHEST_NO+'</td><td><div class="form-group is-empty"><input type="text" name="'+x.ID+'_J1" class="form-control"></div></td><td><div class="form-group is-empty"><input type="text" name="'+x.ID+'_J2" class="form-control"></div></td><td><div class="form-group is-empty"><input type="text" name="'+x.ID+'_J3" class="form-control"></div></td></tr>';
                });
                $('#scoreTbl').html(txt);
            },
            error: function(){
                alert('error');
            }
        });
    });

    $('#eventBtn').change(function(){
        $('#categoryBtn').trigger('change');
    });


    $('#uptScores').click(function(){

        $.ajax({
            url:'assets/snippets/addScores.php',
            type:'get',
            data: $('#scoreVals').serialize(),
            success: function(data){
                demo.showNotification('top','center','Successfully Updated!');
                $('#scoreVals').trigger('reset');
                console.log(data);
            },
            error: function(){
                console.log('Error accessing the file.');
            }
        });
        // console.log($('#scoreVals').serialize());
    });


    $('#clrScores').click(function(){
        $('#scoreVals').trigger('reset');
    });
    
});
