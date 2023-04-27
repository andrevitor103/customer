<?php

namespace src\model\repository;

use src\controller\dto\input\CustomerUpdateDto;
use src\controller\dto\output\CustomerOutput;
use src\model\Customer;

interface CustomerRepository {
    public function create(Customer $customer): void;
    public function getAll(): array;
    public function getById(string $id): Customer|null;
    public function deleteById(string $id): void;
    public function update(string $id, CustomerUpdateDto $customerDto): Customer;    
}
