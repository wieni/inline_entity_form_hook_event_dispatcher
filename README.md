Description
-----------
This module dispatches events for inline entity form. This allows you to
use the Drupal Event Subscriber system instead of the outdated hook system to react
on this events.

If you want to see new events registered, open an issue in the issue queue and create a merge request. Hopefully, in the near future, we can add this submodule to the actual `drupal/hook_event_dispatcher` module.

Installation
------------
To install this module, do the following:

With composer:
1. ```composer require wieni/inline_entity_form_hook_event_dispatcher```

Manual installation:
1. Extract the tar ball that you downloaded.
2. Upload the entire directory and all its contents to your modules directory.

Examples
--------
You can find an example on how to use each Event in src/Example
