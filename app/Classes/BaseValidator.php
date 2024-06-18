<?php

namespace App\Classes;

abstract class BaseValidator
{
    protected array $errors = [];

    abstract public function validate(array $data): bool;

    public function getErrors(): array
    {
        return $this->errors;
    }
}
