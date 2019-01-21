<?php

namespace Page;

class BasePage
{
    protected $tester;
    protected $url;

    public function __construct(\AcceptanceTester $I)
    {
        $this->tester = $I;
    }

    public function open()
    {
        $this->tester->amOnPage($this->url);

        return $this;
    }

    public function waitForLoad() { }
}