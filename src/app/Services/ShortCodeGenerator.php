<?php

namespace App\Services;

use App\Models\Link;
use Illuminate\Support\Str;

class ShortCodeGenerator
{
    protected int $length = 6;
    protected int $maxAttempts = 1000;

    public function generate(): string
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $attempts = 0;

        do {
            $code = Str::random($this->length, $characters);
            $attempts++;

            if ($attempts > $this->maxAttempts) {
                throw new \RuntimeException('Unable to generate a unique short code after ' . $this->maxAttempts . ' attempts.');
            }
        } while (Link::where('short_code', $code)->exists());

        return $code;
    }
}
