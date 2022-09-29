<?php
require_once '../functions.php';
use PHPUnit\Framework\TestCase;

class Functions extends TestCase
{
    public function test1AddItemToHTML_GivenArrayExpectPrintedInHTML()
    {
        $input = [[
            'title' => 'a',
            'genre' => 1,
            'original_language' => 1,
            'director' => 'a',
            'producer' => 'a',
            'writer' => 'a',
            'release_date_theatres' => '2000-01-20',
            'release_date_streaming' => '2000-01-20',
            'runtime' => 109,
            'distributor' => 1,
            'img_location'=>'images/dune.jpeg'
        ]];

        $genres = [['id' => 1, 'genre1' => 'Drama']];
        $distributors = [['id'=> 1, 'distributor1' => 'Columbia Pictures']];
        $languages = [['id' => 1, 'original_language1' => 'English']];

        $expected =
            '<div class = "itemContainer">
                <h2 id="title" >Title: a</h2>
                <p>Director: a</p>
                <p>Producer: a</p>
                <p>Writer: a</p>
                <p>Genre: Drama</p>
                <p>Original Language: English</p>
                <p>Distributor: Columbia Pictures</p>
                <p>Release date (theatres): 2000-01-20</p>
                <p>Release date (streaming): 2000-01-20</p>
                <p>Runtime: 109</p>
                <div class="itemImg">
                    <img src="images/dune.jpeg" alt="film poster">
                </div>
            </div>';

        $result = addItemToHTML($input, $genres, $distributors, $languages);
        $this -> assertEquals($expected, $result);
    }

    public function test2AddItemToHTML_GivenArrayWithNoValuesThrowError()
    {
        $input = [[]];
        $genres = ['id'=>1, 'genre1'=>'Drama'];
        $distributors = ['Columbia Pictures'];
        $languages = ['English'];

        $this->expectException(InvalidArgumentException::class);
        $this->expectErrorMessage('Set the values');
        $result = addItemToHTML($input, $genres, $distributors,$languages);
    }

    public function test3AddItemToHTML_GivenIntThrowError()
    {
        $input = 1;

        $genres = ['Drama'];
        $distributors = ['Columbia Pictures'];
        $languages = ['English'];
        
        $this->expectException(TypeError::class);
        $result = addItemToHTML($input, $genres, $distributors,$languages);
    }

    public function test4validateDate_GivenDateExpectTrue()
    {
        $input = '1998-11-12';
        $expected = true;

        $result = validateDate($input, $format = 'Y-m-d');
        $this -> assertEquals($expected, $result); //method
    }

    public function test5validateDate_GivenDateExpectFalse()
    {
        $input = '1998-15-12';
        $expected = false;

        $result = validateDate($input, $format = 'Y-m-d');
        $this -> assertEquals($expected, $result); //method
    }

    public function test6validateDate_GivenIntSetDate()
    {
        $input = 5;
        $expected = false;

        $result = validateDate($input, $format = 'Y-m-d');
        $this -> assertEquals($expected, $result); //method
    }
}
