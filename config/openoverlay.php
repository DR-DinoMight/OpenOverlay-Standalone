<?php

return [
    'route_prefix' => null,

    'service' => [
        'twitch' => [

            /**
             * Define which scopes should be grant while connection a twitch user
             * Available scopes: https://dev.twitch.tv/docs/authentication/#scopes
             */
            'scopes' => [
                'user:read:email', 'user:read:broadcast',
                'channel:read:subscriptions', 'channel:read:subscriptions',
                'bits:read',
            ],

            /**
             * OpenOverlay automatically transfer twitch users data into the database
             * Here you can enable and disable different data endpoints
             */
            'save' => [
                'follower' => true,
                'subscriber' => true,
            ],
        ],
    ],

    'webhook' => [
        'twitch' => [

            /**
             * The App Token is used to communicate with the Twitch EventSub Api
             * If you need to generate a new "app_token.token", you need to set "regenerate" to true
             */
            'app_token' => [
                'token' => env('OVERLAY_TWITCH_APP_TOKEN'),
                'regenerate' => true,
            ],

            /**
             * Your personal and unique secret is used to validate a twitch callback
             * If you change your secret all previous configures webhook callbacks will be end as invalid
             */
            'secret' => env('OVERLAY_SECRET'),

            /**
             * You can subscribe different endpoints/changes on twitch side.
             * Available endpoints: https://dev.twitch.tv/docs/eventsub/eventsub-subscription-types#channelupdate
             */
            'subscribe' => [
                'stream.online', 'stream.offline',
                'channel.update', 'channel.follow',
                'channel.subscribe', 'channel.cheer',
            ],
        ],
    ],
];
