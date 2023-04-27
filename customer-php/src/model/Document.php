<?php

namespace src\model;


interface Document {
    public function getDocument(): Document;
    public function getValue(): string;
    
}