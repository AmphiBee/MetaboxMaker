<?php
/**
 * Copyright (c) AmphiBee
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see https://github.com/AmphiBee/metabox-builder
 */

declare(strict_types=1);

namespace AmphiBee\MetaboxMaker\Transformer;

use AmphiBee\MetaboxMaker\Contract\Renderable;
use AmphiBee\MetaboxMaker\Fields\Tab;

/**
 * Trait for handling field transformations.
 */
trait FieldTransformer
{
    /**
     * Adds fields to the transformer.
     *
     * @param array $fields An array of fields to add.
     * @return static The transformed instance.
     */
    public function buildFieldset(array $fields): static
    {
        foreach ($fields as $field) {
            if ($field instanceof Tab) {
                $this->processTab($field);
            } elseif ($field instanceof Renderable) {
                $this->addField($field);
            }
        }

        return $this;
    }

    /**
     * Process a Tab object and its fields.
     *
     * @param Tab $tab The Tab object.
     */
    protected function processTab(Tab $tab): void
    {
        $tabData = $tab->build();
        $this->tabs[$tabData['id']] = $this->filterTabData($tabData);

        foreach ($tabData['fields'] as $subField) {
            if ($subField instanceof Renderable) {
                $this->addField($subField);
            }
        }
    }

    /**
     * Add a single Field to the fields array.
     *
     * @param Renderable $field The field to add.
     */
    protected function addField(Renderable $field): void
    {
        $this->fields[] = $field->build();
    }

    /**
     * Filter and format tab data.
     *
     * @param array $tabData Data from the Tab object.
     * @return array Filtered and formatted tab data.
     */
    protected function filterTabData(array $tabData): array
    {
        return EmptyValueFilter::filter([
            'label' => $tabData['name'],
            'icon' => $tabData['icon'] ?? null,
        ]);
    }
}
