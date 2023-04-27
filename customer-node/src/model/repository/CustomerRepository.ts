import { CustomerUpdateDTO } from "../../controller/dtos/CustomerUpdateDTO"
import { Customer } from "../Customer"
import { Uuid } from "../Uuid"

export interface CustomerRepository {
    save(customer: Customer): Promise<void>
    getAll(): Promise<Array<Customer>>
    getById(id: Uuid): Promise<Customer>
    remove(id: Uuid): Promise<void>
    update(id: Uuid, customerDto: CustomerUpdateDTO): Promise<Customer>
}
