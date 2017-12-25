<?php
/**
 * Created by PhpStorm.
 * User: sh
 * Date: 20.12.17
 * Time: 23:45.
 */

namespace Tests\Shdev\FlashText\KeywordProcessor;

use Shdev\FlashText\KeywordProcessor;

class CircularTest extends \PHPUnit_Framework_TestCase
{
    public function testDictionaryLoading()
    {
        $keywordProcessor = new KeywordProcessor();

        $keywordAssocArray = [
            'java' => ['php'],
            'php' => ['java'],
        ];

        $keywordProcessor->addKeywordsFromAssocArray($keywordAssocArray);

        $sentence = 'I know java but I love php';

        $keywordsExtracted = $keywordProcessor->extractKeywords($sentence);

        $this->assertEquals(['java', 'php'], $keywordsExtracted);

        $sentenceNew = $keywordProcessor->replaceKeywords($sentence);
        $this->assertEquals('I know php but I love java', $sentenceNew);
    }
}
