<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PropertyCompany;

class PropertyCompanyController extends CORS
{
    /**
     * Create a new property company.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request)
    {
        // Validate the request data
        $request->validate([
            'propertyownershipid' => 'required|integer|exists:property_ownership,propertyownershipid',
            'legal_business_name' => 'required|string|max:255',
            'company_description' => 'required|string',
            'company_photo' => 'nullable|string', // Assuming URL or file path
            'street' => 'required|string|max:255',
            'barangay' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'zipcode' => 'required|string|max:10',
        ]);

        $propertyCompany = new PropertyCompany();
        $propertyCompany->propertyownershipid = $request->input('propertyownershipid');
        $propertyCompany->legal_business_name = $request->input('legal_business_name');
        $propertyCompany->company_description = $request->input('company_description');
        // $propertyCompany->company_photo = $request->input('company_photo');
        $propertyCompany->street = $request->input('street');
        $propertyCompany->barangay = $request->input('barangay');
        $propertyCompany->city = $request->input('city');
        $propertyCompany->zipcode = $request->input('zipcode');
        $propertyCompany->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Property company created successfully.',
            'propertyCompany' => $propertyCompany,
        ]);
    }
}