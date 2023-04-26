import { CustomerUpdateDTO } from "../controller/dtos/CustomerUpdateDTO"
import { Customer } from "../model/Customer"
import { Uuid } from "../model/Uuid"
import { CustomerRepository } from "../model/repository/CustomerRepository"



export class CustomerUpdateByIdService {
    
    constructor(readonly repository: CustomerRepository) {
    }

    async execute(id: string, name: string, document: string) {
        let customer = Customer.create(name, document, id)
        const customerDto = new CustomerUpdateDTO(customer.getName(), customer.getDocument().getValue())
        return await this.repository.update(new Uuid(id), customerDto)
    }
}