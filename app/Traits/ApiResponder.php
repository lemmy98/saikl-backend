<?php


namespace App\Traits;


use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Response;

trait ApiResponder
{
    public function failed($message, array $data = []): JsonResponse
    {
        $response = [
            'status' => false,
            'code' => 400,
            'message' => $message,
            'data' => $data
        ];

        return response()->json($response, 424);
    }

    public function notFound($message, array $data = []): JsonResponse
    {
        $response = [
            'status' => false,
            'code' => 404,
            'message' => $message,
            'data' => $data
        ];

        return response()->json($response, 404);
    }

    public function success($data, $message = "success"): JsonResponse
    {
        $response = [
            'status' => true,
            'code' => 200,
            'message' => $message,
            'data' => $data
        ];

        return response()->json($response);
    }


}
