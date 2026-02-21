<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Entry;

class EntryController extends Controller
{
    public function index()
{
    $entries = Entry::with('staff')->get();
    return view('client.dashboard', compact('entries'));
}
}
