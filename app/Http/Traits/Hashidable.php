<?php

namespace App\Http\Traits;

use Hashids;


trait Hashidable
{
    public function encode_id()
    {
        return Hashids::encode($this['id']);
    }

    public function decode_id($hash)
    {
        return Hashids::decode($hash);
    }

}
