<?php
namespace src\model;

use Ramsey\Uuid\Uuid as RamseyUuid;
use RuntimeException;

final class Uuid {
    public function __construct(private string $value)
    {
    }
    
    public static function generateRandom(): Uuid {
        return new Uuid(RamseyUuid::uuid4()->toString());
    }
    
    public static function fromString(string $value): Uuid {
        if (!RamseyUuid::isValid($value)) {
            throw new RuntimeException("Value not is valid id: $value");
        }
        return new Uuid(RamseyUuid::fromString($value)->toString());
    }

    public function getValue()
    {
        return $this->value;
    }
}
