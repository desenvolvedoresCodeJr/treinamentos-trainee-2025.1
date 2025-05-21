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



    public function selectAll($table, $inicio = null, $rows_count = null)
    {
        $sql = "SELECT * FROM {$table}";

        if ($inicio >= 0 && $rows_count > 0) {
            $sql .= " LIMIT {$inicio}, {$rows_count}";
        }

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_CLASS);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    public function countAll($table)
    {
        $sql = "SELECT COUNT(*) FROM {$table}";

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            return intval($stmt->fetch(PDO::FETCH_NUM)[0]);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

public function selectAllWithSearch($table, $column, $search, $offset = null, $limit = null, $orderBy = null)
{
    $sql = "SELECT * FROM {$table} WHERE {$column} LIKE :search";

    if ($orderBy) {
        $sql .= " ORDER BY {$orderBy}";
    }

    if (is_numeric($offset) && is_numeric($limit) && $offset >= 0 && $limit > 0) {
        $sql .= " LIMIT :limit OFFSET :offset";
    }

    try {
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':search', "%{$search}%", PDO::PARAM_STR);

        if (isset($limit) && isset($offset)) {
            $stmt->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
            $stmt->bindValue(':offset', (int) $offset, PDO::PARAM_INT);
        }

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    } catch (PDOException $e) {
        error_log("DB Error in selectAllWithSearch: " . $e->getMessage());
        return [];
    }
}


        public function selectOne($table, $id)
    {
        $sql = sprintf('SELECT * FROM %s WHERE id = :id LIMIT 1', $table);

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                'id' => $id
            ]);

            return $stmt->fetch(PDO::FETCH_OBJ);

        } catch (Exception $e) {
            die($e->getMessage());
        }

    }
    
    public function countAllWithSearch($table, $column, $search)
    {
        $sql = "SELECT COUNT(*) FROM {$table} WHERE {$column} LIKE :search";

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(['search' => "%{$search}%"]);
            return intval($stmt->fetch(PDO::FETCH_NUM)[0]);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function insert($table, $parameters)
    {
    $sql = sprintf(
        'INSERT INTO %s (%s) VALUES (:%s)',
        $table,
        implode(', ', array_keys($parameters)),
        implode(', :', array_keys($parameters))
    );

    try {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($parameters);
        return $this->pdo->lastInsertId(); // Retorna o ID do novo registro
    } catch (Exception $e) {
        die($e->getMessage());
    }
    }

    public function update($table, $id, $parameters)
    {
        $sql = sprintf('UPDATE %s SET %s WHERE id = %s',
        $table,
        implode(', ', array_map(function($param) {
            return $param . ' = :' .$param;
        }, array_keys($parameters))),
        $id
    );

    try {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($parameters);


    } catch (Exception $e) {
        die($e->getMessage());
    }
    }

    public function delete($table, $id)
    {
        $sql = sprintf('DELETE FROM %s WHERE %s',
        $table,
        'id = :id'
    );

    try {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(compact('id'));


    } catch (Exception $e) {
        die($e->getMessage());
    }

    }

}