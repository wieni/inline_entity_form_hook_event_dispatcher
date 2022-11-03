<?php

namespace Drupal\inline_entity_form_hook_event_dispatcher;

use Drupal\hook_event_dispatcher\HookEventDispatcherInterface;


/**
 * Defines events for inline entity form hooks.
 */
final class InlineEntityFormHookEvents {

    /**
     * Perform alterations before an inline entity form is rendered.
     *
     * @Event
     *
     * @see \Drupal\inline_entity_form_hook_event_dispatcher\Event\Form\FormBaseAlterEvent
     * @see inline_entity_form_hook_event_dispatcher_inline_entity_form_entity_form_alter()
     * @see hook_inline_entity_form_entity_form_alter()
     *
     * @var string
     */
    public const FORM_ALTER = HookEventDispatcherInterface::PREFIX . 'form_base_inline_entity_form.alter';

}
