<?php
namespace WE\Example\Controller\Module\NewsManagement\News;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "WE.Example".            *
 *                                                                        *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;
use TYPO3\Flow\Mvc\Controller\ActionController;
use WE\Example\Domain\Model\News;

class NewsController extends ActionController {

	/**
	 * @Flow\Inject
	 * @var \WE\Example\Domain\Repository\NewsRepository
	 */
	protected $newsRepository;

	/**
	 * @return void
	 */
	public function indexAction() {
		$this->view->assign('myNews', $this->newsRepository->findAll());
	}

	/**
	 * @param \WE\Example\Domain\Model\News $news
	 * @return void
	 */
	public function showAction(News $news) {
		$this->view->assign('news', $news);
	}

	/**
	 * @return void
	 */
	public function newAction() {
	}

	/**
	 * @param \WE\Example\Domain\Model\News $newNews
	 * @return void
	 */
	public function createAction(News $newNews) {
		$this->newsRepository->add($newNews);
		$this->addFlashMessage('Created a new news.');
		$this->redirect('index');
	}

	/**
	 * @param \WE\Example\Domain\Model\News $news
	 * @return void
	 */
	public function editAction(News $news) {
		$this->view->assign('news', $news);
	}

	/**
	 * @param \WE\Example\Domain\Model\News $news
	 * @return void
	 */
	public function updateAction(News $news) {
		$this->newsRepository->update($news);
		$this->addFlashMessage('Updated the news.');
		$this->redirect('index');
	}

	/**
	 * @param \WE\Example\Domain\Model\News $news
	 * @return void
	 */
	public function deleteAction(News $news) {
		$this->newsRepository->remove($news);
		$this->addFlashMessage('Deleted a news.');
		$this->redirect('index');
	}

}