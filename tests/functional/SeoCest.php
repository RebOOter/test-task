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
    public function checkSeo(FunctionalTester $I, \Codeception\Example $seo)
    {
        //You could use this implementation instead of set up cookie in config file
//        $I->setCookie('test', 'seo')
        $I->amOnUrl($seo['url']);
        $title = $I->grabTextFrom('title');
        $I->assertEquals($seo['title'], $title);
        $description = $I->grabAttributeFrom('meta[name=\'description\']', 'content');
        $I->assertEquals($seo['meta description'], $description);
    }

    /**
     * @return array
     */
    protected function csvProvider()
    {
        $filePath = 'tests/_data/seo_example_wrong.csv';

        $csv = new Csv();
        $csv->offset = 1;
        $csv->parse($filePath);
        return $csv->data;
    }
}