<?php


class Application_Model_Faltas implements RPS_Interfaces_CRUD
{
	 protected $tablePedidos;
	 
	 protected $tableFiles;

    /**
     */
    public function __construct ()
    {
        $config = Zend_Registry::get('faltas');
        $db = Zend_Db::factory($config->database);
        Zend_Db_Table_Abstract::setDefaultAdapter($db);
        
        $this->tablePedidos = new Application_Model_DbTable_Pedidos();
        $this->tableFiles = new Application_Model_DbTable_Files();
    }

    /**
     * (non-PHPdoc)
     *
     * @see RPS_Interfaces_CRUD::deleteRecord()
     *
     */
    public function deleteRecord ($id)
    {
        $where = $this->tablePedidos->getAdapter()->quoteInto('id = ?', $id);
        $this->tablePedidos->delete($where);
    }

    /**
     * (non-PHPdoc)
     *
     * @see RPS_Interfaces_CRUD::getAllRecords()
     *
     */
    public function getAllRecords ()
    {
        $rows = $this->tablePedidos->fetchAll("administracao = 0", 'data_abertura DESC');
        
        return $rows;
    }

    /**
     * (non-PHPdoc)
     *
     * @see RPS_Interfaces_CRUD::findById()
     *
     */
    public function findById ($id)
    {
        $row = $this->tablePedidos->find($id);
        return $row;
    }

    /**
     * (non-PHPdoc)
     *
     * @see RPS_Interfaces_CRUD::insertData()
     *
     */
    public function insertData (array $params)
    {
        $data = array(
                'id'            => $params['id'],
                'data_abertura' => $params['data_abertura'],
                'num'           => $params['num'],
                'nome'          => $params['nome'],
                'seccao'        => $params['seccao'],
                'data_inicio'   => $params['data_inicio'],
                'horas'         => $params['horas'],
                'data_fim'      => $params['data_fim'],
                'motivo'        => $params['motivo'],
                'data_abertura' => $params['data_abertura'],
                
                'justificada'       => $params['justificada'],
                'injustificada'     => $params['injustificada'],
                'justificada_txt'   => $params['justificada_txt'],
                'injustificada_txt' => $params['injustificada_txt'],
                'data_admin'        => $params['data_admin'],
                'adminAss'          => $params['adminAss'],
                
        );
        
        $find = $this->findById($params['id']);
        
        if (count($find) > 0) {
            $where = $this->tablePedidos->getAdapter()->quoteInto('id = ?', $params['id']);
            if(strlen($params['adminAss']) > 0)
            {
                $admin = array("administracao" => 1);
                $data = array_merge($data, $admin);
            }
            $this->tablePedidos->update($data, $where);
            
            try {
                $this->tableFiles->insert(array('file_name' => $params['file_name'], 'id_pedidos' => $params['id']));
            } catch (Exception $e) {}
            
        } else {
            
            $this->tablePedidos->insert($data);

            try {
                $this->tableFiles->insert(array('file_name' => $params['file_name'], 'id_pedidos' => $this->tablePedidos->getAdapter()->lastInsertId()));
            } catch (Exception $e) {}
            
           
            return $this->tablePedidos->getAdapter()->lastInsertId();
        }
    }
    
    /**
     * 
     * @param date $date
     * @return Zend_Db_Table_Row
     */
    
    public function getByDate($date)
    {
        $sql = $this->tablePedidos->select();
        $sql->where('date(data_abertura)= ?', $date);
        
        $rows = $this->tablePedidos->fetchAll($sql);
        
        return $rows;
    }
    
    /**
     * Pocura se existem ficheiros de justificação
     * @param int $id
     */
    public function retrieveFiles($id)
    {
        
        $rows = $this->tableFiles->fetchAll("id_pedidos = $id")->toArray();
        
        return $rows;
        
    }
    
}
