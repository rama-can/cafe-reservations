<?php

namespace App\Services;

use Hashids\Hashids;

class HashIdService
{

    public function __construct(
        public $hashIds = new Hashids('abcdefghjklmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ234567890', 10),
    ) {}

    public function encode($id)
    {
        return $this->hashIds->encode($id);
    }

    public function decode($hashId)
    {
        if (is_int($hashId)) {
            return $hashId;
        }

        $decoded = $this->hashIds->decode($hashId);

        if (!empty($decoded)) {
            return $decoded[0];
        }

        // Handle error when the decode result is empty (return null or throw an exception)
        // Misalnya, kembalikan null
        return null;
    }
}