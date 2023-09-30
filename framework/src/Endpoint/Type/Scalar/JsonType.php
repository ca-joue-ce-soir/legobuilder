<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Endpoint\Type\Scalar;

use GraphQL\Error\Error;
use GraphQL\Language\AST\Node;
use GraphQL\Language\Printer;
use GraphQL\Type\Definition\ScalarType;
use JsonException;

final class JsonType extends ScalarType
{
    public function serialize($value): string
    {
        return json_encode($value);
    }

    public function parseValue($value)
    {
        return $this->decodeJSON($value);
    }

    public function parseLiteral(Node $valueNode, array $variables = null)
    {
        if (!property_exists($valueNode, 'value')) {
            $withoutValue = Printer::doPrint($valueNode);
            throw new Error("Can not parse literals without a value: {$withoutValue}.");
        }

        return $this->decodeJSON($valueNode->value);
    }

    /**
     * Try to decode a user-given JSON value.
     *
     * @param mixed $value A user given JSON
     * @return mixed The decoded value
     * @throws Error
     */
    protected function decodeJSON(mixed $value): mixed
    {
        try {
            $decoded = json_decode($value);
        } catch (JsonException $jsonException) {
            throw new Error($jsonException->getMessage());
        }

        return $decoded;
    }
}
