<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;
use App\Models\Supplier;


class SupplierController extends Controller
{
    /* ----- SWAGGER OA --------- */
    /**
     * @OA\Get(
     *      path="/api/supplier",
     *      tags={"Supplier"},
     *      summary="Retrieve all supplier",
     *      operationId="GetSupplier",
     *      @OA\Response(
     *          response=200,
     *          description="Data returned successfully"
     *      )
     * )
     */
    public function index() {
        return Supplier::get();
    }

    /* ----- SWAGGER OA --------- */
    /**
     * @OA\Get(
     *      path="/api/supplier/{id}",
     *      operationId="GetSpecificSupplier",
     *      tags={"Supplier"},
     *      summary="Display specific supplier",
     *      @OA\Response(
     *          response=404,
     *          description="Supplier not found",
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
     *          description="ID of supplier",
     *          required=true,
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      )
     * )
     */
    public function show($id) {
        $supplier_selected = Supplier::find($id);

        if (!$supplier_selected) {
            throw new HttpException(404, 'Supplier not found');
        }

        return $supplier_selected;
    }
}
