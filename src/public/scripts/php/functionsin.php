<?php

function AdaptString(string $str, int $length = 50): string {
    if(strlen($str) >= $length && !str_ends_with($str, '...')) {
        $finalstr = substr_replace($str, "...", $length, strlen($str));
        return $finalstr;
    } else {
        return $str;
    }
}