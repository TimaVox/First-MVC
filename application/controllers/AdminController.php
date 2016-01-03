<?php
class AdminController implements IController {
    
    public function indexAction() {
        $fc = FrontController::getInstance();
        
        $admin = new Admin();
        
        $output = $admin->render(ADMIN_TEMPLATE, ADMIN_LOGIN);
		
		$fc->setBody($output);
    }
}