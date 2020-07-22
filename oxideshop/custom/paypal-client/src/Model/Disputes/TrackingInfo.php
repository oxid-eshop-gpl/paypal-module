<?php

namespace OxidProfessionalServices\PayPal\Api\Model\Disputes;

use JsonSerializable;
use OxidProfessionalServices\PayPal\Api\Model\BaseModel;

/**
 * The tracking information.
 *
 * generated from: response-tracking_info.json
 */
class TrackingInfo implements JsonSerializable
{
    use BaseModel;

    /** United Parcel Service. */
    const CARRIER_NAME_UPS = 'UPS';

    /** United States Postal Service. */
    const CARRIER_NAME_USPS = 'USPS';

    /** Federal Express. */
    const CARRIER_NAME_FEDEX = 'FEDEX';

    /** Airborne Express. */
    const CARRIER_NAME_AIRBORNE_EXPRESS = 'AIRBORNE_EXPRESS';

    /** DHL. */
    const CARRIER_NAME_DHL = 'DHL';

    /** AirSure. */
    const CARRIER_NAME_AIRSURE = 'AIRSURE';

    /** Royal Mail. */
    const CARRIER_NAME_ROYAL_MAIL = 'ROYAL_MAIL';

    /** Parcelforce Worldwide. */
    const CARRIER_NAME_PARCELFORCE = 'PARCELFORCE';

    /** Swiftair. */
    const CARRIER_NAME_SWIFTAIR = 'SWIFTAIR';

    /** Other. */
    const CARRIER_NAME_OTHER = 'OTHER';

    /** Parcelforce UK. */
    const CARRIER_NAME_UK_PARCELFORCE = 'UK_PARCELFORCE';

    /** Royal Mail Special Delivery UK. */
    const CARRIER_NAME_UK_ROYALMAIL_SPECIAL = 'UK_ROYALMAIL_SPECIAL';

    /** Royal Mail Recorded UK. */
    const CARRIER_NAME_UK_ROYALMAIL_RECORDED = 'UK_ROYALMAIL_RECORDED';

    /** Royal Mail International Signed. */
    const CARRIER_NAME_UK_ROYALMAIL_INT_SIGNED = 'UK_ROYALMAIL_INT_SIGNED';

    /** Royal Mail AirSure UK. */
    const CARRIER_NAME_UK_ROYALMAIL_AIRSURE = 'UK_ROYALMAIL_AIRSURE';

    /** United Parcel Service UK. */
    const CARRIER_NAME_UK_UPS = 'UK_UPS';

    /** Federal Express UK. */
    const CARRIER_NAME_UK_FEDEX = 'UK_FEDEX';

    /** Airborne Express UK. */
    const CARRIER_NAME_UK_AIRBORNE_EXPRESS = 'UK_AIRBORNE_EXPRESS';

    /** DHL UK. */
    const CARRIER_NAME_UK_DHL = 'UK_DHL';

    /** Other UK. */
    const CARRIER_NAME_UK_OTHER = 'UK_OTHER';

    /** Cannot provide tracking UK. */
    const CARRIER_NAME_UK_CANNOT_PROV_TRACK = 'UK_CANNOT_PROV_TRACK';

    /** Canada Post. */
    const CARRIER_NAME_CA_CANADA_POST = 'CA_CANADA_POST';

    /** Purolator Canada. */
    const CARRIER_NAME_CA_PUROLATOR = 'CA_PUROLATOR';

    /** Canpar Courier Canada. */
    const CARRIER_NAME_CA_CANPAR = 'CA_CANPAR';

    /** Loomis Express Canada. */
    const CARRIER_NAME_CA_LOOMIS = 'CA_LOOMIS';

    /** TNT Express Canada. */
    const CARRIER_NAME_CA_TNT = 'CA_TNT';

    /** Other Canada. */
    const CARRIER_NAME_CA_OTHER = 'CA_OTHER';

    /** Cannot provide tracking Canada. */
    const CARRIER_NAME_CA_CANNOT_PROV_TRACK = 'CA_CANNOT_PROV_TRACK';

