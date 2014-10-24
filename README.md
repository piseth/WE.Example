1. Create Plugin
================
./flow kickstart:package WE.Example
./flow kickstart:model --force --package-key WE.Example --model-name News \title:string \teaser:string \desc:string
./flow kickstart:actioncontroller --generate-actions --generate-templates --generate-related WE.Example News

Configuration/NodeType.yaml
===========================
# TYPO3 Example plugin
'WE.Example:Plugin':
  superTypes:
    - 'TYPO3.Neos:Plugin'
  ui:
    label: 'Example Plugin'
    group: 'plugins'

Resources/Private/TypoScript/Root.ts2
=====================================
# WE Example plugin
prototype(WE.Example:Plugin) < prototype(TYPO3.Neos:Plugin)
prototype(WE.Example:Plugin) {
	package = 'WE.Example'
	controller = 'News'
	action = 'index'
	argumentNamespace = 'news'
}

Configuration/Settings.yaml
===========================
# Add auto include or use include: resource://WE.Example/Private/TypoScript/Root.ts2
TYPO3:
  Neos:
    typoScript:
      # autoInclude TS2 for Lelesys.Plugin.Newsletter :
      autoInclude:
        'WE.Example': TRUE

Configuration/Policy.yaml
=========================
#                                                                        #
# Security policy for the WE.Example package                             #
#                                                                        #

resources:
  methods:
    WE_Example_NewsAccess: 'method(WE\Example\Controller\NewsController->(index)Action())'

acls:
  Everybody:
    methods:
      WE_Example_NewsAccess: GRANT
Done!

2. Create Module
================