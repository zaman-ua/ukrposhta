<?php

namespace Ukrposhta;

use Psr\Http\Message\ResponseInterface;
use Ukrposhta\Data\Storage;

class Form extends Api
{
	const ROOT_URL = 'https://www.ukrposhta.ua/forms/ecom/0.0.1';
	const SHIPMENT_REQUEST = 'shipments';
	const SHIPMENT_GROUP_REQUEST = 'shipment-groups';
	const SIZE_A4 = 'SIZE_A4';
	const SIZE_A5 = 'SIZE_A5';

    /**
     * @param string $shipmentUuidOrBarcode
     * @param Storage|null $params
     * @return mixed|ResponseInterface
     */
	public function getSticker(string $shipmentUuidOrBarcode,  Storage $params = null, \Closure $responseClosure = null) {
        $url = $this->getUrl(function (string $url) use ($shipmentUuidOrBarcode) {
            return $url . '/' . self::SHIPMENT_REQUEST . "/{$shipmentUuidOrBarcode}/sticker";
        });

        return $this->send($url, $params, 'GET', $responseClosure);
    }


	public function getGroupSticker(string $shipmentUuidOrBarcode, Storage $params = null, \Closure $responseClosure = null)
	{
		$url = $this->getUrl(function (string $url) use ($shipmentUuidOrBarcode) {
			return $url . '/' . self::SHIPMENT_GROUP_REQUEST . "/{$shipmentUuidOrBarcode}/sticker";
		});

		return $this->send($url, $params);
	}

	public function get103a(string $shipmentGroupId, Storage $params = null, \Closure $responseClosure = null)
	{
		$url = $this->getUrl(function (string $url) use ($shipmentGroupId) {
			return $url . '/' . self::SHIPMENT_GROUP_REQUEST . "/{$shipmentGroupId}/form103a";
		});

		return $this->send($url, $params, 'GET', $responseClosure);
	}

}