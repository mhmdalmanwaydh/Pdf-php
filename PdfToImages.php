<?php

namespace PdfToImages;

use Exception;

class PdfToImages
{
    private $pdfPath;
    private $outputDir;

    public function __construct($pdfPath, $outputDir)
    {
        $this->pdfPath = $pdfPath;
        $this->outputDir = $outputDir;
    }

    public function convert()
    {
        if (!file_exists($this->pdfPath)) {
            throw new Exception("PDF file not found: {$this->pdfPath}");
        }

        if (!is_dir($this->outputDir)) {
            mkdir($this->outputDir, 0777, true);
        }

        $command = "pdftoppm -png " . escapeshellarg($this->pdfPath) . " " . escapeshellarg($this->outputDir . '/page');
        exec($command, $output, $returnVar);

        if ($returnVar !== 0) {
            throw new Exception("Failed to convert PDF to images.");
        }

        return glob($this->outputDir . '/*.png');
    }
}
