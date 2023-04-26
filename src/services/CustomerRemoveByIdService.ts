import { Uuid } from "../model/Uuid"
import { CustomerRepository } from "../model/repository/CustomerRepository"



export class CustomerRemoveByIdService {
    
    constructor(readonly repository: CustomerRepository) {
    }

    async execute(id: string) {
        await this.repository.remove(new Uuid(id))
    }
}