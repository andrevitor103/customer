import { Request, Response, Router } from 'express'
import { CustomerRepositoryInMemory } from './infra/repository/memory/CustomerRepositoryInMemory'
import { CustomerCreate } from './controller/CustomerCreate'
import { CustomerList } from './controller/CustomerList'
import { CustomerRepositoryDatabase } from './infra/repository/database/CustomerRepositoryDatabase'
import { CustomerRepository } from './model/repository/CustomerRepository'
import { CustomerById } from './controller/CustomerGetById'
import { CustomerRemoveById } from './controller/CustomerRemoveById'
import { CustomerUpdateById } from './controller/CustomerUpdateById'
import { CustomerCreateService } from './services/CustomerCreateService'
import { CustomerGetByIdService } from './services/CustomerGetByIdService'
import { CustomerGetAllService } from './services/CustomerGetAllService'
import { CustomerRemoveByIdService } from './services/CustomerRemoveByIdService'
import { CustomerUpdateByIdService } from './services/CustomerUpdateByIdService'

const router = Router()

// const repository = new CustomerRepositoryInMemory()
const repository = new CustomerRepositoryDatabase()

const customerCreateService = new CustomerCreateService(repository)
const customerCreate = new CustomerCreate(customerCreateService)

const customerByIdService = new CustomerGetByIdService(repository)
const customerById = new CustomerById(customerByIdService)

const customerGetAllService = new CustomerGetAllService(repository)
const customerList = new CustomerList(customerGetAllService)

const customerRemoveByIdService = new CustomerRemoveByIdService(repository)
const customerRemoveById = new CustomerRemoveById(customerRemoveByIdService)

const customerUpdateByIdService = new CustomerUpdateByIdService(repository)
const customerUpdateById = new CustomerUpdateById(customerUpdateByIdService)

router.post('/customer', (request: Request, response: Response) => {
    customerCreate.execute(request, response)
})

router.get('/customer', (request: Request, response: Response) => {
    customerList.execute(request, response)
})

router.get('/customer/:id', (request: Request, response: Response) => {
    customerById.execute(request, response)
})

router.delete('/customer/:id', (request: Request, response: Response) => {
    customerRemoveById.execute(request, response)
})

router.patch('/customer/:id', (request: Request, response: Response) => {
    customerUpdateById.execute(request, response)
})

export { router }
