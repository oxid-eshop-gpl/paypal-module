<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Partner;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;
use Webmozart\Assert\Assert;

/**
 * The request-related [HATEOAS link](/docs/api/reference/api-responses/#hateoas-links) information.
 *
 * generated from: merchant_common_components-v1-schema-common_components-v4-schema-json-openapi-2.0-link_description.json
 */
class LinkDescription implements JsonSerializable
{
    use BaseModel;

    /**
     * The complete target URL. To make the related call, combine the method with this [URI
     * Template-formatted](https://tools.ietf.org/html/rfc6570) link. For pre-processing, include the `$`, `(`, and
     * `)` characters. The `href` is the key HATEOAS component that links a completed call with a subsequent call.
     *
     * @var string
     */
    public $href;

    /**
     * The [link relation type](https://tools.ietf.org/html/rfc5988#section-4), which serves as an ID for a link that
     * unambiguously describes the semantics of the link. See [Link
     * Relations](https://www.iana.org/assignments/link-relations/link-relations.xhtml).
     *
     * @var string
     */
    public $rel;

    /**
     * The HTTP method required to make the related call.
     *
     * @var string | null
     */
    public $method;

    /**
     * The link title.
     *
     * @var string | null
     */
    public $title;

    /**
     * The media type, as defined by [RFC 2046](https://www.ietf.org/rfc/rfc2046.txt). Describes the link target.
     *
     * @var string | null
     */
    public $mediaType;

    /**
     * The media type in which to submit the request data.
     *
     * @var string | null
     */
    public $encType = 'application/json';

    /**
     * The request data or link target.
     *
     * @var mixed | null
     */
    public $schema;

    /**
     * The request data or link target.
     *
     * @var mixed | null
     */
    public $targetSchema;

    public function validate($from = null)
    {
        $within = isset($from) ? "within $from" : "";
        Assert::notNull($this->href, "href in LinkDescription must not be NULL $within");
        Assert::notNull($this->rel, "rel in LinkDescription must not be NULL $within");
    }

    public function __construct()
    {
    }
}
