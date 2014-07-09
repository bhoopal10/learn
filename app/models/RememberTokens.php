<?php

namespace Learn\Models;

class RememberTokens extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id;

    /**
     *
     * @var integer
     */
    public $usersId;

    /**
     *
     * @var string
     */
    public $token;

    /**
     *
     * @var string
     */
    public $userAgent;

    /**
     *
     * @var integer
     */
    public $createdAt;

    public function getSource()
    {
        return 'remember_tokens';
    }

   /**
   *   current date and time 
   */
    public function beforeSave()
    {
        $this->createdAt=time();
    }

    /**
     * @return RememberTokens[]
     */
    public static function find($parameters = array())
    {
        return parent::find($parameters);
    }

    /**
     * @return RememberTokens
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
            'id' => 'id', 
            'usersId' => 'usersId', 
            'token' => 'token', 
            'userAgent' => 'userAgent', 
            'createdAt' => 'createdAt'
        );
    }
     public function initialize()
    {
        $this->belongsTo('usersId', 'Learn\Models\Users', 'id', array(
            'alias' => 'user'
        ));
    }

}
