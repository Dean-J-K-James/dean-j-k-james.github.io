function load_table(filters = '')
{
    $('#ajax-target').load(root + '/ajax', {'ajax': 'table', 'page-table': page, 'filters': filters}, function ()
    {
        $(".table-link").click(function ()
        {
            window.location = $(this).data("href");
        })
    });
}

load_table();