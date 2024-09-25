<?php

namespace App\Http\Controllers;

use App\Services\DigiflazzService;
use Illuminate\Http\Request;

class CekController extends Controller
{
    protected $digiflazzService, $ref_id, $user_id;

    public function __construct(DigiflazzService $digiflazzService)
    {
        $this->digiflazzService = $digiflazzService;
        $this->ref_id = uniqid('cekId-');
    }
    /**
     * Display a listing of the resource.
     */
    public function index() {}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $response = $this->digiflazzService->makeTransaction($id, $this->ref_id, 'ffu');
        // dd($id);
        return $response;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
