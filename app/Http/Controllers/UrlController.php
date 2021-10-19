<?php

namespace App\Http\Controllers;

use App\Http\Requests\UrlRequest;
use App\Models\ShortUrl;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UrlController extends Controller
{
    public function getUrl(UrlRequest $request)
    {
        if ($request->address)
        {
            $new_url = ShortUrl::create([
                'original_url' => $request->address,
            ]);
            $new_url->save();

            $short_url = substr(uniqid($new_url->id), 0, -9);
            $new_url->update([
                'short_url' => $short_url
            ]);

            return response()->json(['url' => url('short_url/'.$short_url)]);
        }
    }

    public function show($code, Request $request)
    {
        $short_url = ShortUrl::where('short_url', $code)->first();
        if ($short_url) {
            redirect()->to(url($short_url->original_url))->send();
            $user = User::create([
                'ip_address' => $request->ip(),
                'user_agent' => $_SERVER['HTTP_USER_AGENT'],
                'url_id' => $short_url->id
            ]);
            $short_url->update(['visits' => $short_url->visits+1]);
            $short_url->save();
            $user->save();
        }
    }

    public function statistics()
    {
        $short_urls = ShortUrl::all();

        $ids = [];
        foreach ($short_urls as $key => $short_url){
                $ids[] = $short_url->id;
        }

        $user_ips = DB::table('users')
            ->join('short_urls', 'users.url_id', '=', 'short_urls.id')
            ->select('ip_address', 'short_urls.short_url', DB::raw('count(*) as total'))
            ->whereIn('users.url_id', $ids)
            ->groupBy('ip_address')
            ->groupBy('users.url_id')
            ->get();

        $user_agents = DB::table('users')
            ->join('short_urls', 'users.url_id', '=', 'short_urls.id')
            ->select('user_agent', 'short_urls.short_url', DB::raw('count(*) as total'))
            ->whereIn('users.url_id', $ids)
            ->groupBy('user_agent')
            ->groupBy('users.url_id')
            ->get();
        return view('users', compact('user_ips', 'short_urls', 'user_agents'));

    }
}
