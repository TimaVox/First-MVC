<?php
class IndexController implements IController {
	
    public function indexAction() {
        $pdo = DB::getInstance()->getConnection();
		$fc = FrontController::getInstance();
		/* ������������� ������ */
		$model = new FileModel();
		/* 
		*	$model->name = $params['name'];
		*/
		$model->name = "Guest";
		
		$output = $model->render(TEMPLATE, USER_DEFAULT_FILE);
		
		$fc->setBody($output);
	}
}
