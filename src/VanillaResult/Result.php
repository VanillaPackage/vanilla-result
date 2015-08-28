<?php

namespace Rentalhost\VanillaResult;

/**
 * Class Result
 * @package Rentalhost\VanillaResult
 */
class Result
{
    /**
     * Stores the status.
     * @var boolean
     */
    protected $status;

    /**
     * Stores the message.
     * @var string
     */
    protected $message;

    /**
     * Stores some additional data.
     * @var mixed
     */
    protected $data;

    /**
     * Construct a result.
     *
     * @param boolean $status  Status.
     * @param string  $message Message of result.
     * @param mixed   $data    Additional data.
     */
    public function __construct($status = true, $message = null, $data = null)
    {
        $this->setStatus($status);
        $this->message = $message;
        $this->data = $data;
    }

    /**
     * Returns if is a status return.
     * @return boolean
     */
    public function isSuccess()
    {
        return $this->status;
    }

    /**
     * Redefine current status.
     *
     * @param boolean $status Status.
     */
    public function setStatus($status)
    {
        $this->status = (bool) $status;
    }

    /**
     * Get current status.
     * @return boolean
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Redefine current message.
     *
     * @param string $message Message.
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * Get current message.
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Redefine additional data.
     *
     * @param mixed $data Additional data.
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * Get current data.
     * Optionally, you can pass key to return.
     *
     * @param string $key          Key name to return.
     * @param mixed  $defaultValue Value to return if key not exists.
     *
     * @return mixed
     */
    public function getData($key = null, $defaultValue = null)
    {
        // Returns the key, instead of all data.
        if ($key !== null) {
            if (!array_key_exists($key, $this->data)) {
                return $defaultValue;
            }

            return $this->data[$key];
        }

        return $this->data;
    }
}
