<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Amenity;

class AmenityController extends Controller
{
    /**
     * Create a new amenity for a property.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request)
    {
        $this->enableCors($request);
        $amenity = new Amenity();
        $amenity->propertyid = $request->input('propertyid');
        $amenity->amenity_name = $request->input('amenity_name');
        $amenity->save();

        return response()->json($amenity);
    }

    public function getAmenities(Request $request)
    {
        $this->enableCors($request);
        $amenities = Amenity::all();
        return response()->json(['status' => 'success', 'data' => $amenities]);
    }
}
