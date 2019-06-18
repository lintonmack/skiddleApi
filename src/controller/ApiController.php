<?php

namespace App\Src\Model\Controller;

/**
 *
 * ApiController class is used to interact with the Skiddle API
 *
 * Class ApiController
 * @package App\Src\Model\Controller
 * @author Linton
 */
class ApiController
{

    /**
     * @var The API_KEY for skiddle
     */
    const API_KEY = "api_key=008f1e6099ecc48e990e3776784d447b";
    /**
     * @var The version of the API currently being used
     */
    const API_VER = "v1";
    /**
     * @var The URL to the API
     */
    const API_URL = 'https://www.skiddle.com/api/';
    /**
     * @var The URL to the API
     */

    /**
     * ApiController constructor.
     */
    public function __construct()
    {
    }


    /**
     *
     * used to make GET requests
     * @return mixed
     */
    public function getRequest()
    {

        $curl = curl_init();


        curl_setopt($curl, CURLOPT_URL, self::API_URL . self::API_VER . "/artists?" . self::API_KEY);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 1);
        try {

            $response = curl_exec($curl);

        } catch (\Exception $e) {
            print($e);
        } finally {
            curl_close($curl);
            return json_decode($response);
        }

    }


}