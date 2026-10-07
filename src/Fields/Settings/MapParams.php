<?php

declare(strict_types=1);

namespace Pollora\Metabox\Fields\Settings;

/**
 * Trait to handle attributes for map fields.
 */
trait MapParams
{
    /**
     * The IDs of the address fields, can be a single ID or multiple IDs separated by commas.
     */
    protected string $address_field;

    /**
     * Google Maps language code.
     */
    protected string $language;

    /**
     * Region code.
     */
    protected string $region;

    /**
     * Whether the marker can be dragged to change the location.
     */
    protected bool $marker_draggable;

    /**
     * Set the default location coordinates.
     *
     * @param  string  $location  Default location in 'latitude,longitude' format.
     */
    public function defaultLocation(string $location): static
    {
        $this->std = $location;

        return $this;
    }

    /**
     * Set the address field ID or IDs.
     *
     * @param  string  $address_field  The ID or comma-separated IDs of the address fields.
     */
    public function addressField(string $address_field): static
    {
        $this->address_field = $address_field;

        return $this;
    }

    /**
     * Set the Google Maps language.
     *
     * @param  string  $language  Maps language code.
     */
    public function language(string $language): static
    {
        $this->language = $language;

        return $this;
    }

    /**
     * Set the Google Maps region.
     *
     * @param  string  $region  Google Maps region code.
     */
    public function region(string $region): static
    {
        $this->region = $region;

        return $this;
    }

    /**
     * Set whether the marker can be dragged to change the location. Defaults to true.
     */
    public function markerDraggable(bool $draggable = true): static
    {
        $this->marker_draggable = $draggable;

        return $this;
    }
}
