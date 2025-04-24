<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCodeGenRequest;
use App\Http\Resources\codeGenCollection;
use App\Http\Resources\CodeGenResource;
use App\Models\CodeGenModel;
use Illuminate\Support\Facades\Auth;

class CodeGenController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $codeGens = Auth::user()->codeGenModels()->latest()->get();
        
        return new codeGenCollection($codeGens);
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
        $codeGens = Auth::user()->codeGenModels()->latest()->get();
        return response([
            'nomSite' => $codeGens->pluck('nomSite'),
            'codeGenerator' => $codeGens->pluck('codeGenerator'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCodeGenRequest $request)
    {
        // $codeGen = Auth::user()->codeGenModels()->create([
        //     'nomSite' => $request->nomSite,
        //     'codeGenerator' => $request->codeGenerator,
        // ]);
        $validatedData = $request->validated();
        CodeGenModel::create([
            'nomSite'=>$validatedData['nomSite'],
            'codeGenerator'=>$validatedData['codeGenerator'],
            'user_id' => Auth::id()
        ]);
        return response([
            'message' => 'succes',
            'data' => new CodeGenResource($validatedData),
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(CodeGenModel $codeGen)
    {
        $this->authorize('view', $codeGen);
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
