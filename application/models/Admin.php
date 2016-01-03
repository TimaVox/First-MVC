<?php
class Admin {
    
    public function createAdmin() {
        
    }
    
    public function render($file, $inc) {
		ob_start();
		include($file);
		return ob_get_clean();
	}
    
}