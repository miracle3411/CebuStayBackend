<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Facilities;

class FacilitiesController extends Controller
{
    /**
     * Create a new amenity for a property.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request, $propertyId)
    {
        $facilities = new Facilities();
        $facilities->propertyid = $propertyId;
        $facilities->facilities_name = $request->input('facilities_name');
        $facilities->save();

        return response()->json($facilities);
    }
}
