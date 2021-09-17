

<style>
    .table-striped tr td, .table-striped tr th {
        border: 0px !important;
        font-size: 0.6em;
    }
</style>

<script src="https://unpkg.com/lightweight-charts/dist/lightweight-charts.standalone.production.js"></script>

<div class="content-body">
    <div class="container">
        <div class="row">
            <div class="col-xxl-12 col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Chart </h4>
                    </div>
                    <div class="card-body">
                        <div class="col-12">
                            <div id="chart"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xxl-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Transaction</h4>
                    </div>
                    <div class="card-body">
                    
                        <div class="table-responsive">
                            <table class="table table-striped responsive-table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Coin Name</th>
                                        <th>Type</th>
                                        <th>Entry Signal</th>
                                        <th>Entry Type</th>
                                        <th>Entry Datetime</th>
                                        <th>Exit Type</th>
                                        <th>Exit Signal</th>
                                        <th>Exit Trigger</th>
                                        <th>Exit Datetime</th>
                                        <th>Price</th>
                                        <th>Contracts</th>
                                        <th>Profit</th>
                                        <th>Cummulative Profit</th>
                                        <th>Run Up</th>
                                        <th>Draw Down</th>
                                        <th>Dateadded</th>
                                    </tr>
                                </thead>
                                <tbody id="databody">

                                    <?php
                                        // if(count($result) > 0 ){
                                        //     $i = 1;
                                            
                                        //     foreach ($result as $val){
                                            
                                        ?>

                                    <!-- <tr>
                                        <td data-th="Wallet">
                                            <span class="bt-content">
                                                <?php //echo $i; ?>
                                            </span>
                                        </td>
                                        
                                        <td class="coin-name" data-th="Coin Name">
                                            <span class="bt-content">
                                                <i class="cc BTC"></i> Bitcoin - BTCUSDT
                                            </span>
                                        </td>

                                        <td data-th="Type">
                                            <span class="bt-content">
                                                
                                                        <?php
                                                            if($val['TRD_ENTRY_SIGNAL'] == "Buy"){
                                                        ?>
                                                            <span class="success-arrow">
                                                                <i class="icofont-arrow-up"></i>
                                                            </span>
                                                            
                                                        <?php
                                                                //echo $val['TRD_ENTRY_SIGNAL'];
                                                            }else if($val['TRD_ENTRY_SIGNAL'] == "Sell"){
                                                        ?>
                                                            <span class="danger-arrow">
                                                                <i class="icofont-arrow-down"></i>
                                                            </span>
                                                            
                                                        <?php
                                                                //echo $val['TRD_ENTRY_SIGNAL'];
                                                            }
                                                        ?>
                                                
                                            </span>
                                        </td>
                                        <td data-th="Wallet">
                                            <span class="bt-content">
                                                <?php //echo $val['TRD_ENTRY_SIGNAL']; ?>
                                            </span>
                                        </td>
                                        <td data-th="Wallet">
                                            <span class="bt-content">
                                                <?php //echo $val['TRD_ENTRY_TYPE']; ?>
                                            </span>
                                        </td>
                                        <td data-th="Amount">
                                            <span class="bt-content">
                                                <?php //echo $val['TRD_ENTRY_DATETIME']; ?>
                                            </span>
                                        </td>
                                        <td data-th="Balance">
                                            <span class="bt-content"><?php //echo $val['TRD_EXIT_TYPE']; ?></span>
                                        </td>
                                        <td data-th="Balance">
                                            <span class="bt-content"><?php //echo $val['TRD_EXIT_SIGNAL']; ?></span>
                                        </td>
                                        <td data-th="Balance">
                                            <span class="bt-content"><?php //echo $val['TRD_EXITTRIGGER']; ?></span>
                                        </td>
                                        <td data-th="Balance">
                                            <span class="bt-content"><?php //echo $val['TRD_EXIT_DATETIME']; ?></span>
                                        </td>
                                        <td data-th="Balance">
                                            <span class="bt-content"><?php //echo $val['TRD_PRICE']; ?></span>
                                        </td>
                                        <td data-th="Balance">
                                            <span class="bt-content"><?php //echo $val['TRD_CONTRACTS']; ?></span>
                                        </td>
                                        <td data-th="Balance">
                                            <span class="bt-content"><?php //echo $val['TRD_PROFIT']; ?></span>
                                        </td>
                                        <td data-th="Balance">
                                            <span class="bt-content"><?php //echo $val['TRD_CUMPROFIT']; ?></span>
                                        </td>
                                        <td data-th="Balance">
                                            <span class="bt-content"><?php //echo $val['TRD_RUNUP']; ?></span>
                                        </td>
                                        <td data-th="Balance">
                                            <span class="bt-content"><?php //echo $val['TRD_DRAWDOWN']; ?></span>
                                        </td>
                                        
                                        <td data-th="Balance">
                                            <span class="bt-content"><?php //echo $val['TRD_DATEADDED']; ?></span>
                                        </td>
                                        

                                    </tr> -->

                                    <?php
                                        //         $i = $i + 1;
                                        //     }
                                            
                                        // }
                                        ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var evtSource = new EventSource('public/strategies/controllers/ev.php?keys=<?php echo $keys  ?>');
    var eventList = document.querySelector('ul');
    var markers = [];
    evtSource.onerror =function(e){
        console.log('error',e);
    }

    evtSource.onmessage = function(e) {
        var newElement = document.createElement("li");
        var val =JSON.parse(e.data);
        var str='';
        console.log('msg',JSON.parse(e.data));
     
        //   newElement.textContent = "message: " + e.data;
        //   eventList.appendChild(newElement); 

        for (const i in val) {
            if (Object.hasOwnProperty.call(val, i)) {
                var element = val[i];

                // console.log("element");
                // console.log(element);

               
                if(element.TRD_ENTRY_SIGNAL == "Buy"){
                    entrysignal = '<span class="success-arrow"><i class="icofont-arrow-up"></i></span>'+element.TRD_ENTRY_SIGNAL
                }else if(element.TRD_ENTRY_SIGNAL == "Sell"){
                    entrysignal = '<span class="danger-arrow"><i class="icofont-arrow-down"></i></span>'+element.TRD_ENTRY_SIGNAL
                }

                x = parseInt(i) + 1;

                // str+='<tr><td>'+ i +'</td></tr>'
                str+='<tr><td data-th="Wallet"><span class="bt-content">'+ x +'</span></td><td class="coin-name" data-th="Coin Name">'+
                '<span class="bt-content"><i class="cc BTC"></i> Bitcoin - BTCUSDT</span></td><td data-th="Wallet">'+entrysignal+
                '<span class="bt-content"></span></td><td data-th="Wallet"><span class="bt-content">'+element.TRD_ENTRY_SIGNAL+'</span></td><td data-th="Wallet"><span class="bt-content">'+element.TRD_ENTRY_TYPE+
                '</span></td><td data-th="Amount"><span class="bt-content">'+element.TRD_ENTRY_DATETIME+'</span></td><td data-th="trd_exit_type"><span class="bt-content">'+element.TRD_EXIT_TYPE+
                '</span></td><td data-th="trd_exit_signal"><span class="bt-content">'+element.TRD_EXIT_SIGNAL+'</span></td><td data-th="trd_exittrigger"><span class="bt-content">'+element.TRD_EXITTRIGGER+
                '</span></td><td data-th="trd_exit_datetime"><span class="bt-content">'+element.TRD_EXIT_DATETIME+'</span></td><td data-th="trd_price"><span class="bt-content">'+element.TRD_PRICE+
                '</span> </td><td data-th="trd_contracts"><span class="bt-content">'+element.TRD_CONTRACTS+'</span></td><td data-th="trd_profit"><span class="bt-content">'+element.TRD_PROFIT+'</span></td><td data-th="trd_cumprofit"><span class="bt-content">'+element.TRD_CUMPROFIT+'</span></td><td data-th="trd_runup"><span class="bt-content">'+element.TRD_RUNUP+'</span></td><td data-th="trd_drawdown"><span class="bt-content">'+element.TRD_DRAWDOWN+'</span></td><td data-th="trd_dateadded"><span class="bt-content">'+element.TRD_DATEADDED+'</span> </td></tr>';
                // console.log(str);

                console.log("element.TRD_ENTRY_DATETIME");
                var datefm = element.TRD_ENTRY_DATETIME;
                
                console.log(datefm.substring(0,16)+":00");
                // // 17/09/2021 11:55:02
                // // 02/13/2009 23:31:30
                console.log(toTimestamp(datefm.substring(0,16)+":00"));
                for (var ii = 0; ii < timeData.length; ii++) {
                    if (timeData[ii].time === toTimestamp(datefm.substring(0,16)+":00")) {
                        // if(markers.some(item => item.time !== timeData[ii].time) ){
                        if(element.TRD_ENTRY_SIGNAL ==='Sell'){
                            if (markers.includes({ time: timeData[ii].time, position: 'aboveBar', color: '#e91e63', shape: 'arrowDown', text: 'Sell @ ' + Math.floor(timeData[ii].high + 2) }) === false){
                            markers.push({ time: timeData[ii].time, position: 'aboveBar', color: '#e91e63', shape: 'arrowDown', text: 'Sell @ ' + Math.floor(timeData[ii].high + 2) });
                            }
                        }else{
                            if (markers.includes({ time: timeData[ii].time, position: 'belowBar', color: '#2196F3', shape: 'arrowUp', text: 'Buy @ ' + Math.floor(timeData[ii].low - 2)}) ===false){
                            markers.push({ time: timeData[ii].time, position: 'belowBar', color: '#2196F3', shape: 'arrowUp', text: 'Buy @ ' + Math.floor(timeData[ii].low - 2) });
                            }
                        }
                    // } 
                    } 
                } 
                  
                candleSeries.setMarkers(markers);
            }
           
          
               
                // // markers.push({ time: data[data.length - 48].time, position: 'aboveBar', color: '#f68410', shape: 'circle', text: 'D' });
           
        }  

        document.getElementById("databody").innerHTML = str;

      
    }
    
    function toTimestamp(strDate){
        var datum = Date.parse(strDate);
        console.log(datum);
        return datum/1000;
    }
    

</script>