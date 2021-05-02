<script src="{{asset('userDashboard')}}/plugins/common/common.min.js"></script>
<script src="{{asset('userDashboard')}}/js/custom.min.js"></script>
<script src="{{asset('userDashboard')}}/js/settings.js"></script>
<script src="{{asset('userDashboard')}}/js/gleek.js"></script>
<script src="{{asset('userDashboard')}}/js/styleSwitcher.js"></script>

<!-- Chartjs -->
<script src="{{asset('userDashboard')}}/plugins/chart.js/Chart.bundle.min.js"></script>
<!-- Circle progress -->
<script src="{{asset('userDashboard')}}/plugins/circle-progress/circle-progress.min.js"></script>
<!-- Datamap -->
<script src="{{asset('userDashboard')}}/plugins/d3v3/index.js"></script>
<script src="{{asset('userDashboard')}}/plugins/topojson/topojson.min.js"></script>
<script src="{{asset('userDashboard')}}/plugins/datamaps/datamaps.world.min.js"></script>
<!-- Morrisjs -->
<script src="{{asset('userDashboard')}}/plugins/raphael/raphael.min.js"></script>
<script src="{{asset('userDashboard')}}/plugins/morris/morris.min.js"></script>
<!-- Pignose Calender -->
<script src="{{asset('userDashboard')}}/plugins/moment/moment.min.js"></script>
<script src="{{asset('userDashboard')}}/plugins/pg-calendar/js/pignose.calendar.min.js"></script>
<!-- ChartistJS -->
<script src="{{asset('userDashboard')}}/plugins/chartist/js/chartist.min.js"></script>
<script type="text/javascript">
    function copyToClipboard(element) {
        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val($(element).text()).select();
        document.execCommand("copy");
        $temp.remove();
    }

</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<script src="{{asset('userDashboard')}}/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script>



<script src="{{asset('userDashboard')}}/js/dashboard/dashboard-1.js"></script>

</body>

</html>
