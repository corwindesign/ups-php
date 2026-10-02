<?php

namespace UPS\Rating;

use PHPUnit\Framework\TestCase;
use UPS\Rating\Rating\RateResponse;
use UPS\Rating\Rating\RateResponseRatedShipment;
use UPS\Rating\Rating\RateResponseResponse;
use UPS\Rating\Rating\RatedShipmentTotalCharges;
use UPS\Rating\ObjectSerializer;

class RateResponseTest extends TestCase
{
    public function testSingleItemDeserializationAndGetRatedShipments()
    {
        $payload = (object) [
            'Response' => (object) [
                'ResponseStatus' => (object) [
                    'Code' => '1',
                    'Description' => 'Success'
                ]
            ],
            'RatedShipment' => (object) [
                'Service' => (object) [
                    'Code' => '03',
                    'Description' => 'Ground'
                ],
                'TotalCharges' => (object) [
                    'CurrencyCode' => 'USD',
                    'MonetaryValue' => '15.50'
                ]
            ]
        ];

        /** @var RateResponse $rateResponse */
        $rateResponse = ObjectSerializer::deserialize($payload, RateResponse::class);

        $this->assertInstanceOf(RateResponse::class, $rateResponse);
        $this->assertInstanceOf(RateResponseResponse::class, $rateResponse->getResponse());

        $ratedShipments = $rateResponse->getRatedShipments();
        $this->assertIsArray($ratedShipments);
        $this->assertCount(1, $ratedShipments);
        $this->assertInstanceOf(RateResponseRatedShipment::class, $ratedShipments[0]);
        $this->assertSame('03', $ratedShipments[0]->getService()->getCode());
        $this->assertSame('15.50', $ratedShipments[0]->getTotalCharges()->getMonetaryValue());
    }

    public function testMultiItemDeserializationAndGetRatedShipments()
    {
        $payload = (object) [
            'Response' => (object) [
                'ResponseStatus' => (object) [
                    'Code' => '1',
                    'Description' => 'Success'
                ]
            ],
            'RatedShipment' => [
                (object) [
                    'Service' => (object) [
                        'Code' => '03',
                        'Description' => 'Ground'
                    ],
                    'TotalCharges' => (object) [
                        'CurrencyCode' => 'USD',
                        'MonetaryValue' => '15.50'
                    ]
                ],
                (object) [
                    'Service' => (object) [
                        'Code' => '02',
                        'Description' => '2nd Day Air'
                    ],
                    'TotalCharges' => (object) [
                        'CurrencyCode' => 'USD',
                        'MonetaryValue' => '35.00'
                    ]
                ],
                (object) [
                    'Service' => (object) [
                        'Code' => '01',
                        'Description' => 'Next Day Air'
                    ],
                    'TotalCharges' => (object) [
                        'CurrencyCode' => 'USD',
                        'MonetaryValue' => '65.00'
                    ]
                ]
            ]
        ];

        /** @var RateResponse $rateResponse */
        $rateResponse = ObjectSerializer::deserialize($payload, RateResponse::class);

        $this->assertInstanceOf(RateResponse::class, $rateResponse);
        $this->assertInstanceOf(RateResponseResponse::class, $rateResponse->getResponse());

        $ratedShipments = $rateResponse->getRatedShipments();
        $this->assertIsArray($ratedShipments);
        $this->assertCount(3, $ratedShipments);
        $this->assertSame('03', $ratedShipments[0]->getService()->getCode());
        $this->assertSame('02', $ratedShipments[1]->getService()->getCode());
        $this->assertSame('01', $ratedShipments[2]->getService()->getCode());
    }

    public function testDirectSingleObjectSetRatedShipment()
    {
        $rateResponse = new RateResponse();
        $shipment = new RateResponseRatedShipment();
        $totalCharges = new RatedShipmentTotalCharges();
        $totalCharges->setMonetaryValue('20.00');
        $shipment->setTotalCharges($totalCharges);

        $rateResponse->setRatedShipment($shipment);

        $this->assertSame($shipment, $rateResponse->getRatedShipment());
        $normalized = $rateResponse->getRatedShipments();
        $this->assertIsArray($normalized);
        $this->assertCount(1, $normalized);
        $this->assertSame($shipment, $normalized[0]);
    }

    public function testDirectArraySetRatedShipment()
    {
        $rateResponse = new RateResponse();
        $shipment1 = new RateResponseRatedShipment();
        $shipment2 = new RateResponseRatedShipment();

        $rateResponse->setRatedShipment([$shipment1, $shipment2]);

        $this->assertCount(2, $rateResponse->getRatedShipment());
        $this->assertCount(2, $rateResponse->getRatedShipments());
    }

    public function testEmptyRatedShipmentNormalization()
    {
        $rateResponse = new RateResponse();
        $this->assertSame([], $rateResponse->getRatedShipments());
    }
}
