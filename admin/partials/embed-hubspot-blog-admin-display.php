<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://jolvera.biz
 * @since      1.0.0
 *
 * @package    Embed_Hubspot_Blog
 * @subpackage Embed_Hubspot_Blog/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<div class="wrap">
    <h2>Embed HubSpot Blog</h2>

    <form method="post" action="options.php">
        <?php
            settings_fields( 'embed_hubspot_blog_fields' );
            do_settings_sections( 'embed_hubspot_blog_fields' );

            submit_button();
        ?>
    </form>
</div> <!-- .wrap -->