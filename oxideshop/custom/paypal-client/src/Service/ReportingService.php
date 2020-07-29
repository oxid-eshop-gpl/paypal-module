<?php


namespace OxidProfessionalServices\PayPal\Api\Service;


use function GuzzleHttp\Psr7\build_query;
use OxidProfessionalServices\PayPal\Api\Exception\ApiException;

class ReportingService extends BaseService
{
    protected $basePath = "/v1/reporting/";

    /**
     * @param $asOfTime string
     * Minimum length: 20.
     * Maximum length: 64.
     * Pattern: ^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])[T,t]([0-1][0-9]|2[0-3]):[0-5][0-9]:([0-5][0-9]|60)([.][0-9]+)?([Zz]|[+-][0-9]{2}:[0-9]{2})$.
     *
     * @param $currencyCode string
     * Filters the transactions in the response by a three-character ISO-4217 currency code for the PayPal transaction currency.
     * Minimum length: 3.
     * Maximum length: 3.
     * @throws ApiException
     * @return \stdClass
     * see
     */
    public function listBalances($asOfTime, $currencyCode)
    {
        $res = $this->send('GET', "balances?currency_code=$currencyCode&as_of_time=$asOfTime", [], null);
        $result = json_decode($res->getBody());
        return $result;
    }

    /**
     * see https://developer.paypal.com/docs/api/transaction-search/v1/
     * @param null|string $transaction_id
     * @param null|string $transaction_status
     * @param null|string $transaction_amount
     * @param null|string $transaction_currency
     * @param null|string $start_date
     * @param null|string $end_date
     * @return mixed
     */
    public function listTransactions(
        $transaction_id = null,
        $transaction_status = null,
        $transaction_amount = null,
        $transaction_currency = null,
        $start_date = null,
        $end_date = null)
    {
        $q = [
            'transaction_id' => $transaction_id,
            'transaction_status' => $transaction_status,
            'transaction_amount' => $transaction_amount,
            'transaction_currency' => $transaction_currency,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'fields' => 'transaction_info,payer_info,shipping_info,cart_info'
        ];
        $q = array_filter($q);
        $res = $this->get('transactions', $q, []);
        $result = json_decode($res->getBody());
        return $result;

    }


}