<?php

namespace Learn\Models;
use Learn\Models\Users;
use \Phalcon\Mvc\Model\Message as Message;
class Channel extends \Phalcon\Mvc\Model
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
    public $user_id;

    /**
     *
     * @var string
     */
    public $channel_name;

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
        return 'channel';
    }

    public function getId()
    {
        return $this->id;
    }

    /**
     * @return Channel[]
     */
    public static function find($parameters = array())
    {
        return parent::find($parameters);
    }

    /**
     * @return Channel
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
            'id'            => 'id', 
            'user_id'       => 'userId', 
            'channel_name'  => 'name', 
            'createdAt'     => 'createdAt', 
            'modifiedAt'    => 'modifiedAt'
        );
    }
   

    /**
    *Initalize 
    */
    public function initialize()
    {
        $this->hasOne('userId','Learn\Models\Users','id',array(
            'alias'=>'user'
            ));
        $this->belongsTo('id','Learn\Models\ChannelPage','channelId',array(
            'alias'=>'page'
            ));
        $this->hasOne('userId','Learn\Models\Users','id',array(
            'alias'     =>  'user',
            'foreignKey'=>  array(
                            'action'    =>  \Phalcon\Mvc\Model\Relation::ACTION_CASCADE
                            )
            ));
        $this->hasOne('id','Learn\Models\ChannelPage','channelId',array(
            'alias'     =>  'page',
            'foreignKey'=>  array(
                            'action'    =>  \Phalcon\Mvc\Model\Relation::ACTION_CASCADE
                            )
            ));
        $this->hasManyToMany('id','Learn\Models\ChannelTraineer','channelId','traineerId','Learn\Models\Traineer','id',array(
            'alias'=>'traineer'));



        
    }
    /**
    * Before Delete check Slug
    */
    public function beforeDelete()
    {
        try {
            $dbs= new \Phalcon\Mvc\Model\Transaction\Manager();
            $db=$dbs->get();
            $user=Users::findFirst($this->userId);
            $user->setTransaction($db);
            if(!$user->delete())
            {
                $db->rollback($user->getMessages());
                return false;
            }
            $channelId=$this->id;
            $page=ChannelPage::findFirst("channelId = '$channelId'");
            $page->setTransaction($db);
            if(!$page->delete())
            {
                foreach ($page->getMessages() as $message) {
                    $error=$message;
                }
                $db->rollback($error);
               
            }
            $db->commit();
        }
        catch(\Phalcon\Mvc\Model\Transaction\Failed $e)
        {
            $message = new Message($e->getMessage());
            $this->appendMessage($message);
             return false;
        }
    }

}
