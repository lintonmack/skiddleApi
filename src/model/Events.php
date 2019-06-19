<?php

namespace App\Src\Model;

use App\Src\Controller\ApiController;

/**
 * Class Events
 * @package App\Src\Model
 */
class Events extends ApiController
{

    protected $keyword = null;
    protected $longitude = null;
    protected $latitude = null;
    protected $radius = null;

    protected static $urlExtension = "/events/search?";


    public function __construct()
    {

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
     * @return string|null
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @param string|null $longitude
     */
    public function setLongitude($longitude)
    {
        $this->longitude = htmlspecialchars($longitude);
    }

    /**
     * @return string|null
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @param string|null $latitude
     */
    public function setLatitude($latitude)
    {
        $this->latitude = htmlspecialchars($latitude);
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
     * @return null
     */
    public function getResultSet()
    {
        return $this->resultSet;
    }


}