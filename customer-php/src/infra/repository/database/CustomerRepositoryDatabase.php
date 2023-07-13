<?php

namespace src\infra\repository\database;

use src\controller\dto\input\CustomerUpdateDto;
use src\controller\dto\output\CustomerOutput;
use src\infra\repository\connection\Connection;
use src\model\Customer;
use src\model\repository\CustomerRepository;

final class CustomerRepositoryDatabase implements CustomerRepository {

    public function __construct(private readonly Connection $connection)
    {
    }

    public function create(Customer $customer): void {
        $sql = "INSERT INTO customer(id, name, document) VALUES(:id, :name, :document);";
        $sql = $this->connection->connection->prepare($sql);
        $sql->bindValue(':id', $customer->id->getValue());
        $sql->bindValue(':name', $customer->name);
        $sql->bindValue(':document', $customer->document->getValue());
        $sql->execute();
    }

    public function getAll(): array {
        $sql = "SELECT * FROM customer";
        $sql = $this->connection->connection->query($sql);
        $result = $sql->fetchAll() ?? array();
        foreach($result as &$row) {
            $row = new CustomerOutput($row['id'], $row['name'], $row['document']);
        }
        return $result;
    }

    public function getById(string $id): Customer|null {
        $sql = "SELECT * FROM customer WHERE id = :id";
        $sql = $this->connection->connection->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();
        if ($sql->rowCount() == 0) {
            return null;
        }
        $sql = $sql->fetch();
        return Customer::create($sql['name'], $sql['document'], $sql['id']);
    }

    public function deleteById(string $id): void {
        $sql = "DELETE FROM customer WHERE id = :id";
        $sql = $this->connection->connection->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();
    }

    public function update(string $id, CustomerUpdateDto $customerDto): Customer {
        $sql = "UPDATE customer SET name = :name, document = :document WHERE id = :id";
        $sql = $this->connection->connection->prepare($sql);
        $sql->bindValue(':name', $customerDto->name);
        $sql->bindValue(':document', $customerDto->document);
        $sql->bindValue(':id', $id);
        $sql->execute();
        return $this->getById($id);
    }

}