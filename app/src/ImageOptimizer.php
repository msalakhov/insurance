<?php
namespace App;
use Imagine\Gd\Imagine;
use Imagine\Image\Box;
class ImageOptimizer
{
    private const MAX_WIDTH = 220;
    private const MAX_HEIGHT = 220;
    private $imagine;
    public function __construct()
    {
        $this->imagine = new Imagine();
    }
    public function resize(string $filename): void
    {
        $width = self::MAX_WIDTH;
        $height = self::MAX_HEIGHT;

        $photo = $this->imagine->open($filename);
        $photo->thumbnail(new Box($width, $height), $photo::THUMBNAIL_OUTBOUND)->save($filename);
    }
}
