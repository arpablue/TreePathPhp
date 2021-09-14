<?php


namespace ArpaBlue\TreePath;


class TreePath_Logic extends TreePath_DAO
{
    /**
     * Default constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param $key string It is the key to search in the current level adn return its value, if the key not exist then
     * return null.
     * @return mixed|null It is the value of the corresponding key.
     */
    protected function getFieldValue( $key )
    {
        if( isset($this->mChildren[$key]) )
        {
            return $this->mChildren[$key];
        }
        return null;
    }
    /**
     * It add a element in a vector.
     * @param $vector array It is the vector where the new element is added.
     * @param $key array It is the key where the value is added.
     * @param $position int It is the position of the key s used.
     * @param $value mixed|null It is the value to be assigned.
     * @return array;
     */
    protected function addTree( $vector, $keys, $position, $value )
    {
        if( $position === null)
        {
            return $vector;
        }
        if( $position < 0 )
        {
            return $vector;
        }

        if( $keys == null )
        {
            return $vector;
        }
        if( !is_array( $keys ) )
        {
            $vector = array();
        }

        if( count( $keys ) <= $position )
        {
            return $vector;
        }
        $key = $keys[ $position ];

        if( $position == count( $keys ) - 1 )
        {
            if( !is_array( $vector ) )
            {
                $vector = array();
            }
            $vector[ $key ] = $value;
            return $vector;
        }


        if( !isset( $vector[ $key ] ) )
        {
            $vector[ $key ] = array();
        }

        $vector[ $key ] = $this->addTree( $vector[ $key ], $keys, $position + 1, $value );

        return $vector;
    }


}