<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Filament\Models\Contracts\HasName;

class Company extends Model implements HasName
{
    /** @use HasFactory<\Database\Factories\CompanyFactory> */
    use HasFactory, HasUuids;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'name',
        'slug',
        'tax_id',
        'logo_url',
        'primary_color',
        'is_active',
    ];

    public function getFilamentName(): string
    {
        return $this->name;
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

}
