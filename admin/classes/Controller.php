<?php
class Controller {
    private $_db,
            $_count = 0,
            $_data;

    public function __construct ($vendor = null) {
        $this->_db = DB::getInstance();
    }

    public function create($table = null, $fields = array()) {
        if(!$this->_db->insert($table, $fields)){
            throw new Exception ('There was a problem creating {$table}.');
        }
    }

    public function get($table, $rows = '*', $join = null, $where = null, $order = null, $limit = null){
        $selectQuery = 'SELECT '.$rows.' FROM '.$table;
        if($join != null){
            $selectQuery .= ' JOIN '.$join;
        }
        if($where != null){
            $selectQuery .= ' WHERE '.$where;
        }
        if($order != null){
            $selectQuery .= ' ORDER BY '.$order;
        }
        if($limit != null){
            $selectQuery .= ' LIMIT '.$limit;
        }
        
        $data = $this->_db->query($selectQuery);

        if($data->count()){
            $this->_count = $data->count();
            $this->_data = $data->results();
        }
    }
    
    public function update($table = null, $fields = array(), $id = null) {
        if (!$id) {
            throw new Exception('Please enter {$table} id.');
        }
        
        if (!$this->_db->update($table, $id, $fields)) {
            throw new Exception('There was a problem updating {$table}.');
        }
    }
    
    public function exists() {
        return (!empty($this->_data)) ? TRUE : FALSE;
    }
    
    public function delete($table = null, $where = array()){
        if ($this->_db->delete($table, $where)) {
            return TRUE;
        }
        return FALSE;
    }

    public function data() {
        return $this->_data;
    }

    public function count(){
        return $this->_count;
    }
}
?>