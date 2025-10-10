<?php
namespace Selectrum;


use Exception;
use Selectrum\MyException;
use PHPFUI\ConstantContact\Client;
use PHPFUI\ConstantContact\Definition\ContactCreateOrUpdateInput;
use PHPFUI\ConstantContact\Definition\ContactPostRequest;
use PHPFUI\ConstantContact\Definition\EmailAddressPost;
use PHPFUI\ConstantContact\UUID;
use PHPFUI\ConstantContact\V3\Contacts\SignUpForm;


class ConstantContact
{
    private static ?self $instance = null;

    private function __clone()
    {
    }

    public function __wakeup()
    {
    }

    final private function __construct()
    {
        //add_action('admin_menu', [$this, 'admin_menu']);
        //add_action('admin_init', [$this, 'constant_contact_settings_init']);
        //add_action('admin_init', [$this, 'constant_contact_settings_form_handler']);
        add_action('init', [$this, 'constant_contact_auth_redirect']);
        add_action('init', [$this, 'constant_contact_auth_response_handler']);
        add_action('init', [$this, 'constant_contact_schedule_refresh_access_token']);
        add_action('refresh_constant_contact_access_token', [$this, 'refresh_constant_contact_access_token']);
        add_action('wp_ajax_newsletter_form', [$this, 'ajax_newsletter_form']);
        add_action('wp_ajax_nopriv_newsletter_form', [$this, 'ajax_newsletter_form']);
    }

    final public static function getInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    final public static function init(): void
    {
        self::getInstance();
    }
/*
    public function admin_menu(): void
    {
        // Add main menu page
        add_menu_page(
            'Constant Contact',           // Page title
            'Constant Contact',           // Menu title
            'manage_options',      // Capability required
            'constant-contact',           // Menu slug
            [$this, 'constant_contact_page'], // Function to display the page
            'dashicons-admin-generic', // Icon (optional)
            30                     // Position (optional)
        );
    }

    public function constant_contact_page(): void
    {
        ?>
        <div class="wrap">
            <h1>Constant Contact</h1>
            <p>Constant Contact integration settings and options.</p>

            <!-- Your form or content goes here -->
            <form method="post" action="">
                <?php
                settings_fields('constant_contact_settings');
                do_settings_sections('constant_contact_settings');
                ?>

                <table class="form-table">
                    <tr>
                        <th scope="row">Client ID</th>
                        <td>
                            <input type="text" name="cc_client_id" value="<?php echo esc_attr(get_option('cc_client_id')); ?>" class="regular-text" />
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Client Secret</th>
                        <td>
                            <input type="text" name="cc_client_secret" value="<?php echo esc_attr(get_option('cc_client_secret')); ?>" class="regular-text" />
                        </td>
                    </tr>
                </table>

                <?php submit_button(); ?>
            </form>
        </div>
        <?php
    }

    public function constant_contact_settings_form_handler(): void
    {
        if (isset($_POST['constant_contact_settings'])) {
            update_option('cc_client_id', $_POST['cc_client_id']);
            update_option('cc_client_secret', $_POST['cc_client_secret']);

            $client = new Client($_POST['cc_client_id'], $_POST['cc_client_secret'], menu_page_url('constant-contact', false));
            wp_redirect($client->getAuthorizationURL());
            exit();
        }
    }

    public function constant_contact_settings_init(): void
    {
        register_setting('constant_contact_settings', 'cc_api_key');
        register_setting('constant_contact_settings', 'cc_access_token');
    }
*/
    public function constant_contact_auth_redirect(): void {
        if ( !empty( $_GET['constant_contact_auth'] ) ) :
            $redirectURI = home_url();
            $client = new Client(CONSTANT_CONTACT_CLIENT_ID, CONSTANT_CONTACT_CLIENT_SECRET, $redirectURI);
            header('location: ' . $client->getAuthorizationURL());
            exit();
        endif;
    }

    public function constant_contact_auth_response_handler(): void {
        if ( !empty( $_GET['code'] ) && !empty( $_GET['state'] )) :
            $redirectURI = home_url();
            $client = new Client(CONSTANT_CONTACT_CLIENT_ID, CONSTANT_CONTACT_CLIENT_SECRET, $redirectURI);
            $client->acquireAccessToken($_GET);
            update_option( 'constant_contact_access_token', $client->accessToken );
            update_option( 'constant_contact_refresh_token', $client->refreshToken );
            wp_redirect( home_url() );
            exit();
        endif;
    }

    public function constant_contact_schedule_refresh_access_token(): void {
        if ( ! wp_next_scheduled( 'refresh_constant_contact_access_token' ) ) {
            wp_schedule_event( time(), 'twicedaily', 'refresh_constant_contact_access_token' );
        }
    }

    public function refresh_constant_contact_access_token(): void {
        $redirectURI = home_url();
        $client = new Client(CONSTANT_CONTACT_CLIENT_ID, CONSTANT_CONTACT_CLIENT_SECRET, $redirectURI);
        $client->accessToken = get_option('constant_contact_access_token');
        $client->refreshToken = get_option('constant_contact_refresh_token');
        $client->refreshToken();
        update_option( 'constant_contact_access_token', $client->accessToken );
        update_option( 'constant_contact_refresh_token', $client->refreshToken );
    }

    public function ajax_newsletter_form(): void {
        try {
            $email  = $_POST['email'] ?? '';

            if ( empty( $email ) ) {
                throw new MyException( __( 'Please enter your email.', 'selectrum' ) );
            }

            $redirectURI = home_url();
            $Client = new Client(CONSTANT_CONTACT_CLIENT_ID, CONSTANT_CONTACT_CLIENT_SECRET, $redirectURI);
            $Client->accessToken = get_option('constant_contact_access_token');
            $Client->refreshToken = get_option('constant_contact_refresh_token');
            $Contacts = new SignUpForm($Client);
            $response = $Contacts->post(new ContactCreateOrUpdateInput([
                'email_address' => $_POST['email'],
                'list_memberships' => [
                    new UUID( CONSTANT_CONTACT_LIST_ID )
                ],
            ]));

            if ( !in_array( $Client->getStatusCode(), [200,201] ) ) :
                error_log($Client->getLastError());
                throw new MyException();
            endif;

            $response['content'] = get_field('newsletter_thank_you_message', 'options') ?? __('You has been subscribed successfully. Thank you!', 'selectrum');
            wp_send_json_success($response);
        } catch ( Exception $e ) {
            wp_send_json_error(['content'=>$e->getMessage()]);
        }
    }
}