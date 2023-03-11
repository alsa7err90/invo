// 1 - store invitation
// 2 - edit invitation
// 3 - search invitation
// 4 - open model for edit
// 5 - set url for form delete invitation
// 6 - delete invitation
// 7 - get a invitation and put it in model
// 8 - editGroup


$(document).ready(function () {
    var form_ajax_post = "#form_ajax_post";
    var form_ajax_post_search = "#form_ajax_post_search";
    var form_ajax_post_edit = "#form_ajax_post_edit";
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
                $("input").val("");
                $("select").val("");

                $("#modal_edit_public .btn-close").click();
                $("#addModal .btn-close").click();
                alert("تمت الاضافة بنجاح");
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

                $(`.${id}`).replaceWith(response);
                $("input").val("");
                $("select").val("");

                $("#modal_edit_public .btn-close").click();
                $("#addModal .btn-close").click();
                alert("تمت الاضافة بنجاح");
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
        var href = $(this).data("href"); // Extract info from data-* attributes
        $("#form_delete").attr("action", href);
    });
    // end 5
    // 6
    $("body").on("click", "#delete_invo", function (event) {
        event.preventDefault();
        let href = $(this).attr("data-attr");
        alert;
        $.ajax({
            url: href,
            beforeSend: function () {
                $("#loader").show();
            },
            // return the result
            success: function (result) {
                $("#deleteModal").modal("show");
                $("#deleteBody").html(result).show();
            },
            complete: function () {
                $("#loader").hide();
            },
            error: function (jqXHR, testStatus, error) {
                console.log(error);
                alert("Page " + href + " cannot open. Error:" + error);
                $("#loader").hide();
            },
            timeout: 8000,
        });
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
    // end 4

});
