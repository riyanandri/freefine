$(document).ready(function () {
    // cek admin password
    $("#current_password").keyup(function () {
        var current_password = $("#current_password").val();
        // alert
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            url: '/admin/check-admin-password',
            data: {current_password:current_password},
            success:function (resp) {
                if(resp == "false"){
                    $("#check_password").html("<font color='red'>Password yang anda masukkan tidak cocok!</font>");
                }else if(resp == "true"){
                    $("#check_password").html("<font color='green'>Password yang anda masukkan cocok</font>");
                }
            },error:function () {
                alert('Error');
            }
        });
    })
})
