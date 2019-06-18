<?php

require "../src/controller/ApiController.php";

use PHPUnit\Framework\TestCase;
use App\Src\Model\Controller\ApiController;


class ApiControllerTest extends TestCase
{
    // Test 1: Get a Response from the Skiddle API
    public function testGetResponsefromSkiddleApi()
    {
        $apiController = new ApiController();
        $response = $apiController->getRequest();
        $this->assertObjectHasAttribute('error', $response);

    }


}