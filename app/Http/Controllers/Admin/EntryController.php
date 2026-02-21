<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Entry;
use App\Models\User;

class EntryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $entries = Entry::with('staff')->latest()->get();

        $staffs = User::whereHas('roles', function ($q) {
            $q->where('name', 'staff');
        })->get();

        $total = Entry::count();

        $grouped = Entry::selectRaw('staff_id, count(*) as total')
            ->groupBy('staff_id')
            ->get();

        return view('admin.dashboard', compact(
            'entries',
            'staffs',
            'total',
            'grouped'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $staffs = User::whereHas('roles', function ($q) {
            $q->where('name', 'staff');
        })->get();

        return view('admin.entries.create', compact('staffs'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'amount' => 'required|numeric',
            'staff_id' => 'required|exists:users,id'
        ]);

        Entry::create([
            'name' => $request->name,
            'email' => $request->email,
            'amount' => $request->amount,
            'staff_id' => $request->staff_id
        ]);

        return redirect()
            ->route('admin.dashboard')
            ->with('success', 'Entry Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $entry = Entry::with('staff')->findOrFail($id);

        return view('admin.entries.show', compact('entry'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $entry = Entry::findOrFail($id);

        $staffs = User::whereHas('roles', function ($q) {
            $q->where('name', 'staff');
        })->get();

        return view('admin.entries.edit', compact('entry', 'staffs'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'amount' => 'required|numeric',
            'staff_id' => 'required|exists:users,id'
        ]);

        $entry = Entry::findOrFail($id);

        $entry->update([
            'name' => $request->name,
            'email' => $request->email,
            'amount' => $request->amount,
            'staff_id' => $request->staff_id
        ]);

        return redirect()
            ->route('admin.dashboard')
            ->with('success', 'Entry Updated Successfully');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $entry = Entry::findOrFail($id);
        $entry->delete();

        return redirect()
            ->route('admin.dashboard')
            ->with('success', 'Entry Deleted Successfully');
    }
}
