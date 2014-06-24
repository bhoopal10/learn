<?php

namespace Learn\Models;

use Phalcon\Mvc\Model\Validator\Email as Email;
use Phalcon\Mvc\Model\Validator\Uniqueness as Uniqueness;

class Users extends \Phalcon\Mvc\Model
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
     * @var integer
     */
    public $profilesId;

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
                'message'=>'This is invalid email'
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
            'profilesId' => 'profilesId', 
            'banned' => 'banned', 
            'suspended' => 'suspended', 
            'active' => 'active'
        );
    }

}
