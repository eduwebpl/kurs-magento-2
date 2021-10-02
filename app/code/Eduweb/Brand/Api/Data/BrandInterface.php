<?php
declare(strict_types=1);

namespace Eduweb\Brand\Api\Data;

interface BrandInterface
{
    const ID = 'id';

    const NAME = 'name';

    const URL_KEY = 'url_key';

    /**
     * @return int
     */
    public function getId(): int;

    /**
     * @param int $id
     * @return void
     */
    public function setId(int $id): void;

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @param string $name
     * @return void
     */
    public function setName(string $name): void;

    /**
     * @return string
     */
    public function getUrlKey(): string;

    /**
     * @param string $urlKey
     * @return void
     */
    public function setUrlKey(string $urlKey): void;
}
