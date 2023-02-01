IP Quality
==================
IPQuality module check ipquality api service.

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist desaikap/ip-quality "dev-master"
```

or add

```
"desaikap/ip-quality": "dev-master"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

## Email Validation Example
IPQualityScore's Email Validation API allows you to detect invalid mailboxes as well as disposable and fraudulent email addresses, spamtraps, and honeypots.

```php
use IPQuality\IPQualityScore\IPQualityScore;
$key = '--api--key--';
$qualityScore = new IPQualityScore($key);
$result = $qualityScore->emailVerification->getResponse('test@example.com');

if ($result->isSuccess() && $result->isValid() && $result->getDeliverability() === 'high') {
    // do something...
} else {
    //show alert tot user
}
```
## Phone Validation Example
IPQualityScore's Proxy Detection API allows you to Proactively Prevent Fraud™ via a simple API that provides over 25 data points for risk analysis, geo location, and IP intelligence.

```php
use IPQuality\IPQualityScore\IPQualityScore;
$key = '--api--key--';
$qualityScore = new IPQualityScore($key);
$result = $qualityScore->phoneVerification->getResponse('18001234567');

if ($result->isSuccess() && $result->isValid() && !$result->isRisky() && !$result->isVoip() && !$result->isRecentAbuse()) {
    // do something...
} else {
    //show alert tot user
}
```
## Proxy & VPN Detection Example
IPQualityScore's Proxy Detection API allows you to Proactively Prevent Fraud™ via a simple API that provides over 25 data points for risk analysis, geo location, and IP intelligence.

```php
use IPQuality\IPQualityScore\IPQualityScore;
$key = '--api--key--';
$qualityScore = new IPQualityScore($key);
$result = $qualityScore->IPAddressVerification
    ->setUserLanguage($_SERVER['HTTP_ACCEPT_LANGUAGE'] ?? '')
    ->setUserAgent($_SERVER['HTTP_USER_AGENT'] ?? '')
    ->getResponse($_SERVER['REMOTE_ADDR']);

if ($result->isSuccess() && ($result->isTor() || $result->isProxy())) {
    // block tor network request or send to /blocked page..
}

if ($result->isSuccess() && ($result->isProxy() || $result->isVpn())) {
    // block proxy/vpn request or send to /blocked page..
}
```