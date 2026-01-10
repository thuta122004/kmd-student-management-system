<?php

namespace App\Http\Controllers;

use App\Models\AcademicCycle;
use App\Models\Program;
use Illuminate\Http\Request;

class AcademicCycleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = AcademicCycle::with('program');

        if ($request->filled('program_id')) {
            $query->where('program_id', $request->program_id);
        }

        if ($request->filled('academic_year')) {
            $query->where('academic_year', 'like', '%' . $request->academic_year . '%');
        }

        if ($request->filled('cycle_status')) {
            $query->where('cycle_status', $request->cycle_status);
        }

        $academicCycles = $query->latest()
            ->paginate(10)
            ->withQueryString();

        $programs = Program::orderBy('program_name')->get();

        return view('academic_cycles.index', compact('academicCycles', 'programs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $programs = Program::orderBy('program_name')->get();
        return view('academic_cycles.create', compact('programs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'program_id'    => 'required|exists:programs,id',
            'exam_cycle'    => 'required|in:Autumn,Winter,Spring,Summer',
            'academic_year' => 'required|string|max:20',
            'cycle_start'   => 'required|date',
            'cycle_end'     => 'required|date|after:cycle_start',
            'cycle_status'  => 'required|in:planned,running,closed',
            'is_locked'     => 'nullable|boolean',
        ]);

        AcademicCycle::create($validated);

        return redirect()->route('academic-cycles.index')
            ->with('success', 'Academic cycle created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(AcademicCycle $academicCycle)
    {
        return view('academic_cycles.show', compact('academicCycle'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AcademicCycle $academicCycle)
    {
        if ($academicCycle->is_locked) {
            return redirect()->route('academic-cycles.index')
                ->with('error', 'This academic cycle is locked and cannot be edited.');
        }

        $programs = Program::orderBy('program_name')->get();
        return view('academic_cycles.edit', compact('academicCycle', 'programs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AcademicCycle $academicCycle)
    {
        if ($academicCycle->is_locked) {
            return redirect()->route('academic-cycles.index')
                ->with('error', 'This academic cycle is locked and cannot be updated.');
        }

        $validated = $request->validate([
            'program_id'    => 'required|exists:programs,id',
            'exam_cycle'    => 'required|in:Autumn,Winter,Spring,Summer',
            'academic_year' => 'required|string|max:20',
            'cycle_start'   => 'required|date',
            'cycle_end'     => 'required|date|after:cycle_start',
            'cycle_status'  => 'required|in:planned,running,closed',
            'is_locked'     => 'nullable|boolean',
        ]);

        $academicCycle->update($validated);

        return redirect()->route('academic-cycles.index')
            ->with('success', 'Academic cycle updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AcademicCycle $academicCycle)
    {
        if ($academicCycle->is_locked) {
            return redirect()->route('academic-cycles.index')
                ->with('error', 'Locked academic cycles cannot be deleted.');
        }

        $academicCycle->delete();

        return redirect()->route('academic-cycles.index')
            ->with('success', 'Academic cycle deleted successfully.');
    }
}
