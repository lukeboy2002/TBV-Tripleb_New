<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Player;
use App\Models\Post;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function upload(Request $request)
    {
        try {
            $player = new Player();
            $player->id = 0;
            $player->exists = true;
            $image = $player->addMediaFromRequest('upload')->toMediaCollection('player');

            return response()->json([
                'uploaded' => true,
                'url' => $image->getUrl('thumb')
            ]);
        } catch (\Exception $e) {
            return response()->json(
                [
                    'uploaded' => false,
                    'error'    => [
                        'message' => $e->getMessage()
                    ]
                ]
            );
        }
    }
}
