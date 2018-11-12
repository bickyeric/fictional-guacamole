<?php

namespace App;

use App\EpisodeSource;
use Illuminate\Database\Eloquent\Model;

include(app_path() . '/Library/simple_html_dom.php');

class Page extends Model
{
    protected $primaryKey = null;
    public $timestamps = false;

    public static function getOrParse($source, $episode){
        $pageCount = Page::where('episode_id', '=', $episode->id)
                        ->where('source_id', '=', $source->id)->count();

        if($pageCount<1){
            $es = EpisodeSource::where('episode_id', '=', $episode->id)
                ->where('source_id', '=', $source->id)
                ->first();

            $link = strpos($es->link, 'http://') === 0 ? $es->link : $source->base_link.$es->link;

            $html = file_get_html($link);
            $pages = $html->find('div#imgholder > center > a > div > img');
            foreach ($pages as $page) {
                $p = new Page;
                $p->link = $page->src;
                $p->episode_id = $episode->id;
                $p->source_id = $source->id;
                $p->save();
                // echo $page->src;
            }
        }

        // return Page::where('episode_id', '=', $episode->id)
        // ->where('source_id', '=', $source->id)->get();
        return "OK";
    }
}
