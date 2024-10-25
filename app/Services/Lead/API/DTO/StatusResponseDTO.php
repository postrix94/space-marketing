<?php

namespace App\Services\Lead\API\DTO;

class StatusResponseDTO
{
    public readonly bool $status;
    public readonly array $statuses;
    public ?string $message;

    public function __construct()
    {
        $this->message = null;
    }

    /**
     * @param bool $status
     * @return $this
     */
    public function setStatus(bool $status): self
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @param array $statuses
     * @return $this
     */
    public function addStatuses(array $statuses): self
    {
        $this->statuses = $statuses;
        return $this;
    }

    /**
     * @param string $message
     * @return $this
     */
    public function setMessage(string $message): self
    {
        $this->message = $message;
        return $this;
    }
}