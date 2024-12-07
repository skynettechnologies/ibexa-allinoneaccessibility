<?php

declare(strict_types=1);

namespace Skynettechnologies\AllinOneAccessibilityBundle\Menu;

use Knp\Menu\ItemInterface;
use EzSystems\EzPlatformAdminUi\Menu\Event\ConfigureMenuEvent;
use EzSystems\EzPlatformAdminUi\Menu\MainMenuBuilder;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Asset\Packages;


class MyMenuListener implements EventSubscriberInterface
{

    public static function getSubscribedEvents(): array
    {
        return [
            ConfigureMenuEvent::MAIN_MENU => ['onMenuConfigure', 0],
        ];
    }
    public function onMenuConfigure(ConfigureMenuEvent $event)
    {
        $menu = $event->getMenu();
        $factory = $event->getFactory();
        $menu->addChild(
            'All in One Accessibility®',
            [
                'route' => 'all_in_one_accessibility_bundle.index.admin',
                'label' => 'All in One Accessibility®',
                'uri' => '/admin/allinoneaccessibility/',
                'extras' => [
                    'icon_path' => '/bundles/skynettechnologiesallinoneaccessibility/assets/images/icons/accessibility.svg#accessibility',
                ],
            ]
        );
    }
}
