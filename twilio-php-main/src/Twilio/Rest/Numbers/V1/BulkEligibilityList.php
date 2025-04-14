<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Numbers
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace Twilio\Rest\Numbers\V1;

use Twilio\Exceptions\TwilioException;
use Twilio\ListResource;
use Twilio\Values;
use Twilio\Version;


class BulkEligibilityList extends ListResource
    {
    /**
     * Construct the BulkEligibilityList
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

        $this->uri = '/HostedNumber/Eligibility/Bulk';
    }

    /**
     * Create the BulkEligibilityInstance
     *
     * @return BulkEligibilityInstance Created BulkEligibilityInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function create(): BulkEligibilityInstance
    {

        $headers = Values::of(['Content-Type' => 'application/json', 'Accept' => 'application/json' ]);
        $data = $body->toArray();
        $payload = $this->version->create('POST', $this->uri, [], $data, $headers);

        return new BulkEligibilityInstance(
            $this->version,
            $payload
        );
    }


    /**
     * Constructs a BulkEligibilityContext
     *
     * @param string $requestId The SID of the bulk eligibility check that you want to know about.
     */
    public function getContext(
        string $requestId
        
    ): BulkEligibilityContext
    {
        return new BulkEligibilityContext(
            $this->version,
            $requestId
        );
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string
    {
        return '[Twilio.Numbers.V1.BulkEligibilityList]';
    }
}
