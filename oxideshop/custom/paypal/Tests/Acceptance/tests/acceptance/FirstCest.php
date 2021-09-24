<?php

namespace Acceptance;

use CodeCeption\Util\Locator;

class FirstCest
{
    public function homePageLoadingTest(\AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->see('OXID eShop 6');
    }
}
