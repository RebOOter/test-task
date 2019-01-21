<?php

namespace Element;

class BaseElement
{
    protected $tester;
    protected $locator;

    public function __construct(\AcceptanceTester $I, $locator)
    {
        $this->tester = $I;
        $this->locator = $locator;
    }

    public function shown()
    {
        $this->tester->seeElement($this->locator);
    }

    public function waitForElement()
    {
        $this->tester->waitForElement($this->locator);
    }

    public function moveMouseOver()
    {
        $this->tester->moveMouseOver($this->locator);
    }
}