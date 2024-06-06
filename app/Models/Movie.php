<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'year',
        'status',
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function scopeAdvancedSearch($query, $search)
    {
        if ($search) {
            $query->where('title', 'like', '%' . $search . '%')
                ->orWhere('year', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%');
        }
        return $query;
    }

    public function scopeSearchByCompany($query, $companyId)
    {
        if ($companyId) {
            $query->where('company_id', $companyId);
        }
        return $query;
    }

    public function scopeSearchByCategory($query, $categoryId)
    {
        if ($categoryId) {
            $query->whereHas('categories', function ($query) use ($categoryId) {
                $query->whereIn('categories.id', $categoryId);
            });
        }
        return $query;
    }

    public function scopeOrderByYear($query, $order)
    {
        if ($order == 'newest') {
            $query->orderBy('year', 'desc');
        } elseif ($order == 'oldest') {
            $query->orderBy('year', 'asc');
        }
        return $query;
    }
}
