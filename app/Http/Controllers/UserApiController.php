<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserApiController extends Controller
{
   public function IconsAdd(){

    $data = DB::table('icons')->get(); // Example: fetch all records from YourModel

        // Return the data as JSON response
        return response()->json([
            'status' => true,
            'data' => $data
        ], 200);
   }
   public function IconSave(){

   }
}
