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
     *          description="Data returned successfully",
     *          @OA\JsonContent()
     *      ),
     *      @OA\Parameter(
     *          name="_page",
     *          in="query",
     *          description="Current page of listing",
     *          required=true,
     *          @OA\Schema(
     *              type="integer",
     *              format="int64",
     *              example=1
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="_limit",
     *          in="query",
     *          description="Max item displayed in a page",
     *          required=true,
     *          @OA\Schema(
     *              type="integer",
     *              format="int64",
     *              example=10
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="_search",
     *          in="query",
     *          description="Search medicine or supplier",
     *          required=false,
     *          @OA\Schema(
     *              type="string",
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="_supplier",
     *          in="query",
     *          description="Search a supplier by name",
     *          required=false,
     *          @OA\Schema(
     *              type="string",
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="_sort_by",
     *          in="query",
     *          description="Sort item based on selected parameter",
     *          required=false,
     *          @OA\Schema(
     *              type="string",
     *              example="stock"
     *          )
     *      ),
     * )
     */
    public function index(Request $request) {
       
        try {
            $data['filter']         = $request->all();
            $page                   = $data['filter']['_page'] = (@$data['filter']['_page'] ? intval($data['filter']['_page']) : 1);
            $limit                  = $data['filter']['_limit'] = (@$data['filter']['_limit'] ? intval($data['filter']['_limit']) : 1000);
            $offset                 = ($page ? ($page - 1) * $limit : 0);

            $data['products'] = Medicine::select(
                'medicines.id',
                'medicines.name',
                'medicines.description',
                'suppliers.name as supplier',
                'medicine_type.name as medicine_type',
                'medicines.stock',
                'medicines.price',
                'medicines.created_at',
                'medicines.created_by',
                'medicines.updated_at',
                'medicines.updated_by'
            )
            ->join('suppliers', 'medicines.supplier_id', '=', 'suppliers.id')
            ->join('medicine_type', 'medicines.type_id', '=', 'medicine_type.id')
            ->whereRaw('1 = 1');

            // If filter by search
            if ($search = $request->get('_search')) {
                $data['products'] = $data['products']->where(function($q) use ($search) {
                    $q->where('medicines.name', 'LIKE', '%' . strtolower($search) . '%')
                      ->orWhere('suppliers.name', 'LIKE', '%' . strtolower($search) . '%');
                });
            }

            // If filter by supplier
            if ($supplierName = $request->get('_supplier')) {
                $data['products'] = $data['products']->where('suppliers.name', 'LIKE', '%' . strtolower($supplierName) . '%');
            }

            // Sorting
            if ($sortBy = $request->get('_sort_by')) {
                switch ($sortBy) {
                    default:
                    case 'stock':
                        $data['products'] = $data['products']->orderBy('medicines.stock', 'DESC');
                        break;
                    case 'latest_added':
                        $data['products'] = $data['products']->orderBy('medicines.created_at', 'DESC');
                        break;
                    case 'name_asc':
                        $data['products'] = $data['products']->orderBy('medicines.name', 'ASC');
                        break;
                    case 'name_desc':
                        $data['products'] = $data['products']->orderBy('medicines.name', 'DESC');
                        break;
                    case 'price_asc':
                        $data['products'] = $data['products']->orderBy('medicines.price', 'ASC');
                        break;
                    case 'price_desc':
                        $data['products'] = $data['products']->orderBy('medicines.price', 'DESC');
                        break;
                }
            }

            $data['products_count_total'] = $data['products']->count();
            $data['products'] = ($limit == 0 && $offset == 0) ? $data['products'] : $data['products']->limit($limit)->offset($offset);
            $data['products'] = $data['products']->get();
            $data['products_count_start'] = ($data['products_count_total'] == 0 ? 0 : (($page - 1) * $limit) + 1);
            $data['products_count_end'] = ($data['products_count_total'] == 0 ? 0 : (($page - 1) * $limit) + sizeof($data['products']));

            return response()->json($data, 200);

        } catch (\Exception $exception) {
            throw new HttpException(400, "Invalid Data - {$exception->getMessage()}");
        }
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
            throw new HttpException(400, "Invalid Data - {$exception->getMessage()}");
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
        $medicine = Medicine::select(
            'medicines.id',
            'medicines.name',
            'medicines.description',
            'suppliers.name as supplier',
            'medicine_type.name as medicine_type',
            'medicines.stock',
            'medicines.price',
            'medicines.created_at',
            'medicines.created_by',
            'medicines.updated_at',
            'medicines.updated_by'
        )
        ->join('suppliers', 'medicines.supplier_id', '=', 'suppliers.id')
        ->join('medicine_type', 'medicines.type_id', '=', 'medicine_type.id')
        ->where('medicines.id', $id)
        ->first();

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
