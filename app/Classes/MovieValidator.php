<?php

namespace App\Classes;

class MovieValidator extends BaseValidator
{
    public function validate(array $data): bool
    {
        if (empty($data['title'])) {
            $this->errors[] = 'Title is required.';
        }

        if (empty($data['description'])) {
            $this->errors[] = 'Description is required.';
        }

        if (empty($data['year']) || !is_int($data['year'])) {
            $this->errors[] = 'Year must be an integer.';
        }

        if (empty($data['status'])) {
            $this->errors[] = 'Status is required.';
        }

        if (empty($data['company_id']) || !is_int($data['company_id'])) {
            $this->errors[] = 'Company ID must be a valid integer.';
        }

        if (empty($data['categories']) || !is_array($data['categories'])) {
            $this->errors[] = 'Categories must be a non-empty array.';
        }

        return empty($this->errors);
    }
}
