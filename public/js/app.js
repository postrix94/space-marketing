import "./setDateRange.js";

$(document).ready(function () {
    const table = $('#statuses').DataTable({
        "processing": true,
        "serverSide": true,
        "ordering": false,
        "searching": false,
        "lengthChange": true,
        "paging": true,
        "info": false,
        "lengthMenu": [5, 10, 25, 50, 100, 500],
        "pageLength": 10,
        "language": {
            "lengthMenu": "Показать _MENU_ записей на странице",
        },
        "ajax": {
            "url": "/api/statuses",
            "type": "POST",
            "data": function (d) {
                d.start_date = $('#start-date').val();
                d.end_date = $('#end-date').val();
            },
        },
        "columns": [
            {"data": "id"},
            {"data": "email"},
            {"data": "status"},
            {"data": "ftd"}
        ]
    });

    // Фильтрация по датам
    $('#filter').on('click', function () {
        const startDate = $('#start-date').val();
        const endDate = $('#end-date').val();
        table.ajax.url("/api/statuses").load();
    });
})