$(document).ready(function () {
    var form_ajax_post = "#form_ajax_post";
    var form_ajax_post_search = "#form_ajax_post_search";
     
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
                $('input').val('');
                $('select').val('');
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

    // add new  attentions
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
});


