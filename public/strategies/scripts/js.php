<script>
    
    var timeData = [];
    var chart = LightweightCharts.createChart(document.getElementById('chart'), {
        width: 1250,
        height: 500,
        layout: {
            backgroundColor: '#ffffff',
            textColor: 'rgba(0, 0, 0, 0.9)',
        },
        grid: {
            vertLines: {
                color: 'rgba(197, 203, 206, 0.5)',
            },
            horzLines: {
                color: 'rgba(197, 203, 206, 0.5)',
            },
        },
        crosshair: {
            mode: LightweightCharts.CrosshairMode.Normal,
        },
        priceScale: {
            borderColor: 'rgba(197, 203, 206, 0.8)',
        },
        timeScale: {
            borderColor: 'rgba(197, 203, 206, 0.8)',
            timeVisible: true,
            secondsVisible: false,
        },
    });

    var candleSeries = chart.addCandlestickSeries({
        upColor: '#00ff00',
        downColor: '#ff0000', 
        borderDownColor: 'rgba(255, 144, 0, 1)',
        borderUpColor: 'rgba(255, 144, 0, 1)',
        wickDownColor: 'rgba(255, 144, 0, 1)',
        wickUpColor: 'rgba(255, 144, 0, 1)',
    });


    fetch('http://localhost/tradee/public/strategies/controllers/kline.php')
        .then((r) => r.json())
        .then((response) => {
            console.log("KLINE response")
            console.log(response);
            timeData=response;
            candleSeries.setData(response);
        })


    var binanceSocket = new WebSocket("wss://stream.binance.com:9443/ws/btcusdt@kline_1m");

    binanceSocket.onmessage = function (event) {	
    var message = JSON.parse(event.data);

    var candlestick = message.k;

    console.log(candlestick)
    timeData.push({
            time: candlestick.t / 1000,
            open: candlestick.o,
            high: candlestick.h,
            low: candlestick.l,
            close: candlestick.c
        });
        candleSeries.update({
            time: candlestick.t / 1000,
            open: candlestick.o,
            high: candlestick.h,
            low: candlestick.l,
            close: candlestick.c
        })
    }

    document.addEventListener('added',(e)=>{
        console.log(e);
    })


    document.getElementById('London').style.display = "block";
    evt.currentTarget.className += " active";

    function openCity(evt, cityName) {

        // Declare all variables
        var i, tabcontent, tablinks;

        // Get all elements with class="tabcontent" and hide them
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }

        // Get all elements with class="tablinks" and remove the class "active"
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }

        // Show the current tab, and add an "active" class to the button that opened the tab
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";

    }


</script>