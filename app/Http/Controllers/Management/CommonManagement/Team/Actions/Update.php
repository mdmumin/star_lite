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
                'name' => ['required', 'string', 'max:100'],
                'designation' => ['nullable', 'string', 'max:100'],
                'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
                'contact_number' => ['nullable', 'string', 'max:100'],
                'email' => ['required', 'email', 'max:100', 'unique:teams,email,' . $team->id],
                'short_description' => ['nullable', 'string'],
                'description' => ['nullable', 'string'],
                'facebook' => ['nullable', 'string', 'max:100'],
                'linkedin' => ['nullable', 'string', 'max:100'],
                'instagram' => ['nullable', 'string', 'max:100'],
                'whatsapp' => ['nullable', 'string', 'max:100'],
                'telegram' => ['nullable', 'string', 'max:100'],
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

            // Update the team member's details
            $team->name = request()->name;
            $team->designation = request()->designation;

            if (request()->hasFile('image')) {
                // Delete the old image if it exists
                if ($team->image && file_exists(public_path($team->image))) {
                    unlink(public_path($team->image));
                }

                $file = request()->file('image');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('upload/teams'), $fileName);
                $team->image = 'upload/teams/' . $fileName;
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
            $team->creator = $team->creator ?? Auth::user()->id;
            $team->status = request()->status ?? 1;
            $team->slug = request()->name . '-' . rand(10000, 99999);

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
