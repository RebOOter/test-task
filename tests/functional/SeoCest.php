<?php

use ParseCsv\Csv;

class SeoCest
{
    /**
     * @param FunctionalTester $I
     * @param Codeception\Example $seo
     *
     * @dataProvider csvProvider
     */
    public function checkSeoTitle(FunctionalTester $I, \Codeception\Example $seo)
    {
        $I->amOnUrl($seo['url']);
        $title = $I->grabTextFrom('title');
        $I->assertEquals($seo['title'], $title);
    }

    /**
     * @param FunctionalTester $I
     * @param \Codeception\Example $seo
     *
     * @dataProvider csvProvider
     */
    public function checkSeoMeta(FunctionalTester $I, \Codeception\Example $seo)
    {
        $I->amOnUrl($seo['url']);
        $description = $I->grabAttributeFrom('meta[name=\'description\']', 'content');
        $I->assertEquals($seo['meta description'], $description);
    }

    /**
     * @return array
     */
    protected function csvProvider()
    {
        //For all green tests use seo_example.csv file
        $filePath = 'tests/_data/seo_example_wrong.csv';

        $csv = new Csv();
        $csv->offset = 1;
        $csv->parse($filePath);
        return $csv->data;
    }
}