<?php

use Hashids\Hashids;

if (!function_exists('hashids_encode')) {
    function hashids_encode($id)
    {
        $pepper  = getenv('HASHIDS_PEPPER');
        $hashids = new Hashids($pepper, 8);
        return $hashids->encodeHex(bin2hex($id));
    }
}

if (!function_exists('hashids_decode')) {
    function hashids_decode($hash)
    {
        $pepper  = getenv('HASHIDS_PEPPER');
        $hashids = new Hashids($pepper, 8);
        $result  = hex2bin($hashids->decodeHex($hash));
        return $result ?: null;
    }
}
