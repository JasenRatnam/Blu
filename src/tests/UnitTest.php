<?php
declare(strict_types=1);

$root = dirname(__FILE__, 3);
require_once ($root.'/src/db/DBConfig.php');
include $root.'/src/db/uploadPostToDB.php';

use PHPUnit\Framework\TestCase;

final class UploadPostToDbTest extends TestCase
{
    public  function testGenerateString():void
    {
        //String Is Random
        $this -> assertFalse('Plane' == generate_string('Plane'));

        //Default Length
        $this -> assertTrue(strlen(generate_string('Plane')) == 16);

        //Custom Length
        $this -> assertTrue(strlen(generate_string('Plane',5)) == 5);
    }
    public function testCheckForHashtags():void
    {
        $this -> assertEquals('y', check_for_hashtag('#ILOVEPLANES'));
        $this -> assertEquals('n', check_for_hashtag('Plop'));
    }
    public  function testFetchUserID():void
    {
        $this -> assertEquals(-1, fetch_user());
    }

}