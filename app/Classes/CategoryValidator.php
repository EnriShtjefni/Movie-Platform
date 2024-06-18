<?php

namespace App\Classes;

class CategoryValidator extends BaseValidator
{
    public function validate(array $data): bool
    {
        if (empty($data['name'])) {
            $this->errors[] = 'Name is required.';
        }

        return empty($this->errors);
    }
}

