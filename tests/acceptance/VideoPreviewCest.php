<?php

use Page\VideoPage;

class VideoPreviewCest
{
    public function checkPreview(VideoPage $videoPage)
    {
        $videoPage->open()
            ->search('ураган')
            ->waitForSearchResultLoad()
            ->moveMouseOverVideo(0,0)
            ->checkVideoPreview(0, 0);
    }
}