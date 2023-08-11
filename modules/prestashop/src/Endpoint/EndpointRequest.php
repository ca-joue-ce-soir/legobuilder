<?php

namespace Legobuilder\Endpoint;

use Symfony\Component\Validator\Constraints as Assert;

class EndpointRequest
{
    /**
     * @var ?string
     * 
     * @Assert\NotBlank()
     */
    private $query;

    /**
     * @var ?array
     */
    private $variables;

    /**
     * Get the value of query
     *
     * @return  string
     */ 
    public function getQuery()
    {
        return $this->query;
    }

    /**
     * Set the value of query
     *
     * @param  ?string  $query
     *
     * @return  self
     */ 
    public function setQuery(?string $query = null)
    {
        $this->query = $query;

        return $this;
    }

    /**
     * Get the value of variables
     *
     * @return  ?array
     */ 
    public function getVariables()
    {
        return $this->variables;
    }

    /**
     * Set the value of variables
     *
     * @param  ?array  $variables
     *
     * @return  self
     */ 
    public function setVariables(?array $variables = null)
    {
        $this->variables = $variables;

        return $this;
    }
}