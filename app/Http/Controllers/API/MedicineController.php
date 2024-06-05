<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;
use App\Models\Medicine;

class MedicineController extends Controller
{
    // Display list of all medicines
    public function index() {
        $all_medicines = Medicine::select(
            'medicines.*',
            'suppliers.name as supplier',
            'medicine_type.name as medicine_type'
        )
        ->join('medicine_type', 'medicines.type_id', '=', 'medicine_type.id')
        ->join('suppliers', 'medicines.supplier_id', '=', 'suppliers.id')
        ->get();

    return response()->json($all_medicines);
    }

    // Add new medicine
    public function AddMedicine(Request $request) {
        try {
            $new_medicine = new Medicine;
            $new_medicine->fill($request->validated())->save();

            return $new_medicine;
        } catch (\Exception $exception) {
            throw new HttpException(400, "Invalid Data - {$exception->getMessage()}");
        }
    }

    // Display specific medicine
    public function GetSpecificMedicine($id) {
        $medicine = Medicine::findOrFail($id);

        return $medicine;
    }

    // Update specific medicine
    public function UpdateMedicine(Request $request, $id) {

        // Check if ID exists or not
        if (!$id) {
            throw new HttpException(400, "ID not found");
        }

        try {
            $selected_medicine = Medicine::find($id);
            $selected_medicine->fill($request->validated())->save();

            return $selected_medicine;
        } catch (\Exception $exception) {
            throw new HttpException(400, "Invalid Data - {$exception->getMessage()}");
        }
    }

    // Delete specific medicine
    public function DeleteMedicine($id) {
        $selected_medicine = Medicine::findOrFail($id);
        $selected_medicine->delete();

        return response()->json(null, 204);
    }
}
