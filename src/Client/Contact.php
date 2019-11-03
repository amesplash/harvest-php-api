<?php

declare(strict_types=1);

namespace Amesplash\HarvestApi\Client;

use Amesplash\HarvestApi\Foundation\Entity;
use Amesplash\HarvestApi\Related\Client;
use DateTimeInterface;

final class Contact extends Entity
{
    /**
     * Unique ID for the contact.
     *
     * @var ?int
     */
    private $id;

    /**
     * An object containing the contact’s client id and name.
     *
     * @var ?Client
     */
    private $client;

    /**
     * The title of the contact.
     *
     * @var ?string
     */
    private $title;

    /**
     * The first name of the contact.
     *
     * @var ?string
     */
    private $firstName;

    /**
     * The last name of the contact.
     *
     * @var ?string
     */
    private $lastName;

    /**
     * The contact’s email address.
     *
     * @var ?string
     */
    private $email;

    /**
     * The contact’s office phone number.
     *
     * @var ?string
     */
    private $phoneOffice;

    /**
     * The contact’s mobile phone number.
     *
     * @var ?string
     */
    private $phoneMobile;

    /**
     * The contact’s fax number.
     *
     * @var ?string
     */
    private $fax;

    /**
     * Date and time the contact was created.
     *
     * @var ?DateTimeInterface
     */
    private $createdAt;

    /**
     * Date and time the contact was last updated.
     *
     * @var ?DateTimeInterface
     */
    private $updatedAt;

    /**
     * Creates a new Client Contact instance.
     */
    public function __construct(
        ?int $id = null,
        ?Client $client = null,
        ?string $title = null,
        ?string $firstName = null,
        ?string $lastName = null,
        ?string $email = null,
        ?string $phoneOffice = null,
        ?string $phoneMobile = null,
        ?string $fax = null,
        ?DateTimeInterface $createdAt = null,
        ?DateTimeInterface $updatedAt = null
    ) {
        $this->id = $id;
        $this->client = $client;
        $this->title = $title;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->phoneOffice = $phoneOffice;
        $this->phoneMobile = $phoneMobile;
        $this->fax = $fax;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;

        parent::__construct();
    }

    public function id() : ?int
    {
        return $this->id;
    }

    public function client() : ?Client
    {
        return $this->client;
    }

    public function title() : ?string
    {
        return $this->title;
    }

    public function firstName() : ?string
    {
        return $this->firstName;
    }

    public function lastName() : ?string
    {
        return $this->lastName;
    }

    public function email() : ?string
    {
        return $this->email;
    }

    public function phoneOffice() : ?string
    {
        return $this->phoneOffice;
    }

    public function phoneMobile() : ?string
    {
        return $this->phoneMobile;
    }

    public function fax() : ?string
    {
        return $this->fax;
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
            'client' => $this->client,
            'title' => $this->title,
            'first_name' => $this->firstName,
            'last_name' => $this->lastName,
            'email' => $this->email,
            'phone_office' => $this->phoneOffice,
            'phone_mobile' => $this->phoneMobile,
            'fax' => $this->fax,
            'created_at' => $this->createdAt,
            'updated_at' => $this->updatedAt,
        ];
    }

    public static function makeFromArray(array $data) : self
    {
        return new self(
            $data['id'],
            $data['client'],
            $data['title'],
            $data['first_name'],
            $data['last_name'],
            $data['email'],
            $data['phone_office'],
            $data['phone_mobile'],
            $data['fax'],
            $data['created_at'],
            $data['updated_at']
        );
    }
}
