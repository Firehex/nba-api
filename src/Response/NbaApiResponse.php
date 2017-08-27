<?php

namespace JasonRoman\NbaApi\Response;

use GuzzleHttp;
use Psr\Http\Message\ResponseInterface;

/**
 * Guzzle Response wrapper class, making it easier to work with returned results.
 * Might want to look into Guzzle Middleware later, but the concept is general seems overly complex.
 */
class NbaApiResponse implements NbaApiResponseInterface
{
    /**
     * @var ResponseInterface
     */
    private $response;

    /**
     * @param ResponseInterface $response
     */
    public function __construct(ResponseInterface $response)
    {
        $this->response = $response;
    }

    /**
     * @param bool $toArray
     * @return object|array
     * @throws \InvalidArgumentException
     */
    public function getFromJson($toArray = false)
    {
        return GuzzleHttp\json_decode($this->response->getBody(), $toArray);
    }

    /**
     * @return object
     */
    public function getObjectFromJson()
    {
        return $this->getFromJson(false);
    }

    /**
     * @return array
     */
    public function getArrayFromJson()
    {
        return $this->getFromJson(true);
    }

    /**
     * @return \SimpleXMLElement|false
     */
    public function getXml()
    {
        return simplexml_load_string($this->response->getBody());
    }

    /**
     * @return ResponseInterface
     */
    public function getResponse()
    {
        return $this->response;
    }
}