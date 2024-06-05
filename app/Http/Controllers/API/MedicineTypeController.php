<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;
use App\Models\MedicineType;

class MedicineTypeController extends Controller
{
    /* ----- SWAGGER OA --------- */
    /**
     * @OA\Get(
     *      path="/api/medicineType",
     *      tags={"Medicine Types"},
     *      summary="Retrieve all medicine types",
     *      operationId="GetMedicineType",
     *      @OA\Response(
     *          response=200,
     *          description="Data returned successfully"
     *      )
     * )
     */
    public function index() {
        return MedicineType::get();
    }

    /* ----- SWAGGER OA --------- */
    /**
     * @OA\Get(
     *      path="/api/medicineType/{id}",
     *      operationId="GetSpecificMedicineType",
     *      tags={"Medicine Types"},
     *      summary="Display specific medicine type",
     *      @OA\Response(
     *          response=404,
     *          description="Medicine type not found",
     *          @OA\JsonContent()
     *      ),
     *      @OA\Response(
     *          response=400,
     *          description="Invalid input",
     *          @OA\JsonContent()
     *      ),
     *       @OA\Response(
     *          response=200,
     *          description="Data returned successfully",
     *          @OA\JsonContent()
     *      ),
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          description="ID of medicine type",
     *          required=true,
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      )
     * )
     */
    public function show($id) {
        $medicine_type_selected = MedicineType::find($id);

        if (!$medicine_type_selected) {
            throw new HttpException(404, 'Medicine type not found');
        }

        return $medicine_type_selected;
    }
}
