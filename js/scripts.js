$.ajax({
    url: "load-tasks.php",
    type: "POST",
    cache: false,
    success: function(data){
        $('#list').html(data); 
    }
});
$(document).ready(function() {
    $('#insert').on('click', function() {
        var name = $('#task_name').val();
        if(name!=""){
            $.ajax({
                url: "insert-tasks.php",
                type: "POST",
                data: {
                    name: name,		
                },
                cache: false,
                success: function(dataResult){
                    var dataResult = JSON.parse(dataResult);
                    if(dataResult.statusCode==200){
                        $('#insert_form').find('input:text').val('');					
                    }
                    else if(dataResult.statusCode==201){
                    alert("Error occured !");
                    }
                    
                }

            });
        }
        else{
            alert('Please fill all the field !');
        }
    });
});
$(document).on("click", ".trash", function() { 
    var t_id= $(this).attr('id');
    var $ele = $(this).parent();
    $.ajax({
        url: "delete-task.php",
        type: "POST",
        cache: false,
        data:{
            t_id: t_id
        },
        success: function(dataResult){
            var dataResult = JSON.parse(dataResult);
            if(dataResult.statusCode==200){
                $ele.fadeOut().remove();
            }
        }
    });
});