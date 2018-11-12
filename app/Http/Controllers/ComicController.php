<?php

namespace App\Http\Controllers;

use App\Comic;
use App\Page;
use Illuminate\Http\Request;

class ComicController extends Controller
{

    public function store(Request $request){
        $arr = $request->getContent();
        $response = array();
        $response['new'] = [];
        $response['old'] = [];
        foreach (json_decode($arr, true) as $comicJson) {
            $new = Comic::parseComicJson($comicJson);
            unset($comicJson['source']);

            if($new){
                array_push($response['new'], $comicJson);
            }else{
                array_push($response['old'], $comicJson);
            }
        }

        return $response;
    }

    public function search(Request $request, $keyword){
        // $comics = Comic::where('name', 'like', $keyword.'%');
        // return $comics->paginate(5);
        return "OK";
    }

    public function readEpisode(Request $request, $comicName, $no){
        // $comic = Comic::where('name', '=', $comicName)->first();
        // $episode = $comic->episodes->where('no', '=', $no)->first();
        // $source = $episode->sources->first();
        // return Page::getOrParse($source, $episode);
        return "OK";
    }

    public function readLatestEpisode(Request $request, $comicName){
        // $comic = Comic::where('id', '=', $comicName)->first();
        // $lastEpisode = $comic->episodes->last();
        // return response()->json([
        //     'id' => $comic->id,
        //     'name' => $comic->name,
        //     'episode' => [
        //         'id' => $lastEpisode->id,
        //         'name' => $lastEpisode->name,
        //         'no' => $lastEpisode->no,
        //     ]
        // ]);
        // TODO
        return "OK";
    }
}
