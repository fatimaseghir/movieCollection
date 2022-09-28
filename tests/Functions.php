<?php
require_once '../functions.php';
use PHPUnit\Framework\TestCase;

class Functions extends TestCase
{
    //Success test
    public function test1AddItemToHTML_GivenArrayExpectPrintedInHTML()
    {
        // arrange
        $input = [[
            'title' => 'dune',
            'genre' => 1,
            'original_language' => 1,
            'director' => 'kkwkwkkw',
            'producer' => 'ywyw',
            'writer' => 'qgwgw',
            'release_date_theatres' => '2000-01-20',
            'release_date_streaming' => '2000-01-20',
            'runtime' => 109,
            'distributor' => 1,
            'img_location'=>'images/dune.jpeg'
        ]];

        $genres= [['id' => 1, 'genre1' => 'Drama']];
        $distributors=[['id'=> 1, 'distributor1' => 'Columbia Pictures']];
        $languages=[['id' => 1, 'original_language1' => 'English']];

        $expected =
            '<div class = "itemContainer">
                <h2>Title: dune</h2> <br>
                <p>Director: kkwkwkkw</p>
                <p>Producer: ywyw</p>
                <p>Writer: qgwgw</p>
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

        // act,
        $result =addItemToHTML($input, $genres, $distributors, $languages);

        // assert - compare the expected result to the actual result
        $this -> assertEquals($expected, $result); //method
    }

    public function test2AddItemToHTML_GivenArrayWithNoValuesThrowError()
    {
        $input = [[]];
        $genres= ['id'=>1, 'genre1'=>'Drama'];
        $distributors=['Columbia Pictures'];
        $languages=['English'];

        $this->expectException(InvalidArgumentException::class);
        $this->expectErrorMessage('Set the values');
        $result = addItemToHTML($input, $genres, $distributors,$languages);
    }
    public function test3AddItemToHTML_GivenIntThrowError()
    {
        $input = 1;

        $genres= ['Drama'];
        $distributors=['Columbia Pictures'];
        $languages=['English'];
        $this->expectException(TypeError::class);

        $result = addItemToHTML($input, $genres, $distributors,$languages);
    }
}
