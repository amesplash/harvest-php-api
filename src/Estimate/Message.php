<?php

declare(strict_types=1);

namespace Amesplash\HarvestApi\Estimate;

use Amesplash\HarvestApi\Foundation\Entity;
use Amesplash\HarvestApi\Related\MessageRecipients;
use DateTimeInterface;

final class Message extends Entity
{
    /**
     * Unique ID for the message.
     *
     * @var ?int
     */
    private $id;

    /**
     * Name of the user that created the message.
     *
     * @var ?string
     */
    private $sentBy;

    /**
     * Email of the user that created the message.
     *
     * @var ?string
     */
    private $sentByEmail;

    /**
     * Name of the user that the message was sent from.
     *
     * @var ?string
     */
    private $sentFrom;

    /**
     * Email of the user that message was sent from.
     *
     * @var ?string
     */
    private $sentFromEmail;

    /**
     * Array of estimate message recipients.
     *
     * @var ?MessageRecipients
     */
    private $recipients;

    /**
     * The message subject.
     *
     * @var ?string
     */
    private $subject;

    /**
     * The message body.
     *
     * @var ?string
     */
    private $body;

    /**
     * Whether to email a copy of the message to the current user.
     *
     * @var ?bool
     */
    private $sendMeACopy;

    /**
     * The type of estimate event that occurred with the message: send, accept, decline, re-open, view, or invoice.
     *
     * @var ?string
     */
    private $eventType;

    /**
     * Date and time the message was created.
     *
     * @var ?DateTimeInterface
     */
    private $createdAt;

    /**
     * Date and time the message was last updated.
     *
     * @var ?DateTimeInterface
     */
    private $updatedAt;

    /**
     * Creates a new Estimate Message instance.
     */
    public function __construct(
        ?int $id = null,
        ?string $sentBy = null,
        ?string $sentByEmail = null,
        ?string $sentFrom = null,
        ?string $sentFromEmail = null,
        ?MessageRecipients $recipients = null,
        ?string $subject = null,
        ?string $body = null,
        ?bool $sendMeACopy = null,
        ?string $eventType = null,
        ?DateTimeInterface $createdAt = null,
        ?DateTimeInterface $updatedAt = null
    ) {
        $this->id = $id;
        $this->sentBy = $sentBy;
        $this->sentByEmail = $sentByEmail;
        $this->sentFrom = $sentFrom;
        $this->sentFromEmail = $sentFromEmail;
        $this->recipients = $recipients;
        $this->subject = $subject;
        $this->body = $body;
        $this->sendMeACopy = $sendMeACopy;
        $this->eventType = $eventType;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;

        parent::__construct();
    }

    public function id() : ?int
    {
        return $this->id;
    }

    public function sentBy() : ?string
    {
        return $this->sentBy;
    }

    public function sentByEmail() : ?string
    {
        return $this->sentByEmail;
    }

    public function sentFrom() : ?string
    {
        return $this->sentFrom;
    }

    public function sentFromEmail() : ?string
    {
        return $this->sentFromEmail;
    }

    public function recipients() : ?MessageRecipients
    {
        return $this->recipients;
    }

    public function subject() : ?string
    {
        return $this->subject;
    }

    public function body() : ?string
    {
        return $this->body;
    }

    public function sendMeACopy() : ?bool
    {
        return $this->sendMeACopy;
    }

    public function eventType() : ?string
    {
        return $this->eventType;
    }

    public function createdAt() : ?DateTimeInterface
    {
        return $this->createdAt;
    }

    public function updatedAt() : ?DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function arrayCopy() : array
    {
        return [
            'id' => $this->id,
            'sent_by' => $this->sentBy,
            'sent_by_email' => $this->sentByEmail,
            'sent_from' => $this->sentFrom,
            'sent_from_email' => $this->sentFromEmail,
            'recipients' => $this->recipients,
            'subject' => $this->subject,
            'body' => $this->body,
            'send_me_a_copy' => $this->sendMeACopy,
            'event_type' => $this->eventType,
            'created_at' => $this->createdAt,
            'updated_at' => $this->updatedAt,
        ];
    }

    public static function makeFromArray(array $data) : self
    {
        return new self(
            $data['id'],
            $data['sent_by'],
            $data['sent_by_email'],
            $data['sent_from'],
            $data['sent_from_email'],
            $data['recipients'],
            $data['subject'],
            $data['body'],
            $data['send_me_a_copy'],
            $data['event_type'],
            $data['created_at'],
            $data['updated_at']
        );
    }
}
