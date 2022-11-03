<?php

namespace Drupal\inline_entity_form_hook_event_dispatcher\Example;

use Drupal\core_event_dispatcher\Event\Form\AbstractFormEvent;
use Drupal\inline_entity_form_hook_event_dispatcher\InlineEntityFormHookEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class ExampleInlineEntityFormEventSubscribers implements EventSubscriberInterface {

    public static function getSubscribedEvents(): array
    {
        return [
            InlineEntityFormHookEvents::FORM_ALTER => 'inlineFormAlter',
        ];
    }

    public function inlineFormAlter(AbstractFormEvent $event): void
    {
        $form = &$event->getForm();

        /**
         * Here you get the same form state as the one you get from an alter trigger on
         * the parent.
         */
        $formState = $event->getFormState();
        $parentEntity = $formState->getFormObject()->getEntity();
        $inlineEntity = $form['#entity'];

        $form['field_example']['#states'] = [
            'visible' => [
                ':input[name="field_other_example[0][inline_entity_form][field_example_3]"]' => ['value' => 'example'],
            ],
        ];
    }

}
