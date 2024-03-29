<?php

namespace Qantis\Tools;

class MkpUrlGenerator
{
    private $key;

    public function __construct(string $key)
    {
        $this->key = $key;
    }

    public function __invoke(string $email)
    {
        $time  = time();
        $data = $email . $time.$this->key;
        $hash = base64_encode(hash('sha256', $data));

        return '/login/auto-login?email='.$email.'&timestamp='.$time.'&hash='.$hash;
    }
}
