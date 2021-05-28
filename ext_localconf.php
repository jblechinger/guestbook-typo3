<?php
defined('TYPO3_MODE') || die();

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Guestbook',
            'Guestbookfe',
            [
                \Jb\Guestbook\Controller\MessageController::class => 'list, show, new, create, edit, update, delete'
            ],
            // non-cacheable actions
            [
                \Jb\Guestbook\Controller\MessageController::class => 'create, update, delete'
            ]
        );

        // wizards
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
            'mod {
                wizards.newContentElement.wizardItems.plugins {
                    elements {
                        guestbookfe {
                            iconIdentifier = guestbook-plugin-guestbookfe
                            title = LLL:EXT:guestbook/Resources/Private/Language/locallang_db.xlf:tx_guestbook_guestbookfe.name
                            description = LLL:EXT:guestbook/Resources/Private/Language/locallang_db.xlf:tx_guestbook_guestbookfe.description
                            tt_content_defValues {
                                CType = list
                                list_type = guestbook_guestbookfe
                            }
                        }
                    }
                    show = *
                }
           }'
        );
		$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
		
			$iconRegistry->registerIcon(
				'guestbook-plugin-guestbookfe',
				\TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
				['source' => 'EXT:guestbook/Resources/Public/Icons/user_plugin_guestbookfe.svg']
			);
		
    }
);
