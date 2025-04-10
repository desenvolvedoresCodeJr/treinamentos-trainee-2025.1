<?php

namespace App\Core\Database;

use PDO, Exception;

class QueryBuilder
{
    protected $pdo;


    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function selectAll($table)
    {
        $sql = "select * from {$table}";

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_CLASS);

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function insert($table, $parameters)
    {
        // INSERT INTO nome_da_tabela (coluna_1, coluna_2, coluna_3) 
        // VALUES (valor_1, 'valor_2', valor_3);]

        $sql = sprintf('INSERT INTO %s (%s) VALUES (:%s)',
        $table,
        implode(', ', array_keys($parameters)),
        implode(', :', array_keys($parameters))
    );

    try {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($parameters);


    } catch (Exception $e) {
        die($e->getMessage());
    }

    }

}