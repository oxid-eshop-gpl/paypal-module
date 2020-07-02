<?php

// Add aliases for PHPUnit legacy classes
namespace {

    if (!class_exists('PHPUnit_TextUI_ResultPrinter')) {
        class_alias('PHPUnit\TextUI\ResultPrinter', 'PHPUnit_TextUI_ResultPrinter');
        class_alias('PHPUnit\Runner\StandardTestSuiteLoader', "PHPUnit_Runner_StandardTestSuiteLoader");
    }

}