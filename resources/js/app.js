require('./bootstrap');

$(document).ready(function(){

    $(document).on('click','#send_message',function (e){
        e.preventDefault();

        let username = $('#username').val();
        let message = $('#message').val();

        if(username == '' || message == ''){
            alert('Please enter both username and message')
            return false;
        }

        $.ajax({
            method:'POST',
            url:'/send-message',
            data:{
                _token: $('meta[name="csrf-token"]').attr('content'),
                username:username,
                message:message
            },
            success:function(data){
                console.log(data);
            },
            error: function (data, textStatus, errorThrown) {
                console.log(data);
            },
        });


    });
});

window.Echo.channel('chat')
    .listen('.message',(e)=>{
        $('#messages').append('<p><strong>'+e.username+'</strong>'+ ': ' + e.message+'</p>');
        $('#message').val('');
    });
