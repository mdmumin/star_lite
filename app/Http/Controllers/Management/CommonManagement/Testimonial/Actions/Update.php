<?php

namespace App\Http\Controllers\Management\CommonManagement\Testimonial\Actions;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class Update
{
    public static function execute($model)
    {
        try {
            // Find the team member by ID
            $testimonial = $model::find(request()->id);

            if (!$testimonial) {
                return api_response(
                    data: [],
                    code: 404,
                    message: 'Validation error',
                    errors: ['id' => ['Data not found by given ID ' . (request()->id ?? 'null')]],
                );
            }

            
            $rules = [
                'name' => 'required',
                'designation' => 'nullable',
                'comment' => 'nullable',
            ];

            $validator = Validator::make(request()->all(), $rules);

            if ($validator->fails()) {
                return api_response(
                    data: [],
                    code: 422,
                    message: 'Validation error',
                    errors: $validator->errors(),
                );
            }

            $testimonial->name = request()->name;
            $testimonial->designation = request()->designation;

            if (request()->hasFile('image')) {
                if ($testimonial->image && file_exists(public_path($testimonial->image))) {
                    unlink(public_path($testimonial->image));
                }

                $file = request()->file('image');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $filePath = 'upload/testimonials/' . $fileName;


                Image::make($file)
                    ->fit(700, 500, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    })
                    ->save(public_path($filePath), 90);

                $testimonial->image = $filePath;
            }

            $testimonial->comment = request()->comment;
            $testimonial->creator = Auth::user()->id ?? null;
            $testimonial->status = request()->status ?? 1;
            $testimonial->slug = request()->name . '-' . rand(10000, 99999);

            $testimonial->save();

            return api_response(
                data: $testimonial,
                code: 200,
                message: 'Testimonials updated successfully',
                errors: [],
            );
        } catch (\Exception $e) {
            return api_response(
                data: [],
                code: 500,
                message: 'An error occurred while updating the testimonial member',
                errors: ['exception' => [$e->getMessage()]],
            );
        }
    }
}
