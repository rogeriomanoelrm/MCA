<?php

class User extends Conn
{
    public object $conn;
    public array $formData;

    public function list(): array
    {
        $this->conn = $this->connectDb();
        $query_users = "SELECT id, nome, datahoje, datanasc, telefone FROM users4 ORDER BY id ASC LIMIT 40";
        $result_users = $this->conn->prepare($query_users);
        $result_users->execute();
        $retorno = $result_users->fetchAll();
        // var_dump($retorno);
        return $retorno;
    }

    public function delete($id): bool
    {
        $this->conn = $this->connectDb();
        $query_delete_user = "DELETE FROM users4 WHERE id = :id";
        $delete_user = $this->conn->prepare($query_delete_user);
        $delete_user->bindParam(':id', $id);
        $delete_user->execute();
    
        if ($delete_user->rowCount()) {
            return true;
        } else {
            return false;
        }
    }
    

    public function index(): bool
    {
        var_dump($this->formData);
        $this->conn = $this->connectDb();
        $query_user = "INSERT INTO users4 (nome, datahoje, datanasc, telefone) VALUES (:nome, :datahoje, :datanasc, :telefone)";
        $add_user = $this->conn->prepare($query_user);
        $add_user->bindParam(':nome', $this->formData['nome']);
        $add_user->bindParam(':datahoje', $this->formData['datahoje']);
        $add_user->bindParam(':datanasc', $this->formData['datanasc']);
        $add_user->bindParam(':telefone', $this->formData['telefone']);
        
        
        
      



        $add_user->execute();

        if ($add_user->rowCount()) {
            return true;
        } else {
            return false;
        }
    }
}
