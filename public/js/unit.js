$(document).ready(function() {

    $('#tbl-skills').DataTable({
        dom: 'Bfrt',
        ordering: false,
        "displayLength": -1,
        buttons: [
            /* {
                extend: 'copyHtml5',
                exportOptions: {
                    columns: [ 0, ':visible' ]
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: [ 0, 2, 3, 4 ]
                }
            }, */
            /* {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: [ 0, 2, 3, 4 ]
                }
            }, */
            ,
            {
                extend: 'print',
                /* messageTop: function () {
                    printCounter++;
 
                    if ( printCounter === 1 ) {
                        return 'This is the first time you have printed this document.';
                    }
                    else {
                        return 'You have printed this document '+printCounter+' times';
                    }
                }, */
                title: 'Yimin Chinese',
                messageBottom: null,
                exportOptions: {
                    columns: [ 1 ]
                },
                customize: function ( win ) {
                    /* $(win.document.body)
                        .css( 'font-size', '10pt' )
                        .prepend(
                            '<img src="http://datatables.net/media/images/logo-fade.png" style="position:absolute; top:0; left:0;" />'
                        ); */
 
                    
                }
            },
            'colvis'
        ],
        columns: [
            { data: "id" },
            { 
                data: "name",
                render: function (data,type,row) {

                    return '<a href="/skill/' + row.id + '" class="link link-secondary">' + data + '</a>';
                  
                },  
            },
            { 
                data: null ,
                render: function (data,type,row) {

                    const text = $('#user_id').val() ? '<a href="/skill/' + data.id + '/edit/" class="link link-secondary">edit</a>' : '';

                    return text;
                  
                }, 
            },
        ],
        columnDefs: [
            {
                "targets": [ 0 ],
                "visible": false,
                "searchable": false
            },
            {
                "targets": [ -1 ],
                "className": "dt-right"
            },
        ],
        "fnInitComplete":function(){
            $('#tbl-skills, #tbl-skills_wrapper').css('visibility', 'visible');
            $('#d-loader').remove();
        }
    });
});