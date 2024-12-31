<?php
/**
 * Collection of functions to sanitize customizer field values.
 *
 * @package Fascinate
 */


/**
 * Sanitization callback function for number field with value in range.
 */
if ( ! function_exists( 'fascinate_sanitize_range' ) ) {

    function fascinate_sanitize_range( $input, $setting ) {

        if(  $input <= $setting->manager->get_control( $setting->id )->input_attrs['max'] ) {

            if( $input >= $setting->manager->get_control( $setting->id )->input_attrs['min'] ) {

                return absint( $input );
            }
        }
    }
}


/**
 * Sanitization callback function for number field.
 */
if ( ! function_exists( 'fascinate_sanitize_number' ) ) {

    function fascinate_sanitize_number( $input, $setting ) {

        return absint( $input );
    }
}


/**
 * Sanitization callback function for select field.
 */
if ( !function_exists('fascinate_sanitize_select') ) {

    function fascinate_sanitize_select( $input, $setting ) {

        $input = sanitize_key( $input );
        
        $choices = $setting->manager->get_control( $setting->id )->choices;
        
        return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
    }
}