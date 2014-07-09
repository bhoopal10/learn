<?php

namespace Learn\Models;

use Phalcon\Mvc\Model\Validator\Email as Email;
use Phalcon\Mvc\Model\Validator\Uniqueness as Uniqueness;
use Learn\Models\ChannelUser;
use Learn\Auth\Auth;


class Users extends \Phalcon\Mvc\Model
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
    public $user_group_id;
    
    /**
     *
     * @var string
     */
    public $firstName;

    /**
     *
     * @var string
     */
    public $lastName;

    /**
     *
     * @var string
     */
    public $username;

    /**
     *
     * @var string
     */
    public $email;

    /**
     *
     * @var string
     */
    public $password;

    /**
     *
     * @var string
     */
    public $mustChangePassword;

    /**
     *
     * @var string
     */
    public $banned;

    /**
     *
     * @var string
     */
    public $suspended;

    /**
     *
     * @var string
     */
    public $active;

    /**
     * Validations and business logic
     */
    public function validation()
    {

       $this->validate(new Uniqueness(
            array(
                'field'=>'email',
                'message'=>'This email already registered'
                )
        ));
       $this->validate(new Uniqueness(
            array(
                'field'=>'userName',
                'message'=>'This username already registered'
                )
        ));

       $this->validate(new Email(
            array(
                'field'=>'email',
                'required'=>true,
                'message'=>'This is email required'
                )
        ));
       return $this->validationHasFailed() != true;
    }

    public function getSource()
    {
        return 'users';
    }

    /**
     * @return Users[]
     */
    public static function find($parameters = array())
    {
        return parent::find($parameters);
    }

    /**
     * @return Users
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
            'firstName' => 'firstName', 
            'lastName' => 'lastName', 
            'username' => 'userName', 
            'email' => 'email', 
            'password' => 'password', 
            'mustChangePassword' => 'mustChangePassword', 
            'banned' => 'banned', 
            'suspended' => 'suspended', 
            'active' => 'active',
            'user_group_id'=>'group_id',
         
        );
    }

     /**
     * Send a confirmation e-mail to the user if the account is not active
     */
   
   /* public function afterSave()
    {
        if ($this->active == 'N') {

            $emailConfirmation = new EmailConfirmations();

            $emailConfirmation->usersId = $this->id;

            if ($emailConfirmation->save()) {
                $this->getDI()
                    ->getFlash()
                    ->notice('A confirmation mail has been sent to ' . $this->email);
            }
        }
    }
    */

    public function beforeSave()
    {
        $this->banned='N';
        $this->suspended='N';
        $this->mustChangePassword='N';
    }
    public function initialize()
    {
        $this->belongsTo('group_id','Learn\Models\UserGroup','id',array(
            'alias'=>'group'));
        
    }
    public function beforeDelete()
    {
        if($this->profilesId == '3')
        {
            $auth= new Auth();
            $userId=$auth->getID();
            //finds channelUser
            $channelUser=ChannelUser::findFirst("userId = '$this->id'");
            if($channelUser)
            {
                //find channel for right to user
                $channel=Channel::findFirst("userId = '$userId'");
                if($channel)
                {
                    if($channel->id == $channelUser->channelId)
                    {
                         $channelUser->delete();
                    }
                    else
                    {
                        $this->flash->error('This user Don\'t have rights to delete');
                        return false;
                    }
                }
            }
            else
            {
                $this->flash->error('This user Don\'t have rights to delete');
                return false;
            }
        }
    }

}
