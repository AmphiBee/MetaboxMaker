<?php

declare(strict_types=1);

namespace Pollora\Metabox;

use Exception;
use Pollora\Metabox\Contract\Renderable;
use Pollora\Metabox\Enums\BoxStyle;
use Pollora\Metabox\Enums\Context;
use Pollora\Metabox\Enums\Priority;
use Pollora\Metabox\Enums\TabStyle;
use Pollora\Metabox\Enums\ToggleType;
use Pollora\Metabox\Fields\Field;
use Pollora\Metabox\Fields\Settings\ConditionalLogic;
use Pollora\Metabox\Rules\Rule;
use Pollora\Metabox\Rules\RuleGroup;
use Pollora\Metabox\Transformer\EmptyValueFilter;
use Pollora\Metabox\Transformer\FieldTransformer;
use Pollora\Metabox\Validation\OptionValidation;

/**
 * Fieldset class for creating a field groups.
 *
 * @phpstan-consistent-constructor
 */
class Metabox implements Renderable
{
    use ConditionalLogic;
    use FieldTransformer;

    /**
     * The context of the fieldset.
     */
    protected string $context;

    /**
     * The fields within the fieldset.
     */
    protected array $fields = [];

    /**
     * The tabs within the fieldset.
     */
    protected array $tabs = [];

    /**
     * The location of the fieldset.
     */
    protected ?Location $location = null;

    /**
     * The priority of the fieldset.
     */
    protected string|Priority|null $priority = null;

    /**
     * The style of the fieldset.
     */
    protected string $style;

    /**
     * Whether the fieldset is initially closed.
     */
    protected bool $closed;

    /**
     * Whether the fieldset is initially hidden.
     */
    protected bool $default_hidden;

    /**
     * Whether the fieldset autosaves its content.
     */
    protected bool $autosave;

    /**
     * Whether the fieldset opens a media modal when clicked.
     */
    protected bool $media_modal;

    /**
     * The class of the fieldset.
     */
    protected ?string $class = null;

    /**
     * The description of the fieldset.
     */
    protected string $description;

    /**
     * The type of the metabox.
     */
    protected string $type;

    /**
     * The style of the tabs.
     */
    protected string $tab_style;

    /**
     * Whether the meta box wrapper is displayed around the tabs.
     */
    protected bool $tab_wrapper;

    /**
     * The ID of the tab active by default.
     */
    protected string $tab_default_active;

    /**
     * Whether the last active tab is remembered.
     */
    protected bool $tab_remember;

    /**
     * The validation rules and messages, keyed by input name.
     */
    protected array $validation;

    /**
     * Whether the field values are tracked in post revisions (MB Revision).
     */
    protected bool $revision;

    /**
     * Where the field values are stored, e.g. custom_table.
     */
    protected string $storage_type;

    /**
     * The custom table storing the field values (MB Custom Table).
     */
    protected string $table;

    /**
     * How conditional logic shows and hides elements.
     */
    protected string $toggle_type;

    /**
     * The rules registering the meta box (MB Include Exclude).
     */
    protected array $include;

    /**
     * The rules not registering the meta box (MB Include Exclude).
     */
    protected array $exclude;

    /**
     * The rules displaying the meta box (MB Show Hide).
     */
    protected array $show;

    /**
     * The rules hiding the meta box (MB Show Hide).
     */
    protected array $hide;

    /**
     * The custom settings for the metabox.
     */
    protected array $settings = [];

    /**
     * Construct a new Fieldset instance.
     *
     * @param  string  $title  The title of the fieldset.
     * @param  string  $id  The unique identifier of the fieldset.
     */
    public function __construct(protected string $id, protected string $title)
    {
        if (! function_exists('add_filter')) {
            throw new Exception('Metabox Maker requires WordPress to be loaded.');
        }

        if (! doing_filter('rwmb_meta_boxes')) {
            add_filter('rwmb_meta_boxes', function ($meta_boxes) {
                $meta_boxes[] = $this->build();

                return $meta_boxes;
            });
        }
    }

