<?php

namespace Nourelhadi\CmiPayment\Converter;

interface XmlConverterItemRequestInterface
{
    public function getTag(): ?string;

    public function getMappingAttributes(): array;
}