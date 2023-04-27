import { CustomerRepository } from "../model/repository/CustomerRepository"



export class CustomerGetAllService {
    
    constructor(readonly repository: CustomerRepository) {
    }

    async execute() {
        const customerCollection = await this.repository.getAll()
        return customerCollection
    }
}