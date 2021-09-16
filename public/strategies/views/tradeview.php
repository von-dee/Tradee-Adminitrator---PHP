

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
                                <tbody>

                                    <?php
                                        if(count($result) > 0 ){
                                            $i = 1;
                                            
                                            foreach ($result as $val){
                                            
                                        ?>

                                    <tr>
                                    <td data-th="Wallet">
                                            <span class="bt-content">
                                                <?php echo $i; ?>
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
                                                                echo $val['TRD_ENTRY_SIGNAL'];
                                                            }else if($val['TRD_ENTRY_SIGNAL'] == "Sell"){
                                                        ?>
                                                            <span class="danger-arrow">
                                                                <i class="icofont-arrow-down"></i>
                                                            </span>
                                                            
                                                        <?php
                                                                echo $val['TRD_ENTRY_SIGNAL'];
                                                            }
                                                        ?>
                                                
                                            </span>
                                        </td>
                                        <td data-th="Wallet">
                                            <span class="bt-content">
                                                <?php echo $val['TRD_ENTRY_TYPE']; ?>
                                            </span>
                                        </td>
                                        <td data-th="Amount">
                                            <span class="bt-content">
                                                <?php echo $val['TRD_ENTRY_DATETIME']; ?>
                                            </span>
                                        </td>
                                        <td data-th="Balance">
                                            <span class="bt-content"><?php echo $val['TRD_EXIT_TYPE']; ?></span>
                                        </td>
                                        <td data-th="Balance">
                                            <span class="bt-content"><?php echo $val['TRD_EXIT_SIGNAL']; ?></span>
                                        </td>
                                        <td data-th="Balance">
                                            <span class="bt-content"><?php echo $val['TRD_EXITTRIGGER']; ?></span>
                                        </td>
                                        <td data-th="Balance">
                                            <span class="bt-content"><?php echo $val['TRD_EXIT_DATETIME']; ?></span>
                                        </td>
                                        <td data-th="Balance">
                                            <span class="bt-content"><?php echo $val['TRD_PRICE']; ?></span>
                                        </td>
                                        <td data-th="Balance">
                                            <span class="bt-content"><?php echo $val['TRD_CONTRACTS']; ?></span>
                                        </td>
                                        <td data-th="Balance">
                                            <span class="bt-content"><?php echo $val['TRD_PROFIT']; ?></span>
                                        </td>
                                        <td data-th="Balance">
                                            <span class="bt-content"><?php echo $val['TRD_CUMPROFIT']; ?></span>
                                        </td>
                                        <td data-th="Balance">
                                            <span class="bt-content"><?php echo $val['TRD_RUNUP']; ?></span>
                                        </td>
                                        <td data-th="Balance">
                                            <span class="bt-content"><?php echo $val['TRD_DRAWDOWN']; ?></span>
                                        </td>
                                        
                                        <td data-th="Balance">
                                            <span class="bt-content"><?php echo $val['TRD_DATEADDED']; ?></span>
                                        </td>
                                        

                                    </tr>

                                    <?php
                                                $i = $i + 1;
                                            }
                                            
                                        }
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