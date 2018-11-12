<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    public static $var = array();

    public static function parseEpisodeJson($episodeJson, $comic_id){
        $new = false;

        $episode = Episode::where([
            ['no', '=', $episodeJson['no']],
            ['comic_id', '=', $comic_id],
        ])->first();

        if(!$episode){
            $new = true;
            $episode = new Episode;
            $episode->no = $episodeJson['no'];
            $episode->name = $episodeJson['episodeName'];
            $episode->comic_id = $comic_id;
            $episode->save();
        }

        foreach ($episodeJson['source'] as $source) {
            EpisodeSource::persist($episode, $source['id'], $source['link']);
        }

        return $new;
    }

    public static function parseJSONObject($json, $comic_id, $sourceID){


    }

    public function comic(){return $this->belongsTo('App\Comic');}
    public function sources(){return $this->belongsToMany('App\Source');}
}
