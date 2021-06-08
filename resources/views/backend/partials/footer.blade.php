

<footer class="footer">

    <div class="copyrights text-center">
        <p class="no-margin-bottom">2021 &copy; All rights reserved to <a href="https://www.facebook.com/me.sayem.islam/"> Sayem Kabir</a></p>
    </div>


</footer>


<!-- JavaScript files-->
<script src="{{asset("backend")}}/vendor/jquery/jquery.min.js"></script>
<script src="{{asset("backend")}}/vendor/popper.js/umd/popper.min.js"> </script>
<script src="{{asset("backend")}}/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="{{asset("backend")}}/vendor/jquery.cookie/jquery.cookie.js"> </script>
<script src="{{asset("backend")}}/vendor/chart.js/Chart.min.js"></script>
<script src="{{asset("backend")}}/vendor/jquery-validation/jquery.validate.min.js"></script>
<script src="{{asset("backend")}}/js/charts-home.js"></script>
<script src="{{asset("backend")}}/js/front.js"></script>
<script type="text/javascript">
    // jQuery(function($) {
    //     $('#startClock').on('click', doCount);
    // });

    var start =document.querySelectorAll('.startClock');
    start.forEach(function (element){
        element.addEventListener('click',function (e){
            // e.preventDefault();
            var duration = Number.parseInt(e.target.dataset.duration);
            var key= e.target.dataset.key

            doCount(duration,key)
        })
    })

    function doCount(duration,key) {
        var counter = duration;

        setInterval(function() {
            counter--;
            if (counter >= 0) {
                span = document.getElementById("count-"+key);
                span.innerHTML = counter;
            }
            if (counter === -1) {
                alert('You Account Was Credited');
                //api call
                clearInterval(counter);
            }
        }, 1000);
    }

</script>

@livewireScripts


</body>
</html>


