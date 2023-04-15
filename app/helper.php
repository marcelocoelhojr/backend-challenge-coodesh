<?php

//helper file

use App\Exceptions\ValidateException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

if (!function_exists('apiResponse')) {

    /**
     * Format json response
     *
     * @param $data
     * @param $message
     * @param $retcode
     * @param $code
     * @return JsonResponse
     */
    function apiResponse($data = null, $message = '', $retcode = 'SUCCESS', $code = 200): JsonResponse
    {
        return new JsonResponse(
            data: [
                'retcode' => $retcode,
                'message' => $message,
                'data' => $data
            ],
            status: $code,
        );
    }
}

if (!function_exists('validate')) {

    /**
     * Validate request
     *
     * @param array $rules
     * @param array $request
     */
    function validate(array $rules, array $request)
    {
        $validator = Validator::make($request, $rules);
        if ($validator->fails()) {
            dd($validator->messages()->messages());
            // throw new ValidateException($validator->messages()->messages());
        }

        return $validator;
    }
}
