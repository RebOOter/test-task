<?php

namespace Element;

class ButtonElement extends BaseElement
{
    public function click()
    {
        $this->tester->click($this->locator);
    }
}