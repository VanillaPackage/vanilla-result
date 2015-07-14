<?php

namespace Rentalhost\VanillaResult;

class Result
{
    /**
     * Stores the status.
     * @var boolean
     */
    private $status;

    /**
     * Stores the message.
     * @var string
     */
    private $message;

    /**
     * Stores some additional data.
     * @var mixed
     */
    private $data;

    /**
     * Construct a result.
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
     * @param boolean $status Status.
     */
    public function setStatus($status)
    {
        $this->status = boolval($status);
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
     * @param mixed $data Additional data.
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * Get current data.
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }
}