    /**
     * Create a new Fieldset instance with default values.
     *
     * @param  mixed  ...$args  Required arguments (title, id)
     */
    public static function make(mixed ...$args): static
    {
        [$title, $id] = $args;

        return new static($id, $title);
    }

    /**
     * Set the context of the fieldset.
     *
     * @param  string  $context  The context of the fieldset.
     */
    public function context(string $context): static
    {
        $this->context = OptionValidation::check($context, Context::class);

        return $this;
    }

    /**
     * Add fields to the fieldset.
     *
     * @param  array<Field>  $fields  The fields to add.
     */
    public function fields(array $fields): static
    {
        $this->buildFieldset($fields);

        return $this;
    }

    /**
     * Set the tabs of the fieldset.
     *
     * @param  array  $tabs  The tabs of the fieldset.
     */
    public function tabs(array $tabs): static
    {
        $this->tabs = $tabs;

        return $this;
    }

    /**
     * Set the priority of the fieldset.
     *
     * @param  string|Priority  $priority  The priority of the fieldset.
     */
    public function priority(string|Priority $priority): static
    {
        $this->priority = OptionValidation::check($priority, Priority::class);

        return $this;
    }

    /**
     * Set the location of the fieldset.
     *
     * @param  Location  $location  The location of the fieldset.
     */
    public function location(Location $location): static
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Set the style of the fieldset.
     *
     * @param  string|BoxStyle  $style  The style of the fieldset.
     */
    public function style(string|BoxStyle $style): static
    {
        $this->style = OptionValidation::check($style, BoxStyle::class);

        return $this;
    }

    /**
     * Set whether the fieldset is initially closed.
     *
     * @param  bool  $closed  Whether the fieldset is initially closed.
     */
    public function closed(bool $closed): static
    {
        $this->closed = $closed;

        return $this;
    }

    /**
     * Set whether the fieldset is initially hidden.
     *
     * @param  bool  $defaultHidden  Whether the fieldset is initially hidden.
     */
    public function defaultHidden(bool $defaultHidden): static
    {
        $this->default_hidden = $defaultHidden;

        return $this;
    }

    /**
     * Set whether the fieldset autosaves its content.
     *
     * @param  bool  $autosave  Whether the fieldset autosaves its content.
     */
    public function autosave(bool $autosave): static
    {
        $this->autosave = $autosave;

        return $this;
    }

    /**
     * Set whether the fieldset opens a media modal when clicked.
     *
     * @param  bool  $mediaModal  Whether the fieldset opens a media modal when clicked.
     */
    public function mediaModal(bool $mediaModal): static
    {
        $this->media_modal = $mediaModal;

        return $this;
    }

    /**
     * Set the class of the fieldset.
     *
     * @param  string|null  $class  The class of the fieldset.
     */
    public function class(?string $class): static
    {
        $this->class = $class;

        return $this;
    }

