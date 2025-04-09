<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Flex
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */


namespace Twilio\Rest\FlexApi\V1;

use Twilio\Exceptions\TwilioException;
use Twilio\Options;
use Twilio\Values;
use Twilio\Version;
use Twilio\InstanceContext;


class AssessmentsContext extends InstanceContext
    {
    /**
     * Initialize the AssessmentsContext
     *
     * @param Version $version Version that contains the resource
     * @param string $assessmentSid The SID of the assessment to be modified
     */
    public function __construct(
        Version $version,
        $assessmentSid
    ) {
        parent::__construct($version);

        // Path Solution
        $this->solution = [
        'assessmentSid' =>
            $assessmentSid,
        ];

        $this->uri = '/Insights/QualityManagement/Assessments/' . \rawurlencode($assessmentSid)
        .'';
    }

    /**
     * Update the AssessmentsInstance
     *
     * @param string $offset The offset of the conversation
     * @param string $answerText The answer text selected by user
     * @param string $answerId The id of the answer selected by user
     * @param array|Options $options Optional Arguments
     * @return AssessmentsInstance Updated AssessmentsInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update(string $offset, string $answerText, string $answerId, array $options = []): AssessmentsInstance
    {

        $options = new Values($options);

        $data = Values::of([
            'Offset' =>
                $offset,
            'AnswerText' =>
                $answerText,
            'AnswerId' =>
                $answerId,
        ]);

        $headers = Values::of(['Content-Type' => 'application/x-www-form-urlencoded', 'Accept' => 'application/json' , 'Authorization' => $options['authorization']]);
        $payload = $this->version->update('POST', $this->uri, [], $data, $headers);

        return new AssessmentsInstance(
            $this->version,
            $payload,
            $this->solution['assessmentSid']
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
        return '[Twilio.FlexApi.V1.AssessmentsContext ' . \implode(' ', $context) . ']';
    }
}
