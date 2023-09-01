<?php

namespace bin\epaphrodite\CsrfToken;

use bin\epaphrodite\constant\EpaphClass;

class GeneratedValues extends EncryptTokenValue
{
    /**
     * @return mixed
     */
    public function getvalue()
    {
        return $this->GenerateurTokenValues(70);
    }
}
