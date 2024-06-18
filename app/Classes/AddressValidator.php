<?php

namespace App\Classes;

class AddressValidator extends BaseValidator
{
    public function validate(array $data): bool
    {
        if (empty($data['name'])) {
            $this->errors[] = 'Name is required.';
        }

        if (empty($data['city'])) {
            $this->errors[] = 'City is required.';
        }

        if (empty($data['country'])) {
            $this->errors[] = 'Country is required.';
        }

        if (empty($data['phone'])) {
            $this->errors[] = 'Phone is required.';
        }

        return empty($this->errors);
    }
}

