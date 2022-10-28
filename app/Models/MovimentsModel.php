<?php

namespace App\Models;

use CodeIgniter\Model;

class MovimentsModel extends Model{
    protected $table="moviment";
    protected $primaryKey="id";
    protected $allowedFields=['date', 'description', 'value', 'type'];
    protected $useAutoIncrement = true;
    
    
    
    public function cash_balance(){
        $sql = "SELECT sum(value) AS input FROM moviment WHERE type='input'";
        
        $input=  $this->db->query($sql)->getRowArray();
        
        
        $sql = "SELECT sum(value) AS output FROM moviment WHERE type='output'";
        $output=$this->db->query($sql)->getRowArray();

        
        return intval($input['input'])-intval($output['output']);
    }
 
    public function update($moviment=null, $id=null):bool{
        $sql = $this->db->update("moviment","id_moviment",$moviment['id_moviment'], $moviment);
        return $sql;
    }

    
    public function delete($id = null, bool $purge = false):bool{
        $sql = $this->db->delete("moviment","id_moviment",$id);
        return $sql;
    }

    public function listSummary(){
        $sql="SELECT distinct date, 
        (SELECT sum(value) from moviment where type='input' and date=m.date) AS input,
        (SELECT sum(value) from moviment where type='output' and date=m.date) AS output 
        FROM moviment m";
        $resultado;
    	$retorno=$this->db->query($sql, null);
		$item=$retorno->getResult();
			
		return $item;
    }
        
}