<?php

class Application_Model_Optimus
{

    protected $staf;

    public function __construct ()
    {
        $config = Zend_Registry::get('optimus');
        $db = Zend_Db::factory($config->database);
        Zend_Db_Table_Abstract::setDefaultAdapter($db);
        
        $this->staf = new Application_Model_DbTable_Staf();
    }

    /**
     * 
     * @param int $id
     * @return Ambigous <Zend_Db_Table_Row_Abstract, NULL, unknown>
     */
    public function findById ($id)
    {
        $sql = $this->staf->select();
        $sql->where('staf_code = ?', $id);
        
        $row = $this->staf->fetchRow($sql);
        
        return $row;
    }
}

