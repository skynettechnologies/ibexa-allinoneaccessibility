# All in One Accessibility®: Ibexa Extension

All in One Accessibility AI free Widget Supports limited 23 features only and includes 140 Languages.

It improves website ADA compliance and browser experience for ADA, WCAG 2.0, 2.1 & 2.2, Section 508, California Unruh Act, Australian DDA, European EAA EN 301 549, UK Equality Act (EA), Israeli Standard 5568, Ontario AODA, Canada ACA, German BITV, France RGAA, Brazilian Inclusion Law (LBI 13.146/2015), Spain UNE 139803:2012, JIS X 8341 (Japan), Italian Stanca Act and Switzerland DDA Standards.

Follows the best industry security, SEO practices and standards ISO 9001:2015 & ISO 27001:2013 and complies with GDPR, COPPA regulations. Member of W3C and International Association of Accessibility Professionals (IAAP). It is a flexible & lightweight widget that can be changed according to law and reduces the risk of time-consuming accessibility lawsuits.

For more details/features, Please visit [All in One Accessibility®](https://www.skynettechnologies.com/all-in-one-accessibility)

Unlock over 70 features with the All in One Accessibility Widget through a paid subscription. See the detailed comparison of Paid vs. Free features [here](https://www.skynettechnologies.com/all-in-one-accessibility/features).

We provide a 10-day free trial. Get started [here](https://ada.skynettechnologies.us/trial-subscription?utm_source=all-in-one-accessibility&utm_medium=landing-page&utm_campaign=trial-subscription).

### Supported Languages (140+ Languages):

English (USA), English (UK), English (Australian), English (Canadian), English (South Africa), Español, Español (Mexicano), Deutsch, عربى, Português, Português (Brazil), 日本語, Français, Italiano, Polski, Pусский, 中文, 中文 (Traditional), עִברִית, Magyar, Slovenčina, Suomenkieli, Türkçe, Ελληνικά, Latinus, Български, Català, Čeština, Dansk, Nederlands, हिंदी, Bahasa Indonesia, 한국인, Lietuvių, Bahasa Melayu, Norsk, Română, Slovenščina, Svenska, แบบไทย, Українська, Việt Nam, বাঙালি, සිංහල, አማርኛ, Hmoob, မြန်မာ, Eesti keel, latviešu, Cрпски, Hrvatski, ქართული, ʻŌlelo Hawaiʻi, Cymraeg, Cebuano, Samoa, Kreyòl ayisyen, Føroyskt, Crnogorski, Azerbaijani, Euskara, Tagalog, Galego, Norsk Bokmål, فارسی, ਪੰਜਾਬੀ, shqiptare, Hայերեն, অসমীয়া, Aymara, Bamanankan, беларускі, bosanski, Corsu, ދިވެހި, Esperanto, Eʋegbe, Frisian, guarani, ગુજરાતી, Hausa, íslenskur, Igbo, Gaeilge, basa jawa, ಕನ್ನಡ, қазақ, ខ្មែរ, Kinyarwanda, Kurdî, Кыргызча, ພາສາລາວ, Lingala, Luganda, lëtzebuergesch, македонски, Malagasy, മലയാളം, Malti, Maori, मराठी, Монгол, नेपाली, Sea, ଓଡିଆ, Afaan Oromoo, پښتو, Runasimi, संस्कृत, Gàidhlig na h-Alba, Sesotho, Shona, سنڌي, Soomaali, basa Sunda, kiswahili, тоҷикӣ, தமிழ், Татар, తెలుగు, ትግሪኛ, Tsonga, Türkmenler, Ride, اردو, ئۇيغۇر, o'zbek, isiXhosa, יידיש, Yoruba, Zulu, भोजपुरी, डोगरी, कोंकणी, Kurdî, Krio, मैथिली, Meiteilon, Mizo tawng, Sepedi, Ilocano.

## Requirements

- Symfony v5.0 or later (including Symfony 6.0)

## Installation

### Prerequisites

- Ibexa version ^4.6

### Steps

1. Run `composer require skynettechnologies/allinoneaccessibility-bundle`

2. Enable the plugin in bundles.php

```php
<?php
// config/bundles.php

return [
    // ...
    Skynettechnologies\AllinOneAccessibilityBundle\SkynettechnologiesAllinOneAccessibilityBundle::class => ['all' => true],
];
```

3. Import the package configurations and routes

```yml
# config/routes.yaml
    all_in_one_accessibility_bundle:
      resource: '@SkynettechnologiesAllinOneAccessibilityBundle/Resources/config/routes.yaml'
      type: yaml

# config/services.yaml
    Skynettechnologies\AllinOneAccessibilityBundle\Repository\AioaWidgetSettingRepository: ~
    # Register the DefaultAdminController and inject the necessary service
    Skynettechnologies\AllinOneAccessibilityBundle\Controller\Admin\DefaultAdminController:
        arguments:
            $repository: '@Skynettechnologies\AllinOneAccessibilityBundle\Repository\AioaWidgetSettingRepository'
    # Register the menu listener
    Skynettechnologies\AllinOneAccessibilityBundle\Menu\MyMenuListener:
        tags:
            - { name: kernel.event_subscriber }
    # Register the custom Twig extension for accessibility settings
    Skynettechnologies\AllinOneAccessibilityBundle\Twig\AllinOneAccessibilityTwigExtension:
        tags: [ 'twig.extension' ]
        
# config/twig.yaml
    # Register paths for custom bundles
    paths:
        '%kernel.project_dir%/Skynettechnologies/AllinOneAccessibilityBundle/Resources/views': SkynettechnologiesAllinOneAccessibilityBundle
```

4. Finish the installation updating the database schema and installing assets

```
php bin/console doctrine:schema:update --force
php bin/console assets:install
php bin/console cache:clear
```

5. Build and run the package using below command
```
symfony server:start
```
## Configuration

1. Go to **Settings** > **System information** > **Composer**.
2. Here you see the Package is **skynettechnologies/allinoneaccessibility-bundle** installed.
3. Now, To configure Click **All in One Accessibility** on the Left Bottom Menu:
    - Adjust the widget settings as per your requirements.
4. Click **Save** to apply your changes.

## Usage

Insert the following `{{ show_accessibility_widget() | raw }}` helper somewhere in your footer template before the body ending tag.

## Configuration

To configure the widget, access the Admin Panel and head to the All in One Accessibility menu in the dashboard. From there, you can register [here](https://ada.skynettechnologies.us/trial-subscription) with 10 Days free trial.

## Screenshots

![App Screenshot](https://www.skynettechnologies.com/sites/default/files/screenshot-1-free.jpg?v=2)

![App Screenshot](https://www.skynettechnologies.com/sites/default/files/screenshot-2-free.jpg?v=2)

![App Screenshot](https://www.skynettechnologies.com/sites/default/files/screenshot-3-free.jpg?v=2)

![App Screenshot](https://www.skynettechnologies.com/sites/default/files/screenshot-4-free.jpg?v=2)


## Video

[![All in One Accessibility](https://img.youtube.com/vi/I-DjgZyleeI/0.jpg)](https://www.youtube.com/watch?v=I-DjgZyleeI)

## Documentation

- [All in One Accessibility - Features Guide](https://www.skynettechnologies.com/sites/default/files/accessibility-widget-features-list.pdf)

## Submit a Support Request

Please visit our [support page](https://www.skynettechnologies.com/report-accessibility-problem) and fill out the form. Our team will get back to you as soon as possible.

## Send Us an Email

Alternatively, you can send an email to our support team:
[hello@skynettechnologies.com](mailto:hello@skynettechnologies.com)

## Partnership Opportunities

#### [Agency Partnership](https://www.skynettechnologies.com/agency-partners)

Partner with us as an agency to provide comprehensive accessibility solutions to your clients. Get access to exclusive resources, training, and support to help you implement and manage accessibility features effectively.

#### [Affiliate Partnership](https://www.skynettechnologies.com/affiliate-partner)

Join our affiliate program and earn commissions by promoting All in One Accessibility™. Share our Widget with your network and help businesses improve their website accessibility while generating revenue.

For more details, Please visit [Partnership Opportunities Page](https://www.skynettechnologies.com/partner-program)

## Credits

This addon is developed and maintained by [Skynet Technologies USA LLC](https://www.skynettechnologies.com)

## Current Maintainers
- [Skynet Technologies USA LLC](https://github.com/skynettechnologies)
