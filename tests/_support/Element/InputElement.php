<?php

namespace Element;

class InputElement extends BaseElement
{
    public function fillField($value)
    {
        $this->tester->fillField($this->locator, $value);
    }
}