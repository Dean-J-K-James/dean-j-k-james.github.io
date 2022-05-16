$("#submit-button").click(function (e)
{
    e.preventDefault();

    if (typeof tinyMCE !== 'undefined')
    {
        tinyMCE.triggerSave(true, true);
    }

    let myform = document.getElementById("database-form");
    let fd = new FormData(myform);

    $.ajax({
        type: "POST",
        url: root + '/ajax',
        processData: false,
        contentType: false,
        data: fd,
        success: function ()
        {
            window.scrollTo(0, 0);
            location.reload();
        }
    });
});