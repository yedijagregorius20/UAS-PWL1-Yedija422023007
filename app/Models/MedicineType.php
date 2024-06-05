<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\Medicine;

/* ----- SWAGGER OA --------- */
/**
 * @OA\Schema(
 *      title="medicineType",
 *      description="Properties of model medicineType",
 *      required={"name"},
 * 	    @OA\Property(
 *          property="name",
 *          type="string",
 *          example="Antibiotics"
 *      )
 * )
 */

class MedicineType extends Model
{
    // use SoftDeletes;

    protected $table = 'medicine_type';

    public function medicines() {
        // FK on table 'medicines'
        return $this->hasMany(Medicine::class, 'type_id');
    }
}
