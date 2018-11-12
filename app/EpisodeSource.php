<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EpisodeSource extends Model
{
    public $table = 'episode_source';
    public $timestamps = false;

    public static function persist($episode, $sourceID, $link){
        $es = EpisodeSource::where([
            ['episode_id', '=', $episode->id],
            ['source_id', '=', $sourceID],
        ])->first();
        if(!$es){
            $episode->sources()->attach($sourceID, ['link' => $link]);
        }
    }
}
