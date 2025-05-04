<?php

namespace App\Http\Controllers\Backends;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FeatureController extends Controller
{
    public function store(Request $req) {
        $req->validate([
            'image' => ['nullable', 'file', 'mimetypes:image/png,image/jpeg,image/jpg', 'max:2048'],
            'title' => ['required', 'string', 'max:250'],
        ]);

        $image = 'features/no_photo.jpg';
        if ($req->hasFile('image')) {
            $image = $req->file('image')->store('features', ['disk' => 'public']);
        }

        // store new feature
        Feature::create([
            'image' => $image,
            'title' => $req->title,
        ]);

        return redirect()->route('features');
    }

    public function index() {
        $features = Feature::all();
        return view('backends.features.index', compact('features'));
    }

    public function create() {
        return view('backends.features.create');
    }

    public function edit($id) {
        $feature = Feature::findOrFail($id);
        return view('backends.features.edit', compact('feature'));
    }

    public function update(Request $req, $id){
        $feature = Feature::findOrFail($id);

        $req->validate([
            'image' => ['nullable', 'file', 'mimetypes:image/png,image/jpeg,image/jpg', 'max:2048'],
            'title' => ['required', 'string', 'max:250'],
        ]);

        $data = ['title' => $req->title];

        if ($req->hasFile('image')) {
            // Delete old image if not the default
            if ($feature->image !== 'features/no_photo.jpg') {
                Storage::disk('public')->delete($feature->image);
            }

            $data['image'] = $req->file('image')->store('features', ['disk' => 'public']);
        }

        $feature->update($data);

        return redirect()->route('features')->with('success', 'Feature updated successfully');
    }


    public function destroy($id) {
        $feature = Feature::findOrFail($id);

        if ($feature->image !== 'features/no_photo.jpg') {
            Storage::disk('public')->delete($feature->image);
        }

        $feature->delete();

        return redirect()->route('features')->with('success', 'Feature deleted successfully');
    }
}
