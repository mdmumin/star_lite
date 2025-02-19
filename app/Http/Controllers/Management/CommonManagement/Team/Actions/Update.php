<?php

namespace App\Http\Controllers\Management\CommonManagement\Team\Actions;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class Update
{
    public static function execute($model)
    {
        try {
            // Find the team member by ID
            $team = $model::find(request()->id);

            if (!$team) {
                return api_response(
                    data: [],
                    code: 404,
                    message: 'Validation error',
                    errors: ['id' => ['Data not found by given ID ' . (request()->id ?? 'null')]],
                );
            }

            // Validation rules
            $rules = [
                'name' => ['required'],
                'designation' => ['nullable'],
                'contact_number' => ['nullable'],
                'email' => ['required', 'email', 'max:100', 'unique:teams,email,' . $team->id],
                'short_description' => ['nullable', 'string'],
                'description' => ['nullable', 'string'],
                'facebook' => ['nullable'],
                'linkedin' => ['nullable'],
                'instagram' => ['nullable'],
                'whatsapp' => ['nullable'],
                'telegram' => ['nullable'],
                'status' => ['nullable', 'integer', 'in:0,1'],
            ];

            // Validate the request data
            $validator = Validator::make(request()->all(), $rules);

            if ($validator->fails()) {
                return api_response(
                    data: [],
                    code: 422,
                    message: 'Validation error',
                    errors: $validator->errors(),
                );
            }

            $team->name = request()->name;
            $team->designation = request()->designation;

            if (request()->hasFile('image')) {
                if ($team->image && file_exists(public_path($team->image))) {
                    unlink(public_path($team->image));
                }

                $file = request()->file('image');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $filePath = 'upload/teams/' . $fileName;


                Image::make($file)
                    ->fit(700, 500, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    })
                    ->save(public_path($filePath), 90);

                $team->image = $filePath;
            }
            $team->contact_number = request()->contact_number;
            $team->email = request()->email;
            $team->short_description = request()->short_description;
            $team->description = request()->description;
            $team->facebook = request()->facebook ?? '#';
            $team->linkedin = request()->linkedin ?? '#';
            $team->instagram = request()->instagram ?? '#';
            $team->whatsapp = request()->whatsapp ?? '#';
            $team->telegram = request()->telegram ?? '#';
            $team->creator = Auth::user()->id ?? null;
            $team->save();

            return api_response(
                data: $team,
                code: 200,
                message: 'Team member updated successfully',
                errors: [],
            );
        } catch (\Exception $e) {
            return api_response(
                data: [],
                code: 500,
                message: 'An error occurred while updating the team member',
                errors: ['exception' => [$e->getMessage()]],
            );
        }
    }
}
