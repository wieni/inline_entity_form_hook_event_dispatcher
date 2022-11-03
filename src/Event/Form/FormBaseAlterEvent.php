<?php

namespace Drupal\inline_entity_form_hook_event_dispatcher\Event\Form;

use Drupal\Core\Form\FormStateInterface;
use Drupal\core_event_dispatcher\Event\Form\FormBaseAlterEvent as FormBaseAlterEventBase;

class FormBaseAlterEvent extends FormBaseAlterEventBase {

    private string $alteredBaseFormId;

    /**
     * @inheritDoc
     * @param string $baseFormId
     *   The base form id. If left empty build info will be used to fill this
     */
    public function __construct(
        array &$form,
        FormStateInterface $formState,
        string $formId,
        string $baseFormId,
    )
    {
        parent::__construct($form, $formState, $formId);
        $this->alteredBaseFormId = $baseFormId;
    }

    public function getBaseFormId(): string
    {
        return $this->alteredBaseFormId ?? parent::getBaseFormId();
    }

}
