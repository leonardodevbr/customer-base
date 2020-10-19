<?php

namespace App;

use Database\Connection;

class Model
{
    public $id;
    public $full_name;
    public $email;
    public $cpf;
    public $phone;

    /**
     * Model constructor.
     * @param $fullName
     * @param $email
     * @param $cpf
     * @param $phone
     */
    public function __construct($fullName = null, $email = null, $cpf = null, $phone = null)
    {
        $this->full_name = $fullName;
        $this->email = $email;
        $this->cpf = $cpf;
        $this->phone = $phone;
    }

    public function save()
    {
        $conn = new Connection();
        $pdo = $conn->start();

        $data = [
            'full_name' => $this->full_name,
            'email' => $this->email,
            'cpf' => $this->cpf,
            'phone' => $this->phone
        ];

        $stmt = $pdo->prepare("INSERT INTO customers (full_name, email, cpf, phone) VALUES (:full_name,:email,:cpf,:phone)");
        $stmt->execute($data);
    }

    /**
     * @param $id
     */
    public function update($id)
    {
        $conn = new Connection();
        $pdo = $conn->start();

        $data = [
            'id' => $id,
            'full_name' => $this->full_name,
            'email' => $this->email,
            'cpf' => $this->cpf,
            'phone' => $this->phone,
        ];

        $stmt = $pdo->prepare("UPDATE customers set full_name = :full_name, email = :email, cpf = :cpf, phone = :phone WHERE id = :id");
        $stmt->execute($data);
    }

    /**
     * @param $id
     * @return Model|null
     */
    public function getById($id)
    {
        $conn = new Connection();
        $pdo = $conn->start();

        $stmt = $pdo->prepare("SELECT * FROM customers WHERE id = ?");
        $stmt->execute([$id]);
        $data = $stmt->fetch();
        if ($data) {
            return $this->create($data);
        }
        return null;
    }

    /**
     * @param $cpf
     * @param null $id
     * @return Model|null
     */
    public function getByCPF($cpf, $id = null)
    {
        $conn = new Connection();
        $pdo = $conn->start();

        $sql = "SELECT * FROM customers WHERE cpf = ?";
        $data = [$cpf];
        if (!empty($id)) {
            $sql .= " AND id != ?";
            array_push($data, $id);
        }
        $stmt = $pdo->prepare($sql);
        $stmt->execute($data);
        $data = $stmt->fetch();
        if ($data) {
            return $this->create($data);
        }
        return null;
    }

    /**
     * @param $email
     * @param null $id
     * @return Model|null
     */
    public function getByEmail($email, $id = null)
    {
        $conn = new Connection();
        $pdo = $conn->start();

        $data = [$email];
        $sql = "SELECT * FROM customers WHERE email = ?";
        if (!empty($id)) {
            $sql .= " AND id != ?";
            array_push($data, $id);
        }
        $stmt = $pdo->prepare($sql);
        $stmt->execute($data);
        $data = $stmt->fetch();
        if ($data) {
            return $this->create($data);
        }
        return null;
    }

    /**
     * @param $id
     * @return bool
     */
    public function delete($id)
    {
        $conn = new Connection();
        $pdo = $conn->start();

        $stmt = $pdo->prepare("DELETE FROM customers WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function getAll()
    {
        $conn = new Connection();
        $pdo = $conn->start();

        $stmt = $pdo->prepare("SELECT * FROM customers");
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $rows = $stmt->fetchAll();
            $collection = [];

            foreach ($rows as $key => $row) {
                $collection[$key] = $this->create($row);
            }

            return $collection;
        }
        return null;
    }

    /**
     * @param $data
     * @return Model
     */
    public function create($data)
    {

        $customer = new Model($data['full_name'], $data['email'], $data['cpf'], $data['phone']);
        if (isset($data['id']) && !empty($data['id'])) {
            $customer->setId($data['id']);
        }

        return $customer;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed|null $fullName
     */
    public function setFullName($fullName)
    {
        $this->full_name = $fullName;
    }

    /**
     * @param mixed|null $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @param mixed|null $cpf
     */
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }

    /**
     * @param mixed|null $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }
}
