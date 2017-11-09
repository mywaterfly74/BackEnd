<?php

class userController extends Controller {

	public function index(){
		$users=$this->model->load();
		$this->setResponce($users);
	}

	public function view($data){
		$users=$this->model->load($data['id']);
		$this->setResponce($users);
	}

	public function add() {
		
		$_POST=json_decode(file_get_contents('php://input'), true);
		
		if( (isset($_POST['id'])) && (isset($_POST['name'])) && (isset($_POST['score'])) ){
			
			$dataToSave = array('id'=>$_POST['id'], 'name'=>$_POST['name'], 'score'=>$_POST['score']);
			$addedItem = $this->model->create($dataToSave);
			$this->setResponce($addedItem);
		}
	}
	
	
	public function edit($data) {
		
		$edittedData=json_decode(file_get_contents('php://input'), true);
		
		if((isset($edittedData['id'])) && (isset($edittedData['name'])) && (isset($edittedData['score']))){

			$dataToUpdate = array('id'=>$edittedData['id'], 'name'=>$edittedData['name'], 'score'=>$edittedData['score'] );
			$updateItem = $this->model->save($data['id'], $dataToUpdate);
			$this->setResponce($updateItem);
		}
	}
	
	
	public function delete($data) {
		$sample = $this->model->delete($data['id']);
        $this->setResponce($sample);
	}

}