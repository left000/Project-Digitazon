<?php

namespace App\Http\Controllers;
use App\Models\Recipe;
use App\Models\Instruction;
use Illuminate\Http\Request;

class InstructionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $recipe_id = $request->id;
        $recipe = Recipe::find($recipe_id);
        $instructions = $recipe->instructions; 
        $instruction = Instruction::all();
        
        
    
        return view('instructions.index', [
            "instructions" => $instructions,
            "recipe_id" => $recipe_id, 
            "recipe_name" => $recipe->name
    ]);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('instructions.create', ["id" => $request->id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['recipe_id' => 'required']);
        $request->validate(['step_number' => 'required']);
        $request->validate(['description' => 'required']);
        $recipe = Recipe::find($request->recipe_id);
        $instruction_id = Instruction::create([
            'recipe_id' => $request->recipe_id, 
            'step_number' => $request->step_number, 
            'description' => $request->description, 
        ]);

        return redirect()->route('instructions.index',
        ["id" => $request->recipe_id,
        "instructions" => $recipe->instructions, 
        "instruction_id" => $instruction_id->id,
        'success' => 'Instruction created successfully!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Instruction  $instruction
     * @return \Illuminate\Http\Response
     */
    public function show(Instruction $instruction)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Instruction  $instruction
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Instruction $instruction)
    {
        $instruction = $request->instruction;
        $instructions = Instruction::all();
        return view('instructions.edit', [
            'instruction'=> $instruction, 
            "id" => $instruction->recipe_id, 
            'recipe_id' => $request->recipe_id,
            'step_number' => $request->step_number,
            'description' => $request->description,]); 

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Instruction  $instruction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Instruction $instruction)
    {

        $request->validate(['recipe_id' => 'required']);
        $request->validate(['step_number' => 'required']);
        $request->validate(['description' => 'required']);       	
        $instruction->update([
            'recipe_id' => $request->recipe_id,
            'step_number' => $request->step_number,
            'description' => $request->description,
            ]);         	
            
            return redirect()->route('instructions.index',
            ["id" => $request->recipe_id]);
            
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Instruction  $instruction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Instruction $instruction) 
    {
        $instruction->delete();     
        $request->validate(['recipe_id' => 'required']);
        $request->validate(['step_number' => 'required']);
        $request->validate(['description' => 'required']);
        $recipe = Recipe::find($request->recipe_id);	
        return redirect()->route('instructions.index',
        ["id" => $request->recipe_id,
        "instructions" => $recipe->instructions, 
        "instruction_id" => $instruction_id->id,
        'success' => 'Instruction created successfully!']);
    }
}
