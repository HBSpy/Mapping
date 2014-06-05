<?php




class Friend extends \Phalcon\Mvc\Model
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
    public $user;
     
    /**
     *
     * @var string
     */
    public $pass;
     
    /**
     *
     * @var string
     */
    public $relation;
     
    /**
     * Independent Column Mapping.
     */
    public function columnMap()
    {
        return array(
            'id' => 'id', 
            'user' => 'user', 
            'pass' => 'pass', 
            'relation' => 'relation'
        );
    }

	public function initialize(){
		$this->hasMany('id', 'Remark', 'friend_id');
	}

}
