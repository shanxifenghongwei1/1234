$(function (){
    $('.table').on('click', '.remove', function () {
        var id = $(this).closest('tr').attr('data-id');
        // delete.php
        $.ajax({
            url: 'bawangye.php',
            data: {
                c:"newss",
                m: "actiondelete",
                id: id
            },
            success: function (data) {
                if (data == '1') {
                    alert('删除成功')
                    location.reload();
                } else {
                    alert('网络出了点问题')
                }
            }
        })
    });


    $("#submit").on('click', function () {
        // insert.php
        $.ajax({
            url: 'bawangye.php',
            data: {

                c:"newss",
                m:"actioninsert",
                cid: $('#cid').val(),
                title: $('#title').val(),
                dsc: $('#dsc').val(),
               image: $('#image').val(),
                url:$('#url').val(),
                create_time:$('#create_time').val()


            },
            success: function (data) {
                if (data == '1') {
                    alert('添加成功')
                    location.reload();
                } else {
                    alert('网络出了点问题')
                }
            }
        })
    })


    $('.table').on('blur', 'input', function () {
       var k= $(this).attr("data-type");
       var id= $(this).closest("tr").attr('data-id');
       var v =$(this).val();
        // update.php
        $.ajax({
            url: 'bawangye.php',

            data: {

                c:"newss",
                m: "actionupdate",
                id: id,
                k:k,
                v:v

            },
            success: function (data) {
                console.log(data);
            }
        })
    })


})