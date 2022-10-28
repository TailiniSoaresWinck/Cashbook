<?php

namespace App\Controllers;

use App\Models\MovimentsModel;

class Home extends BaseController
{
    public function __construct()
    {
        $session = session();
        if($session->get('user') == null){
            return redirect()->to(base_url('/users/login/'));
        }
    }
    
    
    public function index()
    {
        $moviments=$this->list();
		
    }

    public function list($dateStart=null, $dateEnd=null) {
		#Instanciar um objeto da classe MovimentModel 
		$movimentsModel= new MovimentsModel();
		//var_dump($model);
		# busca a lista de movimento para o periodo
		$listMoviments=$movimentsModel->findAll();
		$data['moviments']=$listMoviments;
		$cash_balance=$movimentsModel->cash_balance();
        $data['cash_balance']=$cash_balance;
        return view('home', $data);
		//print_r($data);
		/** Carrega os arquivos do view **/
	}
    
}
