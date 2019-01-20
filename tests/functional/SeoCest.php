<?php

class SeoCest
{
    public function checkSeoRules(FunctionalTester $I) {
        $seo = $I->parseCSV('tests/_data/seo_example_wrong.csv');
        foreach ($seo as $item) {
            $I->amOnUrl($item['url']);
            $title = $item['title'];
            $I->seeElement(".//title[text() = '$title']");
            $description = $item['meta description'];
            $I->seeElement(".//meta[@name = 'description' and @content = '$description']");
        }
    }
}