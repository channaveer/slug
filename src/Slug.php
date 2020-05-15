<?php
namespace Channaveer\Slug;

class Slug
{
    public static function create($string)
    {
        /** Remove characters other than alpha-numeric */
        $cleanString    = preg_replace("/[^a-zA-Z0-9\s]/", "", strtolower($string));
        $slug           = preg_replace("/\s+/", "-", $cleanString);
        return $slug;
    }
}