    /** DHL Parcel Europe. */
    const CARRIER_NAME_DE_DP_DHL_WITHIN_EUROPE = 'DE_DP_DHL_WITHIN_EUROPE';

    /** DHL T and T Express. */
    const CARRIER_NAME_DE_DP_DHL_T_AND_T_EXPRESS = 'DE_DP_DHL_T_AND_T_EXPRESS';

    /** DHL DP International shipments. */
    const CARRIER_NAME_DE_DHL_DP_INTL_SHIPMENTS = 'DE_DHL_DP_INTL_SHIPMENTS';

    /** General Logistics Systems Germany. */
    const CARRIER_NAME_DE_GLS = 'DE_GLS';

    /** DPD Tracking Germany. */
    const CARRIER_NAME__DE_DPD_DELISTACK = ' DE_DPD_DELISTACK';

    /** Hermes Germany. */
    const CARRIER_NAME_DE_HERMES = 'DE_HERMES';

    /** United Parcel Service Germany. */
    const CARRIER_NAME_DE_UPS = 'DE_UPS';

    /** Federal Express Germany. */
    const CARRIER_NAME_DE_FEDEX = 'DE_FEDEX';

    /** TNT Express Germany. */
    const CARRIER_NAME_DE_TNT = 'DE_TNT';

    /** Other Germany. */
    const CARRIER_NAME_DE_OTHER = 'DE_OTHER';

    /** Chronopost France. */
    const CARRIER_NAME_FR_CHRONOPOST = 'FR_CHRONOPOST';

    /** Coliposte France. */
    const CARRIER_NAME_FR_COLIPOSTE = 'FR_COLIPOSTE';

    /** DHL France. */
    const CARRIER_NAME_FR_DHL = 'FR_DHL';

    /** United Parcel Service France. */
    const CARRIER_NAME_FR_UPS = 'FR_UPS';

    /** Federal Express France. */
    const CARRIER_NAME_FR_FEDEX = 'FR_FEDEX';

    /** TNT Express France. */
    const CARRIER_NAME_FR_TNT = 'FR_TNT';

    /** General Logistics Systems France. */
    const CARRIER_NAME_FR_GLS = 'FR_GLS';

    /** Other France. */
    const CARRIER_NAME_FR_OTHER = 'FR_OTHER';

    /** Poste Italia. */
    const CARRIER_NAME_IT_POSTE_ITALIA = 'IT_POSTE_ITALIA';

    /** DHL Italy. */
    const CARRIER_NAME_IT_DHL = 'IT_DHL';

    /** United Parcel Service Italy. */
    const CARRIER_NAME_IT_UPS = 'IT_UPS';

    /** Federal Express Italy. */
    const CARRIER_NAME_IT_FEDEX = 'IT_FEDEX';

    /** TNT Express Italy */
    const CARRIER_NAME_IT_TNT = 'IT_TNT';

    /** General Logistics Systems Italy. */
    const CARRIER_NAME_IT_GLS = 'IT_GLS';

    /** Other Italy. */
    const CARRIER_NAME_IT_OTHER = 'IT_OTHER';

    /** Australia Post EP Plat. */
    const CARRIER_NAME_AU_AUSTRALIA_POST_EP_PLAT = 'AU_AUSTRALIA_POST_EP_PLAT';

    /** Australia Post Eparcel. */
    const CARRIER_NAME_AU_AUSTRALIA_POST_EPARCEL = 'AU_AUSTRALIA_POST_EPARCEL';

    /** Australia Post EMS. */
    const CARRIER_NAME_AU_AUSTRALIA_POST_EMS = 'AU_AUSTRALIA_POST_EMS';

    /** DHL Australia. */
    const CARRIER_NAME_AU_DHL = 'AU_DHL';

    /** StarTrack Express Australia. */
    const CARRIER_NAME_AU_STAR_TRACK_EXPRESS = 'AU_STAR_TRACK_EXPRESS';

    /** United Parcel Service Australia. */
    const CARRIER_NAME_AU_UPS = 'AU_UPS';

