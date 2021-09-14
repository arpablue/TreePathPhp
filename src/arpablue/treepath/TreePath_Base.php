<?php


namespace ArpaBlue\TreePath;


class TreePath_Base
{
    /**
     * Default constructor.
     */
    public function __construct()
    {
    }

    /**
     * It if a variable is an array, this is verifying if all the key of the array are int.
     * @param $target mixed|null It is the variable to verify if is an array.
     */
    protected function isArray( $target )
    {
        if( $target == null )
        {
            return false;
        }
        if( !is_array( $target ))
        {
            return false;
        }

        foreach( $target as $e )
        {
            if( !is_int( $e ))
            {
                return false;
            }
        }
        return true;
    }
}