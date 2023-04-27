<?php

namespace src\model;

use RuntimeException;

final class Cpf implements Document {
    private string $value;

    public function __construct(string $value) {
        if (!self::isValid($value)) {
            throw new RuntimeException("Value not is valid cpf: $value");
        }
        $this->value = $value;
    }

    static function isValid(string $value): bool {
        return strlen($value) == 11;
    }

    public function getDocument(): Document {
        return $this;
    }

    public function getValue(): string {
        return $this->value;
    }
    
    public function __toString()
    {
        return $this->getValue();
    }
}
