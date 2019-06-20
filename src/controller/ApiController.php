<?php

namespace App\Src\Controller;

use App\Src\Model\Artist;

/**
 *
 * ApiController class is used to interact with the Skiddle API
 *
 * Class ApiController
 * @package App\Src\Controller
 * @author Linton
 */
class ApiController
{

    /**
     * @var The API_KEY for skiddle
     */
    const API_KEY = "&api_key=008f1e6099ecc48e990e3776784d447b";

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

    protected $params = null;
    protected $resultSet = null;


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
        // call the method parameterBuilder to build the paramters
        $this->parameterBuilder();
        $curl = curl_init();

        // build th url with all the information
        $url = self::API_URL . self::API_VER . $this::$urlExtension . $this->params . self::API_KEY;

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 1);
        try {
            $response = curl_exec($curl);
            $response = json_decode($response);

        } catch (\Exception $e) {
            print($e);
        } finally {
            curl_close($curl);
            $this->resultSet = $response->results;

            return;
        }

    }


    /**
     *
     * used to build the url arguments dynamically so can be used with any object.
     *
     */
    public function parameterBuilder()
    {
        $this->params = http_build_query(get_object_vars($this), "", "&amp;");
        return;
    }

    /**
     * @return null
     */
    public function getResultSet()
    {
        return $this->resultSet;
    }

    /**
     * @param null $resultSet
     */
    public function setResultSet($resultSet)
    {
        $this->resultSet = $resultSet;
    }

}