<?php

namespace src\infra\repository\memory;

use src\controller\dto\output\CustomerOutput;
use src\model\Customer;
use src\model\repository\CustomerRepository;

final class CustomerRepositoryInMemory implements CustomerRepository {
    private array $customerCollection = array();

    public function create(Customer $customer): void {
            array_push($this->customerCollection, $customer);
    }

    public function getAll(): array {
        foreach($this->customerCollection as &$customer) {
            $customer = new CustomerOutput($customer->id->getValue(), $customer->name, $customer->document->getValue());
        }
        return $this->customerCollection;
    }

}
