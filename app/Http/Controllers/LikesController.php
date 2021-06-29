<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LikesController extends Controller
{
    public function post(Request $request) {
        $now = Carbon::now();
        $param = [
            "share_id" => $request->share_id,
            "user_id" => $request->user_id,
            "create_at" => $now,
            "update_at" => $now
        ];
        DB::table('likes')->insert($param);
        return response()->json([
            "message" => "Like updated successfully",
            "data" => $param
        ], 200);
    }

    public function delete(Request $request) {
        DB::table('like')->where('share_id', $request->share_id)->where('user_id', $request->user_id)->delete();
        return response()->json([
            'message' => 'Like deleted successfully',
        ], 200);
    }
}
