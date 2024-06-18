<?php

namespace App\Classes;

class CompanyValidator extends BaseValidator
{
    public function validate(array $data): bool
    {
        if (empty($data['name'])) {
            $this->errors[] = 'Name is required.';
        }

        if (empty($data['address_id']) || !is_int($data['address_id'])) {
            $this->errors[] = 'Address ID must be a valid integer.';
        }

        return empty($this->errors);
    }
}

