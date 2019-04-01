<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://jolvera.biz
 * @since      1.0.0
 *
 * @package    Embed_Hubspot_Blog
 * @subpackage Embed_Hubspot_Blog/public/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<article class="embedhb-entry">
    <header class="embedhb-entry-header">
        <h2 class="embedhb-entry-title">
            <a href="<?php echo esc_url( $item->get_permalink() ); ?>" title="<?php echo esc_attr( $item->get_title() ); ?>">
                <?php echo esc_html( $item->get_title() ); ?>
            </a>
        </h2>

        <div class="embedhb-entry-meta">
            <?php $this->posted_on( $item ); ?>
        </div> <!-- .entry-meta -->
    </header> <!-- .entry-header -->

    <div class="embedhb-entry-content">
        <?php echo wp_kses_post( $item->get_description() ); ?>
    </div> <!-- .entry-content -->

    <footer class="embedhb-entry-footer">
        <a class="embedhb-entry-button embedhb-entry-link" href="<?php echo esc_url( $item->get_permalink() ); ?>" title="<?php echo esc_attr( $item->get_title() ); ?>">
            <?php printf('Read More', 'embed_hubspot_blog'); ?>
        </a> <!-- .embedhb-entry-button -->
    </footer> <!-- .embedhb-entry-footer -->
</article> <!-- .embedhb-entry -->