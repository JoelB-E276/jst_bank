<?php

namespace App\Entity;

use App\Repository\OperationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OperationRepository::class)
 */
class Operation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $name;

    /**
     * @ORM\Column(type="datetime")
     */
    private $operation_date;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $amount;

    /**
     * @ORM\Column(type="string", length=1)
     */
    private $operation_type;

    /**
     *      
     * @ORM\ManyToOne(targetEntity=Account::class, inversedBy="id")
     * @ORM\JoinColumn(nullable=false)
     */
    private $account_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getOperationDate(): ?\DateTimeInterface
    {
        return $this->operation_date;
    }

    public function setOperationDate(\DateTimeInterface $operation_date): self
    {
        $this->operation_date = $operation_date;

        return $this;
    }

    public function getAmount(): ?string
    {
        return $this->amount;
    }

    public function setAmount(string $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    public function getOperationType(): ?string
    {
        return $this->operation_type;
    }

    public function setOperationType(string $operation_type): self
    {
        $this->operation_type = $operation_type;

        return $this;
    }

    public function getAccountId(): ?Account
    {
        return $this->account_id;
    }

    public function setAccountId(?Account $account_id): self
    {
        $this->account_id = $account_id;

        return $this;
    }

}