    /** Federal Express Australia. */
    const CARRIER_NAME_AU_FEDEX = 'AU_FEDEX';

    /** TNT Express Australia. */
    const CARRIER_NAME_AU_TNT = 'AU_TNT';

    /** Toll IPEC Australia. */
    const CARRIER_NAME_AU_TOLL_IPEC = 'AU_TOLL_IPEC';

    /** Other Australia. */
    const CARRIER_NAME_AU_OTHER = 'AU_OTHER';

    /** Suivi FedEx France. */
    const CARRIER_NAME_FR_SUIVI = 'FR_SUIVI';

    /** Poste Italiane SDA. */
    const CARRIER_NAME_IT_EBOOST_SDA = 'IT_EBOOST_SDA';

    /** Correos de Espana. */
    const CARRIER_NAME_ES_CORREOS_DE_ESPANA = 'ES_CORREOS_DE_ESPANA';

    /** DHL Spain. */
    const CARRIER_NAME_ES_DHL = 'ES_DHL';

    /** United Parcel Service Spain. */
    const CARRIER_NAME_ES_UPS = 'ES_UPS';

    /** Federal Express Spain. */
    const CARRIER_NAME_ES_FEDEX = 'ES_FEDEX';

    /** TNT Express Spain. */
    const CARRIER_NAME_ES_TNT = 'ES_TNT';

    /** Other Spain. */
    const CARRIER_NAME_ES_OTHER = 'ES_OTHER';

    /** EMS Express Mail Service Austria. */
    const CARRIER_NAME_AT_AUSTRIAN_POST_EMS = 'AT_AUSTRIAN_POST_EMS';

    /** Austrian Post Prime. */
    const CARRIER_NAME_AT_AUSTRIAN_POST_PPRIME = 'AT_AUSTRIAN_POST_PPRIME';

    /** Chronopost. */
    const CARRIER_NAME_BE_CHRONOPOST = 'BE_CHRONOPOST';

    /** Taxi Post. */
    const CARRIER_NAME_BE_TAXIPOST = 'BE_TAXIPOST';

    /** Swiss Post Express. */
    const CARRIER_NAME_CH_SWISS_POST_EXPRES = 'CH_SWISS_POST_EXPRES';

    /** Swiss Post Priority. */
    const CARRIER_NAME_CH_SWISS_POST_PRIORITY = 'CH_SWISS_POST_PRIORITY';

    /** China Post. */
    const CARRIER_NAME_CN_CHINA_POST = 'CN_CHINA_POST';

    /** Hong Kong Post. */
    const CARRIER_NAME_HK_HONGKONG_POST = 'HK_HONGKONG_POST';

    /** Post SDS EMS Express Mail Service Ireland. */
    const CARRIER_NAME_IE_AN_POST_SDS_EMS = 'IE_AN_POST_SDS_EMS';

    /** Post SDS Priority Ireland. */
    const CARRIER_NAME_IE_AN_POST_SDS_PRIORITY = 'IE_AN_POST_SDS_PRIORITY';

    /** Post Registered Ireland. */
    const CARRIER_NAME_IE_AN_POST_REGISTERED = 'IE_AN_POST_REGISTERED';

    /** Swift Post Ireland. */
    const CARRIER_NAME_IE_AN_POST_SWIFTPOST = 'IE_AN_POST_SWIFTPOST';

    /** India Post. */
    const CARRIER_NAME_IN_INDIAPOST = 'IN_INDIAPOST';

    /** Japan Post. */
    const CARRIER_NAME_JP_JAPANPOST = 'JP_JAPANPOST';

    /** Korea Post. */
    const CARRIER_NAME_KR_KOREA_POST = 'KR_KOREA_POST';

    /** TPG Post Netherlands. */
    const CARRIER_NAME_NL_TPG = 'NL_TPG';

    /** SingPost Singapore. */
    const CARRIER_NAME_SG_SINGPOST = 'SG_SINGPOST';

    /** Chunghwa POST Taiwan. */
    const CARRIER_NAME_TW_CHUNGHWA_POST = 'TW_CHUNGHWA_POST';

