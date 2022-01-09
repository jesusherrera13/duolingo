$(document).ready(function() {

    

    $('#tbl-vocabulary').DataTable({
        dom: 'Blfrtip',
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
                    columns: [ 2, 3, 4, 5 ]
                },
                customize: function ( win ) {
                    /* $(win.document.body)
                        .css( 'font-size', '10pt' )
                        .prepend(
                            '<img src="http://datatables.net/media/images/logo-fade.png" style="position:absolute; top:0; left:0;" />'
                        ); */
 
                    $(win.document.body)
                        .find( 'table > tbody > tr > :nth-child(1)' )
                        .css( 'font-size', '14pt' )
                        .css( 'width', '150px' );

                   /*  $(win.document.body)
                        .find( 'table > tbody > tr > :nth-child(1)' )
                        .css( 'width', '30px' ); */

                    $(win.document.body)
                        .find( 'table > tbody > tr > :nth-child(2)' )
                        .css( 'font-size', '12pt' )
                        .css( 'width', '150px' );
                    
                    const options = [
                        { id: 'hanzi', nth: 1 },
                        { id: 'pinyin', nth: 2 },
                        { id: 'meaning', nth: 3 },
                    ];

                    for(i in options) {
                        
                        if(!$('#' + options[i].id).prop('checked')) {

                            $(win.document.body)
                                .find( 'table > tbody > tr > :nth-child(' + options[i].nth + ')' )
                                .html('');
                        }
                    }
                }
            },
            'colvis'
        ],
        columns: [
            { 
                data: null ,
                /* render: function (data,type,row) {
                    console.log(data)
                    return '';
                  
                },  */
                "render": function ( data, type, full, meta ) {
                    return  parseInt(meta.row) + 1;
                },
            },
            { data: "id" },
            { data: "hanzi" },
            { data: "pinyin" },
            { data: "meaning" },
            { 
                data: "hsk_id" ,
                render: function (data,type,row) {
                    return 'HSK' + data;
                  
                }, 
            },
            { 
                data: null ,
                render: function (data,type,row) {

                    const text = $('#user_id').val() ? '<a href="vocabulary/' + data.id + '/edit/" class="link link-secondary">edit</a>' : '';

                    return text;
                  
                }, 
            },
        ],
        columnDefs: [
            {
                "targets": [ 0 ],
                "searchable": false
            },
            {
                "targets": [ 1 ],
                "visible": false,
                "searchable": false
            },
            {
                "targets": [ -1 ],
                "sortable": false
            },
        ],
        "fnInitComplete":function(){
            $('#tbl-vocabulary, #tbl-vocabulary_wrapper').css('visibility', 'visible');
            $('#d-loader').remove();

            $('#tbl-vocabulary_wrapper')
                .find('.dt-button')
                .removeClass('dt-button buttons-print')
                .addClass('btn btn-sm btn-primary me-3')
                .css('font-size', '14px');
            
            $('#tbl-vocabulary_wrapper')
                .find('.dataTables_length')
                .css('float', 'left')
                .css('font-size', '14px');
            
            $('#tbl-vocabulary_wrapper')
                .find('.dataTables_filter')
                .css('font-size', '14px');
        }
    });
});