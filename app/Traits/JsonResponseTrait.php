<?php

namespace App\Traits;

trait JsonResponseTrait 
{

    private static $code_errors = array(
        500 => 'Internal server error',
        404 => 'Not found',
        400 => 'Bad request',
        401 => 'Unauthorized',
        403 => 'Forbidden',
        422 => 'Validation Failed',
        501 => "Unauthorized"
    );

    private static $code_success = array(
        200 => 'OK',
        201 => 'Created'
    );

    private function codeSuccessVerify($code)
    {
        if(empty(self::$code_success[$code]))
            throw new \Exception('Code Success not defined: '.$code); 
    }

    private function codeErrorVerify($code)
    {
        if(empty(self::$code_errors[$code]))
            throw new \Exception('Code Error not defined: '.$code); 
    }

    private function jsonResponseSuccess($data,$code = 200)
    {
        $this->codeSuccessVerify($code);
        return response()->json($data,$code);
    }

    private function jsonResponseError($message = 'Erro interno',$code = 500)
    {
        $this->codeErrorVerify($code);
        return response()->json([
            'error' => $message,
            'status'  =>  self::$code_errors[$code]
        ],$code);
    }

}