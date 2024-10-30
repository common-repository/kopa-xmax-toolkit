<div id="kopa_icon_picker" class="kopa_visual_shortcode">
    <div class="kopa_shortcode_field row clearfix">       
        <div class="col-sm-12">
            <h3 class="kopa_shortcode_caption"><?php _e('Icons picker', 'kopa-shortcodes'); ?></h3>
        </div>
    </div>

    <div class="kopa_shortcode_inline">
        <div class="kopa_shortcode_field row clearfix">
            <div class="col-xs-12"> 
                <?php
                $icons = KopaIcon::getIconList();

                $onclick_function = 'KopaUI.select_icon';
                if (isset($_GET['is_shortcode']) && 'true' == $_GET['is_shortcode']) {
                    $onclick_function = 'KopaShortcode.select_icon';
                }

                echo '<div class="kopa-ui-icon-list-wrap">';
                ?>
                <input type="text" value="" placeholder="<?php _e('filter', kopa_get_domain()); ?>" style="width: 100% !important;" class="form-control" onkeyup="KopaUI.filter_icon(event, jQuery(this));">                    
                
                <div class="row clearfix">
                    <?php
                    foreach ($icons as $icon):
                        $name = trim(str_replace('fa fa-', '', $icon));
                        ?>
                        <div class="col-xs-4 col-sm-3 kopa-ui-icon-item" data-icon="<?php echo $icon; ?>">
                            <a href="#" rel="nofollow" onclick="<?php printf("%s(event, jQuery(this), '%s');", $onclick_function, $icon); ?>" title="<?php echo $name; ?>"><i class="<?php echo $icon; ?>"></i><span><?php echo $name; ?></span></a>
                        </div>                        
                    <?php endforeach; ?>                    
                </div>
            </div>
        </div>
    </div>
</div>