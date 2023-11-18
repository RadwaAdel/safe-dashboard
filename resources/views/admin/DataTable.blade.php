<style>
    table.dataTable thead > tr > th.sorting::before, table.dataTable thead > tr > th.sorting::after, table.dataTable thead > tr > th.sorting_asc::before, table.dataTable thead > tr > th.sorting_asc::after, table.dataTable thead > tr > th.sorting_desc::before, table.dataTable thead > tr > th.sorting_desc::after, table.dataTable thead > tr > th.sorting_asc_disabled::before, table.dataTable thead > tr > th.sorting_asc_disabled::after, table.dataTable thead > tr > th.sorting_desc_disabled::before, table.dataTable thead > tr > th.sorting_desc_disabled::after, table.dataTable thead > tr > td.sorting::before, table.dataTable thead > tr > td.sorting::after, table.dataTable thead > tr > td.sorting_asc::before, table.dataTable thead > tr > td.sorting_asc::after, table.dataTable thead > tr > td.sorting_desc::before, table.dataTable thead > tr > td.sorting_desc::after, table.dataTable thead > tr > td.sorting_asc_disabled::before, table.dataTable thead > tr > td.sorting_asc_disabled::after, table.dataTable thead > tr > td.sorting_desc_disabled::before, table.dataTable thead > tr > td.sorting_desc_disabled::after {
        position: absolute !important;
        display: block!important;
        opacity: .125!important;
        line-height: 9px !important;;
        font-size: .8em !important;
    }
    table.dataTable thead th, table.dataTable thead td, table.dataTable tfoot th, table.dataTable tfoot td {
        text-align: right !important;
    }
    #kt_datatable_example_1_filter{
        float: left !important;
    }
    div.dataTables_wrapper {
        width:100% !important;
    }
</style>
<!-- DataTables -->
<link href="{{asset('admin-assets/plugins/')}}/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="{{asset('admin-assets/plugins/')}}/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

<!-- Responsive datatable examples -->
<link href="{{asset('admin-assets/plugins/')}}/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<!-- Required datatable js -->
<script src="{{asset('admin-assets/plugins/')}}/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{asset('admin-assets/plugins/')}}/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="{{asset('admin-assets/plugins/')}}/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{asset('admin-assets/plugins/')}}/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js" integrity="sha512-XMVd28F1oH/O71fzwBnV7HucLxVwtxf26XV8P4wPk26EDxuGZ91N8bsOttmnomcCD3CS5ZMRL50H0GgOHvegtg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{asset('admin-assets/plugins/')}}/pdfmake/build/pdfmake.min.js"></script>
<script src="{{asset('admin-assets/plugins/')}}/pdfmake/build/vfs_fonts.js"></script>
<script src="{{asset('admin-assets/plugins/')}}/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="{{asset('admin-assets/plugins/')}}/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="{{asset('admin-assets/plugins/')}}/datatables.net-buttons/js/buttons.colVis.min.js"></script>

<!-- Responsive examples -->
<script src="{{asset('admin-assets/plugins/')}}/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{asset('admin-assets/plugins/')}}/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
<script>
    $.fn.dataTable.ext.errMode = 'none';


</script>
