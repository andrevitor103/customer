import { Uuid } from "../model/Uuid"
import { CustomerRepository } from "../model/repository/CustomerRepository"



export class CustomerGetByIdService {
    
    constructor(readonly repository: CustomerRepository) {
    }

    async execute(id: string) {
        const customer = await this.repository.getById(new Uuid(id))
        return customer
    }
}