<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait ContentTrait {

    public function assignArticleContent($content): string
    {
        libxml_use_internal_errors(true);
        $dom = new \DOMDocument();
        $dom->loadHTML($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getElementsByTagName('img');
        foreach ( $images as $key => $image ) {
            $src = $image->getAttribute('src');
            if ( preg_match('/data:image/', $src) ) {
                preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                $mimeType = $groups['mime'];
                $path = '/articles/content/' . uniqid('', true) . '.' . $mimeType;
                Storage::disk('public')->put($path, file_get_contents($src));
                $newSource = asset('/storage' . $path);
                $image->removeAttribute('src');
                $image->setAttribute('src', $newSource);
                // with storage
                // $image->removeAttribute('src');
                // $image->setAttribute('src', Storage::disk('public')->url($path));
            }

        }
        return $dom->saveHTML();
    }

}
