<?php
declare(strict_types=1);

namespace Jb\Guestbook\Domain\Model;


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
 * Message
 */
class Message extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * @var \DateTime
     */
     public $crdate = null;

    /**
     * Returns the creation date
     *
     * @return \DateTime $crdate
     */
    public function getCrdate() {
        return $this->crdate;
    }

    /**
     * content
     *
     * @var string
     * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmpty")
     */
    protected $content = '';

    /**
     * author
     *
     * @var string
     * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmpty")
     */
    protected $author = '';

    /**
     * Returns the content
     *
     * @return string content
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Sets the content
     *
     * @param string $content
     * @return void
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * Returns the author
     *
     * @return string $author
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Sets the author
     *
     * @param string $author
     * @return void
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }
}
