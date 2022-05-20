$("#submit-button").click(function (e)
{
    e.preventDefault();

    let myform = document.getElementById("database-form");
    let fd = new FormData(myform);

    $.ajax({
        type: "POST",
        url: root + '/ajax',
        processData: false,
        contentType: false,
        data: fd,
        success: function (data)
        {
            $('#ajax-target').html(data);
            hljs.highlightAll();
        }
    });
});