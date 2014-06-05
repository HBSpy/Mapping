<?php




class Remark extends \Phalcon\Mvc\Model
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
    public $friend_id;
     
    /**
     *
     * @var string
     */
    public $remark;
     
    /**
     *
     * @var string
     */
    public $time;
     
    /**
     * Independent Column Mapping.
     */
    public function columnMap()
    {
        return array(
            'id' => 'id', 
            'friend_id' => 'friend_id', 
            'remark' => 'remark', 
            'time' => 'time'
        );
    }

	public function initialize(){
		$this->skipAttributes(array('time'));
		$this->belongsTo('friend_id', 'Friend', 'id');
	}

}
