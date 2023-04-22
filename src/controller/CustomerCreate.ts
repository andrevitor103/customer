import { Request, Response } from "express"
import { CustomerRepository } from "../model/repository/CustomerRepository"
import { Customer } from "../model/Customer"

export class CustomerCreate {

    constructor(readonly repository: CustomerRepository) {
    }

    async execute(request: Request, response: Response) {
        const { name, document } = request.body
        const customer = Customer.create(name, document)
        await this.repository.save(customer)
        response.status(201).json({customer})
    }
}
