<?php

/**
 * Error controller.
 *
 * Answers the addresses that match no route. It exists as a controller of its own
 * so that the front controller never has to build a page itself.
 */
class ErrorController extends Controller
{
    /**
     * Displays the 404 page.
     */
    public function notFound(): void
    {
        parent::notFound();
    }
}
