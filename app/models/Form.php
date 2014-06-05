<?php




class Form extends \Phalcon\Mvc\Model
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
    public $ip;
     
    /**
     *
     * @var string
     */
    public $form;
     
    /**
     *
     * @var string
     */
    public $time;
    /**
     *
     * @var integer
     */
    public $read;
    /**
     *
     * @var integer
     */
    public $star;
     
    /**
     * Independent Column Mapping.
     */
    public function columnMap()
    {
        return array(
            'id' => 'id', 
            'ip' => 'ip', 
            'form' => 'form', 
            'time' => 'time',
            'read' => 'read',
            'star' => 'star'
        );
    }

	public function initialize(){
		$this->skipAttributes(array('time'));
	}

}
