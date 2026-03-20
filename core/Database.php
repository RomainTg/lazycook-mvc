<?php 

//use PDO;
//use Exception;

class Database {

    protected $connection;
    protected $request;

    const SERVER   = "localhost";
    const USER     = "root";
    const PASSWORD = "";
    const BASE     = "lazycook";
    
    public function __construct() {

        try {
            $this->connection = new PDO('mysql:host=' . self::SERVER . ';dbname=' . self::BASE, self::USER, self::PASSWORD);
            /* On active les erreurs PDO */ 
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            /* Les retours de requête seront en tableau objet par défaut */ 
            $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            /* Encodage des caractères spéciaux en utf-8 */ 
            $this->connection->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES utf8");
            } catch (Exception $e) {
                die('Erreur : ' . $e->getMessage()); 
        }
    }

    public function query($sql) {
        $this->request = $this->connection->prepare($sql);
    }

    public function execute($params = []) {
        return $this->request->execute($params);
    }

    public function fetchAll() {
        $this->execute();
        return $this->request->fetchAll();
    }

    public function fetch() {
        $this->execute();
        return $this->request->fetch();
    }
}
