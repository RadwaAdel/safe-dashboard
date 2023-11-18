<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.min.js" integrity="sha512-mh+AjlD3nxImTUGisMpHXW03gE6F4WdQyvuFRkjecwuWLwD2yCijw4tKA3NsEFpA1C3neiKhGXPSIGSfCYPMlQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js" integrity="sha512-CryKbMe7sjSCDPl18jtJI5DR5jtkUWxPXWaLCst6QjH8wxDexfRJic2WRmRXmstr2Y8SxDDWuBO6CQC6IE4KTA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    var start = moment().subtract(29, "days");
    var end = moment();
    var input = $("#kt_ecommerce_report_returns_daterangepicker");

    function cb(start, end) {
        input.html(start.format("MMMM D, YYYY") + " - " + end.format("MMMM D, YYYY"));
        $('#start_date').val(start.format('YYYY-MM-DD'));
        $('#end_date').val( end.format('YYYY-MM-DD'));
    }

    input.daterangepicker({
        startDate: start,
        endDate: end,
        ranges: {
            "اليوم": [moment(), moment()],
            "أمس": [moment().subtract(1, "days"), moment().subtract(1, "days")],
            "منذ 7 ايام": [moment().subtract(6, "days"), moment()],
            "منذ 30 يوم": [moment().subtract(29, "days"), moment()],
            "هذا الشهر": [moment().startOf("month"), moment().endOf("month")],
            "الشهر الماضى": [moment().subtract(1, "month").startOf("month"), moment().subtract(1, "month").endOf("month")],
        },
        onSelect:function(start, end) {
            $('#start_date').val(start.format('YYYY-MM-DD'));
            $('#end_date').val( end.format('YYYY-MM-DD'));

        }
    }, cb) ;
    $('[data-range-key="Custom Range"]').text('فترة مخصصة')
</script>
