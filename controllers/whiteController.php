<?php

class whiteController extends Controller {

	public function index(){
		$white=$this->model->load();
		$this->setResponce($white);
	}

	public function view($data){
		$white=$this->model->load($data['id']);
		$this->setResponce($white);
	}

	public function add() {		
		$_POST=json_decode(file_get_contents('php://input'), true);
		
		if( (isset($_POST['id'])) && (isset($_POST['name'])) && (isset($_POST['image'])) && (isset($_POST['power'])) && (isset($_POST['speed'])) ) {				
				$dataToSave=array(
					'id'=>$_POST['id'], 
					'name'=>$_POST['name'],
					'image'=>$_POST['image'],
					'power'=>$_POST['power'],
					'speed'=>$_POST['speed']);
				
				$white=$this->model->create($dataToSave);
				$this->setResponce($white);
			}
	}

	public function edit($data) {
		$edittedData=json_decode(file_get_contents('php://input'), true);
		
		if( (isset($edittedData['id'])) && (isset($edittedData['name'])) && (isset($edittedData['image'])) 
			&& (isset($edittedData['power'])) && (isset($edittedData['speed'])) ) {
				
			$dataToUpdate=array(
					'id'=>$edittedData['id'], 
					'name'=>$edittedData['name'],
					'image'=>$edittedData['image'],
					'power'=>$edittedData['power'],
					'speed'=>$edittedData['speed']);
			$white = $this->model->save($data['id'], $dataToUpdate);
			$this->setResponce($white);
			}
	}
	
	public function delete($data) {
		$white = $this->model->delete($data['id']);
        $this->setResponce($white);
	}

}