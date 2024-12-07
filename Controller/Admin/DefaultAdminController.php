<?php
namespace Skynettechnologies\AllinOneAccessibilityBundle\Controller\Admin;

use Ibexa\Core\Event\ContentService;
use Skynettechnologies\AllinOneAccessibilityBundle\Entity\AioaWidgetSetting;
use Skynettechnologies\AllinOneAccessibilityBundle\Repository\AioaWidgetSettingRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\User\UserInterface;

use Doctrine\DBAL\Connection;

class DefaultAdminController extends AbstractController
{
    private $repository;
    private $client;
    private $connection;

    public function __construct(AioaWidgetSettingRepository $repository,HttpClientInterface $client,Connection $connection)
    {
        $this->repository = $repository;
        $this->client = $client;
        $this->connection = $connection;
    }

    /**
     * @Route("/index/{page}", name="all_in_one_accessibility_bundle.index.admin", defaults={"page"=1})
     * @throws \Doctrine\DBAL\Driver\Exception
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     */
    public function adminAction($page, RequestStack $requestStack,Security $security,HttpClientInterface $client): Response
    {
        $user = $security->getUser();
        if (!$user instanceof UserInterface) {
            return $this->json(['status' => 'error', 'message' => 'No user is logged in.']);
        }
        $request = $requestStack->getCurrentRequest();
        $userLogin = method_exists($user, 'getUsername') ? $user->getUsername() : null;
        if (!$userLogin) {
            return $this->json(['status' => 'error', 'message' => 'User login not found.']);
        }
        $sql = 'SELECT login, email FROM ezuser WHERE login = :login';
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue('login', $userLogin);  // Use login instead of ID
        $stmt->execute();
        // Fetch the result
        $userData = $stmt->fetchAssociative();
        $username = $userData['login'];
        $email = $userData['email'];
        $domain = $request->getHttpHost();
        $base64Domain = base64_encode($domain); // Base64 encode the domain
        $message = '';
        $aioa_url = 'https://ada.skynettechnologies.us/api/get-autologin-link';
        $response = $client->request('POST', $aioa_url, [
            'json' => ['website' => $base64Domain], // Send base64-encoded domain
            'headers' => ['Content-Type' => 'application/json'],
        ]);
        $responseData = $response->toArray();
        $AutologinLink = $responseData;
            if (isset($AutologinLink['status']) && $AutologinLink['status'] == 0) {
                $package_type = "free-widget";
                $arr_details = [
                    'name' => $username, // Replace with dynamic values
                    'email' => $email, // Replace with dynamic values
                    'company_name' => '',
                    'website' => $base64Domain,
                    'package_type' => $package_type,
                    'start_date' => date('Y-m-d H:i:s'),
                    'end_date' => '',
                    'price' => '',
                    'discount_price' => '0',
                    'platform' => 'Ibexa',
                    'api_key' => '',
                    'is_trial_period' => '',
                    'is_free_widget' => '1',
                    'bill_address' => '',
                    'country' => '',
                    'state' => '',
                    'city' => '',
                    'post_code' => '',
                    'transaction_id' => '',
                    'subscr_id' => '',
                    'payment_source' => '',
                ];
                $addUserDomainUrl = 'https://ada.skynettechnologies.us/api/add-user-domain';
                // Send the second POST request to add the user domain
                $addUserDomainResponse = $client->request('POST', $addUserDomainUrl, [
                    'json' => $arr_details,
                    'headers' => ['Content-Type' => 'application/json'],
                ]);
                $addUserDomainData = $addUserDomainResponse->toArray(); // Decode response
                if (isset($addUserDomainData['status']) && $addUserDomainData['status'] === 0) {
                    $message = "User domain added successfully.";
                } else {
                    $message = "Failed to add user domain. Response:";
                }
                $autologinUrl = 'https://ada.skynettechnologies.us/api/get-autologin-link';
                $autologinResponse = $client->request('POST', $autologinUrl, [
                    'json' => ['website' => base64_encode($domain)],
                    'headers' => ['Content-Type' => 'application/json'],
                ]);
                $autologinData = $autologinResponse->toArray();
                if (isset($autologinData['status'])) {
                    $message = "Generated Autologin Link Successfully.";
                } else {
                    $message = "Failed to generated Autologin link:";
                }
                $widgetSettingsUrl = 'https://ada.skynettechnologies.us/api/widget-settings-platform';
                $widgetSettingsResponse = $client->request('POST', $widgetSettingsUrl, [
                    'json' => ['website_url' => $domain],
                    'headers' => ['Content-Type' => 'application/json'],
                ]);
                $widgetSettingsData = $widgetSettingsResponse->toArray();
                $widgetData = $widgetSettingsData;
                if (isset($widgetSettingsData['status'])) {
                    $message = "Widget Setting Saved Successfully.";
                } else {
                    $message = "Failed to save Widget setting:";
                }
            }else
                {
                    $message = "Failed to generate Autologin link for this domain.";
                }
            return $this->render('@SkynettechnologiesAllinOneAccessibilityBundle/admin/allinoneaccessibility.html.twig', [
                'domain' => $domain,
                'user_name' => $username,
                'email' => $email,
                'message' => $message,
                'id' => $widgetData['id'] ?? '',
                'color' => $widgetData['color'] ?? '#420083',
                'position' => $widgetData['position'] ?? 'bottom_right',
                'icon_type' => $widgetData['icon_type'] ?? 'aioa-icon-type-1',
                'icon_size' => $widgetData['icon_size'] ?? 'aioa-default-icon',
                'is_widget_custom_position' => $widgetData['is_widget_custom_position'] ?? 0,
                'widget_position_left' => $widgetData['widget_position_left'] ?? 0,
                'widget_position_top' => $widgetData['widget_position_top'] ?? 0,
                'widget_position_right' => $widgetData['widget_position_right'] ?? 0,
                'widget_position_bottom' => $widgetData['widget_position_bottom'] ?? 0,
                'widget_size' => $widgetData['widget_size'] ?? 0,
                'is_widget_custom_size' => $widgetData['is_widget_custom_size'] ?? 0,
                'widget_icon_size_custom' => $widgetData['widget_icon_size_custom'] ?? 20,
            ]);
    }
}


