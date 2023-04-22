import { Request, Response } from "express"
import { CustomerRepository } from "../model/repository/CustomerRepository"
import { Customer } from "../model/Customer"
import { Uuid } from "../model/Uuid"

export class CustomerRemoveById {

    constructor(readonly repository: CustomerRepository) {
    }

    async execute(request: Request, response: Response) {
        let id: string|Uuid = request.params.id
        id = new Uuid(id)
        await this.repository.remove(id)
        response.status(204).json({})
    }
}
