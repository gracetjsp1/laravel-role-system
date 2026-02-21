<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Entry;
// use App\Models\User;
use Illuminate\Support\Facades\Auth; 

class EntryController extends Controller
{
    public function index()
    {
        $entries = Entry::where('staff_id', Auth::id())->get();
        return view('staff.dashboard', compact('entries'));
    }

    public function upload(Request $request, $id)
    {
        $entry = Entry::where('staff_id', Auth::id())
            ->where('id', $id)
            ->firstOrFail();

        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $path = $request->file('image')
            ->store('uploads', 'public');

        $entry->update(['image' => $path]);

        return back()->with('success', 'Image Uploaded');
    }
}