<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Api
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace Twilio\Rest\Api\V2010\Account;

use Twilio\Exceptions\TwilioException;
use Twilio\ListResource;
use Twilio\Options;
use Twilio\Stream;
use Twilio\Values;
use Twilio\Version;
use Twilio\Serialize;


class CallList extends ListResource
    {
    /**
     * Construct the CallList
     *
     * @param Version $version Version that contains the resource
     * @param string $accountSid The SID of the [Account](https://www.twilio.com/docs/iam/api/account) that will create the resource.
     */
    public function __construct(
        Version $version,
        string $accountSid
    ) {
        parent::__construct($version);

        // Path Solution
        $this->solution = [
        'accountSid' =>
            $accountSid,
        
        ];

        $this->uri = '/Accounts/' . \rawurlencode($accountSid)
        .'/Calls.json';
    }

    /**
     * Create the CallInstance
     *
     * @param string $to The phone number, SIP address, or client identifier to call.
     * @param string $from The phone number or client identifier to use as the caller id. If using a phone number, it must be a Twilio number or a Verified [outgoing caller id](https://www.twilio.com/docs/voice/api/outgoing-caller-ids) for your account. If the `to` parameter is a phone number, `From` must also be a phone number.
     * @param array|Options $options Optional Arguments
     * @return CallInstance Created CallInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function create(string $to, string $from, array $options = []): CallInstance
    {

        $options = new Values($options);

        $data = Values::of([
            'To' =>
                $to,
            'From' =>
                $from,
            'Method' =>
                $options['method'],
            'FallbackUrl' =>
                $options['fallbackUrl'],
            'FallbackMethod' =>
                $options['fallbackMethod'],
            'StatusCallback' =>
                $options['statusCallback'],
            'StatusCallbackEvent' =>
                Serialize::map($options['statusCallbackEvent'], function ($e) { return $e; }),
            'StatusCallbackMethod' =>
                $options['statusCallbackMethod'],
            'SendDigits' =>
                $options['sendDigits'],
            'Timeout' =>
                $options['timeout'],
            'Record' =>
                Serialize::booleanToString($options['record']),
            'RecordingChannels' =>
                $options['recordingChannels'],
            'RecordingStatusCallback' =>
                $options['recordingStatusCallback'],
            'RecordingStatusCallbackMethod' =>
                $options['recordingStatusCallbackMethod'],
            'SipAuthUsername' =>
                $options['sipAuthUsername'],
            'SipAuthPassword' =>
                $options['sipAuthPassword'],
            'MachineDetection' =>
                $options['machineDetection'],
            'MachineDetectionTimeout' =>
                $options['machineDetectionTimeout'],
            'RecordingStatusCallbackEvent' =>
                Serialize::map($options['recordingStatusCallbackEvent'], function ($e) { return $e; }),
            'Trim' =>
                $options['trim'],
            'CallerId' =>
                $options['callerId'],
            'MachineDetectionSpeechThreshold' =>
                $options['machineDetectionSpeechThreshold'],
            'MachineDetectionSpeechEndThreshold' =>
                $options['machineDetectionSpeechEndThreshold'],
            'MachineDetectionSilenceTimeout' =>
                $options['machineDetectionSilenceTimeout'],
            'AsyncAmd' =>
                $options['asyncAmd'],
            'AsyncAmdStatusCallback' =>
                $options['asyncAmdStatusCallback'],
            'AsyncAmdStatusCallbackMethod' =>
                $options['asyncAmdStatusCallbackMethod'],
            'Byoc' =>
                $options['byoc'],
            'CallReason' =>
                $options['callReason'],
            'CallToken' =>
                $options['callToken'],
            'RecordingTrack' =>
                $options['recordingTrack'],
            'TimeLimit' =>
                $options['timeLimit'],
            'Url' =>
                $options['url'],
            'Twiml' =>
                $options['twiml'],
            'ApplicationSid' =>
                $options['applicationSid'],
        ]);

        $headers = Values::of(['Content-Type' => 'application/x-www-form-urlencoded', 'Accept' => 'application/json' ]);
        $payload = $this->version->create('POST', $this->uri, [], $data, $headers);

        return new CallInstance(
            $this->version,
            $payload,
            $this->solution['accountSid']
        );
    }


    /**
     * Reads CallInstance records from the API as a list.
     * Unlike stream(), this operation is eager and will load `limit` records into
     * memory before returning.
     *
     * @param array|Options $options Optional Arguments
     * @param int $limit Upper limit for the number of records to return. read()
     *                   guarantees to never return more than limit.  Default is no
     *                   limit
     * @param mixed $pageSize Number of records to fetch per request, when not set
     *                        will use the default value of 50 records.  If no
     *                        page_size is defined but a limit is defined, read()
     *                        will attempt to read the limit with the most
     *                        efficient page size, i.e. min(limit, 1000)
     * @return CallInstance[] Array of results
     */
    public function read(array $options = [], int $limit = null, $pageSize = null): array
    {
        return \iterator_to_array($this->stream($options, $limit, $pageSize), false);
    }

    /**
     * Streams CallInstance records from the API as a generator stream.
     * This operation lazily loads records as efficiently as possible until the
     * limit
     * is reached.
     * The results are returned as a generator, so this operation is memory
     * efficient.
     *
     * @param array|Options $options Optional Arguments
     * @param int $limit Upper limit for the number of records to return. stream()
     *                   guarantees to never return more than limit.  Default is no
     *                   limit
     * @param mixed $pageSize Number of records to fetch per request, when not set
     *                        will use the default value of 50 records.  If no
     *                        page_size is defined but a limit is defined, stream()
     *                        will attempt to read the limit with the most
     *                        efficient page size, i.e. min(limit, 1000)
     * @return Stream stream of results
     */
    public function stream(array $options = [], int $limit = null, $pageSize = null): Stream
    {
        $limits = $this->version->readLimits($limit, $pageSize);

        $page = $this->page($options, $limits['pageSize']);

        return $this->version->stream($page, $limits['limit'], $limits['pageLimit']);
    }

    /**
     * Retrieve a single page of CallInstance records from the API.
     * Request is executed immediately
     *
     * @param mixed $pageSize Number of records to return, defaults to 50
     * @param string $pageToken PageToken provided by the API
     * @param mixed $pageNumber Page Number, this value is simply for client state
     * @return CallPage Page of CallInstance
     */
    public function page(
        array $options = [],
        $pageSize = Values::NONE,
        string $pageToken = Values::NONE,
        $pageNumber = Values::NONE
    ): CallPage
    {
        $options = new Values($options);

        $params = Values::of([
            'To' =>
                $options['to'],
            'From' =>
                $options['from'],
            'ParentCallSid' =>
                $options['parentCallSid'],
            'Status' =>
                $options['status'],
            'StartTime<' =>
                Serialize::iso8601DateTime($options['startTimeBefore']),
            'StartTime' =>
                Serialize::iso8601DateTime($options['startTime']),
            'StartTime>' =>
                Serialize::iso8601DateTime($options['startTimeAfter']),
            'EndTime<' =>
                Serialize::iso8601DateTime($options['endTimeBefore']),
            'EndTime' =>
                Serialize::iso8601DateTime($options['endTime']),
            'EndTime>' =>
                Serialize::iso8601DateTime($options['endTimeAfter']),
            'PageToken' => $pageToken,
            'Page' => $pageNumber,
            'PageSize' => $pageSize,
        ]);

        $headers = Values::of(['Content-Type' => 'application/x-www-form-urlencoded', 'Accept' => 'application/json']);
        $response = $this->version->page('GET', $this->uri, $params, [], $headers);

        return new CallPage($this->version, $response, $this->solution);
    }

    /**
     * Retrieve a specific page of CallInstance records from the API.
     * Request is executed immediately
     *
     * @param string $targetUrl API-generated URL for the requested results page
     * @return CallPage Page of CallInstance
     */
    public function getPage(string $targetUrl): CallPage
    {
        $response = $this->version->getDomain()->getClient()->request(
            'GET',
            $targetUrl
        );

        return new CallPage($this->version, $response, $this->solution);
    }


    /**
     * Constructs a CallContext
     *
     * @param string $sid The Twilio-provided Call SID that uniquely identifies the Call resource to delete
     */
    public function getContext(
        string $sid
        
    ): CallContext
    {
        return new CallContext(
            $this->version,
            $this->solution['accountSid'],
            $sid
        );
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string
    {
        return '[Twilio.Api.V2010.CallList]';
    }
}
