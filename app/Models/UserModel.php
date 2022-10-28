<?php
namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model{
    protected $table = 'user';

   public function verifica($table, string $email, string $password){
         $sql = "SELECT * FROM user WHERE email = '".$email."' AND password = '".$password."'";
         $retorno=$this->db->query($sql,null);
         $item=$retorno->getResult();
         return $item;
   }
}