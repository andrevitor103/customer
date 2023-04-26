import { Customer } from "../model/Customer";
import { CustomerRepository } from "../model/repository/CustomerRepository";



export class CustomerCreateService {
    constructor(readonly repository: CustomerRepository) {
    }

    async execute(name: string, document: string) {
        const customer = Customer.create(name, document)
        await this.repository.save(customer)
        return customer
    }
}
