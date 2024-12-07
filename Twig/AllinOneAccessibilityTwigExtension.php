<?php

namespace Skynettechnologies\AllinOneAccessibilityBundle\Twig;

use Doctrine\ORM\EntityManagerInterface;
use Skynettechnologies\AllinOneAccessibilityBundle\Repository\AioaWidgetSettingRepository;
use Twig\Extension\AbstractExtension;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Twig\TwigFilter;
use Twig\TwigFunction;

class AllinOneAccessibilityTwigExtension extends AbstractExtension
{
    private $entityManager;
    private $repository;
    public function __construct(EntityManagerInterface $entityManager, AioaWidgetSettingRepository $repository)
    {
        $this->entityManager = $entityManager;
        $this->repository = $repository;
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('show_accessibility_widget', [$this, 'renderAccessibilityWidget']),
        ];
    }

    public function renderAccessibilityWidget(): string
    {
        $setting = $this->repository->findOneBy([]);
        if (!$setting) {
            // Default settings if no data is found
            $color = '#420083';
            $position = 'bottom_right';
            $iconType = 'aioa-icon-type-2';
            $iconSize = 'aioa-default-icon';
        } else {
            // Fetch the values from the database
            $color = $setting->getColor();
            $position = $setting->getPosition();
            $iconType = $setting->getIconType();
            $iconSize = $setting->getIconSize();
        }
        return '<script>
                const scriptTag = document.createElement("script");
                scriptTag.id = "aioa-adawidget";
                scriptTag.src = "https://www.skynettechnologies.com/accessibility/js/all-in-one-accessibility-js-widget-minify.js?colorcode='. $color .'&token=&position=' . $position . '.' . $iconType . '.' . $iconSize . '";
                document.head.appendChild(scriptTag);
            </script>';
    }
}
