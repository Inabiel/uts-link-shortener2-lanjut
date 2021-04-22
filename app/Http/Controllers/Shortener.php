<?php

namespace App\Http\Controllers;

use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Hidehalo\Nanoid\Client;
use Hidehalo\Nanoid\GeneratorInterface;
use App\Link;
use App\User;

class Shortener extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function short_id_guest(Request $request)
    {
        $client = new Client();
        $originalLink = $request->link;
        $hashedLink = $client->generateId($size = 7, $mode = Client::MODE_DYNAMIC);
        $urlContents = file_get_contents("$originalLink");
        preg_match("/<title>(.*)<\/title>/i", $urlContents, $matches);
        $tag = $matches[1];
        if ($request->session()->get('is_login') != 1) {
            Link::Create([
                'hash' => $hashedLink,
                'originalLink' => $originalLink,
                'title' => $tag,
                'clicked' => 0,
                'userID' => User::firstWhere('name', 'guest')->id,
            ]);
        } else {
            Link::Create([
                'hash' => $hashedLink,
                'originalLink' => $originalLink,
                'title' => $tag,
                'clicked' => 0,
                'userID' => $request->session()->get('id'),
            ]);
            return redirect()->route('user');
        }

        $user = User::where('name', 'guest')->first();
        $user->links_amount += 1;
        $user->save();
        return view('index_with_link')->with(['hashedLink' => $hashedLink]);
    }

    public function get_id($hash)
    {
        $hash = Link::where('hash', $hash)->first();
        echo $hash;
        $hash->clicked += 1;
        $hash->save();
        return redirect($hash->originalLink);
    }
}
