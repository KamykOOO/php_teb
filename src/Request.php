<?php

declare(strict_types=1);

namespace App;

class request
{
    private array $get = [];
    private array $post = [];
    private array $server = [];
    public function __construct(array $get, array $post, array $server)
    {
        $this->get = $get;
        $this->post = $post;
        $this->server = $server;
    }
    public function hasPost(): bool
    {
        return !empty($this->post);
    }
    public function getParam(string $name, $deafult = null)
    {
        return $this->get[$name] ?? $deafult;
    }
    public function postParam(string $name, $deafult = null)
    {
        return $this->post[$name] ?? $deafult;
    }

    public function inPost(): bool
    {
        return $this->server['REQUEST_METHOD'] === 'POST';
    }
    public function isGet(): bool
    {
        return $this->server['REQUEST_METHOD'] === 'GET';
    }
}