    /**
     * Set the description of the fieldset.
     *
     * @param  string  $description  The description of the fieldset.
     */
    public function description(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Set the type of the fieldset.
     *
     * @param  string  $type  The type of the fieldset.
     */
    public function type(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Set the style of the tabs.
     */
    public function tabStyle(string|TabStyle $style): static
    {
        $this->tab_style = OptionValidation::check($style, TabStyle::class);

        return $this;
    }

    /**
     * Set whether the meta box wrapper is displayed around the tabs.
     */
    public function tabWrapper(bool $wrapper = true): static
    {
        $this->tab_wrapper = $wrapper;

        return $this;
    }

    /**
     * Set the ID of the tab active by default.
     */
    public function tabDefaultActive(string $tabId): static
    {
        $this->tab_default_active = $tabId;

        return $this;
    }

    /**
     * Remember the last active tab when saving.
     */
    public function tabRemember(bool $remember = true): static
    {
        $this->tab_remember = $remember;

        return $this;
    }

    /**
     * Set the validation rules (jQuery Validation) and their error messages.
     *
     * Rules and messages are keyed by input name: usually the field ID, but e.g.
     * 'my_taxonomy[]' for a checkbox list or '_file_my_files[]' for file fields.
     *
     * @param  array  $rules  e.g. ['email' => ['required' => true, 'minlength' => 7]]
     * @param  array  $messages  e.g. ['email' => ['required' => 'Email is required']]
     */
    public function validation(array $rules, array $messages = []): static
    {
        $this->validation = array_filter(['rules' => $rules, 'messages' => $messages]);

        return $this;
    }

    /**
     * Track the field values in post revisions (MB Revision).
     */
    public function revision(bool $revision = true): static
    {
        $this->revision = $revision;

        return $this;
    }

    /**
     * Set where the field values are stored, e.g. custom_table, or post_meta for blocks.
     */
    public function storageType(string $storageType): static
    {
        $this->storage_type = $storageType;

        return $this;
    }

    /**
     * Store the field values in a custom table (MB Custom Table).
     */
    public function customTable(string $table): static
    {
        $this->storage_type = 'custom_table';
        $this->table = $table;

        return $this;
    }

    /**
     * Set how conditional logic shows and hides the fields of the metabox.
     */
    public function toggleType(string|ToggleType $toggleType): static
    {
        $this->toggle_type = OptionValidation::check($toggleType, ToggleType::class);

        return $this;
    }

    /**
     * Only register the meta box when the rule matches, e.g. Rule::template('landing.php'),
     * evaluated when the edit screen loads (MB Include Exclude).
     */
    public function include(Rule|RuleGroup $rule): static
    {
        $this->include = $this->buildRules($rule, 'include');

        return $this;
    }

    /**
     * Do not register the meta box when the rule matches (MB Include Exclude).
     */
    public function exclude(Rule|RuleGroup $rule): static
    {
        $this->exclude = $this->buildRules($rule, 'exclude');

        return $this;
    }

    /**
     * Display the meta box when the rule matches, updated live while editing,
     * e.g. when the page template changes (MB Show Hide).
     */
    public function show(Rule|RuleGroup $rule): static
    {
        $this->show = $this->buildRules($rule, 'show');

        return $this;
    }

    /**
     * Hide the meta box when the rule matches, updated live while editing (MB Show Hide).
     */
    public function hide(Rule|RuleGroup $rule): static
    {
        $this->hide = $this->buildRules($rule, 'hide');

        return $this;
    }

    /**
     * Set a custom setting for the metabox.
     *
     * @param  string  $key  The setting key.
     * @param  mixed  $value  The setting value.
     */
    public function setting(string $key, mixed $value): static
    {
        $this->settings[$key] = $value;

        return $this;
    }

    /**
     * Get the custom settings for the metabox.
     *
     * @return array The custom settings.
     */
    public function getSettings(): array
    {
        return $this->settings;
    }

    /**
     * Build the fieldset and return its settings.
     *
     * @return array The settings of the fieldset.
     */
    public function build(): array
    {
        if (! $this->location) {
            $this->location = Location::default();
        }

        $metaboxData = EmptyValueFilter::filter(get_object_vars($this));

        // Remove the settings array and location from the metabox data
        unset($metaboxData['settings'], $metaboxData['location']);

        // Merge custom settings if they exist
        if (! empty($this->settings)) {
            $metaboxData = array_merge($metaboxData, $this->settings);
        }

        return $metaboxData + $this->location->get();
    }

    /**
     * Convert a rule or a group of rules to the Meta Box settings.
     */
    protected function buildRules(Rule|RuleGroup $rule, string $method): array
    {
        return ($rule instanceof Rule ? Rule::all($rule) : $rule)->toArray($method);
    }
}
