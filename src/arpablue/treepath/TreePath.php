<?php


namespace ArpaBlue\TreePath;


class TreePath extends TreePath_To
{
    /**
     * Default constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }
    protected function triming( $target )
    {
        if( $target == null )
        {
            return null;
        }
        $target = $target."";

        $target = trim( $target );
        if( strlen($target) < 1)
        {
            return null;
        }
        $target = str_replace(' ','_',$target);
        $target = str_replace('/',' ',$target);
        $target = trim( $target );
        $target = str_replace(' ','/',$target);
        return $target;
    }
    /**
     * It add a value to the tre
     * @param $key String It is the path for the value.
     * @param $value boolean It is true if the value has been assigned without problems.
     */
    public function add( $key, $value )
    {
        if( $this->mChildren == null)
        {
            $this->mChildren = array();
        }
        if( $key == null )
        {
            return false;
        }
        $key = $this->triming( $key );
        if( $key == null )
        {
            return null;
        }
        $keys = explode('/',$key);
        $this->mChildren = $this->addTree( $this->mChildren, $keys, 0, $value );
        return true;
    }

}