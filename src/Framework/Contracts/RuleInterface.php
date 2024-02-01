<?php

declare(strict_types=1);

namespace Framework\Contracts;


interface RuleInterface{
    public function validate(array $date,string $field,array $params):bool;
    public function getMessage(array $date,string $field,array $params):string;

}