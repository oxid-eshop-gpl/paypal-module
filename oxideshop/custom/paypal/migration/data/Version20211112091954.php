<?php

declare(strict_types=1);

namespace OxidProfessionalServices\PayPal\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\DBAL\Types\Types;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211112091954 extends AbstractMigration
{
    public function __construct($version)
    {
        parent::__construct($version);

        $this->platform->registerDoctrineTypeMapping('enum', 'string');
    }

    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        //create subscription product table
        $subscriptionProduct = $schema->createTable('oxps_paypal_subscription_product');
        $subscriptionProduct->addColumn('OXID', Types::STRING, ['columnDefinition' => 'char(32) collate latin1_general_ci']);
        $subscriptionProduct->addColumn('OXSHOPID', Types::INTEGER, ['columnDefinition' => 'int(11)', 'default' => 1, 'comment' => 'Shop ID (oxshops)']);
        $subscriptionProduct->addColumn('OXARTID', Types::STRING, ['columnDefinition' => 'char(32) collate latin1_general_ci', 'comment' => 'OXID (oxarticles)']);
        $subscriptionProduct->addColumn('PAYPALPRODUCTID', Types::STRING, ['columnDefinition' => 'char(32) collate latin1_general_ci', 'comment' => 'PayPal product ID']);
        $subscriptionProduct->addColumn('PAYPALSUBSCRIPTIONPLANID', Types::STRING, ['columnDefinition' => 'char(32) collate latin1_general_ci', 'comment' => 'PayPal PLan ID']);
        $subscriptionProduct->addColumn('OXTIMESTAMP', Types::DATETIME_MUTABLE, ['columnDefinition' => 'timestamp default current_timestamp on update current_timestamp']);
        $subscriptionProduct->setPrimaryKey(['OXID']);

        //create subscription table
        $subscription = $schema->createTable('oxps_paypal_subscription');
        $subscription->addColumn('OXID', Types::STRING, ['columnDefinition' => 'char(32) collate latin1_general_ci']);
        $subscription->addColumn('OXSHOPID', Types::INTEGER, ['columnDefinition' => 'int(11)', 'default' => 1, 'comment' => 'Shop ID (oxshops)']);
        $subscription->addColumn('OXUSERID', Types::STRING, ['columnDefinition' => 'char(32) collate latin1_general_ci', 'comment' => 'OXID (oxuser)']);
        $subscription->addColumn('OXORDERID', Types::STRING, ['columnDefinition' => 'char(32) collate latin1_general_ci', 'comment' => 'OXID Parent Order id (oxorder)']);
        $subscription->addColumn('OXPARENTORDERID', Types::STRING, ['columnDefinition' => 'char(32) collate latin1_general_ci', 'comment' => 'OXID (oxorder)']);
        $subscription->addColumn('OXPAYPALSUBPRODID', Types::STRING, ['columnDefinition' => 'char(32) collate latin1_general_ci', 'comment' => 'OXID (oxps_paypal_subscription_product)']);
        $subscription->addColumn('PAYPALBILLINGAGREEMENTID', Types::STRING, ['columnDefinition' => 'char(32) collate latin1_general_ci', 'comment' => 'PayPal Billing Agreement ID']);
        $subscription->addColumn('PAYPALBILLINGCYCLETYPE', Types::STRING, ['columnDefinition' => 'char(10) collate latin1_general_ci', 'comment' => 'Billing Cycle Type (TRIAL, REGULAR)']);
        $subscription->addColumn('PAYPALBILLINGCYCLENR', Types::STRING, ['columnDefinition' => 'int(10) unsigned', 'comment' => 'Billing Cycle Number']);
        $subscription->addColumn('OXCANCELREQUESTSENDED', Types::STRING, ['columnDefinition' => 'tinyint(1) unsigned', 'comment' => 'Is there a cancel request send by the customer?']);
        $subscription->addColumn('OXTIMESTAMP', Types::DATETIME_MUTABLE, ['columnDefinition' => 'timestamp default current_timestamp on update current_timestamp']);
        $subscription->setPrimaryKey(['OXID']);

        //create paypal order table
        $order = $schema->createTable('oxps_paypal_order');
        $order->addColumn('OXID', Types::STRING, ['columnDefinition' => 'char(32) collate latin1_general_ci']);
        $order->addColumn('OXSHOPID', Types::INTEGER, ['columnDefinition' => 'int(11)', 'default' => 1, 'comment' => 'Shop ID (oxshops)']);
        $order->addColumn('OXORDERID', Types::STRING, ['columnDefinition' => 'char(32) collate latin1_general_ci', 'comment' => 'OXID Parent Order id (oxorder)']);
        $order->addColumn('OXPAYPALORDERID', Types::STRING, ['columnDefinition' => 'char(32) collate latin1_general_ci', 'comment' => 'OXID (oxorder)']);
        $order->addColumn('OXTIMESTAMP', Types::DATETIME_MUTABLE, ['columnDefinition' => 'timestamp default current_timestamp on update current_timestamp']);
        $order->setPrimaryKey(['OXID']);
        $order->addindex(['OXORDERID', 'OXORDERID']);
    }

    public function down(Schema $schema): void
    {
        //tbd
    }
}
