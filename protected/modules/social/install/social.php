<?php
return array(
    'module' => array(
        'class' => 'application.modules.social.SocialModule',
    ),
    'import' => array(
        'application.modules.social.components.*',
        'application.modules.social.components.services.*',
        'application.modules.social.models.*',
        'application.modules.social.extensions.eauth.services.*',
        'application.modules.social.extensions.eauth.*',
        'application.modules.social.extensions.eoauth.lib.*',
        'application.modules.social.extensions.eoauth.*'
    ),
    'component' => array(
        'eauth' => array(
            'class' => 'application.modules.social.extensions.eauth.EAuth',
            'popup' => false,
            'services' => array(
                'google' => array(
                    'class' => 'application\modules\social\components\services\Google',
                    'requiredAttributes' => array(
                        'email' => array('email', 'contact/email'),
                    ),
                ),
                'twitter' => array(
                    // register your app here: https://dev.twitter.com/apps/new
                    'class' => 'application\modules\social\components\services\Twitter',
                    'key' => '',
                    'secret' => '',
                ),

                'facebook' => array(
                    // register your app here: https://developers.facebook.com/apps/
                    'class' => 'application\modules\social\components\services\Facebook',
                    'client_id' => '',
                    'client_secret' => '',
                    'scope' => 'email',
                ),

                'vkontakte' => array(
                    // register your app here: https://vk.com/editapp?act=create&site=1
                    'class' => 'application\modules\social\components\services\VKontakte',
                    'client_id' => '',
                    'client_secret' => '',
                    'title' => 'VKontakte',
                ),
            ),
        ),
        'loid' => array(
            'class' => 'application.modules.social.extensions.lightopenid.loid',
        ),
    ),
    'rules' => array(
        '/social/login/service/<service:(google|facebook|vkontakte|twitter)>' => 'social/user/login',
        '/social/connect/service/<service:(google|facebook|vkontakte|twitter)>' => 'social/user/connect',
        '/social/register/service/<service:(google|facebook|vkontakte|twitter)>' => 'social/user/register',
    ),
);