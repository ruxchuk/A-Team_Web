<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Administrator
 * Date: 26/9/2556
 * Time: 15:31 น.
 * To change this template use File | Settings | File Templates.
 */
$baseUrl = base_url();
$webUrl = $this->Constant_model->webUrl();
$arrLinkWebSite = $this->Link_website_model->getAllLink();

?>


<!--module link-->
<div class="module">
    <div>
        <div>
            <div>
                <h3>LINK ที่เกี่ยวข้อง</h3>
                <fieldset class="input">
                    <ul>
                        <?php
                        $strOldGroup = "";
                        foreach ($arrLinkWebSite as $key => $value) :
                        $strLink = $webUrl . "index/openWeb/" . $value->id;
                        if ($value->link_group != $strOldGroup):
                        $strOldGroup = $value->link_group;
                        ?>
                    </ul>
                    <span class="link-group"><?php echo $value->link_group; ?></span>
                    <ul class="ul-link">
                        <li><a target="_blank" href="<?php echo $strLink; ?>">
                                <?php echo $value->name; ?></a> (<?php echo $value->count_click; ?>)
                        </li>
                        <?php else: ?>
                            <li><a target="_blank" href="<?php echo $strLink; ?>">
                                    <?php echo $value->name; ?></a> (<?php echo $value->count_click; ?>)
                            </li>
                        <?php
                        endif;
                        endforeach;
                        ?>
                    </ul>
                </fieldset>
            </div>
        </div>
    </div>
</div>
<div class="cleaner">&nbsp;</div>