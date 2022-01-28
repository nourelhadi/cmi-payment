<?php

namespace Nourelhadi\CmiPayment\Converter;

trait XmlConverterTrait
{
    public function convert(XmlConverterItemRequestInterface $requestItem): ?string
    {
        $mappingAttributes = $requestItem->getMappingAttributes();

        $chain = '';
        foreach ($mappingAttributes as $attribute => $mapping) {

            $method = 'get' . ucfirst($attribute);
            if (method_exists($requestItem, $method) && !empty($requestItem->$method())) {
                $chain .= sprintf('<%s>%s</%s>', $mapping, $requestItem->$method(), $mapping);
            }
        }

        if (!empty($chain) && !empty($requestItem->getTag())) {
            $chain .= sprintf('<%s>%s</%s>', $requestItem->getTag(), $chain, $requestItem->getTag());
        }

        return $chain;
    }
}