    /** China Post EMS Express Mail Service. */
    const CARRIER_NAME_CN_CHINA_POST_EMS = 'CN_CHINA_POST_EMS';

    /** Federal Express China. */
    const CARRIER_NAME_CN_FEDEX = 'CN_FEDEX';

    /** TNT Express China. */
    const CARRIER_NAME_CN_TNT = 'CN_TNT';

    /** United Parcel Service China. */
    const CARRIER_NAME_CN_UPS = 'CN_UPS';

    /** Other China. */
    const CARRIER_NAME_CN_OTHER = 'CN_OTHER';

    /** TNT Express Netherlands. */
    const CARRIER_NAME_NL_TNT = 'NL_TNT';

    /** DHL Netherlands. */
    const CARRIER_NAME_NL_DHL = 'NL_DHL';

    /** United Parcel Service Netherlands. */
    const CARRIER_NAME_NL_UPS = 'NL_UPS';

    /** Federal Express Netherlands. */
    const CARRIER_NAME_NL_FEDEX = 'NL_FEDEX';

    /** KIALA Netherlands. */
    const CARRIER_NAME_NL_KIALA = 'NL_KIALA';

    /** Kiala Point Belgium. */
    const CARRIER_NAME_BE_KIALA = 'BE_KIALA';

    /** Poczta Polska. */
    const CARRIER_NAME_PL_POCZTA_POLSKA = 'PL_POCZTA_POLSKA';

    /** Pocztex. */
    const CARRIER_NAME_PL_POCZTEX = 'PL_POCZTEX';

    /** General Logistics Systems Poland. */
    const CARRIER_NAME_PL_GLS = 'PL_GLS';

    /** Masterlink Poland. */
    const CARRIER_NAME_PL_MASTERLINK = 'PL_MASTERLINK';

    /** TNT Express Poland. */
    const CARRIER_NAME_PL_TNT = 'PL_TNT';

    /** DHL Poland. */
    const CARRIER_NAME_PL_DHL = 'PL_DHL';

    /** United Parcel Service Poland. */
    const CARRIER_NAME_PL_UPS = 'PL_UPS';

    /** Federal Express Poland. */
    const CARRIER_NAME_PL_FEDEX = 'PL_FEDEX';

    /** Sagawa Kyuu Bin Japan. */
    const CARRIER_NAME_JP_SAGAWA_KYUU_BIN = 'JP_SAGAWA_KYUU_BIN';

    /** Nittsu Pelican Bin Japan. */
    const CARRIER_NAME_JP_NITTSU_PELICAN_BIN = 'JP_NITTSU_PELICAN_BIN';

    /** Kuro Neko Yamato Unyuu Japan. */
    const CARRIER_NAME_JP_KURO_NEKO_YAMATO_UNYUU = 'JP_KURO_NEKO_YAMATO_UNYUU';

    /** TNT Express Japan. */
    const CARRIER_NAME_JP_TNT = 'JP_TNT';

    /** DHL Japan. */
    const CARRIER_NAME_JP_DHL = 'JP_DHL';

    /** United Parcel Service Japan. */
    const CARRIER_NAME_JP_UPS = 'JP_UPS';

    /** Federal Express Japan. */
    const CARRIER_NAME_JP_FEDEX = 'JP_FEDEX';

    /** Pickup Netherlands. */
    const CARRIER_NAME_NL_PICKUP = 'NL_PICKUP';

    /** Intangible Netherlands. */
    const CARRIER_NAME_NL_INTANGIBLE = 'NL_INTANGIBLE';

    /** ABC Mail Netherlands. */
    const CARRIER_NAME_NL_ABC_MAIL = 'NL_ABC_MAIL';

    /** 4PX Express Hong Kong. */
    const CARRIER_NAME_HK_FOUR_PX_EXPRESS = 'HK_FOUR_PX_EXPRESS';

    /** Flyt Express Hong Kong. */
    const CARRIER_NAME_HK_FLYT_EXPRESS = 'HK_FLYT_EXPRESS';

