<?php

namespace src\model;

final class Customer {
    public Uuid $id;
    public string $name;
    public Document $document;

    public function __construct(string $name, Document $document, ?string $id = null)
    {
        $this->id = $id ? Uuid::fromString($id) : Uuid::generateRandom();
        $this->name = $name;
        $this->document = $document;
    }

    public static function create(string $name, string $document, ?string $id = null): Customer {
        $documentCurrent = DocumentFactory::create($document);
        return new Customer($name, $documentCurrent, $id);
    }
}
