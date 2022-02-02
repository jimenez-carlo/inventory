(function ($) {
  'use strict';
  $(function () {
      // $('.table').DataTable();

      //Exportable table
      // $('.js-exportable').DataTable({
      //     responsive: true,
      //     dom: '<"html5buttons"B>lTfgtip',
      //     buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
      //     "order": [[ 0, "desc" ]]
      // });
      // var table = $('.table').DataTable(
        // dom: 'Bfrtip',
        // dom: '<"top" <"flex m-2"l>Bf>rtip',
        // buttons: ['copy', 'csv', 'excel', 'pdf']
       
        // "initComplete": function(settings, json) {
          // $('.paginate_button').removeClass('page-item')
          // $('.page-link').addClass('btn btn-sm btn-dark');
          // $('.btn-secondary').removeClass('btn-secondary');
        // }
      // );
      var buttons =  new $.fn.dataTable.Buttons($('.table').DataTable(), {buttons: [
        {extend:'excelHtml5',exportOptions: { columns: [ 0, 1, 2, 3, 4,5 ] }, text:"<i class='fa fa-file-excel-o'></i> Excel" ,className: "btn-sm btn-outline-dark", init: function(api, node, config) {
          $(node).removeClass('btn-secondary')
       }},
        {extend:'csvHtml5'  ,exportOptions: { columns: [ 0, 1, 2, 3, 4,5 ] }, text:"<i class='fa fa-file'></i> CSV" ,className:   "btn-sm btn-outline-dark", init: function(api, node, config) {
          $(node).removeClass('btn-secondary')
       }},
      //   {extend:'pdf'  , text:"<i class='fa fa-file-pdf-o'></i> PDF" ,className:   "btn-sm btn-outline-dark", init: function(api, node, config) {
      //     $(node).removeClass('btn-secondary')
      //  }},
        // {
        //   text: "<i class='fa fa-cloud-upload'></i> Import",
        //   className:   "btn-sm btn-outline-dark import", 
        //   init: function(api, node, config) {
        //     $(node).removeClass('btn-secondary')},
        //     action: function ( e, dt, node, config ) {
        //         $("#ModalForm").modal("toggle");
        //     },
          
        // }
    ] }).container().appendTo($('#buttons'));
  });
}(jQuery))
