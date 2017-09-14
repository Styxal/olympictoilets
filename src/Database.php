<?php

namespace App;

class Database
{

    private $connection;

    public function connect($dsn, $user, $pass = null)
    {
        $this->connection = new \PDO($dsn, $user, $pass);
    }

    public function select($values, $table, $options = array())
    {
        $sql = "SELECT {$values} FROM {$table}";

        if(isset($options['orderBy'])) {
            $sql .= " ORDER BY {$options['orderBy']['values']} {$options['orderBy']['order']}";
        }

        return $this->executeQuery($sql);
    }

    public function selectInnerJoin($values, $table, $foreignTable, $options = array())
    {
        $sql = "SELECT {$values} FROM {$table}";

        if (!empty($foreignTable)) {
            foreach ($foreignTable as $tableName => $item) {
                $sql .= " INNER JOIN {$tableName} ON {$table}.{$item['native']}={$tableName}.{$item['foreign']}";
            }
        }

        if(isset($options['orderBy'])) {
            $sql .= " ORDER BY {$options['orderBy']['values']} {$options['orderBy']['order']}";
        }

        $sql .=";";

        return $this->executeQuery($sql);
    }

    public function getConnection()
    {
        return $this->connection;
    }

    public function executeQuery($sql)
    {
        $this->connection->prepare($sql);
        $result = $this->connection->query($sql);
        if ($result) {
            if ($result->execute()) {
                return $result->fetchAll(\PDO::FETCH_ASSOC);
            }
        }
        +d($sql);
        return false;
    }

}