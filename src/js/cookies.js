$("#cookies-accept").click(function (e)
{
    $.ajax({
        type: "POST",
        url: root + '/ajax',
        data: {ajax: 'cookies-accept'},
        success: function ()
        {
            location.reload();
        }
    });
});