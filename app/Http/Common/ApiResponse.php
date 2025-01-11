<?php
/*
    Project: starlite
    User: MD Shefat Masum
    Github: https://github.com/md-shefat-masum
    Date: 11 January 2025
    Time: 19:32:08
    Path: app\Http\Common\ApiResponse.php
    Task List: common api response method
*/

/**
 * Common api response method
 * ```
    api_response(data: $data, code: 200,  message: "data fetch successfully", errors: [])
 * ```
 * @method api_response
 * @param {string} message - Somebody's name.
 * @param
 */
function api_response($data, $code = 200, $message = "success", $errors = [])
{
    return response()
        ->json([
            'data' => $data,
            'code' => $code,
            'message' => $message,
            'errors' => $errors,
        ], $code);
}
