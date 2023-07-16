
<?php

    $live_agents = get_online_agents();


    if( !empty($live_agents) ):

        $agent_channels = $live_agents['details'];

        ?>
        <h4>
            Live Agents
            <svg class="blink_me" width="10px" height="10px"> <circle cx="5" cy="5" r="5" fill="var(--logo_blue)" /> </svg>
        </h4>
        <ul>
            <?php
                foreach ( $live_agents['names'] as $key=>$live_agent ):
                    $chatStatus = $agent_channels[$key]->chatStatus;
                    $phoneStatus = $agent_channels[$key]->phoneStatus;
                    $mailStatus = $agent_channels[$key]->mailStatus;
                    $presenceStatus = $agent_channels[$key]->presenceStatus;
            ?>
            <li>
                <span> <?php echo $live_agent;?> </span>
                <div class="channels">
                    <i class="<?php echo ($presenceStatus === 'ONLINE') ? 'active' : ''; ?> bb-icon-l fa-life-ring"></i>
                    <i class="<?php echo ($phoneStatus === 'ONLINE') ? 'active' : ''; ?> bb-icon-l bb-icon-phone"></i>
                    <i class="<?php echo ($chatStatus === 'ONLINE') ? 'active' : ''; ?> bb-icon-l bb-icon-comment-dots"></i>
                    <i class="<?php echo ($mailStatus === 'ONLINE') ? 'active' : ''; ?> bb-icon-l bb-icon-envelope"></i>
                </div>

            </li>
            <?php endforeach; ?>
        </ul>


    <?php
    else:
        echo '<span> No live agents available right now. </span>';
    endif;
