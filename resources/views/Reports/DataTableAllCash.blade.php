<script type="text/javascript">
    $(document).ready(function() {
        $('.selectFiltration').select2({});
        var dt =  $("#kt_datatable_example_1").DataTable({
            serverSide: true,
            dom: 'Bfrtip',
            buttons: [
                'pageLength',
                {
                    extend: 'excelHtml5',
                    text:"اكسيل ",
                    exportOptions: {
                        columns: ':visible'
                    }
                },

                'colvis'
            ],
            ajax: {
                url: '{{route('all-report-cash')}}',
                data: function (d) {
                    d.id = $('input[name=id]').val();
                    d.company_id = $('#company_id').val();
                    d.start_date = $('#start_date').val();
                    d.end_date= $('#end_date').val();
                    d.transaction = $('#transaction').val();
                }
            },
            oLanguage: {

                "sSearch": "{{ __('dashboard.general_search') }}"

            },
            language: {
                url: '{{asset('JSON/ar.json')}}',
            },
            searching: true,
            scrollY: 500,
            scrollX: true,
            lengthMenu: [10,20, 50, 500,1000,10000],
            scrollCollapse: true,
            columns: [
                {data: "receipt_date"},
                {data:'totalExpense'},
                {data:'totalRevenue'},
            ]
        });
        dt.buttons().container()
            .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');

        $(".dataTables_length select").addClass('form-select form-select-sm');
        var iets = $('.dataTables_filter input');
        iets.unbind().bind("keyup", function (e) {
            if(iets.val().length >= 3) {
                dt.search(iets.val()).draw();
            }
            if(iets.val() === ""){
                dt.search(iets.val()).draw();
            }
        });
    });


</script>
