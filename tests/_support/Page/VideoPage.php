<?php

namespace Page;

use Block\SearchBlock;
use Block\SearchResultBlock;
use Element\ButtonElement;

class VideoPage extends BasePage
{
    protected $url = '/video';
    private $searchBar;
    private $channelListButton;
    private $searchResult;

    public function __construct(\AcceptanceTester $I)
    {
        parent::__construct($I);

        $this->searchBar = new SearchBlock($I, 'form[role=\'search\']');
        $this->channelListButton = new ButtonElement($I, '.stream-toggles__title');
        $this->searchResult = new SearchResultBlock($I, './/div[@role=\'main\']');
    }

    public function search($value)
    {
        $this->searchBar->searchInput->fillField($value);
        $this->searchBar->searchButton->click();

        return $this;
    }

    public function waitForLoad()
    {
        $this->channelListButton->waitForElement();

        return $this;
    }

    public function waitForSearchResultLoad()
    {
        $this->searchResult->waitForElement();

        return $this;
    }

    public function moveMouseOverVideo($id, $selection)
    {
        $this->searchResult->getSelection($selection)->getVideo($id)->moveMouseOver();

        return $this;
    }

    public function checkVideoPreview($id, $selection)
    {
        $this->searchResult->getSelection($selection)->getVideo($id)->videoPreview->waitForElement();
        $this->searchResult->getSelection($selection)->getVideo($id)->thumbContainerWithActiveVideo->shown();
        $this->searchResult->getSelection($selection)->getVideo($id)->videoContainerWithActiveVideo->waitForElement();

        return $this;
    }
}