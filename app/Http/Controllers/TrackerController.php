<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tracker;
use App\Models\User;

class TrackerController extends Controller
{
    public function index()
    {
         $devices = Tracker::latest()->get();
            $users = User::all(); // or use a relation if needed

    return view('admin.tracker.index', compact('devices', 'users'));
    }

    public function create()
    {
        // return view('admin.trackers.create');
    }
   public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'imei' => 'required|string|unique:trackers,imei',
        'model' => 'nullable|string|max:255',
    ]);

    Tracker::create([
        'user_id' => auth()->id(), // automatically link to logged-in user
        'name' => $validated['name'],
        'imei' => $validated['imei'],
        'model' => $validated['model'],
    ]);

    return redirect()->back()->with('success', 'Device added successfully!');
}

}
