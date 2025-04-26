<?php

namespace MoscowBeton\SitemapGenerate\SitemapGenerateComponent;

use MoscowBeton\SitemapGenerate\SitemapGenerateComponent\Interfaces\Result;
use MoscowBeton\SitemapGenerate\SitemapGenerateComponent\Interfaces\ResultWriter;
use MoscowBeton\SitemapGenerate\SitemapGenerateComponent\Interfaces\Storage;
use MoscowBeton\SitemapGenerate\SitemapGenerateComponent\Interfaces\ConsoleWriter as IConsoleWriter;

class GenerateController
{
    protected Storage $storage;
    protected ResultWriter $resultWriter;
    protected Result $result;
    protected IConsoleWriter $consoleWriter;

    public function __construct(
        Storage $storage,
        ResultWriter $resultWriter,
        Result $result,
        IConsoleWriter $consoleWriter
    )
    {
        $this->storage = $storage;
        $this->resultWriter = $resultWriter;
        $this->result = $result;
        $this->consoleWriter = $consoleWriter;
    }

    public function generate()
    {
        $this->consoleWriter->success('Генерация начата');
        foreach ($this->storage->getRegionsList() as $regionData) {
            $urlsData = $this->storage->getRegionData($regionData);
            $textXml = $this->result->getXml($urlsData);
            try {
               $file = $this->resultWriter->write($textXml, $regionData);
               $this->consoleWriter->success('Файл успешно сгенерирован ' . $file);
            } catch (\Exception $exception) {
                $this->consoleWriter->fail($exception->getMessage());
            }
        }
        $this->consoleWriter->success('Генерация завершена');
    }
}