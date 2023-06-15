<?php 

class DAO {
    private $db;
    public function __construct(){        
        $this->db = new PDO('mysql:host=localhost;dbname=cinehub;charset=utf8', 'root', '');    
    }    
    function getDB() {        
        return $this->db;    
    }

    public function executeRequest($sql, $params = NULL) {        
        if ($params == NULL){            
            $resultat = $this->db->query($sql);        
        } else {            
            $resultat = $this->db->prepare($sql);            
            $resultat->execute($params);        
        }        
        return $resultat;    
    }
}