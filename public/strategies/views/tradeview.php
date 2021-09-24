<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<style>

    .row_margin{
        margin-top: 2em;
    }

    .small{
        font-size: 10px;
    }

    .table-striped tr td, .table-striped tr th {
        border: 0px !important;
        font-size: 0.6em;
    }

        
  /* Style the tab */
  .tab {
    overflow: hidden;
    border: 1px solid #fff;
    background-color: #fff;
  }

  /* Style the buttons that are used to open the tab content */
  .tab button {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
  }

  /* Change background color of buttons on hover */
  .tab button:hover {
    font-weight: 800;
    color: #000;
  }

  /* Create an active/current tablink class */
  .tab button.active {
    background-color: #fff;
    font-weight: 800;
    color: #6e00ff;
  }

  /* Style the tab content */
  .tabcontent {
    display: none;
    padding: 6px 12px;
    /* border: 1px solid #ccc; */
    border-top: none;
  }

</style>

<script src="https://unpkg.com/lightweight-charts/dist/lightweight-charts.standalone.production.js"></script>

<div class="content-body">
    <div class="container">
        <div class="row">
            <div class="col-xxl-12 col-xl-12">
                <div class="card">
                    <div class="card-header">
                        
                        <div class="col-10">
                            <h4 class="card-title">Chart </h4>
                        </div>

                        <div class="col-2c">
                            <select class="form-select" id="tfselect" name="tfselect" onchange="jsfunction()">
                                <!-- //Periods: 1m,3m,5m,15m,30m,1h,2h,4h,6h,8h,12h,1d,3d,1w,1M
                                m -> minutes; h -> hours; d -> days; w -> weeks; M -> months
                                1m 3m 5m 15m 30m 1h 2h 4h 6h 8h 12h 1d 3d 1w 1M -->

                                <option <?php if(($ekeys == "1m") || empty($ekeys)){ echo "selected"; } ?> value="1m">1 Minute</option>
                                <option <?php if($ekeys == "3m"){ echo "selected"; } ?> value="3m">3 Minutes</option>
                                <option <?php if($ekeys == "5m"){ echo "selected"; } ?> value="5m">5 Minutes</option>
                                <option <?php if($ekeys == "15m"){ echo "selected"; } ?> value="15m">15 Minutes</option>
                                <option <?php if($ekeys == "30m"){ echo "selected"; } ?> value="30m">30 Minutes</option>
                                <option <?php if($ekeys == "1h"){ echo "selected"; } ?> value="1h">1 Hour</option>
                                <option <?php if($ekeys == "2h"){ echo "selected"; } ?> value="2h">2 Hour</option>
                                <option <?php if($ekeys == "4h"){ echo "selected"; } ?> value="4h">4 Hour</option>
                                <option <?php if($ekeys == "6h"){ echo "selected"; } ?> value="6h">6 Hour</option>
                                <option <?php if($ekeys == "8h"){ echo "selected"; } ?> value="8h">8 Hour</option>
                                <option <?php if($ekeys == "12h"){ echo "selected"; } ?> value="12h">12 Hour</option>
                                <option <?php if($ekeys == "1d"){ echo "selected"; } ?> value="1d">1 Day</option>
                                <option <?php if($ekeys == "3d"){ echo "selected"; } ?> value="3d">3 Day</option>
                                <option <?php if($ekeys == "1w"){ echo "selected"; } ?> value="1w">1 Week</option>
                                <option <?php if($ekeys == "1M"){ echo "selected"; } ?> value="1M">1 Month</option>

                            </select>
                        </div>

                        <script>
                            function jsfunction(){
                                var tfselect = document.getElementById("tfselect").value;                               
                                
                                document.getElementById("ekeys").value = tfselect;
                                document.getElementById("keys").value = "<?php echo $keys ?>";
                                document.getElementById("view").value = 'tradeview';
                                document.getElementById("viewpage").value = 'trades';
                                document.myform.submit();

                            }
                        </script>

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

                        <div>
                        
                            <!-- Tab links -->
                            <div class="tab">
                                <button type="button" class="tablinks" onclick="openCity(event, 'London')">Overview</button>
                                <button type="button" class="tablinks" onclick="openCity(event, 'Paris')">Performance Summary</button>
                                <button type="button" class="tablinks" onclick="openCity(event, 'Tokyo')">List of Trades</button>
                            </div>

                            <!-- Tab content -->
                            <div id="London" class="tabcontent">
                                <h3>Overview</h3>
                                <div class="row">
                                    <div class="col-2">
                                        <b id="ld_netprofit">$0</b><br>
                                        <span id="ld_netprofit_percent">0%</span><br>
                                        <span class="small" >Net Profit</span><br>
                                    </div>
                                    <div class="col-2">
                                        <b id="ld_total_closed_trades">0</b><br>
                                        <span></span><br>
                                        <span  class="small">Total Closed Trades</span><br>
                                    </div>
                                    <div class="col-2">
                                        <b id="ld_percent_profitable">0</b><br>
                                        <span></span><br>
                                        <span  class="small">Percent Profitable</span><br>
                                    </div>
                                    <div class="col-2">
                                        <b id="ld_profit_factor">0</b><br>
                                        <span></span><br>
                                        <span  class="small">Profit Factor</span><br>
                                    </div>
                                    <div class="col-2">
                                        <b id="ld_max_drawdown">$ 0</b><br>
                                        <span>0 %</span><br>
                                        <span class="small">Max Drawdown</span><br>
                                    </div>
                                    <div class="col-2">
                                        <b id="ld_avg_trade">$ 0</b><br>
                                        <span></span><br>
                                        <span class="small">Avg Trade</span><br>
                                    </div>
                                </div>
                                <!-- <div class="row">
                                    <span>1 Avg # Bars in Trade</span>
                                </div> -->

                                <div class="row">
                                    <canvas id="line-chart"></canvas>
                                    <script>
                                    var ctx = $("#line-chart");
                                         var lineChart = new Chart(ctx, {
                                            type: 'line',
                                            data: {
                                                // labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                                                labels:[],
                                                datasets: [
                                                {
                                                    label: "Equity",
                                                    fill: false,
                                                    borderColor: "#009EFF",
                                                    // borderDash: [5, 5],
                                                    backgroundColor: "#90D1FF",
                                                    pointBackgroundColor: "#55bae7",
                                                    pointBorderColor: "#55bae7",
                                                    pointHoverBackgroundColor: "#55bae7",
                                                    pointHoverBorderColor: "#55bae7",
                                                    // data: equity_figure_arr
                                                    dat:[]
                                                },
                                                {
                                                    label: "Drawdown",
                                                    fill: false,
                                                    borderColor: "#FF4200",
                                                    // borderDash: [5, 5],
                                                    backgroundColor: "#FF8E66",
                                                    pointBackgroundColor: "#55bae7",
                                                    pointBorderColor: "#55bae7",
                                                    pointHoverBackgroundColor: "#55bae7",
                                                    pointHoverBorderColor: "#55bae7",
                                                    // data: mark_down_arr,
                                                    data:[],
                                                    options: {
                                                        scales: {
                                                            yAxes: [{
                                                                ticks: {
                                                                        reverse: true,
                                                                    beginAtZero:true
                                                                }
                                                            }],
                                                            xAxes: [{
                                                                    ticks: {
                                                                    reverse: true,
                                                                beginAtZero: true
                                                                }
                                                            }]
                                                        }
                                                    }
                                                }
                                                ]

                                            }
                                        });
                                    
                                    </script>
                                </div>


                            </div>


                            <div id="Paris" class="tabcontent">
                                <h3>Performance Summary</h3>

                                <div class="row">
                                    <div class="col-6">
                                        <b></b><br>
                                    </div>
                                    <div class="col-2">
                                        <b>All</b><br>
                                    </div>
                                    <div class="col-2">
                                        <b>Long</b><br>
                                    </div>
                                    <div class="col-2">
                                        <b>Short</b><br>
                                    </div>
                                    <br>
                                </div>
                                
                                <div class="row row_margin">
                                    <div class="col-6">
                                        <b>Net Profit</b><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="netprofit">$0</span><br>
                                        <span id="netprofit_percent" class="small">0%</span><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="netprofit_buy">$ 0</span><br>
                                        <span id="netprofit_percent_buy" class="small">14.16 %</span><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="netprofit_sell">$ 0</span><br>  
                                        <span id="netprofit_percent_sell" class="small">16.81 %</span><br>
                                    </div>
                                </div>

                                <div class="row row_margin">
                                    <div class="col-6">
                                        <b>Gross Profit	</b><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="gross_profit">$0</span><br>
                                        <span id="gross_profit_percent" class="small">0 %</span><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="gross_profit_buy">$0</span><br>
                                        <span id="gross_profit_percent_buy" class="small">0 %</span><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="gross_profit_sell">$0</span><br>  
                                        <span id="gross_profit_percent_sell" class="small">0 %</span><br>
                                    </div>
                                </div>

                                <div class="row row_margin">
                                    <div class="col-6">
                                        <b>Gross Loss</b><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="gross_loss">$ 0</span><br>
                                        <span id="gross_loss_percent" class="small">0 %</span><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="gross_loss_buy">$ 0</span><br>
                                        <span id="gross_loss_percent_buy" class="small">0 %</span><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="gross_loss_sell">$ 0</span><br>  
                                        <span id="gross_loss_percent_sell" class="small">0 %</span><br>
                                    </div>
                                </div>

                                <div class="row row_margin">
                                    <div class="col-6">
                                        <b>Max Drawdown	</b><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="max_drawdown_fig">$ 0</span><br>
                                        <span id="max_drawdown_final" class="small">0 %</span><br>
                                    </div>
                                    <div class="col-2">
                                    </div>
                                    <div class="col-2">
                                    </div>
                                </div>

                                <div class="row row_margin">
                                    <div class="col-6">
                                        <b>Buy & Hold Return	</b><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="buy_hold_return">$ 0</span><br>
                                        <span id="percDiff_BHR" class="small">0 %</span><br>
                                    </div>
                                    <div class="col-2">
                                    </div>
                                    <div class="col-2">
                                    </div>
                                </div>

                                <div class="row row_margin">
                                    <div class="col-6">
                                        <b>Sharpe Ratio</b><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="">0</span><br>
                                    </div>
                                    <div class="col-2">
                                    </div>
                                    <div class="col-2">  
                                    </div>
                                </div>

                                <div class="row row_margin">
                                    <div class="col-6">
                                        <b>Sortino Ratio</b><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="">N/A</span><br>
                                    </div>
                                    <div class="col-2">
                                    </div>
                                    <div class="col-2">  
                                    </div>
                                </div>

                                <div class="row row_margin">
                                    <div class="col-6">
                                        <b>Profit Factor</b><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="profit_factor"></span><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="profit_factor_buy"></span><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="profit_factor_sell"></span><br>  
                                    </div>
                                </div>

                                <div class="row row_margin">
                                    <div class="col-6">
                                        <b>Max Contracts Held</b><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="max_contacts_held"></span><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="max_contacts_held_buy"></span><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="max_contacts_held_sell"></span><br>  
                                    </div>
                                </div>

                                <div class="row row_margin">
                                    <div class="col-6">
                                        <b>Open PL	</b><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="open_pl">$ 0</span><br>
                                        <span id="open_pl_percent" class="small">0 %</span><br>
                                    </div>
                                    <div class="col-2">
                                    </div>
                                    <div class="col-2">  
                                    </div>
                                </div>

                                <div class="row row_margin">
                                    <div class="col-6">
                                        <b>Commission Paid</b><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="commission_paid">$ 0</span><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="commission_paid_buy">$ 0</span><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="commission_paid_sell">$ 0</span><br>  
                                    </div>
                                </div>

                                <div class="row row_margin">
                                    <div class="col-6">
                                        <b>Total Closed Trades</b><br>
                                    </div>	
                                    <div class="col-2">
                                        <span id="total_closed_trades"></span><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="total_closed_trades_buy"></span><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="total_closed_trades_sell"></span><br>  
                                    </div>
                                </div>

                                <div class="row row_margin">
                                    <div class="col-6">
                                        <b>Total Open Trades</b><br>
                                    </div>

                                    <div class="col-2">
                                        <span id="total_open_trades"></span><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="total_open_trades_buy"></span><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="total_open_trades_sell"></span><br>  
                                    </div>
                                </div>

                                <div class="row row_margin">
                                    <div class="col-6">
                                        <b>Number Winning Trades</b><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="number_winning_trades"></span><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="number_winning_trades_buy"></span><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="number_winning_trades_sell"></span><br>  
                                    </div>
                                </div>

                                <div class="row row_margin">
                                    <div class="col-6">
                                        <b>Number Losing Trades</b><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="number_losing_trades"></span><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="number_losing_trades_buy"></span><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="number_losing_trades_sell"></span><br>  
                                    </div>
                                </div>

                                <div class="row row_margin">
                                    <div class="col-6">
                                        <b>Percent Profitable</b><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="percent_profitable"></span><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="percent_profitable_buy"></span><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="percent_profitable_sell"></span><br>  
                                    </div>
                                </div>

                                <div class="row row_margin">
                                    <div class="col-6">
                                        <b>Avg Trade</b><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="avg_trade">$ 0</span><br>
                                        <span id="avg_trade_percent" class="small">0 %</span><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="avg_trade_buy">$ 0</span><br>
                                        <span id="avg_trade_percent_buy" class="small">0 %</span><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="avg_trade_sell">$ 0</span><br>  
                                        <span id="avg_trade_percent_sell" class="small">0 %</span><br>
                                    </div>
                                </div>

                                <div class="row row_margin">
                                    <div class="col-6">
                                        <b>Avg Winning Trade</b><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="avg_winning_trade"></span><br>
                                        <span id="avg_winning_trade_percent" class="small"> 0 %</span><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="avg_winning_trade_buy"></span><br>
                                        <span id="avg_winning_trade_percent_buy" class="small"> 0 %</span><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="avg_winning_trade_sell"></span><br>  
                                        <span id="avg_winning_trade_percent_sell" class="small"> 0 %</span><br>
                                    </div>
                                </div>

                                <div class="row row_margin">
                                    <div class="col-6">
                                        <b>Avg Losing Trade</b><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="avg_losing_trade"></span>$ 0<br>
                                        <span id="avg_losing_trade_percent" class="small">0 %</span><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="avg_losing_trade_buy"></span>$ 0<br>
                                        <span id="avg_losing_trade_percent_buy" class="small">0 %</span><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="avg_losing_trade_sell">$ 0</span><br>  
                                        <span id="avg_losing_trade_percent_sell" class="small">0 %</span><br>
                                    </div>
                                    
                                </div>

                                <div class="row row_margin">
                                    <div class="col-6">
                                        <b>Ratio Avg Win / Avg Loss</b><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="ratio_avg_win_avg_loss">0</span><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="ratio_avg_win_avg_loss_buy">0</span><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="ratio_avg_win_avg_loss_sell">0</span><br>  
                                    </div>
                                </div>

                                <div class="row row_margin">
                                    <div class="col-6">
                                        <b>Largest Winning Trade</b><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="largest_win"> $ 0 </span><br>
                                        <span id="largest_win_percent" class="small">0 %</span><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="largest_win_buy"> $ 0 </span><br>
                                        <span id="largest_win_percent_buy" class="small">0 %</span><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="largest_win_sell"> $ 0 </span><br>  
                                        <span id="largest_win_percent_sell" class="small">0 %</span><br>
                                    </div>
                                </div>

                                <div class="row row_margin">
                                    <div class="col-6">
                                        <b>Largest Losing Trade</b><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="largest_lose">$ 0</span><br>
                                        <span id="largest_lose_percent" class="small">0 %</span><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="largest_lose_buy">$ 0</span><br>
                                        <span id="largest_lose_percent_buy" class="small">0 %</span><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="largest_lose_sell">$ 0</span><br>  
                                        <span id="largest_lose_percent_sell" class="small">0 %</span><br>
                                    </div>
                                </div>
                                


                                <div class="row row_margin">
                                    <div class="col-6">
                                        <b>Avg # Bars in Trades</b><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="avg_bars_in_trades">0</span><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="avg_bars_in_trades_buy">0</span><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="avg_bars_in_trades_sell">0</span><br>  
                                    </div>
                                </div>

                                <div class="row row_margin">
                                    <div class="col-6">
                                        <b>Avg # Bars in Winning Trades</b><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="avg_bars_in_winning">0</span><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="avg_bars_in_winning_buy">0</span><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="avg_bars_in_winning_sell">0</span><br>  
                                    </div>
                                </div>

                                <div class="row row_margin">
                                    <div class="col-6">
                                        <b>Avg # Bars in Losing Trades</b><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="avg_bars_in_losing">0</span><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="avg_bars_in_losing_buy">0</span><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="avg_bars_in_losing_sell">0</span><br>  
                                    </div>
                                </div>

                                <div class="row row_margin">
                                    <div class="col-6">
                                        <b>Margin Calls</b><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="margin_calls"></span><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="margin_calls_buy"></span><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="margin_calls_sell"></span><br>  
                                    </div>
                                </div>
                            </div>

                            <div id="Tokyo" class="tabcontent">
                                <h3>List of Trades</h3>
                                <div class="table-responsive">
                                    <table class="table table-striped responsive-table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Coin Name</th>
                                                <th>Type</th>
                                                <th>Signal</th>
                                                <th>Type</th>
                                                <th>Datetime</th>
                                                <th>Exit Trigger</th>
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
                                                                    // if($val['TRD_ENTRY_SIGNAL'] == "Buy"){
                                                                ?>
                                                                    <span class="success-arrow">
                                                                        <i class="icofont-arrow-up"></i>
                                                                    </span>
                                                                    
                                                                <?php
                                                                        //echo $val['TRD_ENTRY_SIGNAL'];
                                                                    // }else if($val['TRD_ENTRY_SIGNAL'] == "Sell"){
                                                                ?>
                                                                    <span class="danger-arrow">
                                                                        <i class="icofont-arrow-down"></i>
                                                                    </span>
                                                                    
                                                                <?php
                                                                        //echo $val['TRD_ENTRY_SIGNAL'];
                                                                    // }
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
        // console.log('msg',JSON.parse(e.data));
     
        //   newElement.textContent = "message: " + e.data;
        //   eventList.appendChild(newElement); 

        var useCommission = false;
        
        var equity_figure_arr=[];
        var mark_down_arr=[];
        

        var initial_deposit = parseFloat(val[val.length-1].TRD_EQUITY);

        var total_profit_percent = 0;
        var total_number_of_trades = val.length;
        var contract_size = 50;
        var total_profit_percent_wins = 0;
        var total_profit_percent_loses = 0;
        var max_drawdown = 0;
        
        var first_trade_close = parseFloat(val[val.length-1].TRD_PRICE);
        var last_trade_close = parseFloat(val[0].TRD_PRICE);


        var percDiff_BHR =  100 * (first_trade_close - last_trade_close) / ( (first_trade_close+last_trade_close)/2 );

        var percent_wins = 0;
        var percent_loses = 0;

        var percent_wins_buy = 0;
        var percent_loses_sell = 0;

        var total_num_trades = 0;
        var total_number_of_trades_buy = 0;
        var total_number_of_trades_sell = 0;

        var winning_trades_buy = 0;
        var losing_trades_buy = 0;
        var winning_trades_sell = 0;
        var losing_trades_sell = 0;

        var largest_win_buy = 0;
        var largest_win_sell = 0;

        var total_sell_profit_percent_wins = 0;
        var total_sell_profit_percent_loses = 0;

        var largest_win_buy = 0;
        var largest_lose_buy = 0;
        var largest_win_sell = 0;
        var largest_lose_sell = 0;

        var percent_wins_buy = 0;
        var percent_loses_buy = 0;
        var percent_wins_sell = 0;
        var percent_loses_sell = 0;

        var total_buy_profit_percent_wins = 0;
        var total_buy_profit_percent_loses = 0;

        var total_profit_percent_buy = 0;
        var total_profit_percent_sell = 0;

        var arr_times = [];
        var arr_times_graph=[];


        var netprofit  = 0;
        var netprofit_buy = 0;
        var netprofit_sell = 0;
        var netprofit_percent = 0;
        var netprofit_percent_buy = 0;
        var netprofit_percent_sell = 0;
        var gross_both = 0;
        var gross_profit = 0;
        var gross_profit_buy = 0;
        var gross_profit_sell = 0;
        var gross_profit_percent = 0.000;
        var gross_profit_percent_buy = 0.000;
        var gross_profit_percent_sell = 0.000;
        var gross_loss = 0;
        var gross_loss_buy = 0;
        var gross_loss_sell = 0;
        var gross_loss_percent = 0;
        var gross_loss_percent_buy = 0;
        var gross_loss_percent_sell = 0;

        for (const i in val) {
            if (Object.hasOwnProperty.call(val, i)) {
                var element = val[i];

                
                // console.log("element");
                // console.log(element);


                mark_down_arr.push(element.TRD_DRAWDOWN);
                equity_figure_arr.push(element.TRD_EQUITY);



                total_profit_percent = total_profit_percent + parseFloat(element.TRD_PROFIT);
                
                // element_TRD_PROFIT = (parseFloat(element.TRD_CONTRACTS)/100) * parseFloat(element.TRD_PROFIT);
                // total_profit_percent = total_profit_percent + element_TRD_PROFIT;
                

                
                // Basic Calculations
                
                var element_TRD_PRICE = parseFloat(element.TRD_PRICE);
                var element_TRD_CUMPROFIT = parseFloat(element.TRD_CUMPROFIT);
                var element_TRD_RUNUP = parseFloat(element.TRD_RUNUP);
                var element_TRD_DRAWDOWN = parseFloat(element.TRD_DRAWDOWN);
                var element_TRD_PROFIT = parseFloat(element.TRD_PROFIT) - ((useCommission == true) ? 0.1 : 0);
                var element_TRD_PROFIT_GROSS = parseFloat(element.TRD_PROFIT);
                var element_TRD_CONTRACTS = parseFloat(element.TRD_CONTRACTS);

                var commission = (2*((element_TRD_CONTRACTS/100) * 0.1));

                var profit_value = ((element_TRD_CONTRACTS/100) * element_TRD_PROFIT);
                var profit_value_gross = ((element_TRD_CONTRACTS/100) * element_TRD_PROFIT_GROSS);
                var drawdown_value = (element_TRD_CONTRACTS/100) * element_TRD_DRAWDOWN;
                var roundup_value = (element_TRD_CONTRACTS/100) * element_TRD_RUNUP;
                var cumlative_percent = (element_TRD_CUMPROFIT/200)* 100;
                
                

                // Net
                if(element_TRD_PROFIT>0){
                    percent_wins = element_TRD_PROFIT;
                }else if(element_TRD_PROFIT<0){
                    percent_loses = element_TRD_PROFIT;
                }


                // Gross
                if(element_TRD_PROFIT_GROSS > 0){
                    gross_profit += profit_value_gross;
                    gross_profit_percent += element_TRD_PROFIT_GROSS; 
                }else if(element_TRD_PROFIT_GROSS < 0){
                    gross_loss += profit_value_gross;
                    gross_loss_percent += element_TRD_PROFIT_GROSS; 
                }

                total_profit_percent_wins  = total_profit_percent_wins + percent_wins;
                total_profit_percent_loses  = total_profit_percent_loses + percent_loses;

                
                if(max_drawdown > parseFloat(element.TRD_DRAWDOWN)){
                    max_drawdown = parseFloat(element.TRD_DRAWDOWN);
                }


                
                netprofit += profit_value;
                netprofit_percent += element_TRD_PROFIT; 

                // Plot View
                if(element.TRD_ENTRY_SIGNAL == "Buy"){
                    entrysignal = '<span class="success-arrow"><i class="icofont-arrow-up"></i></span>'+element.TRD_ENTRY_SIGNAL;
                    
                      
                    netprofit_buy  += profit_value;
                    netprofit_percent_buy  += element_TRD_PROFIT; 

                    // Gross
                    if(element_TRD_PROFIT_GROSS > 0){
                        gross_profit_buy += profit_value_gross;
                        gross_profit_percent_buy += element_TRD_PROFIT_GROSS; 
                    }else if(element_TRD_PROFIT_GROSS < 0){
                        gross_loss_buy += profit_value_gross;
                        gross_loss_percent_buy += element_TRD_PROFIT_GROSS; 
                    }

                    if(element_TRD_PROFIT>0){

                        percent_wins_buy = element_TRD_PROFIT;
                        winning_trades_buy = winning_trades_buy + 1;
                        
                        if(largest_win_buy < element_TRD_PROFIT){
                            largest_win_buy = element_TRD_PROFIT;
                        }          

                        total_profit_percent_buy = total_profit_percent_buy + element_TRD_PROFIT;              

                    }else if(element_TRD_PROFIT<0){

                        percent_loses_buy = element_TRD_PROFIT;
                        losing_trades_buy = winning_trades_buy + 1;

                        if(largest_lose_buy > element_TRD_PROFIT){
                            largest_lose_buy = element_TRD_PROFIT;
                        }

                        total_profit_percent_sell = total_profit_percent_sell + element_TRD_PROFIT;
                        
                    } 
                  
                    total_buy_profit_percent_wins  = total_buy_profit_percent_wins + percent_wins_buy;
                    total_buy_profit_percent_loses  = total_buy_profit_percent_loses + percent_loses_buy;

                    total_number_of_trades_buy = total_number_of_trades_buy + 1;

                }else if(element.TRD_ENTRY_SIGNAL == "Sell"){
                    
                    entrysignal = '<span class="danger-arrow"><i class="icofont-arrow-down"></i></span>'+element.TRD_ENTRY_SIGNAL;

                    // Gross
                    if(element_TRD_PROFIT_GROSS > 0){
                        gross_profit_sell += profit_value_gross;
                        gross_profit_percent_sell += element_TRD_PROFIT_GROSS; 
                    }else if(element_TRD_PROFIT_GROSS < 0){
                        gross_loss_sell += profit_value_gross;
                        gross_loss_percent_sell += element_TRD_PROFIT_GROSS; 
                    }


                    netprofit_sell  += profit_value;
                    netprofit_percent_sell  += element_TRD_PROFIT; 
                    
                    if(element_TRD_PROFIT>0){
                        percent_wins_sell = element_TRD_PROFIT;
                        winning_trades_sell = winning_trades_sell + 1;
                        
                        if(largest_win_sell < element_TRD_PROFIT){
                            largest_win_sell = element_TRD_PROFIT;
                        }
                        

                    }else if(element_TRD_PROFIT<0){
                        percent_loses_sell = element_TRD_PROFIT;
                        losing_trades_sell = winning_trades_sell + 1;

                        if(largest_lose_sell > element_TRD_PROFIT){
                            largest_lose_sell = element_TRD_PROFIT;
                        }
                        

                    }
                    
                    total_sell_profit_percent_wins  = total_sell_profit_percent_wins + percent_wins_sell;
                    total_sell_profit_percent_loses  = total_sell_profit_percent_loses + percent_loses_sell;

                    
                    total_number_of_trades_sell = total_number_of_trades_sell + 1;

                }

                x = parseInt(i) + 1;

                // str+='<tr><td>'+ i +'</td></tr>'

                total_num_trades = total_num_trades + 1;
                

                str+='<tr><td data-th="Wallet"><span class="bt-content">'+ x +'</span></td><td class="coin-name" data-th="Coin Name">'+
                '<span class="bt-content"><i class="cc BTC"></i> <br> Bitcoin - BTCUSDT</span></td><td data-th="Wallet">'+entrysignal+
                '<span class="bt-content"></span></td><td data-th="Wallet"><span class="bt-content">Entry '+element.TRD_ENTRY_SIGNAL+'</span><br>Exit <span class="bt-content">'+element.TRD_EXIT_SIGNAL+'</span></td><td data-th="Wallet"><span class="bt-content">Entry '+element.TRD_ENTRY_TYPE+
                '</span><br>Exit <span class="bt-content">'+element.TRD_EXIT_TYPE+
                '</span></td><td data-th="Amount"><span class="bt-content">'+element.TRD_ENTRY_DATETIME+'</span><br><span class="bt-content">'+element.TRD_EXIT_DATETIME+'</span></td><td data-th="trd_exittrigger"><span class="bt-content">'+element.TRD_EXITTRIGGER+
                '</span></td><td data-th="trd_price"><span class="bt-content">'+element_TRD_PRICE+
                '</span> </td><td data-th="trd_contracts"><span class="bt-content">'+element.TRD_CONTRACTS+'</span></td><td data-th="trd_profit"><span class="bt-content">$'+profit_value.toFixed(2)+' <br> '+element_TRD_PROFIT.toFixed(2)+'%</span></td><td data-th="trd_cumprofit"><span class="bt-content">$'+element_TRD_CUMPROFIT.toFixed(3)+'<br>'+cumlative_percent.toFixed(3)+'%</span></td><td data-th="trd_runup"><span class="bt-content">$'+roundup_value.toFixed(2)+' <br>'+element_TRD_RUNUP.toFixed(2)+'%</span></td><td data-th="trd_drawdown"><span class="bt-content">$'+drawdown_value.toFixed(2)+' <br> '+element_TRD_DRAWDOWN.toFixed(2)+'%</span></td><td data-th="trd_dateadded"><span class="bt-content">'+element.TRD_DATEADDED+'</span> </td></tr>';
                // console.log(str);

                

                // console.log("element.TRD_ENTRY_DATETIME");
                var datefm = element.TRD_ENTRY_DATETIME;
                arr_times_graph.push(element.TRD_ENTRY_DATETIME);
                

                for (var ii = 0; ii < timeData.length; ii++) {

                    if ((timeData[ii].time === toTimestamp(datefm.substring(0,16)+":00")) && arr_times.includes(unixToNormalDate(timeData[ii].time)) == false) {
                        // if(markers.some(item => item.time !== timeData[ii].time) ){

                            

                        if(element.TRD_ENTRY_SIGNAL ==='Sell'){
                            if (markers.includes({ time: timeData[ii].time, position: 'aboveBar', color: '#e91e63', shape: 'arrowDown', text: 'Sell' }) === false){

                            markers.push({ time: timeData[ii].time, position: 'aboveBar', color: '#e91e63', shape: 'arrowDown', text: 'Sell' });
                            }

                        }else{
                            if (markers.includes({ time: timeData[ii].time, position: 'belowBar', color: '#2196F3', shape: 'arrowUp', text: 'Buy'}) ===false){
                                
                            markers.push({ time: timeData[ii].time, position: 'belowBar', color: '#2196F3', shape: 'arrowUp', text: 'Buy' });
                            
                            }
                          
                        }
                        

                    // } 
                    } 
                } 
              
                candleSeries.setMarkers(markers);
                // arr_times = arr_times.length ? arr_times : getColumn(timeData,"time");
                // console.log('arrtimes',arr_times_graph);

                
            }


                equity_figure_arr_rev = equity_figure_arr.reverse();
                mark_down_arr_rev = mark_down_arr.reverse();
                arr_times_graph_rev = arr_times_graph.reverse();

                drawLineChart(ctx, equity_figure_arr_rev, mark_down_arr_rev, arr_times_graph_rev.reverse());

           
          
               
                // // markers.push({ time: data[data.length - 48].time, position: 'aboveBar', color: '#f68410', shape: 'circle', text: 'D' });
           
        }  

        
        

        // Net Profit
        // var netprofit = ((initial_deposit/100) * total_profit_percent) - ((useCommission == true) ? commission : 0);
        // var netprofit_buy =  ((initial_deposit/100) * total_profit_percent_buy) - ((useCommission == true) ? commission : 0);
        // var netprofit_sell = ((initial_deposit/100) * total_profit_percent_sell) - ((useCommission == true) ? commission : 0);

        // var netprofit_percent = (netprofit/initial_deposit)*100;
        // var netprofit_percent_buy = (netprofit_buy/initial_deposit)*100;
        // var netprofit_percent_sell = (netprofit_sell/initial_deposit)*100;

        

        // Gross Profit	
        // var gross_profit = (initial_deposit/100) * total_profit_percent_wins;
        // var gross_profit_buy = (initial_deposit/100) * total_buy_profit_percent_wins;
        // var gross_profit_sell = (initial_deposit/100) * total_sell_profit_percent_wins;
        
        // var gross_profit_percent = total_profit_percent_wins;
        // var gross_profit_percent_buy = total_buy_profit_percent_wins;
        // var gross_profit_percent_sell = total_sell_profit_percent_wins;



        // Gross Loss
        // var gross_loss = (initial_deposit/100) * total_profit_percent_loses;
        // var gross_loss_buy = (initial_deposit/100) * total_buy_profit_percent_loses;
        // var gross_loss_sell = (initial_deposit/100) * total_sell_profit_percent_loses;


        // var gross_loss_percent = total_profit_percent_loses;
        // var gross_loss_percent_buy = total_buy_profit_percent_loses;
        // var gross_loss_percent_sell = total_sell_profit_percent_loses;



        // Max Drawdown	
        var max_drawdown_final = max_drawdown;
        var max_drawdown_fig = (initial_deposit/100) * max_drawdown_final;


        // Buy & Hold Return	
        var buy_hold_return = (contract_size/100) * percDiff_BHR;

        // Sharpe Ratio
        // Sortino Ratio

        // Profit Factor
        var profit_factor = Math.abs((gross_profit/gross_loss));
        var profit_factor_buy = Math.abs((gross_profit_buy/gross_loss_buy));
        var profit_factor_sell = Math.abs((gross_profit_sell/gross_loss_sell));

        // Max Contracts Held
        var max_contacts_held = 0
        var max_contacts_held_buy = 0
        var max_contacts_held_sell = 0

        // Open PL	
        var open_pl = 0;
        var open_pl_percent = 0

        // Commission Paid
        var commission_paid = total_number_of_trades * (2*((contract_size/100 * 0.1)));
        var commission_paid_buy = total_number_of_trades_buy * (2*((contract_size/100 * 0.1)));
        var commission_paid_sell = total_number_of_trades_sell * (2*((contract_size/100 * 0.1)));


        // Total Closed Trades
        var total_closed_trades = total_number_of_trades;
        var total_closed_trades_buy = total_number_of_trades_buy;
        var total_closed_trades_sell = total_number_of_trades_sell;

        // Total Open Trades
        var total_open_trades = 0;
        var total_open_trades_buy = 0;
        var total_open_trades_sell = 0;

        // Number Winning Trades
        var number_winning_trades = winning_trades_buy + winning_trades_sell;
        var number_winning_trades_buy = winning_trades_buy;
        var number_winning_trades_sell = winning_trades_sell;

        // Number Losing Trades
        var number_losing_trades = losing_trades_buy + losing_trades_sell;
        var number_losing_trades_buy = losing_trades_buy;
        var number_losing_trades_sell = losing_trades_sell;

        // Percent Profitable
        var percent_profitable = (number_winning_trades/total_closed_trades) * 100;
        var percent_profitable_buy = (number_winning_trades_buy/total_closed_trades_buy) * 100;
        var percent_profitable_sell = (number_winning_trades_sell/total_closed_trades_sell) * 100;


        // Avg Trade

        var avg_trade = netprofit/total_closed_trades;
        var avg_trade_buy = netprofit_buy/total_number_of_trades_buy;
        var avg_trade_sell = netprofit_sell/total_number_of_trades_sell;

        var avg_trade_percent = netprofit_percent/total_closed_trades;
        var avg_trade_percent_buy = netprofit_percent_buy/total_number_of_trades_buy;
        var avg_trade_percent_sell = netprofit_percent_sell/total_number_of_trades_sell;





        // Avg Winning Trade
        var avg_winning_trade = gross_profit/number_winning_trades;
        var avg_winning_trade_buy = gross_profit_buy/number_winning_trades_buy;
        var avg_winning_trade_sell = gross_profit_sell/number_winning_trades_sell;

        var avg_winning_trade_percent = gross_profit_percent / number_winning_trades;
        var avg_winning_trade_percent_buy = gross_profit_percent_buy / number_winning_trades_buy;
        var avg_winning_trade_percent_sell = gross_profit_percent_sell / number_winning_trades_sell;

        
        // Avg Losing Trade
        var avg_losing_trade = gross_loss/number_losing_trades;
        var avg_losing_trade_buy = gross_loss_buy/number_losing_trades_buy;
        var avg_losing_trade_sell = gross_loss_sell/number_losing_trades_sell;

        var avg_losing_trade_percent = gross_loss_percent / number_losing_trades;
        var avg_losing_trade_percent_buy = gross_loss_percent_buy / number_losing_trades_buy;
        var avg_losing_trade_percent_sell = gross_loss_percent_sell / number_losing_trades_sell;

        // Ratio Avg Win / Avg Loss
        var ratio_avg_win_avg_loss = avg_winning_trade/avg_losing_trade;
        var ratio_avg_win_avg_loss_buy = avg_winning_trade_buy/avg_losing_trade_buy;
        var ratio_avg_win_avg_loss_sell = avg_winning_trade_sell/avg_losing_trade_sell;

        // Largest Winning Trade
        largest_win = 0; //fix
        largest_win_buy = ((contract_size/100) * largest_win_buy);
        largest_win_sell = ((contract_size/100) * largest_win_sell);

        largest_win_percent = 0; //fix
        largest_win_percent_buy = largest_win_buy;
        largest_win_percent_sell = largest_win_sell;


        // Largest Losing Trade
        largest_lose = 0; //fix
        largest_lose_buy = (contract_size/100 * largest_lose_buy);
        largest_lose_sell = (contract_size/100 * largest_lose_sell);

        largest_lose_percent = 0; //fix
        largest_lose_percent_buy = largest_lose_buy;
        largest_lose_percent_sell = largest_lose_sell;
        

        // Avg # Bars in Trades
        var avg_bars_in_trades = 1;
        var avg_bars_in_trades_buy = 1;
        var avg_bars_in_trades_sell = 1;
        
        // Avg # Bars in Winning Trades
        var avg_bars_in_winning = 1;
        var avg_bars_in_winning_buy = 1;
        var avg_bars_in_winning_sell = 1;


        // Avg # Bars in Losing Trades
        var avg_bars_in_losing = 1;
        var avg_bars_in_losing_buy = 1;
        var avg_bars_in_losing_sell = 1;


        // Margin Calls
        var margin_calls = 0;
        var margin_calls_buy = 0;
        var margin_calls_sell = 0;



        document.getElementById("databody").innerHTML = str;

        document.getElementById("ld_netprofit").innerHTML = "$"+(netprofit.toFixed(2)).toString();
        document.getElementById("ld_netprofit_percent").innerHTML = (netprofit_percent.toFixed(2)).toString() + "%";
        document.getElementById("ld_total_closed_trades").innerHTML = total_closed_trades;
        document.getElementById("ld_percent_profitable").innerHTML = (percent_profitable.toFixed(2)).toString()+"%";
        document.getElementById("ld_profit_factor").innerHTML = profit_factor.toFixed(2);
        document.getElementById("ld_max_drawdown").innerHTML = max_drawdown.toFixed(2);
        document.getElementById("ld_avg_trade").innerHTML = avg_trade.toFixed(2);


        document.getElementById("netprofit").innerHTML = "$"+(netprofit.toFixed(2)).toString();
        document.getElementById("netprofit_buy").innerHTML = "$"+(netprofit_buy.toFixed(2)).toString();
        document.getElementById("netprofit_sell").innerHTML = "$"+(netprofit_sell.toFixed(2)).toString();
        document.getElementById("netprofit_percent").innerHTML = (netprofit_percent.toFixed(2)).toString() + "%";
        document.getElementById("netprofit_percent_buy").innerHTML = (netprofit_percent_buy.toFixed(2)).toString() + "%";
        document.getElementById("netprofit_percent_sell").innerHTML = (netprofit_percent_sell.toFixed(2)).toString() + "%";


        document.getElementById("gross_profit").innerHTML = "$"+(gross_profit.toFixed(2)).toString();
        document.getElementById("gross_profit_buy").innerHTML = "$"+(gross_profit_buy.toFixed(2)).toString();
        document.getElementById("gross_profit_sell").innerHTML = "$"+(gross_profit_sell.toFixed(2)).toString();

        document.getElementById("gross_profit_percent").innerHTML = (gross_profit_percent.toFixed(2)).toString() + "%";
        document.getElementById("gross_profit_percent_buy").innerHTML = (gross_profit_percent_buy.toFixed(2)).toString() + "%";
        document.getElementById("gross_profit_percent_sell").innerHTML = (gross_profit_percent_sell.toFixed(2)).toString() + "%";



        document.getElementById("gross_loss").innerHTML =  "$"+(gross_loss.toFixed(2)).toString();
        document.getElementById("gross_loss_buy").innerHTML =  "$"+(gross_loss_buy.toFixed(2)).toString();
        document.getElementById("gross_loss_sell").innerHTML =  "$"+(gross_loss_sell.toFixed(2)).toString();

        document.getElementById("gross_loss_percent").innerHTML = (gross_loss_percent.toFixed(2)).toString() + "%";
        document.getElementById("gross_loss_percent_buy").innerHTML = (gross_loss_percent_buy.toFixed(2)).toString() + "%";
        document.getElementById("gross_loss_percent_sell").innerHTML = (gross_loss_percent_sell.toFixed(2)).toString() + "%";

        document.getElementById("max_drawdown_final").innerHTML = (max_drawdown_final.toFixed(2)).toString() + "%";
        document.getElementById("max_drawdown_fig").innerHTML = "$"+(max_drawdown_fig.toFixed(2)).toString();
        
        document.getElementById("buy_hold_return").innerHTML = "$"+(buy_hold_return.toFixed(2)).toString();
        document.getElementById("percDiff_BHR").innerHTML = (percDiff_BHR.toFixed(2)).toString() + "%";
        


        document.getElementById("profit_factor").innerHTML = profit_factor.toFixed(2);
        document.getElementById("profit_factor_buy").innerHTML = profit_factor_buy.toFixed(2);
        document.getElementById("profit_factor_sell").innerHTML = profit_factor_sell.toFixed(2);

        
        document.getElementById("max_contacts_held").innerHTML = max_contacts_held;
        document.getElementById("max_contacts_held_buy").innerHTML = max_contacts_held_buy;
        document.getElementById("max_contacts_held_sell").innerHTML = max_contacts_held_sell;
        document.getElementById("open_pl").innerHTML = open_pl;
        document.getElementById("open_pl_percent").innerHTML = open_pl_percent;
        document.getElementById("commission_paid").innerHTML = "$"+(commission_paid.toFixed(2)).toString();
        document.getElementById("commission_paid_buy").innerHTML = "$"+(commission_paid_buy.toFixed(2)).toString();
        document.getElementById("commission_paid_sell").innerHTML = "$"+(commission_paid_sell.toFixed(2)).toString();
        document.getElementById("total_closed_trades").innerHTML = total_closed_trades;
        document.getElementById("total_closed_trades_buy").innerHTML = total_closed_trades_buy;
        document.getElementById("total_closed_trades_sell").innerHTML = total_closed_trades_sell;
        document.getElementById("total_open_trades").innerHTML = total_open_trades;
        document.getElementById("total_open_trades_buy").innerHTML = total_open_trades_buy;
        document.getElementById("total_open_trades_sell").innerHTML = total_open_trades_sell;
        document.getElementById("number_winning_trades").innerHTML = number_winning_trades;
        document.getElementById("number_winning_trades_buy").innerHTML = number_winning_trades_buy;
        document.getElementById("number_winning_trades_sell").innerHTML = number_winning_trades_sell;
        document.getElementById("number_losing_trades").innerHTML = number_losing_trades;
        document.getElementById("number_losing_trades_buy").innerHTML = number_losing_trades_buy;
        document.getElementById("number_losing_trades_sell").innerHTML = number_losing_trades_sell;

        document.getElementById("percent_profitable").innerHTML = percent_profitable.toFixed(2);
        document.getElementById("percent_profitable_buy").innerHTML = percent_profitable_buy.toFixed(2);
        document.getElementById("percent_profitable_sell").innerHTML = percent_profitable_sell.toFixed(2);

        document.getElementById("avg_trade").innerHTML = "$" + (avg_trade.toFixed(2)).toString();
        document.getElementById("avg_trade_buy").innerHTML = "$" + (avg_trade_buy.toFixed(2)).toString();
        document.getElementById("avg_trade_sell").innerHTML = "$" + (avg_trade_sell.toFixed(2)).toString();
        document.getElementById("avg_trade_percent").innerHTML = (avg_trade_percent.toFixed(2)).toString() + "%";
        document.getElementById("avg_trade_percent_buy").innerHTML = (avg_trade_percent_buy.toFixed(2)).toString() + "%";
        document.getElementById("avg_trade_percent_sell").innerHTML = (avg_trade_percent_sell.toFixed(2)).toString() + "%";
        

        document.getElementById("avg_winning_trade").innerHTML = "$" + (avg_winning_trade.toFixed(2)).toString();
        document.getElementById("avg_winning_trade_buy").innerHTML = "$" + (avg_winning_trade_buy.toFixed(2)).toString();
        document.getElementById("avg_winning_trade_sell").innerHTML = "$" + (avg_winning_trade_sell.toFixed(2)).toString();

        document.getElementById("avg_winning_trade_percent").innerHTML = (avg_winning_trade_percent.toFixed(2)).toString() + "%";
        document.getElementById("avg_winning_trade_percent_buy").innerHTML = (avg_winning_trade_percent_buy.toFixed(2)).toString() + "%";
        document.getElementById("avg_winning_trade_percent_sell").innerHTML = (avg_winning_trade_percent_sell.toFixed(2)).toString() + "%";


        
        
        

        //  ((!isNaN(avg_losing_trade)) ? avg_losing_trade : '0')
        //  ((!isNaN(avg_losing_trade_buy)) ? avg_losing_trade_buy : '0')
        //  ((!isNaN(avg_losing_trade_sell)) ? avg_losing_trade_sell : '0')


        if(!isNaN(avg_losing_trade)){
            document.getElementById("avg_losing_trade").innerHTML =  "$" + (((!isNaN(avg_losing_trade)) ? avg_losing_trade : 0.000).toFixed(2)).toString();
            document.getElementById("avg_losing_trade_buy").innerHTML =  "$" + (((!isNaN(avg_losing_trade_buy)) ? avg_losing_trade_buy : 0.000).toFixed(2)).toString();
            document.getElementById("avg_losing_trade_sell").innerHTML =  "$" + (((!isNaN(avg_losing_trade_sell)) ? avg_losing_trade_sell : 0.000).toFixed(2)).toString();
        }
        
        if(!isNaN(avg_losing_trade_percent)){
            document.getElementById("avg_losing_trade_percent").innerHTML = ( ((!isNaN(avg_losing_trade_percent)) ? avg_losing_trade_percent : 0.000).toFixed(2)).toString() + "%";
            document.getElementById("avg_losing_trade_percent_buy").innerHTML = ( ((!isNaN(avg_losing_trade_percent_buy)) ? avg_losing_trade_percent_buy : 0.000).toFixed(2)).toString() + "%";
            document.getElementById("avg_losing_trade_percent_sell").innerHTML = ( ((!isNaN(avg_losing_trade_percent_sell)) ? avg_losing_trade_percent_sell : 0.000).toFixed(2)).toString() + "%";
        }

        document.getElementById("ratio_avg_win_avg_loss").innerHTML = (ratio_avg_win_avg_loss.toFixed(2)).toString();
        document.getElementById("ratio_avg_win_avg_loss_buy").innerHTML = (ratio_avg_win_avg_loss_buy.toFixed(2)).toString();
        document.getElementById("ratio_avg_win_avg_loss_sell").innerHTML = (ratio_avg_win_avg_loss_sell.toFixed(2)).toString();

        document.getElementById("largest_win").innerHTML = "$" + (largest_win.toFixed(2)).toString();
        document.getElementById("largest_win_buy").innerHTML = "$" + (largest_win_buy.toFixed(2)).toString();
        document.getElementById("largest_win_sell").innerHTML = "$" + (largest_win_sell.toFixed(2)).toString();
        
        document.getElementById("largest_win_percent").innerHTML = (largest_win_percent.toFixed(2)).toString() + "%";
        document.getElementById("largest_win_percent_buy").innerHTML = (largest_win_percent_buy.toFixed(2)).toString() + "%";        
        document.getElementById("largest_win_percent_sell").innerHTML = (largest_win_percent_sell.toFixed(2)).toString() + "%";

        if(!isNaN(largest_lose)){
            document.getElementById("largest_lose").innerHTML =  "$" + (largest_lose.toFixed(2)).toString();
            document.getElementById("largest_lose_buy").innerHTML =  "$" + (largest_lose_buy.toFixed(2)).toString();
            document.getElementById("largest_lose_sell").innerHTML =  "$" + (largest_lose_sell.toFixed(2)).toString();
        }

        if(!isNaN(largest_lose_percent)){
            document.getElementById("largest_lose_percent").innerHTML = (largest_lose_percent.toFixed(2)).toString() + "%";
            document.getElementById("largest_lose_percent_buy").innerHTML = (largest_lose_percent_buy.toFixed(2)).toString() + "%";        
            document.getElementById("largest_lose_percent_sell").innerHTML = (largest_lose_percent_sell.toFixed(2)).toString() + "%";
        }

        document.getElementById("avg_bars_in_trades").innerHTML = avg_bars_in_trades;
        document.getElementById("avg_bars_in_trades_buy").innerHTML = avg_bars_in_trades_buy;
        document.getElementById("avg_bars_in_trades_sell").innerHTML = avg_bars_in_trades_sell;
        document.getElementById("avg_bars_in_winning").innerHTML = avg_bars_in_winning;
        document.getElementById("avg_bars_in_winning_buy").innerHTML = avg_bars_in_winning_buy;
        document.getElementById("avg_bars_in_winning_sell").innerHTML = avg_bars_in_winning_sell;
        document.getElementById("avg_bars_in_losing").innerHTML = avg_bars_in_losing;
        document.getElementById("avg_bars_in_losing_buy").innerHTML = avg_bars_in_losing_buy;
        document.getElementById("avg_bars_in_losing_sell").innerHTML = avg_bars_in_losing_sell;

        document.getElementById("margin_calls").innerHTML = margin_calls;
        document.getElementById("margin_calls_buy").innerHTML = margin_calls_buy;
        document.getElementById("margin_calls_sell").innerHTML = margin_calls_sell;

      
    }
    
    function toTimestamp(strDate){
        var datum = Date.parse(strDate);
        // console.log(datum);
        return datum/1000;
    }

    function unixToNormalDate(strDate){
        
        let unix_timestamp = strDate;
        // Create a new JavaScript Date object based on the timestamp
        // multiplied by 1000 so that the argument is in milliseconds, not seconds.
        var date = new Date(unix_timestamp * 1000);

        //Year
        var year = date.getMonth();
        
        //Month
        var month = date.getFullYear();

        //Day
        var day = date.getDay();

        // Hours part from the timestamp
        var hours = date.getHours();
        // Minutes part from the timestamp
        var minutes = "0" + date.getMinutes();
        // Seconds part from the timestamp
        var seconds = "0" + date.getSeconds();

        // Will display time in 10:30:23 format
        var formattedTime = month + "/" + day + "/" + year + " " + hours + ':' + minutes.substr(-2);

        // console.log(formattedTime);

        return formattedTime;

    }

    function drawLineChart(ctx,equity_figure_arr,mark_down_arr,time){
        
        if(lineChart instanceof Chart){ 
            lineChart.data.labels=time
            lineChart.data.datasets[0].data=equity_figure_arr;
            lineChart.data.datasets[1].data=mark_down_arr;
            lineChart.update();
        }else{
                                            
        }

    }

    function getColumn(anArray, columnName) {
        return anArray.map(function(row) {
            // return unixToNormalDate(row[columnName]);
            return row[columnName];
        });
    }
</script>