<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Insights
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */


namespace Twilio\Rest\Insights\V1;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Options;
use Twilio\Values;
use Twilio\Version;


/**
 * @property string|null $accountSid
 * @property bool|null $advancedFeatures
 * @property bool|null $voiceTrace
 * @property string|null $url
 */
class SettingInstance extends InstanceResource
{
    /**
     * Initialize the SettingInstance
     *
     * @param Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     */
    public function __construct(Version $version, array $payload)
    {
        parent::__construct($version);

        // Marshaled Properties
        $this->properties = [
            'accountSid' => Values::array_get($payload, 'account_sid'),
            'advancedFeatures' => Values::array_get($payload, 'advanced_features'),
            'voiceTrace' => Values::array_get($payload, 'voice_trace'),
            'url' => Values::array_get($payload, 'url'),
        ];

        $this->solution = [];
    }

    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return SettingContext Context for this SettingInstance
     */
    protected function proxy(): SettingContext
    {
        if (!$this->context) {
            $this->context = new SettingContext(
                $this->version
            );
        }

        return $this->context;
    }

    /**
     * Fetch the SettingInstance
     *
     * @param array|Options $options Optional Arguments
     * @return SettingInstance Fetched SettingInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch(array $options = []): SettingInstance
    {

        return $this->proxy()->fetch($options);
    }

    /**
     * Update the SettingInstance
     *
     * @param array|Options $options Optional Arguments
     * @return SettingInstance Updated SettingInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update(array $options = []): SettingInstance
    {

        return $this->proxy()->update($options);
    }

    /**
     * Magic getter to access properties
     *
     * @param string $name Property to access
     * @return mixed The requested property
     * @throws TwilioException For unknown properties
     */
    public function __get(string $name)
    {
        if (\array_key_exists($name, $this->properties)) {
            return $this->properties[$name];
        }

        if (\property_exists($this, '_' . $name)) {
            $method = 'get' . \ucfirst($name);
            return $this->$method();
        }

        throw new TwilioException('Unknown property: ' . $name);
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string
    {
        $context = [];
        foreach ($this->solution as $key => $value) {
            $context[] = "$key=$value";
        }
        return '[Twilio.Insights.V1.SettingInstance ' . \implode(' ', $context) . ']';
    }
}
