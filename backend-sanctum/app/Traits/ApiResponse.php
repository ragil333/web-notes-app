<?php

namespace App\Traits;

use Symfony\Component\HttpFoundation\Response;

trait ApiResponse
{
    /**
     * @Status Code 404
     * @message no data found
     */
    public function DataNotFound()
    {
        return response()->json([
            'code' => Response::HTTP_NOT_FOUND,
            'message' => 'no data found',
        ], Response::HTTP_NOT_FOUND);
    }

    /**
     * @Status Code 201
     * @message success store data
     */
    public function StoreData($Data)
    {
        return response()->json([
            'code' => Response::HTTP_CREATED,
            'message' => 'success store data',
            'data' => $Data,
        ], Response::HTTP_CREATED);
    }

    /**
     * @Status Code 200
     * @message success retrieve data
     */

    public function FetchData($Data)
    {
        return response()->json([
            'code' => Response::HTTP_FOUND,
            'message' => 'success retrieve data',
            'data' => $Data,
        ], Response::HTTP_OK);
    }

    /**
     * @Status Code 406
     * @message form validation error
     * @error array error message
     */
    public function ValidationErros($ErrorData)
    {
        return response()->json([
            'code' => Response::HTTP_NOT_ACCEPTABLE,
            'message' => 'form error',
            'errors' => $ErrorData,
        ], Response::HTTP_NOT_ACCEPTABLE);
    }

    /**
     * @Status Code 202
     * @message success update data
     */
    public function UpdateData($Data)
    {
        return response()->json([
            'code' => Response::HTTP_ACCEPTED,
            'message' => 'success update data',
            'data' => $Data,
        ], Response::HTTP_ACCEPTED);
    }

    /**
     * @Status Code 202
     * @message success delete data
     */
    public function DeleteData()
    {
        return response()->json([
            'code' => Response::HTTP_ACCEPTED,
            'message' => 'success delete data',
        ], Response::HTTP_ACCEPTED);
    }

    /**
     * @Status Code 401
     * @message unauthorized user
     */
    public function Unauthorized()
    {
        return response()->json([
            'code' => Response::HTTP_UNAUTHORIZED,
            'message' => 'unauthorized'
        ], Response::HTTP_UNAUTHORIZED);
    }

    /**
     * @Status Code 500
     * @message internal server error
     */
    public function ExceptionError($message)
    {
        return response()->json([
            'code' => Response::HTTP_INTERNAL_SERVER_ERROR,
            'message' => $message
        ], Response::HTTP_NOT_ACCEPTABLE);
    }
}
