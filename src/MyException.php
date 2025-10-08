<?php
namespace Selectrum;

use Exception;
use Throwable;

class MyException extends Exception
{
    public function __construct(string $message = "", int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message ?: $this->get_default_message(), $code, $previous);
    }

    private function get_default_message(): ?string
    {
        return __('Something went wrong. Please try again later or contact the website administrator.', 'selectrum');
    }
}