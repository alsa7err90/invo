$(document).ready(function(){
  
    var form = '#send-invitation-form';

    $(form).on('submit', function(event){
        event.preventDefault();

        var url = $(this).attr('data-action'); 
        $.ajax({
            url: url,
            method: 'POST',
            data: new FormData(this),
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success:function(response)
            { 
                console.log(response);
                // if(response){
                //     $(modal).modal('hide');
                //     var row = '<li class="">';
                //         row += '<a href="{{ route(`mynotes`,'+response.id+') }}" class="svg-icon">';
                //         row += '<span>'+response.name+'</span>';
                //         row += '</a>';
                //         row += '</li>'; 
                //     if(response.parent_id){
                //         $('#'+response.name).append(row);
                //     }
                //     else{
                //         $('#iq-sidebar-toggle').append(row);
                //     } 
                //     $(form).trigger("reset");
                   
                // }
                  $('#table_attentions tbody').prepend("<tr><td>" + response.id + "</td><td>" + response.created_at + "</td><td>" + response.name + "</td><td>" + response.mobile + "</td><td>" + response.email + "</td><td><input type='checkbox'></td><td><a href='#' class='settings' title='تحرير' data-toggle='tooltip'><i class='material-icons'>&#xe3c9;</i></a> <a href='#' class='delete' title='Delete' data-toggle='tooltip'><i class='material-icons'>&#xE5C9;</i></a> <a href='#' class='settings' title='استعراض' data-toggle='tooltip'><i class='material-icons'>&#xe8b6;</i></a> <a href='#' class='settings' title='طباعة' data-toggle='tooltip'><i class='material-icons'>&#xe8ad;</i></a><a href='#' class='settings' title='طباعة مع حلفية' data-toggle='tooltip'><iclass='material-icons text-success'>&#xe8ad;</i></td></tr>");
            },
            error: function(response) {
                alert("you have category by same name");
                
            }
        });
    });

    
});