<?php


namespace ArpaBlue\TreePath;


class TreePath_To extends TreePath_Logic
{
    /**
     * Default constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * It return the element of the current object in a JSON format.
     * @return string IT is a string that content the data of the current object in a JSON format.
     */
    public function toJSON()
    {

        $res =  $this->toJSONtree( $this->mChildren );
        return $res;
    }
    /**
     * It return the element of the current object in a JSON format, but with a structure to be reviewed comfortable
     * for the look.
     * @return string IT is a string that content the data of the current object in a JSON format.
     */
    protected function toJSONtree( $vector )
    {
        if( $vector === null )
        {
            return 'null';
        }
        if( !is_array( $vector ))
        {
            if( is_string( $vector ) )
            {
                return "\"".$vector."\"";
            }
            return $vector .'';
        }
        $res = '{';
        $flag = false;
        foreach( $vector as $key => $value )
        {
            if(  $flag )
            {
                $res = $res . ',';
            }
            $res = $res . "\"".$key."\":".$this->toJSONtree( $value );
            $flag = true;
        }
        $res = $res . '}';
        return $res;
    }
    /**
     * It return the element of the current object in a JSON format.
     * @return string IT is a string that content the data of the current object in a JSON format.
     */
    public function toJSONbeauty( $margin = '    ')
    {
        $res = $this->toJSONtreeBeauty( $this->mChildren ,$margin);
        $res = $margin . $res;
        return $res;
    }
    /**
     * It return the element of the current object in a JSON format, but with a structure to be reviewed comfortable
     * for the look.
     * @return string IT is a string that content the data of the current object in a JSON format.
     */
    protected function toJSONtreeBeauty( $vector , $margin = '')
    {
        if( $vector === null )
        {
            return 'null';
        }
        if( !is_array( $vector ))
        {
            if( is_string( $vector ) )
            {
                return "\"".$vector."\"";
            }
            return $vector .'';
        }
        $isVector = $this->isArray( $vector );

        $res = '{';
        if( $isVector )
        {
            $res = '[';
        }

        $flag = false;
        foreach( $vector as $key => $value )
        {
            if(  $flag )
            {
                $res = $res . ',';
            }
            if( $isVector )
            {
                $res = $res . "\r\n" .$margin . "    ".$this->toJSONtreeBeauty( $value, $margin.'    ');
            }else{
                $res = $res . "\r\n" .$margin . "    \"".$key."\":".$this->toJSONtreeBeauty( $value, $margin.'    ');
            }

            $flag = true;
        }
        if( $isVector )
        {
            $res = $res ."\r\n" . $margin .']';
        }else{
            $res = $res ."\r\n" . $margin .'}';
        }

        return $res;
    }
}