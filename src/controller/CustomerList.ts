import { Request, Response } from "express"
import { CustomerGetAllService } from "../services/CustomerGetAllService"


export class CustomerList {

    constructor(readonly service: CustomerGetAllService) {
    }

    async execute(request: Request, response: Response) {
        const customerCollection = await this.service.execute()
        response.status(200).json({customerCollection})
    }
}
