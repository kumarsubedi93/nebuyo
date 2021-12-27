<?php

namespace Neputer\Support\Mixins;
use Illuminate\Http\Response;
use Neputer\Config\ResponseCode;

trait Responsable
{
    /**
     * @param $body
     * @param int $status
     * @param string $message
     * @param string $messageCode
     * @param array $headers
     * @return mixed
     */
    public function systemResponse(
        $body,
        $status = Response::HTTP_OK,
        $message = 'OK',
        $messageCode = ResponseCode::RESPONSE_OK,
        $headers = []
    ) {
        return response()->json([
            'body' => $body,
            'status' => [
                'message' => $message,
                'code' => $messageCode
            ]
        ], $status)->withHeaders($headers);
    }

    /**
     * @param $body
     * @param string $message
     * @param string $messageCode
     * @param array $headers
     * @return mixed
     */
    public function responseOk(
        $body,
        $message = 'ok',
        $messageCode = ResponseCode::RESPONSE_OK,
        $headers = []
    ) {
        return $this->systemResponse(
            $body,
            Response::HTTP_OK,
            $message,
            $messageCode,
            $headers
        );
    }

    /**
     * @param $body
     * @param int $status
     * @param string $message
     * @param string $messageCode
     * @param array $headers
     * @return mixed
     */
    public function responseError(
        $body,
        $status = Response::HTTP_INTERNAL_SERVER_ERROR,
        $message = 'server error',
        $messageCode = ResponseCode::SERVER_ERROR,
        $headers = []
    ) {
        return $this->systemResponse(
            $body,
            $status,
            $message,
            $messageCode,
            $headers
        );
    }

    /**
     * @param null $body
     * @param string $message
     * @param string $code
     * @param array $headers
     * @return mixed
     */
    public function responseValidationError(
        $message = 'form validation failed',
        $body = null,
        $code = ResponseCode::VALIDATOR_FAILS,
        $headers = []
    ) {
        return $this->responseError(
            $body,
            Response::HTTP_EXPECTATION_FAILED,
            $message,
            $code,
            $headers
        );
    }

    public function responseUnAuthorized (
        $body,
        $message = 'Un Authorized'
    )
    {
        return $this->responseError(
            $body,
            Response::HTTP_UNAUTHORIZED,
            $message
        );
    }

}