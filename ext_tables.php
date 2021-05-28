<?php
defined('TYPO3_MODE') || die();

call_user_func(static function() {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_guestbook_domain_model_message', 'EXT:guestbook/Resources/Private/Language/locallang_csh_tx_guestbook_domain_model_message.xlf');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_guestbook_domain_model_message');
});
