<?php
/**
 * Destination
 *
 * PHP version 5
 *
 * @category Class
 * @package  UPS\UPSTrackAlert
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * UPS Track Alert API
 *
 * The UPS Track Alert API provides best in-class package tracking visibility with near real time event updates for an improved customer experience and stream line logistic management. Updates are pushed to the user as soon as available with no constant polling required, thereby improving operational efficiency.  Key Business Values: - **Enhanced Customer Experience**: Near Real-time tracking information increases transparency, leading to higher customer satisfaction and trust. - **Operational Efficiency**: Eliminates the necessity for continuous polling, thus saving computational resources and improving system responsiveness. - **Data-Driven Decision Making**: Access to timely data can help businesses optimize their supply chain and make informed logistics decisions. - **Optimizing Cash Flow Through Near Real-Time Delivery Tracking**: Improve cash flow by knowing the deliveries occurred in near real time. - **Mitigating Fraud and Theft through Near Real-Time Package Status Monitoring**: Reduce fraud and theft by knowing the status of the package.
 *
 * OpenAPI spec version: 1.0
 * 
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 * Swagger Codegen version: 3.0.50
 */
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace UPS\UPSTrackAlert\UPSTrackAlert;

use \ArrayAccess;
use \UPS\UPSTrackAlert\ObjectSerializer;

/**
 * Destination Class Doc Comment
 *
 * @category Class
 * @description The destination container related to the clients endpoint API. To which messages would be sent on an event on the package.
 * @package  UPS\UPSTrackAlert
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class Destination implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'Destination';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'url' => 'string',
        'credential_type' => 'string',
        'credential' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'url' => 'url',
        'credential_type' => null,
        'credential' => null
    ];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerTypes()
    {
        return self::$swaggerTypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerFormats()
    {
        return self::$swaggerFormats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'url' => 'url',
        'credential_type' => 'credentialType',
        'credential' => 'credential'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'url' => 'setUrl',
        'credential_type' => 'setCredentialType',
        'credential' => 'setCredential'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'url' => 'getUrl',
        'credential_type' => 'getCredentialType',
        'credential' => 'getCredential'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$swaggerModelName;
    }



    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['url'] = isset($data['url']) ? $data['url'] : null;
        $this->container['credential_type'] = isset($data['credential_type']) ? $data['credential_type'] : null;
        $this->container['credential'] = isset($data['credential']) ? $data['credential'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['url'] === null) {
            $invalidProperties[] = "'url' can't be null";
        }
        if ($this->container['credential_type'] === null) {
            $invalidProperties[] = "'credential_type' can't be null";
        }
        if ($this->container['credential'] === null) {
            $invalidProperties[] = "'credential' can't be null";
        }
        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->container['url'];
    }

    /**
     * Sets url
     *
     * @param string $url It is an HTTP-based callback end point that is exposed by the client to receive event notification. This endpoint must be operational arround the clock to ensure no event notifications are missed. If this endpoint is not continuously available, incoming events will be lost.
     *
     * @return $this
     */
    public function setUrl($url)
    {
        $this->container['url'] = $url;

        return $this;
    }

    /**
     * Gets credential_type
     *
     * @return string
     */
    public function getCredentialType()
    {
        return $this->container['credential_type'];
    }

    /**
     * Sets credential_type
     *
     * @param string $credential_type It is an open-entry field that indicates type of credentials supported by the client.
     *
     * @return $this
     */
    public function setCredentialType($credential_type)
    {
        $this->container['credential_type'] = $credential_type;

        return $this;
    }

    /**
     * Gets credential
     *
     * @return string
     */
    public function getCredential()
    {
        return $this->container['credential'];
    }

    /**
     * Sets credential
     *
     * @param string $credential It is an opaque string meant for client authentication. If for any reason this credential changes then any event notification will fail until a new subscription is made.
     *
     * @return $this
     */
    public function setCredential($credential)
    {
        $this->container['credential'] = $credential;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    #[\ReturnTypeWillChange]
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed
     */
    #[\ReturnTypeWillChange]
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Sets value based on offset.
     *
     * @param integer $offset Offset
     * @param mixed   $value  Value to be set
     *
     * @return void
     */
    #[\ReturnTypeWillChange]
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    #[\ReturnTypeWillChange]
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) { // use JSON pretty print
            return json_encode(
                ObjectSerializer::sanitizeForSerialization($this),
                JSON_PRETTY_PRINT
            );
        }

        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}