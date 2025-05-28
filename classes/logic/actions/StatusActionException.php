<?php

namespace taskforce\logic\actions;

use Exception;
use Throwable;

class StatusActionException extends Exception
{
  /**
   * Конструктор исключения с возможностью задания кастомного сообщения
   * 
   * @param string $message Сообщение об ошибке
   * @param int $code Код ошибки
   * @param Throwable|null $previous Предыдущее исключение
   */

  public function __construct(string $message = 'Action status error', int $code = 0, Throwable $previous)
  {
    parent::__construct($message, $code, $previous);
  }

  /**
   * Возвращает сообщение об ошибке
   * 
   * @return string Сообщение об ошибке
   */

  public function getErrorMessage(): string
  {
    return 'Status Action Error:' . $this->getMessage();
  }

  /**
   * Строковое представление исключения
   * 
   * @return string
  */

  public function __toString(): string
  {
    return __CLASS__ . ": [{$this->code}]: {$this->getErrorMessage()}\n";
  }
}
