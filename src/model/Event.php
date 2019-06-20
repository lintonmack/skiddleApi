<?php

namespace App\Src\Model;

use App\Src\Controller\ApiController;

/**
 * Class Events
 * @package App\Src\Model
 */
class Event extends ApiController
{

    protected static $urlExtension = "/events/search?";
    protected $keyword = null;
    protected $city = null;
    protected $radius = null;

    public function __construct()
    {

    }

    /**
     * @return string
     */
    public static function getUrlExtension()
    {
        return self::$urlExtension;
    }

    /**
     * @param string $urlExtension
     */
    public static function setUrlExtension($urlExtension)
    {
        self::$urlExtension = $urlExtension;
    }

    /**
     * @return string|null
     */
    public function getKeyword()
    {
        return $this->keyword;
    }

    /**
     * @param string|null $keyword
     */
    public function setKeyword($keyword)
    {
        $this->keyword = htmlspecialchars($keyword);
    }

    /**
     * @return null
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param null $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return string|null
     */
    public function getRadius()
    {
        return $this->radius;
    }

    /**
     * @param string|null $radius
     */
    public function setRadius($radius)
    {
        $this->radius = htmlspecialchars($radius);
    }


}