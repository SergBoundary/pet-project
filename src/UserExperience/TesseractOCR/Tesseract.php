<?php

namespace App\UserExperience\TesseractOCR;

use thiagoalessio\TesseractOCR\TesseractOCR;

class Tesseract
{
    public function ocrTest($fname)
    {
        echo (new TesseractOCR(FILE_IMPORT . "/{$fname}.jpg"))->run();
}
}