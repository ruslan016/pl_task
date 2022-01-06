<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UpdateItemRequest;
use App\Services\Response\ResponseServise;

class ItemController extends Controller
{

    public function generateItems(Request $request)
    {

        
        $userId = $request->user_id;
        
        $user = User::where('id', $userId)->exists();
        $itemUser = Item::where('user_id', $userId )->doesntExist();
        //$user = DB::table('users')->select('id')->where('id', $userId)->first();
        //$items = DB::table('items')->select('*')->where('user_id', $userId)->first();
       
        if ($user && $itemUser) {
                $num = rand(3, 20);
                $water = ($num == 2) ? 2 + (rand(1, 18)) : $num;

                $items = Item::create([
                    'user_id' => $userId,
                    'water' => $water,
                    'shirt' => rand(3, 20),
                    'pants' => rand(3, 20),
                    'dog' => rand(3, 20),
                    'soup' => rand(3, 20),
                    'be_developer' => rand(3, 20),
                ]);
            return ResponseServise::sendJsonResponse(true, 200, [], [
                'items' => $items->toArray()
            ]);
        } else {
            return ResponseServise::sendJsonResponse(false, 400, [], [
                'message' => "User a not exist. Or User can't generate additional set of items"
            ]);
        }
    }
}
