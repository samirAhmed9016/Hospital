<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Interfaces\Doctors\DoctorRepositoryInterface;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    private $doctors;

    public function __construct(DoctorRepositoryInterface $doctors)
    {
        $this->doctors = $doctors;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->doctors->index();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->doctors->store($request);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        return $this->doctors->update($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        return $this->doctors->destroy($request);
    }
}
