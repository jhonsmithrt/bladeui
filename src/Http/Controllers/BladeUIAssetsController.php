<?php

namespace BladeUI\Http\Controllers;

use Illuminate\Http\Response;
use Livewire\Controllers\CanPretendToBeAFile;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class BladeUIAssetsController extends Controller
{
    use CanPretendToBeAFile;

    public function scripts(): Response|BinaryFileResponse
    {
        return $this->pretendResponseIsFile(__DIR__ . '/../../../dist/bladeui.js', $mimeType = 'application/javascript');
    }

    public function styles(): Response|BinaryFileResponse
    {
        return $this->pretendResponseIsFile(__DIR__ . '/../../../dist/bladeui.css', $mimeType = 'text/css');
    }
}
