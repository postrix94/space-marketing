<?php

namespace App\Services\Lead\API\DTO;

class LeadResponseDTO
{
    public readonly bool $status;
    public ?int $id;
    public readonly string $message;

    public function __construct() {
        $this->id = null;
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
     * @param int $id
     * @return $this
     */
    public function setId(int $id): self
    {
        $this->id = $id;
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