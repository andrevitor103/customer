// Update with your config settings.

/**
 * @type { Object.<string, import("knex").Knex.Config> }
 */

import Dotenv from "dotenv"
Dotenv.config({path: 'env/dev.env'})

console.log(process.env.DB_PASSWORD)

export const development = {
    client: 'mysql',
    connection: {
        user: process.env.DB_USER ?? '',
        password: process.env.DB_PASSWORD ?? '',
        host: process.env.DB_HOST ?? '',
        port: process.env.DB_PORT,
        database: process.env.DB_DATABASE
    }
};
export const staging = {
    client: 'postgresql',
    connection: {
        database: 'my_db',
        user: 'username',
        password: 'password'
    },
    pool: {
        min: 2,
        max: 10
    },
    migrations: {
        tableName: 'knex_migrations'
    }
};
export const production = {
    client: 'postgresql',
    connection: {
        database: 'my_db',
        user: 'username',
        password: 'password'
    },
    pool: {
        min: 2,
        max: 10
    },
    migrations: {
        tableName: 'knex_migrations'
    }
};