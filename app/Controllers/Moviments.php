<?php

namespace App\Controllers;
// reference the Dompdf namespace
use Dompdf\Dompdf;
use App\Models\UserModel;
use App\Models\MovimentsModel;

class Moviments extends BaseController
{
    public function __construct()
    {
        $session = session();
        if($session->get('loggedInUser') == null){
            return redirect()->to(base_url('/users/login/'));
        }
    }
    
    public function index() {
		$moviments=$this->list();
		//return view('moviments', $moviments);
        
	}
	public function form_moviment(){
		return view('formulariomoviment');
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
		return view('moviments', $data);
		//print_r($data);
		/** Carrega os arquivos do view **/
	}

	public function novoMoviment() {
		$movimentsModel= new MovimentsModel();
			$data = [
				'date' => $this->request->getPost('date'),
				'description' => $this->request->getPost('description'),
				'value' => $this->request->getPost('value'),
				'type' => $this->request->getPost('type'),
				'user_id' => session()->get('loggedInUser')
			];
			$db = db_connect();
			$db->query("INSERT INTO moviment VALUES (DEFAULT, :description:, NOW(), :value:, :type:, :user_id:)", $data);
			$db->close();
			return $this->list();
	}
	
	public function gerandoRelatorio() {
		$userModel = new UserModel();
        $loggedInUserId = session()->get('loggedInUser');
        $userInfo = $userModel->find($loggedInUserId);
		$movimentsModel= new MovimentsModel();
		$listMoviments=$movimentsModel->findAll();
		$cash_balance=$movimentsModel->cash_balance();

        $data = [
            'userInfo' => $userInfo,
            'moviments' => $listMoviments,
			'cash_balance' => $cash_balance
        ];

		// instantiate and use the dompdf class
		$dompdf = new Dompdf();
		$dompdf->loadHtml(view('relatorio', $data));

		// (Optional) Setup the paper size and orientation
		$dompdf->setPaper('A4', 'landscape');

		// Render the HTML as PDF
		$dompdf->render();

		// Output the generated PDF to Browser
		$dompdf->stream("Lista de Movimentos");
	}
}