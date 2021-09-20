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
                                        <span>4.66%</span><br>
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
                                        <b id="ld_profit_factor">11.128</b><br>
                                        <span></span><br>
                                        <span  class="small">Profit Factor</span><br>
                                    </div>
                                    <div class="col-2">
                                        <b id="ld_max_drawdown">$0.18</b><br>
                                        <span>0.09%</span><br>
                                        <span class="small">Max Drawdown</span><br>
                                    </div>
                                    <div class="col-2">
                                        <b id="ld_avg_trade">$0.12</b><br>
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
                                                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                                                datasets: [
                                                {
                                                    label: "Trade Graph",
                                                    fill: false,
                                                    borderColor: "#009EFF",
                                                    // borderDash: [5, 5],
                                                    backgroundColor: "#90D1FF",
                                                    pointBackgroundColor: "#55bae7",
                                                    pointBorderColor: "#55bae7",
                                                    pointHoverBackgroundColor: "#55bae7",
                                                    pointHoverBorderColor: "#55bae7",
                                                    data: [10,8,6,5,12,8,16,17,6,7,6,10]
                                                },
                                                {
                                                    label: "Trade Graph",
                                                    fill: false,
                                                    borderColor: "#FF4200",
                                                    // borderDash: [5, 5],
                                                    backgroundColor: "#FF8E66",
                                                    pointBackgroundColor: "#55bae7",
                                                    pointBorderColor: "#55bae7",
                                                    pointHoverBackgroundColor: "#55bae7",
                                                    pointHoverBorderColor: "#55bae7",
                                                    data: [6,9,7,13,3,14,5,7,12,17,9,10],
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
                                        <span id="" class="small">30.96 %</span><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="">$ 0</span><br>
                                        <span id="" class="small">14.16 %</span><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="">$ 0</span><br>  
                                        <span id="" class="small">16.81 %</span><br>
                                    </div>
                                </div>

                                <div class="row row_margin">
                                    <div class="col-6">
                                        <b>Gross Profit	</b><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="gross_profit">$0</span><br>
                                        <span id="" class="small">34.46 %</span><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="gross_profit_buy">$0</span><br>
                                        <span id="" class="small">16.28 %</span><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="gross_profit_sell">$0</span><br>  
                                        <span id="" class="small">18.19 %</span><br>
                                    </div>
                                </div>

                                <div class="row row_margin">
                                    <div class="col-6">
                                        <b>Gross Loss</b><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="gross_loss">$ 7.00</span><br>
                                        <span id="" class="small">3.5 %</span><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="gross_loss_buy">$ 4.24</span><br>
                                        <span id="" class="small">2.12 %</span><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="gross_loss_sell">$ 2.77</span><br>  
                                        <span id="" class="small">1.38 %</span><br>
                                    </div>
                                </div>

                                <div class="row row_margin">
                                    <div class="col-6">
                                        <b>Max Drawdown	</b><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="max_drawdown_final">$ 0.69</span><br>
                                        <span id="" class="small">0.27 %</span><br>
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
                                        <span id="buy_hold_return">$</span><br>
                                        <span id="" class="small">5.14 %</span><br>
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
                                        <span id="commission_paid">$ 39.68</span><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="commission_paid_buy">$ 19.93</span><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="commission_paid_sell">$ 19.74</span><br>  
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
                                        <span id="avg_trade"></span><br>
                                        <span id="" class="small">zzz 0.07 %</span><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="">zzz $ 0.13</span><br>
                                        <span id="" class="small">zzz 0.06 %</span><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="">zzz $ 0.15</span><br>  
                                        <span id="" class="small">zzz 0.07 %</span><br>
                                    </div>
                                </div>

                                <div class="row row_margin">
                                    <div class="col-6">
                                        <b>Avg Winning Trade</b><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="avg_winning_trade"></span><br>
                                        <span id="" class="small">zzz 09 %</span><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="avg_winning_trade_buy"></span><br>
                                        <span id="" class="small">zzz 1 %</span><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="avg_winning_trade_sell"></span><br>  
                                        <span id="" class="small">zzz 08 %</span><br>
                                    </div>
                                </div>

                                <div class="row row_margin">
                                    <div class="col-6">
                                        <b>Avg Losing Trade</b><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="avg_losing_trade ="></span><br>
                                        <span id="" class="small">zzz 0.16%</span><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="avg_losing_trade_buy"></span><br>
                                        <span id="" class="small">zzz 0.03 %</span><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="avg_losing_trade_sell"></span><br>  
                                        <span id="" class="small">zzz 0.02 %</span><br>
                                    </div>
                                    
                                </div>

                                <div class="row row_margin">
                                    <div class="col-6">
                                        <b>Ratio Avg Win / Avg Loss</b><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="ratio_avg_win_avg_loss"></span><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="ratio_avg_win_avg_loss_buy"></span><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="ratio_avg_win_avg_loss_sell"></span><br>  
                                    </div>
                                </div>

                                <div class="row row_margin">
                                    <div class="col-6">
                                        <b>Largest Winning Trade</b><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="largest_win"></span><br>
                                        <span id="" class="small">zzz 0.16%</span><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="largest_win_buy"></span><br>
                                        <span id="" class="small">zzz 0.66%</span><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="largest_win_sell"></span><br>  
                                        <span id="" class="small">zzz 0.66%</span><br>
                                    </div>
                                </div>

                                <div class="row row_margin">
                                    <div class="col-6">
                                        <b>Largest Losing Trade</b><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="largest_lose"></span><br>
                                        <span id="" class="small">zzz 0.16%</span><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="">0.66</span><br>
                                        <span id="" class="small">zzz 0.66%</span><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="">0.66</span><br>  
                                        <span id="" class="small">zzz 0.66%</span><br>
                                    </div>
                                </div>
                                


                                <div class="row row_margin">
                                    <div class="col-6">
                                        <b>Avg # Bars in Trades</b><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="avg_bars_in_trades"></span><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="avg_bars_in_trades_buy"></span><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="avg_bars_in_trades_sell"></span><br>  
                                    </div>
                                </div>

                                <div class="row row_margin">
                                    <div class="col-6">
                                        <b>Avg # Bars in Winning Trades</b><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="avg_bars_in_winning"></span><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="avg_bars_in_winning_buy"></span><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="avg_bars_in_winning_sell"></span><br>  
                                    </div>
                                </div>

                                <div class="row row_margin">
                                    <div class="col-6">
                                        <b>Avg # Bars in Losing Trades</b><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="avg_bars_in_losing"></span><br>
                                        <span id="" class="small">zzz 0.16%</span><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="avg_bars_in_losing_buy"></span><br>
                                        <span id="" class="small">zzz 0.66%</span><br>
                                    </div>
                                    <div class="col-2">
                                        <span id="avg_bars_in_losing_sell"></span><br>  
                                        <span id="" class="small">zzz 0.66%</span><br>
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


        
        var initial_deposit = 200;
        var total_profit_percent = 0;
        var total_number_of_trades = val.length;
        var contract_size = 50;
        var total_profit_percent_wins = 0;
        var total_profit_percent_loses = 0;
        var max_drawdown = 0;

        var first_trade_close = val[0];
        var last_trade_close = val[val.length-1];
        var percDiff_BHR =  100 * (first_trade_close - last_trade_close) / ( (first_trade_close+last_trade_close)/2 );

        var percent_wins = 0;
        var percent_loses = 0;

        var percent_wins_buy = 0;
        var percent_loses_sell = 0;

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

        var arr_times = [];

        for (const i in val) {
            if (Object.hasOwnProperty.call(val, i)) {
                var element = val[i];

                // console.log("element");
                // console.log(element);




                total_profit_percent = total_profit_percent + parseFloat(element.TRD_PROFIT);
                
                if(parseFloat(element.TRD_PROFIT)>0){
                    percent_wins = parseFloat(element.TRD_PROFIT);
                }else if(parseFloat(element.TRD_PROFIT)<0){
                    percent_loses = parseFloat(element.TRD_PROFIT);
                }

                total_profit_percent_wins  = total_profit_percent_wins + percent_wins;
                total_profit_percent_loses  = total_profit_percent_loses + percent_loses;

                
                if(max_drawdown > parseFloat(element.TRD_DRAWDOWN)){
                    max_drawdown = parseFloat(element.TRD_DRAWDOWN);
                }


                // Plot View
                if(element.TRD_ENTRY_SIGNAL == "Buy"){
                    entrysignal = '<span class="success-arrow"><i class="icofont-arrow-up"></i></span>'+element.TRD_ENTRY_SIGNAL;
                    
                    if(parseFloat(element.TRD_PROFIT)>0){
                        percent_wins_buy = parseFloat(element.TRD_PROFIT);
                        winning_trades_buy = winning_trades_buy + 1;
                        
                        if(largest_win_buy < parseFloat(element.TRD_PROFIT)){
                            largest_win_buy = parseFloat(element.TRD_PROFIT);
                        }                        

                    }else if(parseFloat(element.TRD_PROFIT)<0){
                        percent_loses_buy = parseFloat(element.TRD_PROFIT);
                        losing_trades_buy = winning_trades_buy + 1;

                        if(largest_lose_buy > parseFloat(element.TRD_PROFIT)){
                            largest_lose_buy = parseFloat(element.TRD_PROFIT);
                        }
                        
                    }
                    
                    total_buy_profit_percent_wins  = total_buy_profit_percent_wins + percent_wins_buy;
                    total_buy_profit_percent_loses  = total_buy_profit_percent_loses + percent_loses_buy;

                    total_number_of_trades_buy = total_number_of_trades_buy + 1;

                }else if(element.TRD_ENTRY_SIGNAL == "Sell"){
                    entrysignal = '<span class="danger-arrow"><i class="icofont-arrow-down"></i></span>'+element.TRD_ENTRY_SIGNAL;

                    if(parseFloat(element.TRD_PROFIT)>0){
                        percent_wins_sell = parseFloat(element.TRD_PROFIT);
                        winning_trades_sell = winning_trades_sell + 1;
                        
                        if(largest_win_sell < parseFloat(element.TRD_PROFIT)){
                            largest_win_sell = parseFloat(element.TRD_PROFIT);
                        }
                        

                    }else if(parseFloat(element.TRD_PROFIT)<0){
                        percent_loses_sell = parseFloat(element.TRD_PROFIT);
                        losing_trades_sell = winning_trades_sell + 1;

                        if(largest_lose_sell > parseFloat(element.TRD_PROFIT)){
                            largest_lose_sell = parseFloat(element.TRD_PROFIT);
                        }
                        

                    }

                    total_sell_profit_percent_wins  = total_sell_profit_percent_wins + percent_wins_sell;
                    total_sell_profit_percent_loses  = total_sell_profit_percent_loses + percent_loses_sell;

                    
                    total_number_of_trades_sell = total_number_of_trades_sell + 1;

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

                // console.log("element.TRD_ENTRY_DATETIME");
                var datefm = element.TRD_ENTRY_DATETIME;
                
                

                for (var ii = 0; ii < timeData.length; ii++) {

                    if ((timeData[ii].time === toTimestamp(datefm.substring(0,16)+":00")) && arr_times.includes(unixToNormalDate(timeData[ii].time)) == false) {
                        // if(markers.some(item => item.time !== timeData[ii].time) ){

                        arr_times.push(unixToNormalDate(timeData[ii].time));

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
            }
           
          
               
                // // markers.push({ time: data[data.length - 48].time, position: 'aboveBar', color: '#f68410', shape: 'circle', text: 'D' });
           
        }  

        // Net Profit
        var netprofit = (initial_deposit/100) * total_profit_percent - (total_number_of_trades * 2*((contract_size/100) * 0.1)));
        var netprofit_percent = total_profit_percent;
        

        // Gross Profit	
        var gross_profit = (initial_deposit/100) * total_profit_percent_wins;
        var gross_profit_buy = (initial_deposit/100) * total_buy_profit_percent_wins;
        var gross_profit_sell = (initial_deposit/100) * total_sell_profit_percent_wins;



        // Gross Loss
        var gross_loss = (initial_deposit/100) * total_profit_percent_loses;
        var gross_loss_buy = (initial_deposit/100) * total_buy_profit_percent_loses;
        var gross_loss_sell = (initial_deposit/100) * total_sell_profit_percent_loses;



        // Max Drawdown	
        var max_drawdown_final = max_drawdown;



        // Buy & Hold Return	
        var buy_hold_return = (contract_size/100) * percDiff_BHR;

        // Sharpe Ratio
        // Sortino Ratio

        // Profit Factor
        var profit_factor = (gross_profit/gross_loss);
        var profit_factor_buy = (gross_profit_buy/gross_loss_buy);
        var profit_factor_sell = (gross_profit_sell/gross_loss_sell);

        // Max Contracts Held
        var max_contacts_held = 0
        var max_contacts_held_buy = 0
        var max_contacts_held_sell = 0

        // Open PL	
        var open_pl = 0;
        var open_pl_percent = 0

        // Commission Paid
        var commission_paid = total_number_of_trades * (contract_size/100 * 0.1);
        var commission_paid_buy = total_number_of_trades_buy * (contract_size/100 * 0.1);
        var commission_paid_sell = total_number_of_trades_sell * (contract_size/100 * 0.1);


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


        // Avg Winning Trade
        var avg_winning_trade = gross_profit/number_winning_trades;
        var avg_winning_trade_buy = gross_profit_buy/number_winning_trades_buy;
        var avg_winning_trade_sell = gross_profit_sell/number_winning_trades_sell;

        
        // Avg Losing Trade
        var avg_losing_trade = gross_loss/number_losing_trades;
        var avg_losing_trade_buy = gross_loss_buy/number_losing_trades_buy;
        var avg_losing_trade_sell = gross_loss_sell/number_losing_trades_sell;


        // Ratio Avg Win / Avg Loss
        var ratio_avg_win_avg_loss = avg_winning_trade/avg_losing_trade;
        var ratio_avg_win_avg_loss_buy = avg_winning_trade_buy/avg_losing_trade_buy;
        var ratio_avg_win_avg_loss_sell = avg_winning_trade_sell/avg_losing_trade_sell;


        // Largest Winning Trade
        largest_win = 0; //fix
        largest_win_buy = (contract_size/100 * largest_win_buy);
        largest_win_sell = (contract_size/100 * largest_win_sell);


        // Largest Losing Trade
        largest_lose = 0; //fix
        largest_lose_buy = (contract_size/100 * largest_lose_buy);
        largest_lose_sell = (contract_size/100 * largest_lose_sell);
        

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

        console.log("ld_netprofit");
        console.log(ld_netprofit);

        document.getElementById("databody").innerHTML = str;

        document.getElementById("ld_netprofit").innerHTML = "$"+(netprofit.toFixed(2)).toString();
        document.getElementById("ld_total_closed_trades").innerHTML = total_closed_trades;
        document.getElementById("ld_percent_profitable").innerHTML = (percent_profitable.toFixed(2)).toString()+"%";
        document.getElementById("ld_profit_factor").innerHTML = profit_factor.toFixed(2);
        document.getElementById("ld_max_drawdown").innerHTML = max_drawdown.toFixed(2);
        document.getElementById("ld_avg_trade").innerHTML = avg_trade.toFixed(2);


        document.getElementById("netprofit").innerHTML = netprofit;
        document.getElementById("gross_profit").innerHTML = gross_profit;
        document.getElementById("gross_profit_buy").innerHTML = gross_profit_buy;
        document.getElementById("gross_profit_sell").innerHTML = gross_profit_sell;
        document.getElementById("gross_loss").innerHTML = gross_loss;
        document.getElementById("gross_loss_buy").innerHTML = gross_loss_buy;
        document.getElementById("gross_loss_sell").innerHTML = gross_loss_sell;
        document.getElementById("max_drawdown_final").innerHTML = max_drawdown_final;
        document.getElementById("buy_hold_return").innerHTML = buy_hold_return;
        document.getElementById("profit_factor").innerHTML = profit_factor;
        document.getElementById("profit_factor_buy").innerHTML = profit_factor_buy;
        document.getElementById("profit_factor_sell").innerHTML = profit_factor_sell;
        document.getElementById("max_contacts_held").innerHTML = max_contacts_held;
        document.getElementById("max_contacts_held_buy").innerHTML = max_contacts_held_buy;
        document.getElementById("max_contacts_held_sell").innerHTML = max_contacts_held_sell;
        document.getElementById("open_pl").innerHTML = open_pl;
        document.getElementById("open_pl_percent").innerHTML = open_pl_percent;
        document.getElementById("commission_paid").innerHTML = commission_paid;
        document.getElementById("commission_paid_buy").innerHTML = commission_paid_buy;
        document.getElementById("commission_paid_sell").innerHTML = commission_paid_sell;
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
        document.getElementById("percent_profitable").innerHTML = percent_profitable;
        document.getElementById("percent_profitable_buy").innerHTML = percent_profitable_buy;
        document.getElementById("percent_profitable_sell").innerHTML = percent_profitable_sell;
        document.getElementById("avg_trade").innerHTML = avg_trade;
        document.getElementById("avg_winning_trade").innerHTML = avg_winning_trade;
        document.getElementById("avg_winning_trade_buy").innerHTML = avg_winning_trade_buy;
        document.getElementById("avg_winning_trade_sell").innerHTML = avg_winning_trade_sell;
        document.getElementById("avg_losing_trade").innerHTML = avg_losing_trade;
        document.getElementById("avg_losing_trade_buy").innerHTML = avg_losing_trade_buy;
        document.getElementById("avg_losing_trade_sell").innerHTML = avg_losing_trade_sell;
        document.getElementById("ratio_avg_win_avg_loss").innerHTML = ratio_avg_win_avg_loss;
        document.getElementById("ratio_avg_win_avg_loss").innerHTML = ratio_avg_win_avg_loss;
        document.getElementById("ratio_avg_win_avg_loss").innerHTML = ratio_avg_win_avg_loss;
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
    

</script>