    /**
     * @var string
     * The name of the shipment carrier for the transaction for this dispute.
     *
     * use one of constants defined in this class to set the value:
     * @see CARRIER_NAME_UPS
     * @see CARRIER_NAME_USPS
     * @see CARRIER_NAME_FEDEX
     * @see CARRIER_NAME_AIRBORNE_EXPRESS
     * @see CARRIER_NAME_DHL
     * @see CARRIER_NAME_AIRSURE
     * @see CARRIER_NAME_ROYAL_MAIL
     * @see CARRIER_NAME_PARCELFORCE
     * @see CARRIER_NAME_SWIFTAIR
     * @see CARRIER_NAME_OTHER
     * @see CARRIER_NAME_UK_PARCELFORCE
     * @see CARRIER_NAME_UK_ROYALMAIL_SPECIAL
     * @see CARRIER_NAME_UK_ROYALMAIL_RECORDED
     * @see CARRIER_NAME_UK_ROYALMAIL_INT_SIGNED
     * @see CARRIER_NAME_UK_ROYALMAIL_AIRSURE
     * @see CARRIER_NAME_UK_UPS
     * @see CARRIER_NAME_UK_FEDEX
     * @see CARRIER_NAME_UK_AIRBORNE_EXPRESS
     * @see CARRIER_NAME_UK_DHL
     * @see CARRIER_NAME_UK_OTHER
     * @see CARRIER_NAME_UK_CANNOT_PROV_TRACK
     * @see CARRIER_NAME_CA_CANADA_POST
     * @see CARRIER_NAME_CA_PUROLATOR
     * @see CARRIER_NAME_CA_CANPAR
     * @see CARRIER_NAME_CA_LOOMIS
     * @see CARRIER_NAME_CA_TNT
     * @see CARRIER_NAME_CA_OTHER
     * @see CARRIER_NAME_CA_CANNOT_PROV_TRACK
     * @see CARRIER_NAME_DE_DP_DHL_WITHIN_EUROPE
     * @see CARRIER_NAME_DE_DP_DHL_T_AND_T_EXPRESS
     * @see CARRIER_NAME_DE_DHL_DP_INTL_SHIPMENTS
     * @see CARRIER_NAME_DE_GLS
     * @see CARRIER_NAME__DE_DPD_DELISTACK
     * @see CARRIER_NAME_DE_HERMES
     * @see CARRIER_NAME_DE_UPS
     * @see CARRIER_NAME_DE_FEDEX
     * @see CARRIER_NAME_DE_TNT
     * @see CARRIER_NAME_DE_OTHER
     * @see CARRIER_NAME_FR_CHRONOPOST
     * @see CARRIER_NAME_FR_COLIPOSTE
     * @see CARRIER_NAME_FR_DHL
     * @see CARRIER_NAME_FR_UPS
     * @see CARRIER_NAME_FR_FEDEX
     * @see CARRIER_NAME_FR_TNT
     * @see CARRIER_NAME_FR_GLS
     * @see CARRIER_NAME_FR_OTHER
     * @see CARRIER_NAME_IT_POSTE_ITALIA
     * @see CARRIER_NAME_IT_DHL
     * @see CARRIER_NAME_IT_UPS
     * @see CARRIER_NAME_IT_FEDEX
     * @see CARRIER_NAME_IT_TNT
     * @see CARRIER_NAME_IT_GLS
     * @see CARRIER_NAME_IT_OTHER
     * @see CARRIER_NAME_AU_AUSTRALIA_POST_EP_PLAT
     * @see CARRIER_NAME_AU_AUSTRALIA_POST_EPARCEL
     * @see CARRIER_NAME_AU_AUSTRALIA_POST_EMS
     * @see CARRIER_NAME_AU_DHL
     * @see CARRIER_NAME_AU_STAR_TRACK_EXPRESS
     * @see CARRIER_NAME_AU_UPS
     * @see CARRIER_NAME_AU_FEDEX
     * @see CARRIER_NAME_AU_TNT
     * @see CARRIER_NAME_AU_TOLL_IPEC
     * @see CARRIER_NAME_AU_OTHER
     * @see CARRIER_NAME_FR_SUIVI
     * @see CARRIER_NAME_IT_EBOOST_SDA
     * @see CARRIER_NAME_ES_CORREOS_DE_ESPANA
     * @see CARRIER_NAME_ES_DHL
     * @see CARRIER_NAME_ES_UPS
     * @see CARRIER_NAME_ES_FEDEX
     * @see CARRIER_NAME_ES_TNT
     * @see CARRIER_NAME_ES_OTHER
     * @see CARRIER_NAME_AT_AUSTRIAN_POST_EMS
     * @see CARRIER_NAME_AT_AUSTRIAN_POST_PPRIME
     * @see CARRIER_NAME_BE_CHRONOPOST
     * @see CARRIER_NAME_BE_TAXIPOST
     * @see CARRIER_NAME_CH_SWISS_POST_EXPRES
     * @see CARRIER_NAME_CH_SWISS_POST_PRIORITY
     * @see CARRIER_NAME_CN_CHINA_POST
     * @see CARRIER_NAME_HK_HONGKONG_POST
     * @see CARRIER_NAME_IE_AN_POST_SDS_EMS
     * @see CARRIER_NAME_IE_AN_POST_SDS_PRIORITY
     * @see CARRIER_NAME_IE_AN_POST_REGISTERED
     * @see CARRIER_NAME_IE_AN_POST_SWIFTPOST
     * @see CARRIER_NAME_IN_INDIAPOST
     * @see CARRIER_NAME_JP_JAPANPOST
     * @see CARRIER_NAME_KR_KOREA_POST
     * @see CARRIER_NAME_NL_TPG
     * @see CARRIER_NAME_SG_SINGPOST
     * @see CARRIER_NAME_TW_CHUNGHWA_POST
     * @see CARRIER_NAME_CN_CHINA_POST_EMS
     * @see CARRIER_NAME_CN_FEDEX
     * @see CARRIER_NAME_CN_TNT
     * @see CARRIER_NAME_CN_UPS
     * @see CARRIER_NAME_CN_OTHER
     * @see CARRIER_NAME_NL_TNT
     * @see CARRIER_NAME_NL_DHL
     * @see CARRIER_NAME_NL_UPS
     * @see CARRIER_NAME_NL_FEDEX
     * @see CARRIER_NAME_NL_KIALA
     * @see CARRIER_NAME_BE_KIALA
     * @see CARRIER_NAME_PL_POCZTA_POLSKA
     * @see CARRIER_NAME_PL_POCZTEX
     * @see CARRIER_NAME_PL_GLS
     * @see CARRIER_NAME_PL_MASTERLINK
     * @see CARRIER_NAME_PL_TNT
     * @see CARRIER_NAME_PL_DHL
     * @see CARRIER_NAME_PL_UPS
     * @see CARRIER_NAME_PL_FEDEX
     * @see CARRIER_NAME_JP_SAGAWA_KYUU_BIN
     * @see CARRIER_NAME_JP_NITTSU_PELICAN_BIN
     * @see CARRIER_NAME_JP_KURO_NEKO_YAMATO_UNYUU
     * @see CARRIER_NAME_JP_TNT
     * @see CARRIER_NAME_JP_DHL
     * @see CARRIER_NAME_JP_UPS
     * @see CARRIER_NAME_JP_FEDEX
     * @see CARRIER_NAME_NL_PICKUP
     * @see CARRIER_NAME_NL_INTANGIBLE
     * @see CARRIER_NAME_NL_ABC_MAIL
     * @see CARRIER_NAME_HK_FOUR_PX_EXPRESS
     * @see CARRIER_NAME_HK_FLYT_EXPRESS
     */
    public $carrier_name;

    /**
     * @var string
     * The name of carrier in free-form text for unavailable carriers. This field is mandatory when
     * <code>carrier_name</code> is <code>OTHER</code>.
     */
    public $carrier_name_other;

    /**
     * @var string
     * The URL to track the dispute-related transaction shipment.
     */
    public $tracking_url;

    /**
     * @var string
     * The number to track the dispute-related transaction shipment.
     */
    public $tracking_number;
}
