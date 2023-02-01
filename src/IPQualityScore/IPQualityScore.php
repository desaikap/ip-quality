<?php

namespace IPQuality\IPQualityScore;

use IPQuality\IPQualityScore\Client\IPQualityScoreClient;
use IPQuality\IPQualityScore\Model\EmailVerification;
use IPQuality\IPQualityScore\Model\IPAddressVerification;
use IPQuality\IPQualityScore\Model\PhoneVerification;

/**
 * Class IPQualityScore
 * @package IPQualityScore
 */
class IPQualityScore
{
    /** @var string */
    public const VERSION = '2.0.2';

    /** @var string */
    public const API_URL = 'https://www.ipqualityscore.com/api';

    /** @var string $apiKey */
    public $apiKey;

    /** @var EmailVerification */
    public $emailVerification;

    /** @var IPAddressVerification */
    public $IPAddressVerification;

    /** @var PhoneVerification */
    public $phoneVerification;

    /** @var IPQualityScoreClient */
    public $client;

    /**
     * IPQualityScore constructor.
     * @param string $apiKey
     */
    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
        $this->emailVerification = new EmailVerification($this);
        $this->IPAddressVerification = new IPAddressVerification($this);
        $this->phoneVerification = new PhoneVerification($this);
        $this->client = new IPQualityScoreClient();
    }
}