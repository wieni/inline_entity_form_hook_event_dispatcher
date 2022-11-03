<?php

namespace Drupal\Tests\inline_entity_form_hook_event_dispatcher\Kernel\Form;

use Drupal\Core\Form\FormState;
use Drupal\core_event_dispatcher\Event\Form\AbstractFormEvent;
use Drupal\KernelTests\KernelTestBase;
use Drupal\Tests\hook_event_dispatcher\Kernel\ListenerTrait;

class InlineEntityFormEventTest extends KernelTestBase {

    use ListenerTrait;

    /**
     * {@inheritdoc}
     */
    protected static $modules = [
        'hook_event_dispatcher',
        'core_event_dispatcher',
        'inline_entity_form_hook_event_dispatcher',
        'inline_entity_form',
    ];

    /**
     * Test the hook form_base_inline_entity_form gets called
     * when
     *
     * @throws \Exception
     */
    public function testInlineEntityFormAlterEvent(): void {
        $this->listen('hook_event_dispatcher.form_base_inline_entity_form.alter', 'onInlineFormAlter', $this->once());

        $form = [
            'test' => 'form',
            'inline_entity_form' => [
                '#type' => 'inline_entity_form',
                'test' => 'inline_entity_form',
            ]
        ];

        $formState = new FormState();
        $formState->addBuildInfo('base_form_id', 'test_base_form');

        $this->container->get('module_handler')->alter('inline_entity_form_entity_form', $form, $formState);
        $this->assertEquals('test_inline_altered', $form['inline_entity_form']['test'], 'The inline entity form has not been altered');
    }

    public function onInlineFormAlter(AbstractFormEvent $event): void {
        $form = &$event->getForm();
        $form['inline_entity_form']['test'] = 'test_inline_altered';
    }

}
