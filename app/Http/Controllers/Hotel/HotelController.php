<?php

namespace App\Http\Controllers\Hotel;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function index()
    {
        $hotels = Hotel::all();

        return response()->json([
            'success' => true,
            'data' => $hotels,
        ]);
    }

    public function create(Request $request)
    {
        // validate data
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'nit' => 'required',
        ]);

        try {
            // Create a new instance of the Hotel model
            $hotel = new Hotel();
            $hotel->name = $request->input('name');
            $hotel->address = $request->input('address');
            $hotel->city = $request->input('city');
            $hotel->nit = $request->input('nit');

            // Save the new hotel in the database
            $hotel->save();

            return response()->json([
                'success' => true,
                'message' => 'Hotel created successfully',
                'data' => $hotel,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create hotel',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function show($id)
    {
        $hotel = Hotel::find($id);

        if (!$hotel) {
            return response()->json([
                'success' => false,
                'message' => 'Hotel not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $hotel,
        ]);
    }

    public function update(Request $request, $id)
    {
        // validate data
        $request->validate([
            'name' => 'sometimes|required',
            'address' => 'sometimes|required',
            'city' => 'sometimes|required',
            'nit' => 'sometimes|required',
        ]);

        try {
            // find hotel by id
            $hotel = Hotel::find($id);

            if (!$hotel) {
                return response()->json([
                    'success' => false,
                    'message' => 'Hotel not found',
                ], 404);
            }

            // update data
            $hotel->fill($request->only(['name', 'address', 'city', 'nit']));

            // save in database
            $hotel->save();

            return response()->json([
                'success' => true,
                'message' => 'Hotel updated successfully',
                'data' => $hotel,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update hotel',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            // Search the hotel by its ID in the database
            $hotel = Hotel::find($id);

            if (!$hotel) {
                return response()->json([
                    'success' => false,
                    'message' => 'Hotel not found',
                ], 404);
            }

            // Delete the hotel from the database
            $hotel->delete();

            return response()->json([
                'success' => true,
                'message' => 'Hotel deleted successfully',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete hotel',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
