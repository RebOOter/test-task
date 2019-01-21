<?php

namespace Block;

use Element\BaseElement;
use Element\ImageElement;
use Element\VideoElement;

class VideoBlock extends BaseElement
{
    public $imagePreview;
    public $thumbContainerWithActiveVideo;
    public $videoContainerWithActiveVideo;
    public $videoPreview;

    public function __construct(\AcceptanceTester $I, $locator)
    {
        parent::__construct($I, $locator);

        $this->imagePreview = new ImageElement($I, $locator . '//img');
        $this->videoPreview = new VideoElement($I, $locator . '//video');
        $this->thumbContainerWithActiveVideo = new BaseElement($I, '.thumb-image.thumb-image_shadow.serp-item__thumb.serp-item__thumb_rounded.i-bem.thumb-image_js_inited.thumb-image_hovered');
        $this->videoContainerWithActiveVideo = new BaseElement($I, '.thumb-image__preview.thumb-preview__target.thumb-preview__target_playing');
    }
}