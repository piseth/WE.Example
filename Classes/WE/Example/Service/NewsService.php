<?php
namespace WE\Example\Service;

/*                                                                         *
 * This script belongs to the package "WE.Example".         *
 *                                                                         *
 * It is free software; you can redistribute it and/or modify it under     *
 * the terms of the GNU Lesser General Public License, either version 3    *
 * of the License, or (at your option) any later version.                  *
 *                                                                         */

use TYPO3\Flow\Annotations as Flow;
use WE\Example\Domain\Model\News;

/**
 * The Person Service
 *
 * @Flow\Scope("singleton")
 */
class NewsService {

	/**
	 * Person Repository
	 *
	 * @Flow\Inject
	 * @var \WE\Example\Domain\Repository\NewsRepository
	 */
	protected $newsRepository;

	/**
	 * Bootstrap
	 *
	 * @var \TYPO3\Flow\Core\Bootstrap
	 * @Flow\Inject
	 */
	protected $bootstrap;

	/**
	 * Inject email service
	 *
	 * @Flow\Inject
	 * @var \TYPO3\Flow\Persistence\Doctrine\PersistenceManager
	 */
	protected $persistenceManager;

	/**
	 * @var array
	 */
	protected $settings;

	/**
	 * Inject settings
	 *
	 * @param array $settings
	 * @return void
	 */
	public function injectSettings(array $settings) {
		$this->settings = $settings;
	}

	/**
	 *
	 * @param \WE\Example\Domain\Model\News
	 * @return void
	 */
	public function delete(News $news) {
		$this->newsRepository->remove($news);
		$this->persistenceManager->persistAll();
	}
}
?>