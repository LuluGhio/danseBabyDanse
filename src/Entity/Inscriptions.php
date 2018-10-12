<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;

/**
 * @ORM\Entity(repositoryClass="App\Repository\InscriptionsRepository")
 */
class Inscriptions
{
    /**
     * @ORM\Column(type="boolean")
     */
    private $checked = false;

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastName;

    /**
     * @ORM\Column(type="string", length=10)
     * @Assert\Length(
     *                  min = 10,
     *                  max = 10
     * )
     */
    private $phoneNumber;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Email(
     *  message = "The email '{{ value }}' is not a valid email.",
     *  checkMX = true
     * )
     */
    private $email;

    /**
     * @ORM\Column(type="datetime")
     */
    private $birthDate;

    /**
     * @ORM\Column(type="array")
     */
    private $grades;

    public function getChecked(): ?bool
    {
        return $this->checked;
    }

    public function setChecked(bool $checked): self
    {
        $this->checked = $checked;

        return $this;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(string $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function __construct()
    {
        $this->birthDate = new \DateTime();
    }

    public function getBirthDate(): \dateTime
    {
        return $this->birthDate;
    }

    public function setBirthDate(\DateTime $birthDate): self
    {
        $this->birthDate = $birthDate;
        $this->grades = [];

        return $this;
    }

    public function getGrades(): ?array
    {
        return $this->grades;
    }

    public function setGrades(array $grades): self
    {
        $this->grades = $grades;

        return $this;
    }
}
