import { Customer } from "../../../model/Customer";
import { Uuid } from "../../../model/Uuid";
import { CustomerRepository } from "../../../model/repository/CustomerRepository";


export class CustomerRepositoryInMemory implements CustomerRepository {
    private customerCollection: Array<Customer> = []

    async save(customer: Customer): Promise<void> {
        this.customerCollection.push(customer)
    }

    async getAll(): Promise<Customer[]> {
        return this.customerCollection
    }

    getById(id: Uuid): Promise<Customer> {
        throw new Error("Method not implemented.");
    }

    remove(id: Uuid): Promise<void> {
        throw new Error("Method not implemented.");
    }

    update(id: Uuid): Promise<Customer> {
        throw new Error("Method not implemented.");
    }
}
