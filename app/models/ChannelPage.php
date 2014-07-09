<?php

namespace Learn\Models;
use Learn\Models\Slug;
use \Phalcon\Mvc\Model\Message as Message;
class ChannelPage extends \Phalcon\Mvc\Model
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
     * @var string
     */
    public $slug;

    /**
     *
     * @var string
     */
    public $content;

    /**
     *
     * @var string
     */
    public $created_date;

    /**
     *
     * @var string
     */
    public $modified_date;

    /**
     *
     * @var integer
     */
    public $status;

    public function getSource()
    {
        return 'channel_page';
    }

    /**
     * @return ChannelPage[]
     */
    public static function find($parameters = array())
    {
        return parent::find($parameters);
    }

    /**
     * @return ChannelPage
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
            'channel_id'    =>'channelId',
            'slug'          => 'slug', 
            'content'       => 'content', 
            'created_date'  => 'createdDate', 
            'modified_date' => 'modifiedDate', 
            'status'        => 'status'
        );
    }
 
    /*
    *After save set isPage in slug
    */
    public function afterSave()
    {
       
    }
    /**
    *Before Delete
    */
    public function beforeDelete()
    {
        if($this->status == 1)
        {
            $message= new Message('Channel page is active you cannot delete this channel');
            $this->appendMessage($message);
            return false;
        }
    }
    /**
    * After Deleted set isPage as false
    */
    public function afterDelete()
    {
        
    }
    public function initialize()
    {
        $this->status=0;
        $this->content='';
    }

}
