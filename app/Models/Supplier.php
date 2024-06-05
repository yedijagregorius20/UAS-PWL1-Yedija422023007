<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\Medicine;

/* ----- SWAGGER OA --------- */
/**
 * @OA\Schema(
 *      title="supplier",
 *      description="Properties of model supplier",
 *      required={"name"},
 * 	    @OA\Property(
 *          property="name",
 *          type="string",
 *          example="PT Kimia Farma"
 *      )
 * )
 */

class Supplier extends Model
{
    // use SoftDeletes;

    protected $table = 'suppliers';

    public function medicines() {
        // FK on table 'medicines'
        return $this->hasMany(Medicine::class, 'supplier_id');
    }
}
