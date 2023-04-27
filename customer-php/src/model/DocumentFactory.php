<?php

namespace src\model;

use RuntimeException;

final class DocumentFactory {

    public static function create(string $value): Document {
        if (Cpf::isValid($value)) {
            return new Cpf($value);
        }

        if (Cnpj::isValid($value)) {
            return new Cnpj($value);
        }
        throw new RuntimeException("Value not is document: $value");
    }
}
