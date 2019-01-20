<?php

use ParseCsv\Csv;

class SeoCest
{
    /**
     * @dataProvider csvProvider
     */
    public function checkSeoRules(FunctionalTester $I, \Codeception\Example $seo) {
            $I->amOnUrl($seo['url']);
            $title = $seo['title'];
            $I->seeElement(".//title[text() = '$title']");
            $description = $seo['meta description'];
            $I->seeElement(".//meta[@name = 'description' and @content = '$description']");
    }

    protected function csvProvider() {
        $filePath = 'tests/_data/seo_example_wrong.csv';

        $csv = new Csv();
        $csv->offset = 1;
        $csv->parse($filePath);
        return $csv->data;
    }
}