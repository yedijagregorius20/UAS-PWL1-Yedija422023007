<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;
use App\Models\Medicine;

class MedicineController extends Controller
{
    /* ----- SWAGGER OA --------- */
    /**
     * @OA\Get(
     *      path="/api/medicines",
     *      tags={"Medicines"},
     *      summary="Retrieve all medicines",
     *      operationId="index",
     *      @OA\Response(
     *          response=200,
     *          description="Data returned successfully"
     *      )
     * )
     */
    public function index() {
        $all_medicines = Medicine::select(
            'medicines.*',
            'suppliers.name as supplier',
            'medicine_type.name as medicine_type'
        )
        ->join('medicine_type', 'medicines.type_id', '=', 'medicine_type.id')
        ->join('suppliers', 'medicines.supplier_id', '=', 'suppliers.id')
        ->get();

        // Unset type_id and supplier_id from each medicine object
        $all_medicines->transform(function ($medicine) {
            unset($medicine->type_id);
            unset($medicine->supplier_id);
            
            return $medicine;
        });

        return response()->json($all_medicines);
    }

    /* ----- SWAGGER OA --------- */
    /**
     * @OA\Post(
     *      path="/api/medicines",
     *      tags={"Medicines"},
     *      summary="Add new medicine into our system",
     *      operationId="store",
     *      @OA\Response(
     *          response=400,
     *          description="Invalid input",
     *          @OA\JsonContent()
     *      ),
     *       @OA\Response(
     *          response=201,
     *          description="New medicine added successfully",
     *          @OA\JsonContent()
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          description="Request body description",
     *          @OA\JsonContent(
     *              ref="#/components/schemas/Medicine",
     *              example={"supplier_id": 1, "type_id": 4, "name": "Nelco", "stock": 21, "price": 26500}
     *          )
     *      ),
     *      security={{"passport_token_ready": {}, "passport": {}}}
     * )
     */
    public function store(Request $request) {

        try {
            $validator = validator()->make($request->all(), [
                'supplier_id' => 'required',
                'type_id' => 'required',
                'name' => 'required|unique:medicines|max:255',
                'stock' => 'required',
                'price' => 'required',
            ]);

            if ($validator->fails()) {
                throw new HttpException(400, $validator->messages()->first());
            }

            $new_medicine = new Medicine;
            $new_medicine->fill($request->all())->save();
            return $new_medicine;
            
        } catch (\Exception $exception) {
            throw new HttpException(400, "Invalid data - {$exception->getMessage()}");
        }
    }

    /* ----- SWAGGER OA --------- */
    /**
     * @OA\Get(
     *      path="/api/medicines/{id}",
     *      operationId="show",
     *      tags={"Medicines"},
     *      summary="Display specific medicine",
     *      @OA\Response(
     *          response=404,
     *          description="Medicine not found",
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
     *          description="ID of medicine",
     *          required=true,
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      )
     * )
     */
    public function show($id) {
        $medicine = Medicine::find($id);

        if (!$medicine) {
            throw new HttpException(404, 'Medicine not found');
        }

        return $medicine;
    }

    /* ----- SWAGGER OA --------- */
    /**
     * @OA\Put(
     *      path="/api/medicines/{id}",
     *      tags={"Medicines"},
     *      summary="Update specific medicine",
     *      operationId="update",
     *      @OA\Response(
     *          response=404,
     *          description="Medicine not found",
     *          @OA\JsonContent()
     *      ),
     *       @OA\Response(
     *          response=400,
     *          description="Invalid input",
     *          @OA\JsonContent()
     *      ),
     *       @OA\Response(
     *          response=200,
     *          description="Medicine updated",
     *          @OA\JsonContent()
     *      ),
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          description="ID of medicine",
     *          required=true,
     *          @OA\Schema(
     *              type="integer",
     *              format="int64"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          description="Request body description",
     *          @OA\JsonContent(
     *              ref="#/components/schemas/Medicine",
     *              example={"supplier_id": 1, "type_id": 4, "name": "Nelco", "stock": 21, "price": 26500}
     *          )
     *      ),
     *      security={{"passport_token_ready": {}, "passport": {}}}
     * )
     */
    public function update(Request $request, $id) {

        $selected_medicine = Medicine::find($id);

        // Check if ID exists or not
        if (!$selected_medicine) {
            throw new HttpException(404, "Medicine not found");
        }

        try {
            $validator = validator()->make($request->all(), [
                'name' => 'required|unique:medicines',
                'stock' => 'required',
                'price' => 'required',
            ]);

            if ($validator->fails()) {
                throw new HttpException(400, $validator->messages()->first());
            }

            $selected_medicine->fill($request->all())->save();

            return response()->json(array('message'=>'Medicine updated successfully'), 200);

        } catch (\Exception $exception) {
            throw new HttpException(400, "Invalid Data - {$exception->getMessage()}");
        }
    }

    /* ----- SWAGGER OA --------- */
    /**
     * @OA\Delete(
     *      path="/api/medicines/{id}",
     *      tags={"Medicines"},
     *      summary="Delete specific medicine",
     *      operationId="destroy",
     *      @OA\Response(
     *          response=404,
     *          description="Medicine not found",
     *          @OA\JsonContent()
     *      ),
     *      @OA\Response(
     *          response=400,
     *          description="Invalid input",
     *          @OA\JsonContent()
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Medicine deleted",
     *          @OA\JsonContent()
     *      ),
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          description="ID of medicine",
     *          required=true,
     *          @OA\Schema(
     *              type="integer",
     *              format="int64"
     *          )
     *      ),
     *      security={{"passport_token_ready": {}, "passport": {}}}
     * )
     */
    public function destroy($id) {
        $selected_medicine = Medicine::find($id);

        // Check if ID exists or not
        if (!$selected_medicine) {
            throw new HttpException(404, 'Medicine not found');
        }

        try {
            $selected_medicine->forceDelete();
            return response()->json(array('message'=>'Medicine deleted successfully'), 200);
        } catch (\Exception $exception) {
            throw new HttpException(400, "Invalid Data: {$exception->getMessage()}");
        }
    }
}
