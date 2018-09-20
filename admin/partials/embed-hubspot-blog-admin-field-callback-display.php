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
<?php

    $value = get_option( $arguments['uid'] ); // Get the current value

    if ( ! $value )  {

        $value = $arguments['default'];

    }

    switch ( $arguments['type'] ) {

        case 'text':

            printf( '<input name="%1$s id="%1$s" type="%2$s" placeholder="%3$s" value="%4$s">', $arguments['uid'], $arguments['type'], $arguments['placeholder'], $value );

            break;

        case 'textarea':

            printf( '<textarea name="%1$s" id="%1$s" placeholder="%2$s" rows="5" cols="50">%3$s</textarea>', $arguments['uid'], $arguments['placeholder'], $value );

            break;

        case 'select':

            if ( ! empty( $arguments['options'] ) && is_array( $arguments['options'] ) ) {

                $options_markup = '';

                foreach ( $arguments['options'] as $key => $label ) {

                    $options_markup .= sprintf( '<option value="%s" %s>%s</option>', $key, selected( $value, $key, false ), $label );

                }

                printf( '<select name="%1$s" id="%1$s">%2$s</select>', $arguments['uid'], $options_markup );

            }

            break;

    }

    if ( $helper = $arguments['helper'] ) {

        printf( '<span class="helper">%s</span>', $helper );

    }

    if ( $supplemental = $arguments['supplemental'] ) {

        printf( '<p class="description">%s</p>', $supplemental );

    }

?>