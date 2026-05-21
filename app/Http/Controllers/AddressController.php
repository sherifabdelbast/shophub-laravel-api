<?php

namespace App\Http\Controllers;

use App\Http\Requests\Address\StoreAddressRequest;
use App\Http\Requests\Address\UpdateAddressRequest;
use App\Http\Resources\AddressResource;
use App\Models\Address;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * Get user's addresses.
     *
     * @group Addresses
     */
    public function index(Request $request): JsonResponse
    {
        $addresses = Address::where('user_id', $request->user()->id)
            ->orderBy('is_default', 'desc')
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json([
            'success' => true,
            'data' => AddressResource::collection($addresses),
        ]);
    }

    /**
     * Store a new address.
     *
     * @group Addresses
     */
    public function store(StoreAddressRequest $request): JsonResponse
    {
        $data = $request->validated();
        $data['user_id'] = $request->user()->id;

        // If this is set as default, unset other defaults
        if ($request->boolean('is_default')) {
            Address::where('user_id', $request->user()->id)
                ->update(['is_default' => false]);
        }

        $address = Address::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Address created successfully',
            'data' => new AddressResource($address),
        ], 201);
    }

    /**
     * Display the specified address.
     *
     * @group Addresses
     */
    public function show(Request $request, Address $address): JsonResponse
    {
        $this->authorize('view', $address);

        return response()->json([
            'success' => true,
            'data' => new AddressResource($address),
        ]);
    }

    /**
     * Update the specified address.
     *
     * @group Addresses
     */
    public function update(UpdateAddressRequest $request, Address $address): JsonResponse
    {
        $this->authorize('update', $address);

        $data = $request->validated();

        // If setting as default, unset other defaults
        if (isset($data['is_default']) && $data['is_default']) {
            Address::where('user_id', $request->user()->id)
                ->where('id', '!=', $address->id)
                ->update(['is_default' => false]);
        }

        $address->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Address updated successfully',
            'data' => new AddressResource($address->fresh()),
        ]);
    }

    /**
     * Remove the specified address.
     *
     * @group Addresses
     */
    public function destroy(Request $request, Address $address): JsonResponse
    {
        $this->authorize('delete', $address);

        $address->delete();

        return response()->json([
            'success' => true,
            'message' => 'Address deleted successfully',
        ]);
    }

    /**
     * Set address as default.
     *
     * @group Addresses
     */
    public function setDefault(Request $request, Address $address): JsonResponse
    {
        $this->authorize('setDefault', $address);

        // Unset all other defaults
        Address::where('user_id', $request->user()->id)
            ->where('id', '!=', $address->id)
            ->update(['is_default' => false]);

        // Set this as default
        $address->update(['is_default' => true]);

        return response()->json([
            'success' => true,
            'message' => 'Default address updated successfully',
            'data' => new AddressResource($address->fresh()),
        ]);
    }
}
