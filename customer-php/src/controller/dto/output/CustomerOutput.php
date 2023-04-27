<?php

namespace src\controller\dto\output;

final class CustomerOutput {
    public function __construct(
        public string $id,
        public string $name,
        public string $document
    ) {
    }
}
