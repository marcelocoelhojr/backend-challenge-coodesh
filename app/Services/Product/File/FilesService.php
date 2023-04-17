<?php

namespace App\Services\Product\File;

use Illuminate\Support\Collection;

class FilesService
{
    private string $decompressedFilePath;
    private ?string $fileName;

    const FILE_DIR = '/tmp/';
    const PRODUCTS_LINE = 100;

    public function __construct(?string $fileName = null)
    {
        $this->fileName = $fileName;
        $this->decompressedFilePath = $this->getDecompressedFilePath();
    }

    /**
     * Decompress the file and extract the first 100 lines
     *
     * @param string $fileName
     * @return void
     */
    public function decompressProductFile(string $fileName): void
    {
        $fp = gzopen(self::FILE_DIR . $fileName, 'r');
        $out = fopen($this->decompressedFilePath, 'w');
        for ($i = 0; $i < self::PRODUCTS_LINE; $i++) {
            $line = gzgets($fp);
            if ($line === false) {
                break;
            }
            fwrite($out, $line);
        }
        gzclose($fp);
        fclose($out);
    }

    /**
     * Read the first 100 lines of the file
     *
     * @return Collection
     */
    public function readProductFile(): Collection
    {
        $fileProdutLines = file($this->decompressedFilePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $firstLines = array_slice($fileProdutLines, 0, self::PRODUCTS_LINE);

        return collect($firstLines);
    }

    /**
     * Get unzipped file path
     *
     * @return string
     */
    private function getDecompressedFilePath(): string
    {
        return self::FILE_DIR . explode('.', $this->fileName)[0] . '.json';
    }
}
