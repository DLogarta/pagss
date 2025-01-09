<?php

if (!function_exists('canAccess')) {
    function canAccess($page) {
        $user = session('user');
        $cleanedPages = str_replace(['[', ']', '"'], '', $user->pages);
        $pages = explode(',', $cleanedPages);
        return in_array($page, $pages);
    }
}
