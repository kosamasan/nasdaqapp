<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class BasicTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    //this test will check if nasdaq website is ok
	public function testnasdaq()
	{
		$header_check = get_headers("http://www.nasdaq.com");
		$response_code = $header_check[0];
		$this->assertTrue(strpos($response_code, 'OK') !== false);
    }
    
    //this test will check if google finance website is ok
	public function testgooglefin()
	{
		$header_check = get_headers("https://finance.google.com/finance");
		$response_code = $header_check[0];
		$this->assertTrue(strpos($response_code, 'OK') !== false);
    }
    
    public function testindexmethodview()
	{
		$response = $this->get('/');
		$response->assertViewIs('home');
	}
}
