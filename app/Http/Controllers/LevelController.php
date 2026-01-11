<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $levels = Level::with('program')
            ->when($request->program_id, fn ($q) =>
                $q->where('program_id', $request->program_id)
            )
            ->when($request->level_number, fn ($q) =>
                $q->where('level_number', $request->level_number)
            )
            ->orderBy('program_id')
            ->orderBy('level_number')
            ->paginate(10)
            ->withQueryString();

        $programs = Program::orderBy('program_name')->get();

        return view('levels.index', compact('levels', 'programs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $programs = Program::orderBy('program_name')->get();
        return view('levels.create', compact('programs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'program_id' => 'required|exists:programs,id',
            'level_number' => [
                'required',
                'integer',
                'min:1',
                Rule::unique('levels')
                    ->where(fn ($q) => $q->where('program_id', $request->program_id)),
            ],
            'semester_count' => 'required|integer|min:1|max:12',
            'nqf_level' => 'nullable|string|max:10',
        ], [
            'level_number.unique' =>
                'This level already exists for the selected program.',
        ]);

        Level::create($validated);

        return redirect()->route('levels.index')
            ->with('success', 'Level created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Level $level)
    {
        return view('levels.show', compact('level'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Level $level)
    {
        $programs = Program::orderBy('program_name')->get();
        return view('levels.edit', compact('level', 'programs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Level $level)
    {
        $validated = $request->validate([
            'program_id' => 'required|exists:programs,id',
            'level_number' => [
                'required',
                'integer',
                'min:1',
                Rule::unique('levels')
                    ->ignore($level->id)
                    ->where(fn ($q) => $q->where('program_id', $request->program_id)),
            ],
            'semester_count' => 'required|integer|min:1|max:12',
            'nqf_level' => 'nullable|string|max:10',
        ], [
            'level_number.unique' =>
                'This level already exists for the selected program.',
        ]);

        $level->update($validated);

        return redirect()->route('levels.index')
            ->with('success', 'Level updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Level $level)
    {
        $level->delete();

        return redirect()->route('levels.index')
            ->with('success', 'Level deleted successfully.');
    }
}
