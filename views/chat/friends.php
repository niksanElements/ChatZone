<?php
foreach ($this->friends as $friend):
    ?>
    <li>
        <div onclick="tap('<?=$friend['userName']?>',<?=$friend['id']?>)" class="item btn">
                    <span class="item-left">
                        <img src="" alt="" />
                        <span class="item-info">
                            <span><?=$friend['userName']?></span>
                        </span>
                        <span><?php if($friend['online']) echo "&diams;";?></span>
                    </span>
        </div>
    </li>
    <?php
endforeach;
?>
