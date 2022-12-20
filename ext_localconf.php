<?php
defined('TYPO3') || die();

(static function() {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'Stylingcockpit',
        'Stylingcockpitfrontend',
        [
            \Gruppe1\Stylingcockpit\Controller\PageController::class => 'index, test, anotherTest'
        ],
        // non-cacheable actions
        [
            \Gruppe1\Stylingcockpit\Controller\PageController::class => 'index, test, anotherTest'
        ]
    );

    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    stylingcockpitfrontend {
                        iconIdentifier = stylingcockpit-plugin-stylingcockpitfrontend
                        title = LLL:EXT:stylingcockpit/Resources/Private/Language/locallang_db.xlf:tx_stylingcockpit_stylingcockpitfrontend.name
                        description = LLL:EXT:stylingcockpit/Resources/Private/Language/locallang_db.xlf:tx_stylingcockpit_stylingcockpitfrontend.description
                        tt_content_defValues {
                            CType = list
                            list_type = stylingcockpit_stylingcockpitfrontend
                        }
                    }
                }
                show = *
            }
       }'
    );
})();
