<?php

namespace Block;

use Element\BaseElement;

class SearchResultBlock extends BaseElement
{
    public $selection;

    public function __construct(\AcceptanceTester $I, $locator)
    {
        parent::__construct($I, $locator);

        //Because we always have first 20 videos (1st page)
        $this->selection[] = new SearchResultSelectionBlock($I, $locator . '/div[@role=\'list\'][1]');
    }

    /**
     * @param $id
     * @return SearchResultSelectionBlock
     */
    public function getSelection($id)
    {
        return $this->selection[$id];
    }
}