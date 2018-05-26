<?php

namespace Notus\Modules\Message;

class MessageController
{
    static private $bundle = [
        'error' => [
            /*0 => [
                'message' => 'Text goes here',
                'target' => 'Targeted id goes here' // Optional, Default head
            ]*/
        ],
        'warning' => [],
        'info' => [],
    ];

    public static function addErrorMessage(array $messageData) {
        self::addMessage($messageData, 'error');
    }

    public static function addWarningMessage(array $messageData) {
        self::addMessage($messageData, 'warning');
    }

    public static function addInfoMessage(array $messageData) {
        self::addMessage($messageData, 'info');
    }

    public static function addSuccessMessage(array $messageData) {
        self::addMessage($messageData, 'success');
    }

    public static function conditionalMessage(bool $condition, array $infoMessageData, array $errorMessageData) {
        if ($condition) {
            self::addSuccessMessage($infoMessageData);
        } else {
            self::addErrorMessage($errorMessageData);
        }
    }

    private static function addMessage(array $messageData, string $type) {
        self::$bundle[$type] = $messageData;
    }

    public static function getBundlesOutput() : void {
        if (isset($_GLOBALS['MESSAGES'])) {
            //foreach ($_GLOBALS['MESSAGES'] as $messageData) {
              //  \var_dump($messageData);
                //TODO: Add div output as
            //}
            echo self::renderMessages($_GLOBALS['MESSAGES']);
            self::clearBundle();
        }
    }

    private static function renderMessages($messages) : string {
        $templatePath = self::getPathToTemplate();
        $output = Twig\render($templatePath, $messages);
        return $output;
    }

    //Returns message/[].twig or message/id/[].twig
    private static function getPathToTemplate() : string {
        return Notus\Modules\Twig\TwigUtil::getRenderTemplate("message", NULL, "message");
    }

    public static function saveBundle() {
        $_GLOBALS['MESSAGES'] = self::$bundle;
    }

    public static function clearBundle() {
        if (isset($_GLOBALS['MESSAGES'])) {
            unset($_GLOBALS['MESSAGES']);
        }
    }

}
