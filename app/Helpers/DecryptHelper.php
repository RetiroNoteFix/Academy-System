<?php 

use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

function safeDecryptWithDefault($value, $default = 'Não informado')
{
    if (empty($value)) {
        return $default;
    }

    try {
        return Crypt::decryptString($value);
    } catch (DecryptException $e) {
        return $value ?: $default;
    }
}

