<?php

namespace Ukrposhta;

use Ukrposhta\Data\Storage;

class Tracking extends Api
{
    const ROOT_URL = 'https://www.ukrposhta.ua/status-tracking/0.0.1/';
    const REQUEST_URL = 'statuses';

    /**
     * $params = new Storage();
     * $params->addData(["RF063354223UA", "RF065314223UA"])
     *
     *
     * @param Storage|null $params
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function fetchStatuses(Storage $params) {
        return $this->send($this->getUrl(), $params, 'POST');
    }

    /**
     * $params = new Storage();
     * $params->addData(["RF063354223UA", "RF065314223UA"])
     *
     * @param Storage $params
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function fetchLastStatuses(Storage $params) {
        $url = $this->getUrl(function (string $url) {
            return $url . "/last";
        });

        return $this->send($url, $params, 'POST');
    }
}