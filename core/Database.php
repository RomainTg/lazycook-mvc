<?php 

class Database {
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $dbname = 'lazycooking';

    private $dbh;
    private $stmt;

    public function __construct() {
        // Connexion à la base de données
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;

        try {
            $this->dbh = new PDO($dsn, $this->username, $this->password);
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {

            die('Erreur de connexion : ' . $e->getMessage());
        }
    }   

    public function query($sql) {
        $this->stmt = $this->dbh->prepare($sql);
    }

    public function execute($params = []) {
        return $this->stmt->execute($params);
    }

    public function resultSet() {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function single() {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }
}