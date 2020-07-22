<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Orders;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The name of the party.
 *
 * generated from: MerchantsCommonComponentsSpecification-v1-schema-common_components-v3-schema-json-openapi-2.0-name.json
 */
class Name implements JsonSerializable
{
    use BaseModel;

    /**
     * @var string
     * The prefix, or title, to the party's name.
     */
    public $prefix;

    /**
     * @var string
     * When the party is a person, the party's given, or first, name.
     */
    public $given_name;

    /**
     * @var string
     * When the party is a person, the party's surname or family name. Also known as the last name. Required when the
     * party is a person. Use also to store multiple surnames including the matronymic, or mother's, surname.
     */
    public $surname;

    /**
     * @var string
     * When the party is a person, the party's middle name. Use also to store multiple middle names including the
     * patronymic, or father's, middle name.
     */
    public $middle_name;

    /**
     * @var string
     * The suffix for the party's name.
     */
    public $suffix;

    /**
     * @var string
     * DEPRECATED. The party's alternate name. Can be a business name, nickname, or any other name that cannot be
     * split into first, last name. Required when the party is a business.
     */
    public $alternate_full_name;

    /**
     * @var string
     * When the party is a person, the party's full name.
     */
    public $full_name;
}
