<?php

namespace Son\Framework\Modules;


interface ContractInterface
{
    public function getNamespaces(): array;
    public function getContainerConfig(): string;
    public function getEventConfig(): string;
    public function getMiddlewareConfig(): string;
    public function getRouterConfig(): string;
}