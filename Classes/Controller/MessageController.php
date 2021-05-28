<?php
declare (strict_types = 1);
namespace Jb\Guestbook\Controller;
/**
 *
 * This file is part of the "Guestbook" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2021 Jahn Blechinger
 */
/**
 * MessageController
 */
class MessageController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * messageRepository
     *
     * @var \Jb\Guestbook\Domain\Repository\MessageRepository
     */
    protected $messageRepository = null;
    /**
     * action list
     *
     * @param Jb\Guestbook\Domain\Model\Message
     * @return string|object|null|void
     */
    public function listAction()
    {
        $messages = $this->messageRepository->findAll();
        $this->view->assign('messages', $messages);
    }
    /**
     * action show
     *
     * @param Jb\Guestbook\Domain\Model\Message
     * @return string|object|null|void
     */
    public function showAction(\Jb\Guestbook\Domain\Model\Message $message)
    {
        $this->view->assign('message', $message);
    }
    /**
     * action new
     *
     * @param Jb\Guestbook\Domain\Model\Message
     * @return string|object|null|void
     */
    public function newAction()
    {
    }
    /**
     * action create
     *
     * @param Jb\Guestbook\Domain\Model\Message
     * @return string|object|null|void
     */
    public function createAction(\Jb\Guestbook\Domain\Model\Message $newMessage)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/p/friendsoftypo3/extension-builder/master/en-us/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->messageRepository->add($newMessage);
        $this->cacheService->clearPageCache($GLOBALS['TSFE']->id);

        $this->redirect('list');
    }
    /**
     * action delete
     *
     * @param Jb\Guestbook\Domain\Model\Message
     * @return string|object|null|void
     */
    public function deleteAction(\Jb\Guestbook\Domain\Model\Message $message)
    {
        if ($this->settings['ff']['displayType'] == 'admin') {
            $this->addFlashMessage('The object was deleted.', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
            $this->messageRepository->remove($message);
            $this->cacheService->clearPageCache($GLOBALS['TSFE']->id);

        }
        $this->redirect('list');
    }
    /**
     * @param \Jb\Guestbook\Domain\Repository\MessageRepository $MessageRepository
     */
    public function injectMessageRepository(\Jb\Guestbook\Domain\Repository\MessageRepository $messageRepository)
    {
        $this->messageRepository = $messageRepository;
    }
    /**
     * action edit
     *
     * @param \Jb\Guestbook\Domain\Model\Message $message
     * @TYPO3\CMS\Extbase\Annotation\IgnoreValidation("message")
     * @return string|object|null|void
     */
    public function editAction(\Jb\Guestbook\Domain\Model\Message $message)
    {
        if ($this->settings['ff']['displayType'] == 'admin') {
            $this->view->assign('message', $message);
        }
    }
    /**
     * action update
     *
     * @param \Jb\Guestbook\Domain\Model\Message $message
     * @return string|object|null|void
     */
    public function updateAction(\Jb\Guestbook\Domain\Model\Message $message)
    {
        if ($this->settings['ff']['displayType'] == 'admin') {
            $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/p/friendsoftypo3/extension-builder/master/en-us/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
            $this->messageRepository->update($message);
        }
        $this->redirect('list');
    }
    public function initializeAction()
    {
        

    }
}
