<?php

declare(strict_types=1);

namespace Amesplash\HarvestApi\Invoice;

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
     * Array of invoice message recipients.
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
     * Whether to include a link to the client invoice in the message body. Not used when thankYou is true.
     *
     * @var ?bool
     */
    private $includeLinkToClientInvoice;

    /**
     * Whether to attach the invoice PDF to the message email.
     *
     * @var ?bool
     */
    private $attachPdf;

    /**
     * Whether to email a copy of the message to the current user.
     *
     * @var ?bool
     */
    private $sendMeACopy;

    /**
     * Whether this is a thank you message.
     *
     * @var ?bool
     */
    private $thankYou;

    /**
     * The type of invoice event that occurred with the message: send, close, draft, re-open, or view.
     *
     * @var ?string
     */
    private $eventType;

    /**
     * Whether this is a reminder message.
     *
     * @var ?bool
     */
    private $reminder;

    /**
     * The date the reminder email will be sent.
     *
     * @var ?DateTimeInterface
     */
    private $sendReminderOn;

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
     * Creates a new Invoice Message instance.
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
        ?bool $includeLinkToClientInvoice = null,
        ?bool $attachPdf = null,
        ?bool $sendMeACopy = null,
        ?bool $thankYou = null,
        ?string $eventType = null,
        ?bool $reminder = null,
        ?DateTimeInterface $sendReminderOn = null,
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
        $this->includeLinkToClientInvoice = $includeLinkToClientInvoice;
        $this->attachPdf = $attachPdf;
        $this->sendMeACopy = $sendMeACopy;
        $this->thankYou = $thankYou;
        $this->eventType = $eventType;
        $this->reminder = $reminder;
        $this->sendReminderOn = $sendReminderOn;
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

    public function includeLinkToClientInvoice() : ?bool
    {
        return $this->includeLinkToClientInvoice;
    }

    public function attachPdf() : ?bool
    {
        return $this->attachPdf;
    }

    public function sendMeACopy() : ?bool
    {
        return $this->sendMeACopy;
    }

    public function thankYou() : ?bool
    {
        return $this->thankYou;
    }

    public function eventType() : ?string
    {
        return $this->eventType;
    }

    public function reminder() : ?bool
    {
        return $this->reminder;
    }

    public function sendReminderOn() : ?DateTimeInterface
    {
        return $this->sendReminderOn;
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
            'include_link_to_client_invoice' => $this->includeLinkToClientInvoice,
            'attach_pdf' => $this->attachPdf,
            'send_me_a_copy' => $this->sendMeACopy,
            'thank_you' => $this->thankYou,
            'event_type' => $this->eventType,
            'reminder' => $this->reminder,
            'send_reminder_on' => $this->sendReminderOn,
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
            $data['include_link_to_client_invoice'],
            $data['attach_pdf'],
            $data['send_me_a_copy'],
            $data['thank_you'],
            $data['event_type'],
            $data['reminder'],
            $data['send_reminder_on'],
            $data['created_at'],
            $data['updated_at']
        );
    }
}
