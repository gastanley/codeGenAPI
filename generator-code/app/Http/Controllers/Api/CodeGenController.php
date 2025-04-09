<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCodeGenRequest;
use App\Http\Resources\codeGenCollection;
use App\Http\Resources\CodeGenResource;
use App\Models\codeGenModel;

class CodeGenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new codeGenCollection(CodeGenModel::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function getcodeGen()
    {
        $codeGenerator=CodeGenModel::latest()->get();
        $nomSite=CodeGenModel::latest()->get();
        return response([
            'nomSite'=>$nomSite,
            'codeGenerator'=>$codeGenerator
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCodeGenRequest $request)
    {
        $validatedData = $request->validated();
        CodeGenModel::create([
            'nomSite'=>$validatedData['nomSite'],
            'codeGenerator'=>$validatedData['codeGenerator'],
        ]);
        return response([
            'message' => 'succes'
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(CodeGenModel $codeGen)
    {
        return new CodeGenResource($codeGen);
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
