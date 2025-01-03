<?php

namespace App\Traits;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Laracasts\Flash\Flash;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBag;

trait UploadTrait
{

    public function verifyAndStoreImage(Request $request, $inputname, $foldername, $disk, $imageable_id, $imageable_type)
    {

        if ($request->hasFile($inputname)) {

            // Check if image is valid
            if (!$request->file($inputname)->isValid()) {
                Flash::error('Invalid Image!')->important();  // Flash error message
                return redirect()->back()->withInput();
            }

            // Handle the file upload
            $photo = $request->file($inputname);
            $name = Str::slug($request->input('name'));  // Slugify the name
            $filename = $name . '.' . $photo->getClientOriginalExtension();

            // Insert Image
            $image = new Image();
            $image->filename = $filename;
            $image->imageable_id = $imageable_id;
            $image->imageable_type = $imageable_type;
            $image->save();

            // Store image
            $request->file($inputname)->storeAs($foldername, $filename, $disk);

            // Flash success message after image upload
            Flash::success('Image uploaded successfully!')->important();
            return redirect()->route('some.route'); // Redirect to a specific route after successful upload
        }

        // Flash info message if no image file is provided
        Flash::info('No image uploaded.')->important();
        return redirect()->back()->withInput();
    }
}
