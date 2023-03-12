// 1 - store invitation
// 2 - edit invitation
// 3 - search invitation
// 4 - open model for edit
// 5 - set url for form delete invitation
// 6 - delete invitation
// 7 - get a invitation and put it in model
// 8 - editGroup
// 9 - editSurname
// 10 - editUser
// 11 - editTable
// 12 - editPermission
// 13 - mypermissions
// 14 - form_ajax_post_edit_1 



$(document).ready(function () {
    var form_ajax_post = "#form_ajax_post";
    var form_ajax_post_search = "#form_ajax_post_search";
    var form_ajax_post_edit = "#form_ajax_post_edit";
    var form_ajax_post_edit_1 = "#form_ajax_post_edit_1";
    
// 1
    $(form_ajax_post).on("submit", function (event) {
        event.preventDefault();  
        var url = $(this).attr("data-action");
        $.ajax({
            url: url,
            method: "POST",
            data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
            enctype: "multipart/form-data",
            success: function (response) {
                console.log(response);
                $("table tbody").prepend(response); 
                $("#modal_edit_public .btn-close").click();
                $("#addModal .btn-close").click();
                alert("تمت الاضافة بنجاح");
            },
            error: function (data) {
                var errors = data.responseJSON;
                console.log(errors);
            },
        }).fail(function (data) {
            var response = JSON.parse(data.responseText);

            $.each(response.errors, function (key, value) {
                alert(value);
            });
        });
    });
    // end 1
    //  2
    $(form_ajax_post_edit).on("submit", function (event) {
        event.preventDefault();
        var url = $(this).attr("data-action");
        var id = $(this).attr("data-id");
        $.ajax({
            url: url,
            method: "POST",
            data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
            enctype: "multipart/form-data",
            success: function (response) {
                console.log(response);
                if(response !== "error"){
                    $(`.${id}`).replaceWith(response);  
                    $("#modal_edit_public .btn-close").click();
                    $("#addModal .btn-close").click();
                    $("#modal_edit_group .btn-close").click();
                    $("#modal_edit_surname .btn-close").click();
                    $("#modal_edit_user .btn-close").click();
                    
                    alert("تمت التعديل بنجاح");
                }
                else{
                   
                }
               
            },
            error: function (data ) {
                var errors = data.responseJSON;
              alert(errors.error);
            },
        }) ;
    });
    // end 2
    // 3
    $(form_ajax_post_search).on("submit", function (event) {
        event.preventDefault();
        var url = $(this).attr("data-action");
        $.ajax({
            url: url,
            method: "POST",
            data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
            enctype: "multipart/form-data",
            success: function (response) {
                console.log(response);
                $("#modal_edit_public .btn-close").click();
                $("#addModal .btn-close").click();
                $("#table_attentions tbody").html(response);
            },
            error: function (xhr, textStatus, error) {
                console.log(xhr.statusText);
                console.log(textStatus);
                console.log(error);
            },
        }).fail(function (data) {
            var response = JSON.parse(data.responseText);

            $.each(response.errors, function (key, value) {
                alert(value);
            });
        });
    });
    // end 3

    //  4 
    $("body").on("click", "#editInvo", function (event) {
        event.preventDefault();
        var id = $(this).data("id");
        var url = $(this).attr("href");
        var url_update = url.replace("/edit", "");
        $.ajax({
            url: url,
            method: "get",
            processData: false,
            contentType: false,
            cache: false,
            success: function (response) {
                console.log(response);
                $("#form_ajax_post_edit input[name=surname]").val(response.surname);
                $("#form_ajax_post_edit input[name=surname2]").val(response.surname2);
                $("#form_ajax_post_edit input[name=name]").val(response.name);
                $("#form_ajax_post_edit input[name=email]").val(response.email);
                $("#form_ajax_post_edit input[name=email2]").val(response.email2);
                $("#form_ajax_post_edit input[name=side]").val(response.side);
                $("#form_ajax_post_edit input[name=position]").val(response.position);
                $("#form_ajax_post_edit select[name=group]").val(response.group);
                $("#form_ajax_post_edit input[name=send_email_with_change]").val(
                    response.send_email_with_change
                );
                $("#form_ajax_post_edit input[name=attend]").val(response.attend);
                $("#form_ajax_post_edit input[name=attend_confirm]").val(response.attend_confirm);
                $("#form_ajax_post_edit input[name=status]").val(response.status);
                $("#form_ajax_post_edit").attr("data-action", url_update);
                $("#form_ajax_post_edit").attr("data-id", id);
            },
            error: function (xhr, textStatus, error) {
                console.log(xhr.statusText);
                console.log(textStatus);
                console.log(error);
            },
        }).fail(function (data) {
            var response = JSON.parse(data.responseText);

            $.each(response.errors, function (key, value) {
                alert(value);
            });
        });
    });
    // end 4
    // 5
    $(".btn_delete").on("click", function (event) {
        var href = $(this).data("href");   
        $("#form_delete").attr("action", href);
    });
    // end 5
    // 6
    $("body").on("click", "#delete_invo", function (event) {
        event.preventDefault(); 
        $("#deleteModal").modal("show");  
    });
    // end 6


    // 7 
    $("body").on("click", "#showInvo", function (event) {
        event.preventDefault();
        var id = $(this).data("id");
        var url = $(this).attr("href"); 
        $.ajax({
            url: url,
            method: "get",
            processData: false,
            contentType: false,
            cache: false,
            success: function (response) {
                console.log(response);
                $("#table_show tbody").html(response);
            },
            error: function (xhr, textStatus, error) {
                console.log(xhr.statusText);
                console.log(textStatus);
                console.log(error);
            },
        }).fail(function (data) {
            var response = JSON.parse(data.responseText);

            $.each(response.errors, function (key, value) {
                alert(value);
            });
        });
    });

    //  8 
    $("body").on("click", "#editGroup", function (event) {
        event.preventDefault();
        var id = $(this).data("id");
        var url = $(this).attr("href");
        var url_update = url.replace("/edit", "");
        $.ajax({
            url: url,
            method: "get",
            processData: false,
            contentType: false,
            cache: false,
            success: function (response) {
                console.log(response);
                 $("#form_ajax_post_edit input[name=name]").val(response.name);
                $("#form_ajax_post_edit input[name=color]").attr('value',response.email);
                $("#form_ajax_post_edit").attr("data-action", url_update);
                $("#form_ajax_post_edit").attr("data-id", id);
            },
            error: function (xhr, textStatus, error) {
                console.log(xhr.statusText);
                console.log(textStatus);
                console.log(error);
            },
        }).fail(function (data) {
            var response = JSON.parse(data.responseText);

            $.each(response.errors, function (key, value) {
                alert(value);
            });
        });
    });
    // end 8

    // 9
     
    $("body").on("click", "#editSurname", function (event) {
        event.preventDefault();
        var id = $(this).data("id");
        var url = $(this).attr("href");
        var url_update = url.replace("/edit", "");
        $.ajax({
            url: url,
            method: "get",
            processData: false,
            contentType: false,
            cache: false,
            success: function (response) {
                console.log(response);
                 $("#form_ajax_post_edit input[name=title]").val(response.title);
                $(`#form_ajax_post_edit input[value!=${!response.lang}]`).attr('checked',false)
                 $(`#form_ajax_post_edit input[value=${response.lang}]`).attr('checked',true)
                $("#form_ajax_post_edit").attr("data-action", url_update);
                $("#form_ajax_post_edit").attr("data-id", id);
            },
            error: function (xhr, textStatus, error) {
                console.log(xhr.statusText);
                console.log(textStatus);
                console.log(error);
            },
        }).fail(function (data) {
            var response = JSON.parse(data.responseText);

            $.each(response.errors, function (key, value) {
                alert(value);
            });
        });
    });
    // end  9 

    
    // 10
     
    $("body").on("click", "#editUser", function (event) {
        event.preventDefault();
        var id = $(this).data("id");
        var url = $(this).attr("href");
        var url_update = url.replace("/edit", "");
        $.ajax({
            url: url,
            method: "get",
            processData: false,
            contentType: false,
            cache: false,
            success: function (response) {
                console.log(response);
                $("#form_ajax_post_edit input[name=nickname]").val(response.nickname);
                $("#form_ajax_post_edit input[name=email]").val(response.email); 
                 $("#form_ajax_post_edit").attr("data-action", url_update);
                $("#form_ajax_post_edit").attr("data-id", id);
            },
            error: function (xhr, textStatus, error) {
                console.log(xhr.statusText);
                console.log(textStatus);
                console.log(error);
            },
        }).fail(function (data) {
            var response = JSON.parse(data.responseText);

            $.each(response.errors, function (key, value) {
                alert(value);
            });
        });
    });
    // end 10

    // 11 
    $("body").on("click", "#editTable", function (event) {
        event.preventDefault();
        
        var id = $(this).data("id");
        var url = $(this).attr("href");
        var url_update = url.replace("/edit", "");
        $.ajax({
            url: url,
            method: "get",
            processData: false,
            contentType: false,
            cache: false,
            success: function (response) {
                console.log(response);
                $("#form_ajax_post_edit #code").html(response.code);
                $("#form_ajax_post_edit #type").html(response.type); 
                $("#image_table_position").attr("src", url_uploads+response.image);
                
                 $("#form_ajax_post_edit").attr("data-action", url_update);
                $("#form_ajax_post_edit").attr("data-id", id);
            },
            error: function (xhr, textStatus, error) {
                console.log(xhr.statusText);
                console.log(textStatus);
                console.log(error);
            },
        }).fail(function (data) {
            var response = JSON.parse(data.responseText);

            $.each(response.errors, function (key, value) {
                alert(value);
            });
        });
    });
    // end 11

    
    // 12
     
    $("body").on("click", "#editPermission", function (event) {
        event.preventDefault();
        var id = $(this).data("id");
        var url = $(this).attr("href");
        var url_update = url.replace("/edit", "");
        $.ajax({
            url: url,
            method: "get",
            processData: false,
            contentType: false,
            cache: false,
            success: function (response) {
                console.log(response);  
                $(".form-check input").attr('checked',false); 
                response.forEach(mypermissions);  
                 $("#form_ajax_post_edit_1").attr("data-action", url_update);
                $("#form_ajax_post_edit_1").attr("data-id", id);
            },
            error: function (xhr, textStatus, error) {
                console.log(xhr.statusText);
                console.log(textStatus);
                console.log(error);
            },
        }).fail(function (data) {
            var response = JSON.parse(data.responseText);

            $.each(response.errors, function (key, value) {
                alert(value);
            });
        });
    });
    // end 12
    // 13 
    function mypermissions(item) { 
        $(".form-check #"+item.id).attr('checked',true);   
    }


    //  14 
    $(form_ajax_post_edit_1).on("submit", function (event) {
        event.preventDefault();
        var url = $(this).attr("data-action");
        var id = $(this).attr("data-id");
        $.ajax({
            url: url,
            method: "POST",
            data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
            enctype: "multipart/form-data",
            success: function (response) {
                console.log(response);
                if(response !== "error"){ 
                    $("#addModalPermission .btn-close").click(); 
                    alert("تمت التعديل بنجاح");
                }
                else{
                   
                }
               
            },
            error: function (data ) {
                var errors = data.responseJSON;
              console.log(errors);
            },
        }) ;
    });
    // end 14
});
