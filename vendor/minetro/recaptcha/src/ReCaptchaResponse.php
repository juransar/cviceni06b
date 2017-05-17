<?php

namespace Minetro\ReCaptcha;

/**
 * @author Milan Felix Sulc <sulcmil@gmail.com>
 */
final class ReCaptchaResponse
{

    // Error code list
    const ERROR_CODE_MISSING_INPUT_SECRET = 'missing-input-secret';
    const ERROR_CODE_INVALID_INPUT_SECRET = 'invalid-input-secret';
    const ERROR_CODE_MISSING_INPUT_RESPONSE = 'missing-input-response';
    const ERROR_CODE_INVALID_INPUT_RESPONSE = 'invalid-input-response';
    const ERROR_CODE_UNKNOWN = 'unknow';

    /** @var bool */
    private $success;

    /** @var string */
    private $error;

    /**
     * @param bool $success
     * @param string $error
     */
    public function __construct($success, $error = NULL)
    {
        $this->success = (bool) $success;
        $this->error = $error;
    }

    /**
     * @return boolean
     */
    public function isSuccess()
    {
        return $this->success;
    }

    /**
     * @return string
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string) $this->isSuccess();
    }

}
