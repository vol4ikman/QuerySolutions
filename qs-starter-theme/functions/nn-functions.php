<?php 
//Get YouTube ID from URL
function getYoutubeIdFromUrl($url) {
    $parts = parse_url($url);
    if(isset($parts['query'])){
        parse_str($parts['query'], $qs);
        if(isset($qs['v'])){
            return $qs['v'];
        }else if(isset($qs['vi'])){
            return $qs['vi'];
        }
    }
    if(isset($parts['path'])){
        $path = explode('/', trim($parts['path'], '/'));
        return $path[count($path)-1];
    }
    return false;
}

function videoType( $url ){
    $newUrl = $url;
    if (strpos($url,'youtube') !== false || strpos($url,'youtu') !== false) {
        $newUrl = 'https://www.youtube.com/embed/'.getYoutubeIdFromUrl($url);
    } elseif (strpos($url,'vimeo') !== false) {
        if(preg_match("/(https?:\/\/)?(www\.)?(player\.)?vimeo\.com\/([a-z]*\/)*([0-9]{6,11})[?]?.*/", $url, $output_array)) {
            $newUrl = 'https://player.vimeo.com/video/'.$output_array[5];
        }
    }

    return $newUrl;
}
