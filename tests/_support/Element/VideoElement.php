<?php

namespace Element;

class VideoElement extends BaseElement
{
    public function srcIsNotEmpty()
    {
        $src = $this->tester->grabAttributeFrom($this->locator, 'src');
        $this->tester->assertNotEmpty($src);
    }

    public function isAutoplay()
    {
        $autoplay = $this->tester->grabAttributeFrom($this->locator, 'autoplay');
        $this->tester->assertEquals($autoplay, 'true');
    }
}