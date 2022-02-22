
$(function () {
    $('#btnlogin').click(function () {
        $.ajax({
            type: "POST",
            url: "login_user.php",
            data: $('#formlogin').serialize(),
            dataType: "json",
            success: function (data)
            {
                if (data['error'] == 1)
                {
                    $('#divSuccess').hide();
                    $('#divError').text(data['msg']).show();
                }
                else
                {
                    $('#divError').hide();
                    window.location.replace("home.php");
                }


            }
        });
    });
    $('#btnregister').click(function () {
        $.ajax({
            type: "POST",
            url: "registeruser.php",
            data: $('#frmregister').serialize(),
            dataType: "json",
            success: function (data)
            {
                if (data['error'] == 1)
                {
                    $('#divSuccess').hide();
                    $('#divError').text(data['msg']).show();
                }
                else
                {
                    $('#divError').hide();
                    window.location.replace("home.php");
                }

            }
        });


    });
    $('#btnregister2').click(function () {
        $.ajax({
            type: "POST",
            url: "registeruser2.php",
            data: $('#frmregister2').serialize(),
            dataType: "json",
            success: function (data)
            {
                if (data['error'] == 1)
                {
                    $('#divSuccess').hide();
                    $('#divError').text(data['msg']).show();
                }
                else
                {
                    $('#divError').hide();
                    window.location.replace("index.php");
                }

            }
        });


    });
    $('#btnupregister').click(function () {
        $.ajax({
            type: "POST",
            url: "updateuser.php",
            data: $('#frmupregister').serialize(),
            dataType: "json",
            success: function (data)
            {
                if (data['error'] == 1)
                {
                    $('#divSuccess').hide();
                    $('#divError').text(data['msg']).show();
                }
                else
                {
                    $('#divError').hide();
                    window.location.replace("profile.php");
                }

            }
        });


    });
    $(document).ready(function () {
        $('#table_id').DataTable();
    });
//$(".complexConfirm").confirm({
//    title:"Delete confirmation",
//    text:"Are you Sure Delete This Detail?",
//    confirm: function(button) {
//        //window.location.replace("del.php?id=<?php echo $s['id']  ?>");
//       //header("location: del.php?id=<?php echo $s['id'] . "&search=" . $search_string; ?>");
//      
//    },
//    cancel: function(button) {
//        alert("You aborted the operation.");
//    },
//    confirmButton: "Yes I am",
//    cancelButton: "No"
//});
    $('.delete').click(function () {
        var searcid = $(this).attr('searcid');
        var searchstring = $(this).attr('searchstring');

        $.confirm({
            title: "Delete confirmation",
            text: "This is very dangerous, you shouldn't do it! Are you really really sure?",
            confirm: function (button) {
                $.post('del.php', {'id': searcid, 'search': searchstring}, function () {
                    location.reload();
                });
            },
            cancel: function (button) {
                
            }

        });

    });
});
