<?php

namespace CotCaptcha;

defined('COT_CODE') && defined('COT_PLUG') or die('Wrong URL.');

/**
 *    Captcha plugin: php class
 *
 * @author Roffun
 * @copyright Copyright (c) Roffun, 2018 - 2019 | https://github.com/Roffun
 * @license BSD License
 **/

class Captcha
{
    protected $capres = null;
    protected $secret = null;
    protected $maxAngle = 7;
    protected $maxOffset = 4;
    protected $maxLines = null;
    protected $maxLinesUnder = null;
    protected $lineEffects = true;
    protected $filterEffects = true;

    public function setMaxOffset($maxOffset)
    {
        $this->maxOffset = $maxOffset;
        return $this;
    }

    public function setMaxAngle($maxAngle)
    {
        $this->maxAngle = $maxAngle;
        return $this;
    }

    public function setLineEffects($lineEffects)
    {
        $this->lineEffects = $lineEffects;

        return $this;
    }

    public function setmaxLines($maxLines)
    {
        $this->maxLines = $maxLines;
        return $this;
    }

    public function setmaxLinesUnder($maxLinesUnder)
    {
        $this->maxLinesUnder = $maxLinesUnder;
        return $this;
    }

    public function setFilterEffects($filterEffects)
    {
        $this->filterEffects = $filterEffects;

        return $this;
    }

    /**
     * Captcha constructor.
     * @param array $options
     */
    public function __construct($secret = null, $length = 5, $rand_len = false, $charset = 'abcdef12345')
    {
        if (true === $rand_len) {
            if ($length <= 2) {
                $length = $this->rand($length, $length + 1);
            } else {
                $length = $this->rand($length - 1, $length + 1);
            }
        } else {
            $this->length = $length;
        }
        $this->charset = $charset;
        $this->secret = is_string($secret) ? $secret : $this->buildSecret($length, $charset);
    }

    /**
     * Build the image
     * @return string
     */
    public function build($width = 165, $height = 55)
    {
        $font = __DIR__ . '/../fonts/fnt'.$this->rand(0, 2).'.ttf';
        $image = imagecreatetruecolor($width, $height);
        $bg = imagecolorallocate($image, $this->rand(150, 255), $this->rand(150, 255), $this->rand(150, 255));
        $this->background = $bg;
        imagefill($image, 0, 0, $bg);

        if ($this->lineEffects) {
            $square = $width * $height;
            $effects = $this->rand($square/3000, $square/2000);

            if ($this->maxLinesUnder != null && $this->maxLinesUnder > 0) {
                $effects = min($this->maxLinesUnder, $effects);
            }

            if ($this->maxLinesUnder !== 0) {
                for ($e = 0; $e < $effects; $e++) {
                    $this->drawLine($image, $width, $height);
                }
            }
        }

        $color = $this->writeSecret($image, $this->secret, $font, $width, $height);

        if ($this->lineEffects) {
            $square = $width * $height;
            $effects = $this->rand($square/3000, $square/2000);

            if ($this->maxLines != null && $this->maxLines > 0) {
                $effects = min($this->maxLines, $effects);
            }

            if ($this->maxLines !== 0) {
                for ($e = 0; $e < $effects; $e++) {
                    $this->drawLine($image, $width, $height, $color);
                }
            }
        }

        if ($this->filterEffects) {
            $this->imgEffect($image);
        }

        $this->capres = $image;

        return $this;
    }

    /**
     * Gets the captcha secret
     * @return string
     */
    public function getSecret()
    {
        return $this->secret;
    }

    /**
     * Displays the image on the screen
     */
    public function output($type = 'jpeg', $quality = 87)
    {
        if ($type == 'gif') {
            imagegif($this->capres);
            header('Content-Type: image/gif');
        } else {
            header('Content-Type: image/jpeg');
            imagejpeg($this->capres, null, $quality);
        }
        imagedestroy($this->capres);
    }

    /**
     * Generates random secret of given length with given charset
     */
    protected function buildSecret($length, $charset)
    {
        if ($length !== null) {
            $this->length = $length;
        }
        if ($charset !== null) {
            $this->charset = $charset;
        }

        $secret = '';
        $chars = str_split($this->charset);

        for ($i = 0; $i < $this->length; $i++) {
            $secret .= $chars[array_rand($chars)];
        }

        return $secret;
    }

    /**
     * Writes the secret on the image
     */
    protected function writeSecret($image, $secret, $font, $width, $height)
    {
        $length = mb_strlen($secret);
        if ($length === 0) {
            return \imagecolorallocate($image, 0, 0, 0);
        }

        $size = $width / $length - $this->rand(0, 3) - 1;
        $box = \imagettfbbox($size, 0, $font, $secret);
        $textWidth = $box[2] - $box[0];
        $textHeight = $box[1] - $box[7];
        $x = ($width - $textWidth) / 2;
        $y = ($height - $textHeight) / 2 + $size;

        $textColor = array($this->rand(0, 145), $this->rand(0, 145), $this->rand(0, 145));
        $col = \imagecolorallocate($image, $textColor[0], $textColor[1], $textColor[2]);

        for ($i=0; $i<$length; $i++) {
            $symbol = mb_substr($secret, $i, 1);
            $box = \imagettfbbox($size, 0, $font, $symbol);
            $w = $box[2] - $box[0];
            $angle = $this->rand(-$this->maxAngle, $this->maxAngle);
            $offset = $this->rand(-$this->maxOffset, $this->maxOffset);
            \imagettftext($image, $size, $angle, $x, $y + $offset, $col, $font, $symbol);
            $x += $w;
        }

        return $col;
    }

    /**
     * Draw lines over the image
     */
    protected function drawLine($image, $width, $height, $tcol = null)
    {
        if ($tcol === null) {
            $tcol = imagecolorallocate($image, $this->rand(190, 255), $this->rand(190, 255), $this->rand(190, 255));
        }

        if ($this->rand(0, 1)) {
            $Xa   = $this->rand(0, $width/2);
            $Ya   = $this->rand(0, $height);
            $Xb   = $this->rand($width/2, $width);
            $Yb   = $this->rand(0, $height);
        } else {
            $Xa   = $this->rand(0, $width);
            $Ya   = $this->rand(0, $height/2);
            $Xb   = $this->rand(0, $width);
            $Yb   = $this->rand($height/2, $height);
        }
        imagesetthickness($image, $this->rand(1, 3));
        imageline($image, $Xa, $Ya, $Xb, $Yb, $tcol);
    }

    /**
     * Effects on the image
     */
    protected function imgEffect($image)
    {
        if (!function_exists('imagefilter')) {
            return;
        }

        imagefilter($image, IMG_FILTER_CONTRAST, $this->rand(-55, 15));

        switch ($this->rand(0, 8)) {
               case 0:
               imagefilter($image, IMG_FILTER_NEGATE);
                   break;
               case 1:
                   imagefilter($image, IMG_FILTER_COLORIZE, $this->rand(-80, 50), $this->rand(-80, 50), $this->rand(-80, 50));
                   break;
               case 2:
                   imagefilter($image, IMG_FILTER_GRAYSCALE);
                   break;
               case 3:
                   imagefilter($image, IMG_FILTER_EMBOSS);
                   break;
               case 4:
                   imagefilter($image, IMG_FILTER_SMOOTH, $this->rand(-7, -2));
                   break;
               case 5:
                   imagefilter($image, IMG_FILTER_MEAN_REMOVAL);
                   break;
           }
    }

    /**
     * Returns a random number
     */
    protected function rand($min, $max)
    {
        $rnd = mt_rand($min, $max);
        return $rnd;
    }
}
