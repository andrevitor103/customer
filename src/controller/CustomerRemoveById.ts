import { Request, Response } from "express"
import { Uuid } from "../model/Uuid"
import { CustomerRemoveByIdService } from "../services/CustomerRemoveByIdService"

export class CustomerRemoveById {

    constructor(readonly service: CustomerRemoveByIdService) {
    }

    async execute(request: Request, response: Response) {
        let id: string|Uuid = request.params.id
        await this.service.execute(id)
        response.status(204).json({})
    }
}
