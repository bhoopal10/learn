<?php

namespace Learn\Models;

class ChannelUser extends \Phalcon\Mvc\Model
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
    public $channel_id;

    /**
     *
     * @var integer
     */
    public $user_id;

    /**
     *
     * @var string
     */
    public $createdAt;

    /**
     *
     * @var string
     */
    public $modifiedAt;

    public function getSource()
    {
        return 'channel_user';
    }

    /**
     * @return ChannelUser[]
     */
    public static function find($parameters = array())
    {
        return parent::find($parameters);
    }

    /**
     * @return ChannelUser
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
            'channel_id' => 'channelId', 
            'user_id' => 'userId', 
            'createdAt' => 'createdAt', 
            'modifiedAt' => 'modifiedAt'
        );
    }
    /**
    * Initialize 
    */
    public function initialize()
    {
        $this->belongsTo('userId','Learn\Models\Users','id',array(
            'alias'=>'user'));
    }

}
