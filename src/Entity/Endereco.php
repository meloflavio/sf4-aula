<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EnderecoRepository")
 */
class Endereco
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $logradouro;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cep;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cidade;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $estado;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Contato", mappedBy="endereco")
     */
    private $contatos;

    public function __construct()
    {
        $this->contatos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLogradouro(): ?string
    {
        return $this->logradouro;
    }

    public function setLogradouro(string $logradouro): self
    {
        $this->logradouro = $logradouro;

        return $this;
    }

    public function getCep(): ?string
    {
        return $this->cep;
    }

    public function setCep(string $cep): self
    {
        $this->cep = $cep;

        return $this;
    }

    public function getCidade(): ?string
    {
        return $this->cidade;
    }

    public function setCidade(string $cidade): self
    {
        $this->cidade = $cidade;

        return $this;
    }

    public function getEstado(): ?string
    {
        return $this->estado;
    }

    public function setEstado(string $estado): self
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * @return Collection|Contato[]
     */
    public function getContatos(): Collection
    {
        return $this->contatos;
    }

    public function addContato(Contato $contato): self
    {
        if (!$this->contatos->contains($contato)) {
            $this->contatos[] = $contato;
            $contato->setEndereco($this);
        }

        return $this;
    }

    public function removeContato(Contato $contato): self
    {
        if ($this->contatos->contains($contato)) {
            $this->contatos->removeElement($contato);
            // set the owning side to null (unless already changed)
            if ($contato->getEndereco() === $this) {
                $contato->setEndereco(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return (string) $this->getLogradouro().' - '.$this->getCep().' - '.$this->getCidade().' - '.$this->getEstado();
    }


}
