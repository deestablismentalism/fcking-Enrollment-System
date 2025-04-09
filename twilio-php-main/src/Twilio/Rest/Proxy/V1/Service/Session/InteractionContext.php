<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Proxy
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */


namespace Twilio\Rest\Proxy\V1\Service\Session;

use Twilio\Exceptions\TwilioException;
use Twilio\Values;
use Twilio\Version;
use Twilio\InstanceContext;


class InteractionContext extends InstanceContext
    {
    /**
     * Initialize the InteractionContext
     *
     * @param Version $version Version that contains the resource
     * @param string $serviceSid The SID of the parent [Service](https://www.twilio.com/docs/proxy/api/service) of the resource to delete.
     * @param string $sessionSid The SID of the parent [Session](https://www.twilio.com/docs/proxy/api/session) of the resource to delete.
     * @param string $sid The Twilio-provided string that uniquely identifies the Interaction resource to delete.
     */
    public function __construct(
        Version $version,
        $serviceSid,
        $sessionSid,
        $sid
    ) {
        parent::__construct($version);

        // Path Solution
        $this->solution = [
        'serviceSid' =>
            $serviceSid,
        'sessionSid' =>
            $sessionSid,
        'sid' =>
            $sid,
        ];

        $this->uri = '/Services/' . \rawurlencode($serviceSid)
        .'/Sessions/' . \rawurlencode($sessionSid)
        .'/Interactions/' . \rawurlencode($sid)
        .'';
    }

    /**
     * Delete the InteractionInstance
     *
     * @return bool True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete(): bool
    {

        $headers = Values::of(['Content-Type' => 'application/x-www-form-urlencoded' ]);
        return $this->version->delete('DELETE', $this->uri, [], [], $headers);
    }


    /**
     * Fetch the InteractionInstance
     *
     * @return InteractionInstance Fetched InteractionInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch(): InteractionInstance
    {

        $headers = Values::of(['Content-Type' => 'application/x-www-form-urlencoded', 'Accept' => 'application/json' ]);
        $payload = $this->version->fetch('GET', $this->uri, [], [], $headers);

        return new InteractionInstance(
            $this->version,
            $payload,
            $this->solution['serviceSid'],
            $this->solution['sessionSid'],
            $this->solution['sid']
        );
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
        return '[Twilio.Proxy.V1.InteractionContext ' . \implode(' ', $context) . ']';
    }
}
