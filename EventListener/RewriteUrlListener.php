<?php

namespace UrlRemoveAccent\EventListener;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Thelia\Core\Event\GenerateRewrittenUrlEvent;
use Thelia\Core\Event\TheliaEvents;
use Thelia\Model\RewritingUrl;
use UrlRemoveAccent\UrlRemoveAccent;

class RewriteUrlListener implements EventSubscriberInterface
{
    public function removeAccentInGeneratedUrl(GenerateRewrittenUrlEvent $event)
    {
        $title = $event->getObject()->getTitle();

        if (null == $title) {
            throw new \RuntimeException('Impossible to create an url if title is null');
        }

        $cleanTitle = UrlRemoveAccent::removeSpecialCharsString($title);
        $url = $cleanTitle;

        $url = UrlRemoveAccent::unifyUrl($url, $event->getObject()->getId());

        if (!empty($url)) {
            $rewritingUrl = new RewritingUrl();
            $rewritingUrl->setUrl($url)
                ->setView($event->getObject()->getRewrittenUrlViewName())
                ->setViewId($event->getObject()->getId())
                ->setViewLocale($event->getLocale())
                ->save();

            $event->setUrl($url);
        }
    }

    public static function getSubscribedEvents()
    {
        return [
            TheliaEvents::GENERATE_REWRITTENURL => ['removeAccentInGeneratedUrl', 64]
        ];
    }
}
