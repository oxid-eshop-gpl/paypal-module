<?php

namespace OxidProfessionalServices\PayPal\Api\Model;

trait BaseModel
{
    public function jsonSerialize()
    {
        return array_filter((array) $this, static function ($var) {
            return isset($var);
        });
    }
}
