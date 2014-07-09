<?php

namespace Learn\Models;

class EmailConfirmations extends \Phalcon\Mvc\Model
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
    public $code;

    /**
     *
     * @var integer
     */
    public $createdAt;

    /**
     *
     * @var integer
     */
    public $modifiedAt;

    /**
     *
     * @var string
     */
    public $confirmed;

    public function getSource()
    {
        return 'email_confirmations';
    }

    /**
     * @return EmailConfirmations[]
     */
    public static function find($parameters = array())
    {
        return parent::find($parameters);
    }

    /**
     * @return EmailConfirmations
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
            'code' => 'code', 
            'createdAt' => 'createdAt', 
            'modifiedAt' => 'modifiedAt', 
            'confirmed' => 'confirmed'
        );
    }

    /**
    *Before creating user assign password
    */
    public function beforeValidationOnCreate()
    {
        //TimeStamp the confirmation
        $this->createdAt=time();
        //Generate random confirmation code
        $this->code=preg_replace('/[^a-zA-Z0-9]/', '', base64_encode(openssl_random_pseudo_bytes(24)));
        // Set status to non-confirmed
        $this->confirmed = 'N';

    }
    /**
     * Sets the timestamp before update the confirmation
     */
    public function beforeValidationOnUpdate()
    {
        // Timestamp the confirmaton
        $this->modifiedAt = time();
    }
    /*Send email confirmation after created user*/
    public function afterCreate()
    {

        $this->getDI()->getMail()
                      ->send(array(
                        $this->user->email=>$this->user->firstName
                        ),"Please confirm your mail",'confirmation',array(
                        'confirmationUrl'=>'/confirm/'.$this->code.'/'.$this->user->email
                        ));

    }
    public function initialize()
    {
        $this->belongsTo('usersId','Learn\Models\Users','id',array(
            'alias' => 'user'));
    }


}
