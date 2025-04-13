<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Studio
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */


namespace Twilio\Rest\Studio\V1\Flow\Execution\ExecutionStep;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Values;
use Twilio\Version;


/**
 * @property string|null $accountSid
 * @property array|null $context
 * @property string|null $executionSid
 * @property string|null $flowSid
 * @property string|null $stepSid
 * @property string|null $url
 */
class ExecutionStepContextInstance extends InstanceResource
{
    /**
     * Initialize the ExecutionStepContextInstance
     *
     * @param Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $flowSid The SID of the Flow with the Step to fetch.
     * @param string $executionSid The SID of the Execution resource with the Step to fetch.
     * @param string $stepSid The SID of the Step to fetch.
     */
    public function __construct(Version $version, array $payload, string $flowSid, string $executionSid, string $stepSid)
    {
        parent::__construct($version);

        // Marshaled Properties
        $this->properties = [
            'accountSid' => Values::array_get($payload, 'account_sid'),
            'context' => Values::array_get($payload, 'context'),
            'executionSid' => Values::array_get($payload, 'execution_sid'),
            'flowSid' => Values::array_get($payload, 'flow_sid'),
            'stepSid' => Values::array_get($payload, 'step_sid'),
            'url' => Values::array_get($payload, 'url'),
        ];

        $this->solution = ['flowSid' => $flowSid, 'executionSid' => $executionSid, 'stepSid' => $stepSid, ];
    }

    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return ExecutionStepContextContext Context for this ExecutionStepContextInstance
     */
    protected function proxy(): ExecutionStepContextContext
    {
        if (!$this->context) {
            $this->context = new ExecutionStepContextContext(
                $this->version,
                $this->solution['flowSid'],
                $this->solution['executionSid'],
                $this->solution['stepSid']
            );
        }

        return $this->context;
    }

    /**
     * Fetch the ExecutionStepContextInstance
     *
     * @return ExecutionStepContextInstance Fetched ExecutionStepContextInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch(): ExecutionStepContextInstance
    {

        return $this->proxy()->fetch();
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
        return '[Twilio.Studio.V1.ExecutionStepContextInstance ' . \implode(' ', $context) . ']';
    }
}

