<?php
namespace WeTransfer\Entity;

use JsonSerializable;

use WeTransfer\Entity\Abstracts\Item;

class Link extends Item implements JsonSerializable
{
    // @var object Link meta data.
    private $meta;

    // @var string Link target URL.
    private $url;

    public function __construct($link)
    {
        parent::__construct($link);

        $this->meta = $link['meta'];
        $this->url = $link['url'];
        $this->contentIdentifier = 'web_content';
    }

    /**
     * Get Link title.
     */
    public function getTitle()
    {
        return $this->meta['title'];
    }

    /**
     * Get Link meta.
     */
    public function getMetadata()
    {
        return $this->meta;
    }

    /**
     * Get Link url.
     */
    public function getUrl()
    {
        return $this->url;
    }

    public function jsonSerialize()
    {
        return [
            'id'   => $this->getId(),
            'url' => $this->getUrl(),
            'meta' => [
                'title' => $this->getTitle()
            ]
        ];
    }
}
