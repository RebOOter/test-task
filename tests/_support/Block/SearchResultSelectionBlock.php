<?php

namespace Block;

use Element\BaseElement;

class SearchResultSelectionBlock extends BaseElement
{
    const VIDEO_PER_PAGE = 20;

    public $video;

    public function __construct(\AcceptanceTester $I, $locator)
    {
        parent::__construct($I, $locator);

        for ($i = 1; $i <= self::VIDEO_PER_PAGE; $i++)
        {
            $this->video[] = new VideoBlock($I, $locator . "/div[$i]");
        }
    }

    /**
     * @param $id
     * @return VideoBlock
     */
    public function getVideo($id)
    {
        return $this->video[$id];
    }
}