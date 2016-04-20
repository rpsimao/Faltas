<?php

class Application_Model_Passwords
{
    public $table;
    
    public function __construct ()
    {
        $config = Zend_Registry::get('passwords');
        $db = Zend_Db::factory($config->database);
        Zend_Db_Table_Abstract::setDefaultAdapter($db);
    
        $this->table = new Application_Model_DbTable_Records();
    }
    
    
    public function getRecords($password)
    {
        $sql = $this->table->select();
        $sql->where('new_password = ?', (int) $password);
        $row = $this->table->fetchRow($sql);
        
        return $row;
    }
    
    
    public function getPasswordByRealName($name)
    {
        $sql = $this->table->select();
        $sql->where('real_name = ?', $name);
        $row = $this->table->fetchRow($sql);
        
        return $row;
    }
    
    
    public function authenticate($passwd)
    {
        
        $db = $this->getRecords($passwd);
        
        $sess = new Zend_Session_Namespace("faltas_auth");
        $sess->login = $db;
        
       
     
    }
    
}

