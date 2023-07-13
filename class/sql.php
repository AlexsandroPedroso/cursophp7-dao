<?php

class Sql extends PDO {

    private $conn;

    public function __construct()
    {
        $this->conn = new PDO("mysql:host=localhost;dbname=db_php7", "root", "1@root.");
    }
    
    // 1 - O método setParams() tem o objetivo de definir os valores dos parâmetros que passamos para a query

    // Por exemplo: SELECT * FROM tb_usuarios WHERE idusuario = :USUARIO
    
    // O setParams() irá definir o valor de :USUARIO e de qualquer outro parâmetro
    
    // Esse método realiza um laço de repetição, chamando o método setParam() , no singular, que define um parâmetro por vez
    
    // Com o foreach() , é possível definir vários parâmetros
    
    // Um método usa o outro para definir um parâmetro de cada vez

    private function setParams($statment, $parameters = array()){
        foreach ($parameters as $key => $value) {
            
            $this->setParam($statment, $key, $value);

        }
    }

    private function setParam($statment, $key, $value){

        $statment->bindParam($key, $value);

    }

    // 2 - O método query() realiza a preparação do script do MySQL, define seus parâmetros e executa o comando. Em poucas palavras: ele executa a query no Banco de Dados

    // Entretanto, nós usamos dois tipos de query na programação: aquelas que apenas executam um procedimento. por exemplo: DELETE FROM tb_usuarios;

    // E aquelas que executam um procedimento e trazem algum dado de volta, por exemplo: SELECT * FROM tb_pessoas

    // O método query() apenas executa

    // Dessa forma, criamos o método select() , que faz a mesma coisa que o query() , mas retorna algo, com a linha return $stmt->fetchAll(PDO::FETCH_ASSOC);

    public function query($rawQuery, $params = array()){

        $stmt = $this->conn->prepare($rawQuery);

        $this->setParams($stmt, $params);

        $stmt->execute();

        return $stmt;
    }

    public function select ($rawQuery, $params = array()):array
    {

        $stmt = $this->query($rawQuery, $params);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

}
?>