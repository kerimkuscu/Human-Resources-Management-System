<?php

namespace App\Enums;

class FileFormat
{
    const OTHER   = 0;
    const TEXT    = 1;
    const PDF     = 2;
    const WORD    = 3;
    const EXCEL   = 4;
    const ARCHIVE = 5;
    const PNG     = 6;
    const JPG     = 6;

    public static function labels(): array
    {
        return [
            static::OTHER   => 'Other File',
            static::TEXT    => 'Text Document',
            static::PDF     => 'PDF Document',
            static::WORD    => 'Word Document',
            static::EXCEL   => 'Excel File',
            static::ARCHIVE => 'Archive File',
            static::PNG     => 'Png Image',
            static::JPG     => 'Jpeg Image',
        ];
    }

    public static function label(int $value): string
    {
        $labels = static::labels();

        return $labels[$value] ?? 'Other File';
    }

    public static function getFormat($extension)
    {
        $extension = strtolower(trim($extension, " \t\n\r\0\x0B."));

        $formats = [
            'txt'  => static::TEXT,
            'pdf'  => static::PDF,
            'doc'  => static::WORD,
            'docx' => static::WORD,
            'xls'  => static::EXCEL,
            'xlsx' => static::EXCEL,
            'zip'  => static::ARCHIVE,
            'rar'  => static::ARCHIVE,
            '7z'   => static::ARCHIVE,
            'tar'  => static::ARCHIVE,
            'png'  => static::PNG,
            'jpg'  => static::JPG,
            'jpeg' => static::JPG,
        ];

        return $formats[$extension] ?? static::OTHER;
    }
}
