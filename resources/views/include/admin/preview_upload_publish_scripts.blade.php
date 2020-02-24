<script>
    initSample();
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
<script type="text/javascript" src="https://cms.mqoqowa.africa//js/subsection.js"></script>

<script src="https://cms.mqoqowa.africa//js/fixdiv-news.js"></script>

<script src="{{ url::asset('js/datetimepicker.min.js') }}"></script>

<script>
    /*jslint browser:true*/
    /*global jQuery, document*/

    jQuery(document).ready(function () {
        jQuery('#filter-date, #search-from-date, #search-to-date').datetimepicker({
            //format:'DD-MM-YYYY h:mm:ss',
            formatDate:'yy-mm-dd',
            inline:true,
            formatTime:'H:m:s',
            minDate:'-2015-01-01',//yesterday is minimum date(for today use 0 or -1970/01/01)
            //maxDate:'+1970-01-02'//tomorrow is maximum date calendar
        });
    });
</script>
