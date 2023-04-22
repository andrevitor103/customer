
import { validate as validateUuid, v4 as uuidV4 } from 'uuid'

export class Uuid {
    private value: string

    constructor(value: string) {
        if (!validateUuid(value)) {
            throw new Error(`Value not is valid uuid: ${value}`)
        }
        this.value = value
    }

    static randomGenerator(): Uuid {
        return new Uuid(uuidV4())
    }

    public getValue(): string {
        return this.value
    }
}
