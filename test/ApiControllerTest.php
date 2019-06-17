<?php


class ApiControllerTest extends \PHPUnit\Framework\TestCase
{
    // Test 1: Get a Response from the Skiddle API 
    public function testGetResponsefromSkiddleApi()
    {
        $apiController = new ApiController();
        $response = $apiController->getRequest();
        $this->assertIsArray($response, "data structure should be <array>");

    }

}