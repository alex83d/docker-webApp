<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

/**
 * class Category
 * @package App\Models
 * @property-read $id
 * @property-read $title
 * @property-read $description
 * @property-read Good[] $goods
*/

class Category extends Model
{
    public function goods()
    {
        return $this->hasMany(Good::class);
    }
}
