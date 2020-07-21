<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The business name of the party.
 */
class BusinessName implements JsonSerializable
{
    use BaseModel;

    const ORTHOGRAPHY_ZYYY = 'Zyyy';
    const ORTHOGRAPHY_ZZZZ = 'Zzzz';
    const ORTHOGRAPHY_KANA = 'Kana';
    const ORTHOGRAPHY_CYRL = 'Cyrl';
    const ORTHOGRAPHY_ARAB = 'Arab';
    const ORTHOGRAPHY_ARMN = 'Armn';
    const ORTHOGRAPHY_BENG = 'Beng';
    const ORTHOGRAPHY_CANS = 'Cans';
    const ORTHOGRAPHY_DEVA = 'Deva';
    const ORTHOGRAPHY_ETHI = 'Ethi';
    const ORTHOGRAPHY_GEOR = 'Geor';
    const ORTHOGRAPHY_GREK = 'Grek';
    const ORTHOGRAPHY_GUJR = 'Gujr';
    const ORTHOGRAPHY_GURU = 'Guru';
    const ORTHOGRAPHY_HANI = 'Hani';
    const ORTHOGRAPHY_HEBR = 'Hebr';
    const ORTHOGRAPHY_JAVA = 'Java';
    const ORTHOGRAPHY_JPAN = 'Jpan';
    const ORTHOGRAPHY_KHMR = 'Khmr';
    const ORTHOGRAPHY_KNDA = 'Knda';
    const ORTHOGRAPHY_KORE = 'Kore';
    const ORTHOGRAPHY_LAOO = 'Laoo';
    const ORTHOGRAPHY_LATN = 'Latn';
    const ORTHOGRAPHY_MLYM = 'Mlym';
    const ORTHOGRAPHY_MONG = 'Mong';
    const ORTHOGRAPHY_MYMR = 'Mymr';
    const ORTHOGRAPHY_ORYA = 'Orya';
    const ORTHOGRAPHY_SINH = 'Sinh';
    const ORTHOGRAPHY_SUND = 'Sund';
    const ORTHOGRAPHY_SYRC = 'Syrc';
    const ORTHOGRAPHY_TAML = 'Taml';
    const ORTHOGRAPHY_TELU = 'Telu';
    const ORTHOGRAPHY_THAA = 'Thaa';
    const ORTHOGRAPHY_THAI = 'Thai';
    const ORTHOGRAPHY_TIBT = 'Tibt';
    const ORTHOGRAPHY_YIII = 'Yiii';

    /** @var string */
    public $business_name;

    /**
     * @var string
     * The orthography type based on the ISO 15924 names for scripts. Scipts are chosen based on [most widely used
     * writing systems](https://www.worldatlas.com/articles/the-world-s-most-popular-writing-scripts.html).
     */
    public $orthography;
}
