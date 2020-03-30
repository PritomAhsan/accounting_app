$(document).ready(function() {
        $('.sortable').DataTable({
            "ordering": true,
            columnDefs: [{
                orderable: false,
                targets: "no-sort"
            }]
        });
        $(document).ready(function() {
            var table = $('#example').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                    [2, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;
                    api.column(2, {
                        page: 'current'
                    }).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                            last = group;
                        }
                    });
                }
            });
            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function() {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });
        });
    });
    $('.exportable').DataTable({
        dom: 'lBfrtip',
        buttons: [
            {
              extend: 'copy',
                exportOptions: {
                    columns: 'th:not(.no-export)'
                }
            },
            {
                extend: 'csv',
                exportOptions: {
                    columns: 'th:not(.no-export)'
                }
            },
            {
                extend: 'excel',
                exportOptions: {
                    columns: 'th:not(.no-export)'
                }
            },
            {
                extend: 'pdf',
                exportOptions: {
                    columns: 'th:not(.no-export)'
                }
            },
            {
                extend: 'print',
                exportOptions: {
                    columns: 'th:not(.no-export)'
                }
            }
        ],
        "ordering": true,
        columnDefs: [{
            orderable: false,
            targets: "no-sort"
        }]
    });
