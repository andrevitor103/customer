<?php

namespace src\controller\dto\input;

final class CustomerUpdateDto {
    public function __construct(
        public readonly string $name,
        public readonly string $document
    ) {
    }
}
