<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
    public static function parseComicJson($comicJson){
        $comic = Comic::where('name', $comicJson['comicName'])->first();
        if(!$comic){
            $comic = new Comic;
            $comic->name = $comicJson['comicName'];
            $comic->save();
        }

        $new = Episode::parseEpisodeJson($comicJson, $comic->id);
        return $new;
    }

    public function episodes(){
        return $this->hasMany('App\Episode');
    }
}
