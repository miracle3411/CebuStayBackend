<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
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
        $service = new Service();
        $service->propertyid = $request->input('propertyid');
        $service->service_name = $request->input('service_name');
        $service->save();

        return response()->json($service);
    }
}
