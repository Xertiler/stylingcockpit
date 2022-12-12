<?php
defined('TYPO3') || die();

(static function() {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
        'Stylingcockpit',
        'web',
        'stylingcockpitbackend',
        '',
        [
            \Gruppe1\Stylingcockpit\Controller\PageController::class => 'index, test, anotherTest',
        ],
        [
            'access' => 'user,group',
            'icon'   => 'EXT:stylingcockpit/Resources/Public/Icons/user_mod_stylingcockpitbackend.svg',
            'labels' => 'LLL:EXT:stylingcockpit/Resources/Private/Language/locallang_stylingcockpitbackend.xlf',
        ]
    );

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_stylingcockpit_domain_model_page', 'EXT:stylingcockpit/Resources/Private/Language/locallang_csh_tx_stylingcockpit_domain_model_page.xlf');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_stylingcockpit_domain_model_page');
})();
