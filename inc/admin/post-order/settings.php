<?php


if ( ! defined( 'ABSPATH' ) ) exit; // Bail if accessed directly


$order_options = get_option('order_options');
$order_objects = isset($order_options['objects']) ? $order_options['objects'] : array();
$order_tags = isset($order_options['tags']) ? $order_options['tags'] : array();
?>

<div class="wrap">
    <?php screen_icon('plugins'); ?>
    <h2>Custom Post Order Settings</h2>
    <?php if (isset($_GET['msg'])) : ?>
        <div id="message" class="updated below-h2">
            <?php if ($_GET['msg'] == 'update') : ?>
                <p><?php _e('Settings Updated.','order'); ?></p>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <form method="post">

        <?php if (function_exists('wp_nonce_field')) wp_nonce_field('nonce_order'); ?>

        <div id="order_select_objects">

            <table class="form-table">
                <tbody>
                    <tr valign="top">
                        <th scope="row"><?php _e('Check to Sort Post Types', 'order') ?></th> 
                        <td>
                            <label><input type="checkbox" id="order_allcheck_objects"> <?php _e('Check All', 'order') ?></label><br>
                            <?php
                            $post_types = get_post_types(array(
                                'show_ui' => true,
                                'show_in_menu' => true,
                                    ), 'objects');

                            foreach ($post_types as $post_type) {
                                if ($post_type->name == 'attachment')
                                    continue;
                                ?>
                                <label><input type="checkbox" name="objects[]" value="<?php echo $post_type->name; ?>" <?php
                                    if (isset($order_objects) && is_array($order_objects)) {
                                        if (in_array($post_type->name, $order_objects)) {
                                            echo 'checked="checked"';
                                        }
                                    }
                                    ?>>&nbsp;<?php echo $post_type->label; ?></label><br>
                                    <?php
                                }
                                ?>
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>


        <div id="order_select_tags">
            <table class="form-table">
                <tbody>
                    <tr valign="top">
                        <th scope="row"><?php _e('Check to Sort Taxonomies', 'order') ?></th> 
                        <td>
                            <label><input type="checkbox" id="order_allcheck_tags"> <?php _e('Check All', 'order') ?></label><br>
                            <?php
                            $taxonomies = get_taxonomies(array(
                                'show_ui' => true,
                                    ), 'objects');

                            foreach ($taxonomies as $taxonomy) {
                                if ($taxonomy->name == 'post_format')
                                    continue;
                                ?>
                                <label><input type="checkbox" name="tags[]" value="<?php echo $taxonomy->name; ?>" <?php
                                    if (isset($order_tags) && is_array($order_tags)) {
                                        if (in_array($taxonomy->name, $order_tags)) {
                                            echo 'checked="checked"';
                                        }
                                    }
                                    ?>>&nbsp;<?php echo $taxonomy->label ?></label><br>
                                    <?php
                                }
                                ?>
                        </td>
                    </tr>
                </tbody>
            </table>

        </div> 
        <p class="submit">
            <input type="submit" class="button-primary" name="order_submit" value="<?php _e('Update', 'order'); ?>">
        </p>

    </form>
</div>

<script>
    (function ($) {

        $("#order_allcheck_objects").on('click', function () {
            var items = $("#order_select_objects input");
            if ($(this).is(':checked'))
                $(items).prop('checked', true);
            else
                $(items).prop('checked', false);
        });

        $("#order_allcheck_tags").on('click', function () {
            var items = $("#order_select_tags input");
            if ($(this).is(':checked'))
                $(items).prop('checked', true);
            else
                $(items).prop('checked', false);
        });

    })(jQuery)
</script>