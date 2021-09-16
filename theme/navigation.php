<div class="sidebar">
    <div class="brand-logo">
        <a href="index.php?pg=dashboard"><img src="media/images/logoi.png" alt="" width="30">
        </a>
    </div>
    <div class="menu">
        <ul>
            <li>
                <a href="index.php?pg=dashboard" data-toggle="tooltip" data-placement="right" title="Home">
                    <span><i class="icofont-ui-home"></i></span>
                </a>
            </li>
            <li><a href="<?php echo $nav->navigate('strategies','');?>" data-toggle="tooltip" data-placement="right" title="Trade">
                    <span><i class="icofont-exchange"></i></span>
                </a>
            </li>
            <li><a href="<?php echo $nav->navigate('wallet','');?>" data-toggle="tooltip" data-placement="right" title="Wallet">
                    <span><i class="icofont-wallet"></i></span>
                </a>
            </li>
            <li><a href="<?php echo $nav->navigate('settings','');?>" data-toggle="tooltip" data-placement="right" title="Settings">
                    <span><i class="icofont-settings"></i></span>
                </a>
            </li>
            <li class="logout"><a href="#" onclick="logout()" data-toggle="tooltip" data-placement="right"
                    title="Signout">
                    <span><i class="icofont-power"></i></span>
                </a>
            </li>
        </ul>

        <p class="copyright">
            &#169; <a href="#">CodeeFly</a>
        </p>
    </div>
</div>