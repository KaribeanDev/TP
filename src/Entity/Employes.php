<?php

namespace App\Entity;

use App\Repository\EmployesRepository;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: EmployesRepository::class)]
#[UniqueEntity('email')]
class Employes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id;

    #[ORM\Column(type: 'string', length: 60)]
    #[Assert\NotBlank()]
    #[Assert\Length(
        min: 2,
        max: 60,
        minMessage: "Le prénom doit contenir au minimum {{ limit }} lettres.",
        maxMessage: "Le prénom doit contenir au maximum {{ limit }} lettres."
    )]
    private string $prenom;

    #[ORM\Column(type: 'string', length: 60)]
    #[Assert\NotBlank()]
    #[Assert\Length(
        min: 2,
        max: 60,
        minMessage: "Le prénom doit contenir au minimum {{ limit }} lettres.",
        maxMessage: "Le prénom doit contenir au maximum {{ limit }} lettres."
    )]
    private string $nom;

    #[ORM\Column(type: 'integer')]
    #[Assert\NotNull()]
    #[Assert\Regex(pattern: "/^[0-9]+$/")]
    #[Assert\Length(
        min: 9,
        max: 9,
        exactMessage: "Le numéro doit contenir {{ limit }} chiffres."
    )]
    #[Assert\PositiveOrZero]
    #[Assert\LessThan(
        value: 1_000_000_000,
        message: "Format de numéro invalide."
    )]
    private ?int $telephone;


    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotNull()]
    #[Assert\Email(
        message: 'Le mail {{ value }} n\'est pas un mail valide.',
    )]
    private string $email;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotNull()]
    private string $adresse;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotNull()]
    private string $poste;

    #[ORM\Column(type: 'float')]
    #[Assert\Positive()]
    private float $salaire;

    #[ORM\Column(type: 'datetime')]
    #[Assert\Type(
        type: "datetime",
        message: "{{ value }} invalide."
    )]
    #[Assert\LessThanOrEqual(
        value: "-18 years",
        message: "Age non valide"
    )]
    #[Assert\GreaterThanOrEqual(
        value: "-100 years",
        message: "Age non valide"
    )]
    private ?DateTimeInterface $datedenaissance;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getTelephone(): ?int
    {
        return $this->telephone;
    }

    public function setTelephone(int $telephone): self
    {
        $this->telephone = $telephone;

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

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getPoste(): ?string
    {
        return $this->poste;
    }

    public function setPoste(string $poste): self
    {
        $this->poste = $poste;

        return $this;
    }

    public function getSalaire(): ?float
    {
        return $this->salaire;
    }

    public function setSalaire(float $salaire): self
    {
        $this->salaire = $salaire;

        return $this;
    }

    public function getDatedenaissance(): ?\DateTimeInterface
    {
        return $this->datedenaissance;
    }

    public function setDatedenaissance(\DateTimeInterface $datedenaissance): self
    {
        $this->datedenaissance = $datedenaissance;

        return $this;
    }
}
