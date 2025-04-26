<?php

namespace MoscowBeton\SitemapGenerate\SitemapGenerateComponent\Interfaces;

interface ConsoleWriter
{
    public function writeColorMessage(string $message, string $color);

    public function success($message);

    public function fail($message);
}