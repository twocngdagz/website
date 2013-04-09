<?php

if (! function_exists('cdn')) {
    function cdn($url) {
        return Config::get('website.asset_path').$url;
    }
}
