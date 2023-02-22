<?php

namespace Exchange\Client\Transaction\Base;

interface ReferenceSchemeTransactionIdentifierInterface
{
    public function setReferenceSchemeTransactionIdentifier($referenceSchemeTransactionIdentifier);

    public function getReferenceSchemeTransactionIdentifier();
}
