<?php

    include '../../../config.php';  

    $api_key = "49TAi8MMYQhgQEcP5OG45hPYWAfvmOtEimHYkPz948iImY1o3hSP7mtWxz2ui60y";
    $api_secret = "SkMIpu4jK8aqcoADBTyLCIWkk4qLI2sUZyE4ge3jGsumh22llWEWo3R9Uv4L4Wx0";
    $api = new Binance\API($api_key, $api_secret);

    $ticks = $api->candlesticks("BTCUSDT", "1m");
    
    $processed_candlesticks = [];

    foreach($ticks as $data){
        // var_dump($data);die;
        $processed_candlesticks[] = [
            "time"=> $data["openTime"] / 1000, 
            "open"=> $data["open"],
            "high"=> $data["high"], 
            "low"=> $data["low"], 
            "close"=> $data["close"]
        ];
//         'open' => string '47931.98000000' (length=14)
//   'high' => string '47983.29000000' (length=14)
//   'low' => string '47931.98000000' (length=14)
//   'close' => string '47976.55000000' (length=14)
//   'volume' => string '1270840.18652500' (length=16)
//   'openTime' => int 1631786520000
//   'closeTime' => int 1631786579999
//   'assetVolume' => string '26.49562000' (length=11)
//   'baseVolume' => string '1270840.18652500' (length=16)
//   'trades' => int 770
//   'assetBuyVolume' => string '17.25147000' (length=11)
//   'takerBuyVolume' => string '827488.03312200' (length=15)
//   'ignored' => string '0' (length=1)

    }
        

    //$processed_candlesticks.append(candlestick)

    echo json_encode($processed_candlesticks);

    // print_r($ticks);


?>