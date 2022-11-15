// update admin password
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
    });

    // update sektor status
    $(document).on("click", ".updateSektorStatus", function () {
        var status = $(this).children("i").attr("status");
        var sektor_id = $(this).attr("sektor_id");
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            url: '/admin/update-sektor-status',
            data: {status:status, sektor_id:sektor_id},
            success:function (resp) {
                // alert
                if (resp['status'] == 0) {
                    $("#sektor-"+sektor_id).html("<i style='font-size: 20px;' class='fa fa-eye-slash' status='Inactive'></i>");
                }else if (resp['status'] == 1){
                    $("#sektor-"+sektor_id).html("<i style='font-size: 20px;' class='fa fa-eye' status='Active'></i>");
                }
            }, error:function () {
                alert("Error");
            }
        });
    });

    // // confirm delete (simple javascript)
    // $(".confirmDelete").click(function(){
    //     var title = $(this).attr("title");
    //     if (confirm("Yakin ingin menghapus "+title+" ini?")) {
    //         return true;
    //     }else{
    //         return false;
    //     }
    // });

    // confirm delete (sweet alert)
    $(".confirmDelete").click(function(){
        var module = $(this).attr('module');
        var moduleid = $(this).attr('moduleid');
        Swal.fire({
            title: 'Anda Yakin?',
            text: "File yang telah dihapus tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#fd7e14',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete!'
          }).then((result) => {
            if (result.isConfirmed) {
              Swal.fire(
                'Berhasil!',
                'File telah dihapus.',
                'success'
              )
              window.location = "/admin/delete-"+module+"/"+moduleid;
            }
          })
    });

    // update category status
    $(document).on("click", ".updateCategoryStatus", function () {
        var status = $(this).children("i").attr("status");
        var category_id = $(this).attr("category_id");
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            url: '/admin/update-category-status',
            data: {status:status, category_id:category_id},
            success:function (resp) {
                // alert
                if (resp['status'] == 0) {
                    $("#category-"+category_id).html("<i style='font-size: 20px;' class='fa fa-eye-slash' status='Inactive'></i>");
                }else if (resp['status'] == 1){
                    $("#category-"+category_id).html("<i style='font-size: 20px;' class='fa fa-eye' status='Active'></i>");
                }
            }, error:function () {
                alert("Error");
            }
        });
    });

    // // append categories level
    // $("#sektor_id").change(function(){
    //     var sektor_id = $(this).val();
    //     $.ajax({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         },
    //         type: 'get',
    //         url: '/admin/append-categories-level',
    //         data:{
    //             sektor_id:sektor_id,
    //         },
    //         success:function(resp){
    //             $("#appendCategoriesLevel").html(resp);
    //         },error:function(){
    //             alert("Error");
    //         }
    //     });
    // });
})
