<?php

namespace Learn\Models;

class UserGroup extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id;

    /**
     *
     * @var string
     */
    public $name;
      /**
     *
     * @var string
     */
    public $isActive;

    public function getSource()
    {
        return 'user_group';
    }

    /**
     * @return UserGroup[]
     */
    public static function find($parameters = array())
    {
        return parent::find($parameters);
    }

    /**
     * @return UserGroup
     */
    public static function findFirst($parameters = array())
    {
        return parent::findFirst($parameters);
    }

    /**
     * Independent Column Mapping.
     */
    public function columnMap()
    {
            return array(
            'id'       => 'id', 
            'name'     => 'name',
            'isActive' =>'isActive'
            );
    }

}
