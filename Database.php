<?php

class Database{

    private $pdo;

    public function __construct($dsn, $username, $password)
    {
        try {
            $this->pdo = new PDO($dsn, $username, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e){
            echo 'Conexão falhou: ' . $e;
        }
    }

    public function getConnection()
    {
        return $this->pdo;
    }

    public function query ($sql, $params= [])
    {
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($params);

            return $stmt;

        } catch (PDOException $e){
            echo 'Query falhou: ' . $e;

            return false;
        }
    }

    public function myFetch ($stmt)
    {
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}
