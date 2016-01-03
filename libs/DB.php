<?php
class DB{
    private static $_instance = null;
    private $_pdo;
    private $_pdoPrm = [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];
    const LP_DB = './data/lp.db';
    
    private function __construct(){
        try{
            if(is_file(self::LP_DB)){
                $this->_pdo = new PDO('sqlite:'. self::LP_DB);
            }else{
                $this->_pdo = new PDO('sqlite:'. self::LP_DB);
                $sql = "CREATE TABLE admin(
									id INTEGER PRIMARY KEY AUTOINCREMENT,
									name TEXT,
                                    passwd TEXT,
									role INTEGER
								)";
                $this->_pdo->exec($sql);
                $sql = "INSERT INTO admin(name, passwd, role)
						VALUES ('admin', 'admin', 3)";
                $this->_pdo->exec($sql) or die($this->_pdo->errorInfo());
            }
        }catch (PDOException $e) {
            echo 'Создание c БД не удалось: ' . $e->getMessage();
        }
    }
    
    private function __clone(){}
    private function __wakeup(){}
    public function __destruct(){
        unset($this->_pdo);
    }

    /**
     * @return DB
     */
    public static function getInstance(){
        if(!self::$_instance instanceof self){
            self::$_instance = new self;
        }
        return self::$_instance;
    }


    /**
     * @return PDO
     */
    public function getConnection() {
		return $this->_pdo;
	}
}