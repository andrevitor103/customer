import { Request, Response } from "express"
import { CustomerRepository } from "../model/repository/CustomerRepository"
import { Customer } from "../model/Customer"
import { CustomerUpdateDTO } from "./dtos/CustomerUpdateDTO"
import { CustomerUpdateByIdService } from "../services/CustomerUpdateByIdService"

export class CustomerUpdateById {

    constructor(readonly service: CustomerUpdateByIdService) {
    }

    async execute(request: Request, response: Response) {
        const { id } = request.params
        const { name, document } = request.body
        const customer = await this.service.execute(id, name, document)
        response.status(200).json({customer})
    }
}
