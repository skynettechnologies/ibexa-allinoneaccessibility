<?php

namespace Skynettechnologies\AllinOneAccessibilityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Skynettechnologies\AllinOneAccessibilityBundle\Repository\AioaWidgetSettingRepository")
 * @ORM\Table(name="aioa_widget_setting")
 */

class AioaWidgetSetting
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */

    /**
     * @ORM\Column(type="string", length=7)
     */
    private $color;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $position;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $iconType;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $iconSize;

    /**
     * @ORM\Column(type="boolean")
     */
    private $is_widget_custom_position;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $widget_position_left;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $widget_position_top;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $widget_position_right;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $widget_position_bottom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $widget_size;

    /**
     * @ORM\Column(type="boolean")
     */
    private $is_widget_custom_size;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $widget_icon_size_custom;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $domain;

    // Getters and setters for the properties

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(string $color): self
    {
        $this->color = $color;
        return $this;
    }

    public function getPosition(): ?string
    {
        return $this->position;
    }

    public function setPosition(string $position): self
    {
        $this->position = $position;
        return $this;
    }

    public function getIconType(): ?string
    {
        return $this->iconType;
    }

    public function setIconType(string $iconType): self
    {
        $this->iconType = $iconType;
        return $this;
    }

    public function getIconSize(): ?string
    {
        return $this->iconSize;
    }

    public function setIconSize(string $iconSize): self
    {
        $this->iconSize = $iconSize;
        return $this;
    }
    public function getIsWidgetCustomPosition(): ?bool
    {
        return $this->is_widget_custom_position;
    }

    public function setIsWidgetCustomPosition(bool $is_widget_custom_position): self
    {
        $this->is_widget_custom_position = $is_widget_custom_position;
        return $this;
    }

    public function getWidgetPositionLeft(): ?string
    {
        return $this->widget_position_left;
    }

    public function setWidgetPositionLeft(?string $widget_position_left): self
    {
        $this->widget_position_left = $widget_position_left;
        return $this;
    }

    public function getWidgetPositionTop(): ?string
    {
        return $this->widget_position_top;
    }

    public function setWidgetPositionTop(?string $widget_position_top): self
    {
        $this->widget_position_top = $widget_position_top;
        return $this;
    }

    public function getWidgetPositionRight(): ?string
    {
        return $this->widget_position_right;
    }

    public function setWidgetPositionRight(?string $widget_position_right): self
    {
        $this->widget_position_right = $widget_position_right;
        return $this;
    }

    public function getWidgetPositionBottom(): ?string
    {
        return $this->widget_position_bottom;
    }

    public function setWidgetPositionBottom(?string $widget_position_bottom): self
    {
        $this->widget_position_bottom = $widget_position_bottom;
        return $this;
    }

    public function getWidgetSize(): ?string
    {
        return $this->widget_size;
    }

    public function setWidgetSize(?string $widget_size): self
    {
        $this->widget_size = $widget_size;
        return $this;
    }

    public function getIsWidgetCustomSize(): ?bool
    {
        return $this->is_widget_custom_size;
    }

    public function setIsWidgetCustomSize(bool $is_widget_custom_size): self
    {
        $this->is_widget_custom_size = $is_widget_custom_size;
        return $this;
    }

    public function getWidgetIconSizeCustom(): ?int
    {
        return $this->widget_icon_size_custom;
    }

// Setter
    public function setWidgetIconSizeCustom(?int $widget_icon_size_custom): self
    {
        $this->widget_icon_size_custom = $widget_icon_size_custom;
        return $this;
    }

    public function getDomain(): ?string
    {
        return $this->domain;
    }

    public function setDomain(?string $domain): self
    {
        $this->domain = $domain;
        return $this;
    }
}
