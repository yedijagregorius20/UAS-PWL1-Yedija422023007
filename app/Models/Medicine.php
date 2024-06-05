<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

/* ----- SWAGGER OA --------- */
/**
 * @OA\Schema(
 *      title="medicine",
 *      description="Required properties of model medicine",
 *      required={"name", "stock", "price"},
 * 	    @OA\Property(
 *          property="name",
 *          type="string",
 *          example="Counter Pain"
 *      ),
 *  	@OA\Property(
 *          property="stock",
 *          type="integer",
 *          example="30"
 *     ),
 *      @OA\Property(
 *          property="price",
 *          type="integer",
 *          example="25000"
 *     )
 * )
 */

class Medicine extends Model
{
    // use HasFactory;
    use SoftDeletes;

    // Connect with table 'medicine_type'
    public function medicineType() {
        return $this->belongsTo(MedicineType::class, 'medicine_type');
    } 

    // Connect with table 'supplier'
    public function supplier() {
        return $this->belongsTo(Supplier::class, 'suppliers');
    }

    protected $table = 'medicines';
    protected $fillable  = [
        'supplier_id',
        'type_id',
        'name',
        'stock',
        'price',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by'
    ];

    public function creator() {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }


}
