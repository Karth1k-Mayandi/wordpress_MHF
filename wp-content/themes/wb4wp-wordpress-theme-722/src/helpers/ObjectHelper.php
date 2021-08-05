<?php


namespace Wb4WpTheme\Helpers;


final class ObjectHelper
{

    /**
     * Gets a property of an object, as nested as possible.
     *
     * @param $object mixed
     * @param $properties (string|int)|(string|int)[]
     *
     * @return mixed|null
     */
    public static function get( $object, $properties )
    {
        if ( !is_array( $properties ) ) {
            return self::get_property( $object, $properties );
        }

        foreach ( $properties as $property ) {
            $object = self::get_property( $object, $property );
        }

        return $object;
    }

    /**
     * Recursively gets all properties of an object, as defined by the property structure, in the shape of the
     * property structure.
     *
     * @param $object mixed
     * @param $property_structure array
     *
     * @example get_recursive( $object, [ 'first_key' => [ 'first_nested_key', 'second_nested_key' ] ] );
     *
     * @return array
     */
    public static function get_recursive( $object, $property_structure )
    {
        if ( !is_array( $property_structure ) ) {
            return [];
        }

        $placeholder = [];

        foreach ( $property_structure as $property => $remaining_structure ) {
            if ( is_string( $remaining_structure ) ) {
                $property = $remaining_structure;
                $remaining_structure = null;
            }

            $value = self::get_property( $object, $property );
            if ( empty( $value ) ) {
                continue;
            }

            if ( is_array( $remaining_structure ) && is_array( $value ) ) {
                $placeholder[$property] = self::get_recursive( $value, $remaining_structure );
            } else {
                $placeholder[$property] = $value;
            }
        }

        return $placeholder;
    }

    private static function get_property( $object, $property )
    {
        if ( empty( $object ) || !isset( $object[$property] ) ) {
            return null;
        }

        return $object[$property];
    }

}