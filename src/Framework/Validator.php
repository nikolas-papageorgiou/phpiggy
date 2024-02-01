<?php

declare(strict_types=1);

namespace Framework;

use Framework\Contracts\RuleInterface;
use ReflectionFunctionAbstract;

class Validator
{
    private array $rules = [];

    public function add(string $alias, RuleInterface $rule)
    {
        $this->rules[$alias]= $rule;
    }
    public function validate(array $formData)
    {
        dd($formData);
    }
}
