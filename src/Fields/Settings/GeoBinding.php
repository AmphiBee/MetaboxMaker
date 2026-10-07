<?php

declare(strict_types=1);

namespace Pollora\Metabox\Fields\Settings;

use InvalidArgumentException;

/**
 * Trait for filling the field from the address selected in a geolocation
 * autocomplete field (MB Geolocation).
 */
trait GeoBinding
{
    /**
     * The address component filling the field, e.g. 'locality'.
     */
    protected string $binding;

    /**
     * Whether an empty address component empties the field.
     */
    protected bool $bind_if_empty;

    /**
     * The ID of the autocomplete address field the field is bound to.
     */
    protected string $address_field;

    /**
     * Fill the field with an address component when an address is selected, when
     * the field ID is not the component name: 'locality', 'short:country', or an
     * expression such as 'postal_code + " " + locality'.
     *
     * @param  bool  $bindIfEmpty  Whether an empty component empties the field. Defaults to true.
     */
    public function geoBinding(string $binding, bool $bindIfEmpty = true): static
    {
        if (trim($binding) === '') {
            throw new InvalidArgumentException('The geolocation binding cannot be empty.');
        }

        $this->binding = $binding;

        if (! $bindIfEmpty) {
            $this->bind_if_empty = false;
        }

        return $this;
    }

    /**
     * Bind the field to one autocomplete address field, when the meta box has several.
     */
    public function addressField(string $addressField): static
    {
        $this->address_field = $addressField;

        return $this;
    }
}
