<?php

namespace Drupal\h5p_x_frame_options\EventSubscriber;

use Drupal\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\KernelEvents;

/**
 * Class H5PXFrameOptionsSubscriber.
 */
class H5PXFrameOptionsSubscriber implements EventSubscriberInterface {


  /**
   * Constructs a new H5PXFrameOptionsSubscriber object.
   */
  public function __construct() {

  }

  /**
   * {@inheritdoc}
   */
  static function getSubscribedEvents() {
    $events[KernelEvents::RESPONSE][] = ['onKernelResponse', -10];

    return $events;
  }

  /**
   * This method is called whenever the RESPONSE event is
   * dispatched.
   *
   * @param Event $event
   */
  public function onKernelResponse(Event $event) {
    $request = $event->getRequest();
    $path = $request->getPathInfo();

    if (preg_match('/^\/h5p\/\d+\/embed\/?$/', $path)) {
      $response = $event->getResponse();

      if ($response->headers->has('X-Frame-Options')) {
        $response->headers->set('X-Frame-Options', 'ALLOW-FROM *');
      }
    }
  }

}
