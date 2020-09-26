<?php


namespace MockingMagician\CoinbaseProSdk\Functional\Request;


use MockingMagician\CoinbaseProSdk\Contracts\Request\RequestInspectorInterface;
use MockingMagician\CoinbaseProSdk\Functional\Error\ApiError;

class RequestInspector implements RequestInspectorInterface
{
    const VALID_NAMESPACE_PATTERN = '#[a-z0-9_/-]#i';

    /**
     * @var string
     */
    private $pathToRecord;

    public function __construct(string $pathToRecord)
    {
        try {
            if (!(is_dir($pathToRecord) && is_writable($pathToRecord))) {
                throw new ApiError(sprintf('Path %s passed to RequestInspector must be a directory and writable', $pathToRecord));
            }
        } catch (ApiError $exception) {
            mkdir($pathToRecord, 0777, true);
            if (!file_exists($pathToRecord)) {
                throw new ApiError(sprintf('Failed to create %s path', $pathToRecord), $exception->getCode(), $exception);
            }
        }
        $this->pathToRecord = $pathToRecord;
    }

    public function recordRequestData(string $data, string $namespace): void
    {
        $json = json_encode(json_decode($data, true), JSON_PRETTY_PRINT);
        if (JSON_ERROR_NONE !== json_last_error()) {
            return;
        }
        if (!preg_match(self::VALID_NAMESPACE_PATTERN, $namespace)) {
            throw new ApiError(sprintf('Invalid namespace, given %s, but must match %s', $namespace, self::VALID_NAMESPACE_PATTERN));
        }
        $dirToRecord = $this->pathToRecord.DIRECTORY_SEPARATOR.$namespace;
        if (!file_exists($dirToRecord)) {
            mkdir($dirToRecord);
        }
        file_put_contents($dirToRecord.DIRECTORY_SEPARATOR.(microtime(true) * 10000).'.json', $json);
    }
}
