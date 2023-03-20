<?php
namespace App\Traits;

use Illuminate\Http\Request;

trait GeneralTrait
{





    public function returnError($msg, $error, $errNum)
    {
        return response()->json([
            'status' => false,
            'msg' => $msg,
            'error'=>$error
        ], $errNum);
    }


    public function returnSuccessMessage($msg = "", $errNum)
    {
        return response()->json([
            'status' => true,
            'msg' => $msg,
            "error"=>null
        ], $errNum);
        
    }

    public function returnData($key, $value, $msg = "", $errNum)
    {
        return response()->json([
            'status' => true,
            'msg' => $msg,
            $key => $value
        ], $errNum);
    }
}