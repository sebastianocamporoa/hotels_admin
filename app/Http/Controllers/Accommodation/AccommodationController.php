<?php

namespace App\Http\Controllers\Accommodation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Accommodation;

class AccommodationController extends Controller
{
    /**
     * Display a listing of the accommodations.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $accommodations = Accommodation::all();

        return response()->json([
            'success' => true,
            'data' => $accommodations,
        ]);
    }

    /**
     * Store a newly created accommodation in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|max:20',
            ]);

            $accommodation = new Accommodation();
            $accommodation->name = $request->input('name');

            // Create a new accommodation
            $accommodation->save();

            return response()->json([
                'success' => true,
                'message' => 'Accommodation created successfully',
                'data' => $accommodation,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create accomodation',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Display the specified accommodation.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $accommodation = Accommodation::find($id);

        if (!$accommodation) {
            return response()->json([
                'success' => false,
                'message' => 'Accommodation not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $accommodation,
        ]);
    }

    /**
     * Update the specified accommodation in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        try {
            //validate data
            $request->validate([
                'name' => 'required|max:20',
            ]);

            //Find accommodation by id
            $accommodation = Accommodation::find($id);

            if (!$accommodation) {
                return response()->json([
                    'success' => false,
                    'message' => 'Accommodation not found',
                ], 404);
            }

            //update information
            $accommodation->fill($request->only(['name']));
            $accommodation->save();

            return response()->json([
                'success' => true,
                'message' => 'Accommodation updated successfully',
                'data' => $accommodation,
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update accommodation',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Remove the specified accommodation from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        try {
            //Find accommodation by id
            $accommodation = Accommodation::find($id);

            if (!$accommodation) {
                return response()->json([
                    'success' => false,
                    'message' => 'Accommodation not found',
                ], 404);
            }

            //delete accommodation
            $accommodation->delete();

            return response()->json([
                'success' => true,
                'message' => 'Accommodation deleted successfully',
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete accommodation',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
