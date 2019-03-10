<?php

use PHPUnit\Framework\TestCase;

return [
    'handles php file via file loading' => [
        'context' => __DIR__ . '/../../tableBuilderContext.php',
        'rowSetup' => function ($row) {
            return $row;
        },
        'assertion' => function (TestCase $testCase, iterable $table) {
            $output = iterator_to_array($table);
            $testCase->assertEquals([
                'Name' => 'One',
                'Extra' => [
                    [
                        'Name' => 'One',
                    ]
                ]
            ], $output['One']);
            $testCase->assertEquals([
                'Name' => 'Two',
                'Extra' => [
                    [
                        'Name' => 'Two',
                    ]
                ]
            ], $output['Two']);
            $testCase->assertEquals([
                'Name' => 'Three',
                'Extra' => [
                    [
                        'Name' => 'Three',
                    ]
                ]
            ], $output['Three']);
        },
    ],
    'handles yaml file via file loading' => [
        'context' => __DIR__ . '/../../tableBuilderContext.yaml',
        'rowSetup' => function ($row) {
            return $row;
        },
        'assertion' => function (TestCase $testCase, iterable $table) {
            $output = iterator_to_array($table);
            $testCase->assertEquals([
                'Name' => 'One',
                'Extra' => [
                    [
                        'Name' => 'One',
                    ]
                ]
            ], $output['One']);
            $testCase->assertEquals([
                'Name' => 'Two',
                'Extra' => [
                    [
                        'Name' => 'Two',
                    ]
                ]
            ], $output['Two']);
            $testCase->assertEquals([
                'Name' => 'Three',
                'Extra' => [
                    [
                        'Name' => 'Three',
                    ]
                ]
            ], $output['Three']);
        },
    ],
];
