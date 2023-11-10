<?php
Yii::setAlias('@common', dirname(__DIR__));
Yii::setAlias('@frontend', dirname(dirname(__DIR__)) . '/frontend');
Yii::setAlias('@backend', dirname(dirname(__DIR__)) . '/backend');
Yii::setAlias('@console', dirname(dirname(__DIR__)) . '/console');
Yii::setAlias('@api', dirname(dirname(__DIR__)) . '/api');

if (!function_exists('app')) {
    function app()
    {
        return Yii::$app;
    }
}

if (!function_exists('user')) {
    function user()
    {
        return Yii::$app->user;
    }
}

if (!function_exists('security')) {
    function security()
    {
        return Yii::$app->security;
    }
}
if (!function_exists('authManager')) {
    function authManager()
    {
        return Yii::$app->authManager;
    }
}

if (!function_exists('translate')) {
    function translate($text, $options = []): string
    {
        return Yii::t('app', $text, $options);
    }
}


if (!function_exists('request')) {
    function request()
    {
        return Yii::$app->request;
    }
}

if (!function_exists('response')) {
    function response()
    {
        return Yii::$app->response;
    }
}


if (!function_exists('setFlash')) {
    function setFlash($category = 'warning', $message = '')
    {
        Yii::$app->session->setFlash($category, $message);
    }
}



