<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Assistants
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */


namespace Twilio\Rest\Assistants\V1;

use Twilio\Exceptions\TwilioException;
use Twilio\Values;
use Twilio\Version;
use Twilio\InstanceContext;


class ToolContext extends InstanceContext
    {
    /**
     * Initialize the ToolContext
     *
     * @param Version $version Version that contains the resource
     * @param string $id The tool ID.
     */
    public function __construct(
        Version $version,
        $id
    ) {
        parent::__construct($version);

        // Path Solution
        $this->solution = [
        'id' =>
            $id,
        ];

        $this->uri = '/Tools/' . \rawurlencode($id)
        .'';
    }

    /**
     * Delete the ToolInstance
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
     * Fetch the ToolInstance
     *
     * @return ToolInstance Fetched ToolInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch(): ToolInstance
    {

        $headers = Values::of(['Content-Type' => 'application/x-www-form-urlencoded', 'Accept' => 'application/json' ]);
        $payload = $this->version->fetch('GET', $this->uri, [], [], $headers);

        return new ToolInstance(
            $this->version,
            $payload,
            $this->solution['id']
        );
    }


    /**
     * Update the ToolInstance
     *
     * @return ToolInstance Updated ToolInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update(): ToolInstance
    {

        $headers = Values::of(['Content-Type' => 'application/json', 'Accept' => 'application/json' ]);
        $data = $assistantsV1ServiceUpdateToolRequest->toArray();
        $payload = $this->version->update('PUT', $this->uri, [], $data, $headers);

        return new ToolInstance(
            $this->version,
            $payload,
            $this->solution['id']
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
        return '[Twilio.Assistants.V1.ToolContext ' . \implode(' ', $context) . ']';
    }
}
