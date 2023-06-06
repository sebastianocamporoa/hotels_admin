<?php

namespace App\Http\Controllers\Roomtype;

use App\Http\Controllers\Controller;
use App\Models\RoomType;
use Illuminate\Http\Request;

class RoomTypeController extends Controller
{
    public function index()
    {
        try {
            // Get all room types from the database
            $roomTypes = RoomType::all();

            return response()->json([
                'success' => true,
                'data' => $roomTypes,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to fetch room types',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function show($id)
    {
        try {
            // Search the room type by its ID in the database
            $roomType = RoomType::find($id);

            if (!$roomType) {
                return response()->json([
                    'success' => false,
                    'message' => 'Room type not found',
                ], 404);
            }

            return response()->json([
                'success' => true,
                'data' => $roomType,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to fetch room type',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            // Validate the data sent in the request
            $request->validate([
                'name' => 'required|max:20',
            ]);

            // Create a new room type in the database
            $roomType = new RoomType();
            $roomType->name = $request->input('name');

            // Save the room type in the database
            $roomType->save();

            return response()->json([
                'success' => true,
                'message' => 'Room type created successfully',
                'data' => $roomType,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create room type',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            // Validate the data sent in the request
            $request->validate([
                'name' => 'required|max:20',
            ]);

            // Search the room type by its ID in the database
            $roomType = RoomType::find($id);

            if (!$roomType) {
                return response()->json([
                    'success' => false,
                    'message' => 'Room type not found',
                ], 404);
            }

            // Update room type data
            $roomType->fill($request->only(['name']));
            $roomType->save();

            return response()->json([
                'success' => true,
                'message' => 'Room type updated successfully',
                'data' => $roomType,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update room type',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            // Search the room type by its ID in the database
            $roomType = RoomType::find($id);

            if (!$roomType) {
                return response()->json([
                    'success' => false,
                    'message' => 'Room type not found',
                ], 404);
            }

            // Delete the room type from the database
            $roomType->delete();

            return response()->json([
                'success' => true,
                'message' => 'Room type deleted successfully',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete room type',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
