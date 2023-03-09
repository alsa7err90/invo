$(document).ready(function () {
    var form = "#send-invitation-form";
    var search_attentions = "#search_attentions";
    // add new  attentions
    $(form).on("submit", function (event) {
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
                $("#table_attentions tbody").prepend(response);
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
    $(search_attentions).on("submit", function (event) {
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
