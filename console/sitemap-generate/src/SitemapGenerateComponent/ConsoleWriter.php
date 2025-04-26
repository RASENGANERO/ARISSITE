<?php

namespace MoscowBeton\SitemapGenerate\SitemapGenerateComponent;

use MoscowBeton\SitemapGenerate\SitemapGenerateComponent\ConsoleWriterEnums\Foreground;
use MoscowBeton\SitemapGenerate\SitemapGenerateComponent\Interfaces\ConsoleWriter as IConsoleWriter;

class ConsoleWriter implements IConsoleWriter
{
    public function writeColorMessage(string $message, string $color)
    {
        echo "\e[" . $color . "m" . $message . "\e[0m\n";
    }

    public function success($message)
    {
        if (is_array($message)) {
            foreach ($message as $it) {
                $this->writeColorMessage($it, Foreground::GREEN);
            }
        } else {
            $this->writeColorMessage($message, Foreground::GREEN);
        }
    }

    public function fail($message)
    {
        if (is_array($message)) {
            foreach ($message as $it) {
                $this->writeColorMessage($it, Foreground::RED);
            }
        } else {
            $this->writeColorMessage($message, Foreground::RED);
        }
    }
}