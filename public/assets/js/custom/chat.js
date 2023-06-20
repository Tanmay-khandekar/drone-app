$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    
    let interval = null;
    $('body').on('click', '#user_chat', function() {
        var id = $(this).data('id');
        var fromuser = $(this).data('fromuser');
        $.get('/chatbox/' + id, function(data) {
            $('#touser').val(id);
            $('#username').html(data.first_name + ' '+ data.last_name);
        })
        $("div.scroll-pull").animate({
        //scroll bottom
        scrollTop: $(
            'html, body').get(0).scrollHeight
        }, 10000);

        //retrive chat data
        if (interval === null) {
            clearInterval(interval);
            console.log('interval');
            interval = setInterval(function(){
        
                $.ajax({
                    url:msgBoxUrl,
                    method:"get",
                    data:{
                        fromuser:fromuser,	
                        touser:id
                    },
                    dataType:"text",
                    success:function(data){
                        $("#chat-box").html(data);
                    }
                });
            }, 7000);
        } else {
            clearInterval(interval);
            console.log('else interval');
            interval = setInterval(function(){
        
                $.ajax({
                    url:msgBoxUrl,
                    method:"get",
                    data:{
                        fromuser:fromuser,	
                        touser:id
                    },
                    dataType:"text",
                    success:function(data){
                        $("#chat-box").html(data);
                    }
                });
            }, 7000);
        }
        

    });

                    
    $(document).on('click','#close-msg-box',function(){
        clearInterval(msgbox);
    });
    
    //
    $(document).on('click', '#btn-send', function(){
        $.ajax({
            url: sendMsgUrl,
            type: "post",
            data: $('#chat-form').serialize(),
            dataType: 'json',
            success: function(response) {
                // $('.form-control').removeClass('is-invalid');
                // $('.invalid-feedback').empty();
                // if(response.status == true){
                // 	window.location.href = '/leads';
                // }else{
                // 	$.each(response.errors, function(key, val){
                // 		$('.'+key).addClass('is-invalid');
                // 		$('.'+key).next('.invalid-feedback').html(val);
                // 	});
                // }
                $('#message').val("");
                console.log(response);

            }, 
            error: function(response) {
                console.log('Error:', response);
                $('#btn-leads-save').html('Save Changes');
            }
        });
        return false;
    });
    //
});
function msginput() {
    if(document.getElementById("message").value==="") { 
        document.getElementById('btn-send').style.cursor = "no-drop";
        document.getElementById('btn-send').disabled = true;
    } else { 
        document.getElementById('btn-send').style.cursor = "pointer";
        document.getElementById('btn-send').disabled = false;
    }
}