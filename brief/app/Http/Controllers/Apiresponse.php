<?php
    
namespace App\Http\Controllers;

trait Apiresponse{
    public function Apiresponse($cont,$status,$message)
    {
        $data = [
            'cont'=>$cont,
            'status' => $status,
            'message' => $message
        ];

        return response($data,$status);
    }
}
?>