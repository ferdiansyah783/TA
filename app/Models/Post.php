<?php

namespace App\Models;


class Post
{
    private static $info_post = [
        [
            "title" => "SMK N 1 BANGSRI",
            "slug" => "post-pertama",
            "status" => "Negeri",
            "alamat" => "Krasak",
            "telp" => "087894573986",
            "jurusan" => "RPL, TKJ, TBSM"
        ],
        [
            "title" => "SMK N 1 BAWU",
            "slug" => "post-kedua",
            "status" => "Swasta",
            "alamat" => "Bawu",
            "telp" => "087894573986",
            "jurusan" => "OTKP, BDP, TBSM"
        ]
    ];

    public static function all()
    {
        return collect(self::$info_post);
    }

    public static function find($slug)
    {
        $posts = static::all();

        return $posts->firstWhere('slug', $slug);
    }
}
