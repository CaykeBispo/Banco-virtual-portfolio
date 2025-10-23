<?php
require 'Fixtures/AbstractProvider.php';
require 'Fixtures/Crawlers.php';
require 'Fixtures/Exclusions.php';
require 'Fixtures/Headers.php';

$src = array(
    'Crawlers',
    'Exclusions',
    'Headers',
);

foreach ($src as $class) {
    $class = "Jaybizzle\\CrawlerDetect\\Fixtures\\$class";
    $object = new $class;

    outputJson($object);
    outputTxt($object);
}

function outputJson($object)
{
    $className = (new ReflectionClass($object))->getShortName();
    file_put_contents("_antibot/Fixtures/$className.json", json_encode($object->getAll()));
}

function outputTxt($object)
{
    $className = (new ReflectionClass($object))->getShortName();
    file_put_contents("_antibot/Fixtures/$className.txt", implode(PHP_EOL, $object->getAll()));
}

// namespace Jaybizzle\CrawlerDetect;

use Jaybizzle\CrawlerDetect\Fixtures\Crawlers;
use Jaybizzle\CrawlerDetect\Fixtures\Exclusions;
use Jaybizzle\CrawlerDetect\Fixtures\Headers;

class CrawlerDetect
{
    /**
     * The user agent.
     *
     * @var string|null
     */
    protected $userAgent;

    /**
     * Headers that contain a user agent.
     *
     * @var array
     */
    protected $httpHeaders = array();

    /**
     * Store regex matches.
     *
     * @var array
     */
    protected $matches = array();

    /**
     * Crawlers object.
     *
     * @var \Jaybizzle\CrawlerDetect\Fixtures\Crawlers
     */
    protected $crawlers;

    /**
     * Exclusions object.
     *
     * @var \Jaybizzle\CrawlerDetect\Fixtures\Exclusions
     */
    protected $exclusions;

    /**
     * Headers object.
     *
     * @var \Jaybizzle\CrawlerDetect\Fixtures\Headers
     */
    protected $uaHttpHeaders;

    /**
     * The compiled regex string.
     *
     * @var string
     */
    protected $compiledRegex;

    /**
     * The compiled exclusions regex string.
     *
     * @var string
     */
    protected $compiledExclusions;

    /**
     * Class constructor.
     */
    public function __construct(array $headers = null, $userAgent = null)
    {
        $this->crawlers = new Crawlers();
        $this->exclusions = new Exclusions();
        $this->uaHttpHeaders = new Headers();

        $this->compiledRegex = $this->compileRegex($this->crawlers->getAll());
        $this->compiledExclusions = $this->compileRegex($this->exclusions->getAll());

        $this->setHttpHeaders($headers);
        $this->setUserAgent($userAgent);
    }

    /**
     * Compile the regex patterns into one regex string.
     *
     * @param array
     *
     * @return string
     */
    public function compileRegex($patterns)
    {
        return '('.implode('|', $patterns).')';
    }

    /**
     * Set HTTP headers.
     *
     * @param array|null $httpHeaders
     */
    public function setHttpHeaders($httpHeaders)
    {
        // Use global _SERVER if $httpHeaders aren't defined.
        if (! is_array($httpHeaders) || ! count($httpHeaders)) {
            $httpHeaders = $_SERVER;
        }

        // Clear existing headers.
        $this->httpHeaders = array();

        // Only save HTTP headers. In PHP land, that means
        // only _SERVER vars that start with HTTP_.
        foreach ($httpHeaders as $key => $value) {
            if (strpos($key, 'HTTP_') === 0) {
                $this->httpHeaders[$key] = $value;
            }
        }
    }

    /**
     * Return user agent headers.
     *
     * @return array
     */
    public function getUaHttpHeaders()
    {
        return $this->uaHttpHeaders->getAll();
    }

    /**
     * Set the user agent.
     *
     * @param string|null $userAgent
     */
    public function setUserAgent($userAgent)
    {
        if (is_null($userAgent)) {
            foreach ($this->getUaHttpHeaders() as $altHeader) {
                if (isset($this->httpHeaders[$altHeader])) {
                    $userAgent .= $this->httpHeaders[$altHeader].' ';
                }
            }
        }

        return $this->userAgent = $userAgent;
    }

    /**
     * Check user agent string against the regex.
     *
     * @param string|null $userAgent
     *
     * @return bool
     */
    public function isCrawler($userAgent = null)
    {
        $agent = trim(preg_replace(
            "/{$this->compiledExclusions}/i",
            '',
            $userAgent ?: $this->userAgent ?: ''
        ));

        if ($agent === '') {
            return false;
        }

        return (bool) preg_match("/{$this->compiledRegex}/i", $agent, $this->matches);
    }

    /**
     * Return the matches.
     *
     * @return string|null
     */
    public function getMatches()
    {
        return isset($this->matches[0]) ? $this->matches[0] : null;
    }
}



$CrawlerDetect = new CrawlerDetect;
// $referrer = new ReferralSpamDetect;
if($CrawlerDetect->isCrawler()) {
    $click = fopen("result/total_bot.txt","a");
    fwrite($click,"$ip|Bot Crawler"."\n");
    fclose($click);
    header('HTTP/1.0 403 Forbidden');
            die('<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN"><html><head><title>404 Not Found</title></head><body><h1>Not Found</h1><p>The requested URL was not found on this server.</p><p>Additionally, a 404 Not Found error was encountered while trying to use an ErrorDocument to handle the request.</p></body></html>');
}
// if($referrer->isReferralSpam()) {
// 	$click = fopen("result/total_bot.txt","a");
//     fwrite($click,"$ip|Referrer Block"."\n");
//     fclose($click);
//     header('HTTP/1.0 403 Forbidden');
//             die('<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN"><html><head><title>404 Not Found</title></head><body><h1>Not Found</h1><p>The requested URL was not found on this server.</p><p>Additionally, a 404 Not Found error was encountered while trying to use an ErrorDocument to handle the request.</p></body></html>');
// }
