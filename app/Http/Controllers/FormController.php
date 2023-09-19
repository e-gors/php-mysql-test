<?php

namespace App\Http\Controllers;

use App\Models\FormData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FormController extends Controller
{
    public function index()
    {
        return view('form.index');
    }

    public function submit(Request $request)
    {
        // Form validation
        $validator = Validator::make($request->all(), [
            'text_data' => 'required|min:100',
            'radio_choice' => 'required',
            'checkbox_choice' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Image validation to limit image size
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('form.index')
                ->withErrors($validator)
                ->withInput();
        }

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = 'images/' . $imageName; // Define the image path

            // Move the uploaded image to the defined path
            $image->move(public_path('images'), $imageName);
        } else {
            // If no image then set path to null
            $imagePath = null;
        }

        //Create nwe FormData and save to database
        FormData::create([
            'text_data' => $request->input('text_data'),
            'radio_choice' => $request->input('radio_choice'),
            'checkbox_choice' => $request->input('checkbox_choice'),
            'image_path' => $imagePath,
        ]);

        return redirect()
            ->route('form.index')
            ->with('success', 'Form data submitted successfully.');
    }

    public function view()
    {
        $formData = FormData::latest()->first();

        return view('form.view', compact('formData'));
    }
}
