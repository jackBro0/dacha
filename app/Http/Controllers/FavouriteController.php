<?php

namespace App\Http\Controllers;

use App\Models\Dacha;
use App\Models\UserFavourite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavouriteController extends Controller
{
    public function addToFavourite($dacha_id)
    {
        $dacha = Dacha::query()->findOrFail($dacha_id);

        $favourite = UserFavourite::query()
            ->where('user_id', Auth::id())
            ->where('dacha_id', $dacha->id)->first();

        if (!$favourite) {
            $favourite = UserFavourite::query()->create(
                [
                    'user_id' => Auth::id(),
                    'dacha_id' => $dacha->id,
                ]
            );
        }
        return true;
    }

    public function favouriteList(Request $request)
    {
        $dachaIds = UserFavourite::query()
            ->where('user_id', Auth::id())
            ->get('dacha_id')->toArray();

        $list = Dacha::query()
            ->whereIn('id', $dachaIds)
            ->with('images', 'comforts')
            ->get();

        return response()->json(
            [
                'dacha' => $list
            ]
        );
    }

    public function deleteFavourite($dacha_id)
    {
        UserFavourite::query()
            ->where('dacha_id', $dacha_id)
            ->delete();
        return true;
    }
}
