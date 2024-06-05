<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\Medicine;

class MedicineType extends Model
{
    use SoftDeletes;

    protected $table = 'medicine_type';

    public function medicines() {
        // FK on table 'medicines'
        return $this->hasMany(Medicine::class, 'type_id');
    }
}
