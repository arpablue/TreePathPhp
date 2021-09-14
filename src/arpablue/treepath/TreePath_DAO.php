<?php


namespace ArpaBlue\TreePath;


class TreePath_DAO extends TreePath_Base
{
    /**
     * @var array It contain teh elements of the current node.
     */

    protected $mChildren;
    /**
     * Default constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->mChildren = array();
    }

    /**
     *
     * It clear all elements of the current tree.
     */
    public function clear()
    {
        $this->mChildren = array();
    }

    /**
     * It return the number of children.
     * @return int it is the the number of children in the current node.
     */
    public function size()
    {
        if( $this->mChildren == null )
        {
            return -1;
        }
        return count( $this->mChildren );
    }



}