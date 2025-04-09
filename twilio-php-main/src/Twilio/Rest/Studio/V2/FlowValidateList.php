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

namespace Twilio\Rest\Studio\V2;

use Twilio\Exceptions\TwilioException;
use Twilio\ListResource;
use Twilio\Options;
use Twilio\Values;
use Twilio\Version;
use Twilio\Serialize;


class FlowValidateList extends ListResource
    {
    /**
     * Construct the FlowValidateList
     *
     * @param Version $version Version that contains the resource
     */
    public function __construct(
        Version $version
    ) {
        parent::__construct($version);

        // Path Solution
        $this->solution = [
        ];

        $this->uri = '/Flows/Validate';
    }

    /**
     * Update the FlowValidateInstance
     *
     * @param string $friendlyName The string that you assigned to describe the Flow.
     * @param string $status
     * @param array $definition JSON representation of flow definition.
     * @param array|Options $options Optional Arguments
     * @return FlowValidateInstance Updated FlowValidateInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update(string $friendlyName, string $status, array $definition, array $options = []): FlowValidateInstance
    {

        $options = new Values($options);

        $data = Values::of([
            'FriendlyName' =>
                $friendlyName,
            'Status' =>
                $status,
            'Definition' =>
                Serialize::jsonObject($definition),
            'CommitMessage' =>
                $options['commitMessage'],
        ]);

        $headers = Values::of(['Content-Type' => 'application/x-www-form-urlencoded', 'Accept' => 'application/json' ]);
        $payload = $this->version->update('POST', $this->uri, [], $data, $headers);

        return new FlowValidateInstance(
            $this->version,
            $payload
        );
    }


    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string
    {
        return '[Twilio.Studio.V2.FlowValidateList]';
    }
}
