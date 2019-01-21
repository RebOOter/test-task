<?php

namespace Block;

use Element\BaseElement;
use Element\InputElement;
use Element\ButtonElement;

class SearchBlock extends BaseElement
{
    public $searchInput;
    public $searchButton;

    public function __construct(\AcceptanceTester $I, $locator)
    {
        parent::__construct($I, $locator);

        $this->searchInput = new InputElement($I, 'input[type=\'search\']');
        $this->searchButton = new ButtonElement($I, 'button[type=\'submit\']');
    }
}