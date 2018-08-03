<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PublicController extends Controller
{
    public function publicSearch(Request $request)
    {
        $request->validate([
            'uid' => 'required|string|max:100|exists:history',
            'customer_phone' => 'required|string|min:11|max:11|exists:history',
        ]);
        $uid = $request->uid;
        $customerPhone = $request->customer_phone;
        $histories = DB::table('history')
            ->where([['uid', $uid], ['customer_phone', $customerPhone]])
            ->get();

        return view('public.publicSearch')
            ->with('histories', $histories);
    }
}
