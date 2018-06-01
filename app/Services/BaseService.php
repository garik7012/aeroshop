<?php

namespace App\Services;

use Exception;
use Illuminate\Database\DatabaseManager;
use Illuminate\Log\Logger;

abstract class BaseService
{
    /**
     * @var \Illuminate\Database\DatabaseManager
     */
    protected $databaseManager;

    /**
     * @var string
     */
    protected $error;

    /**
     * @var \Illuminate\Log\Writer
     */
    protected $logger;

    /**
     * @var string
     */
    protected $message;

    /**
     * BaseService constructor.
     *
     * @param DatabaseManager $databaseManager
     * @param Logger $logger
     */
    public function __construct(DatabaseManager $databaseManager, Logger $logger)
    {
        $this->databaseManager = $databaseManager;
        $this->logger          = $logger;
    }

    /**
     * Start a new database transaction.
     *
     * @return void
     * @throws Exception
     */
    protected function beginTransaction()
    {
        $this->databaseManager->beginTransaction();
    }

    /**
     * Rollback the active database transaction.
     *
     * @param  \Exception  $e
     * @param  string  $message
     * @param  array  $context
     * @return bool
     */
    protected function rollback(Exception $e, $message = '', $context = [])
    {
        $this->databaseManager->rollBack();
        $this->logError($e, $message, $context);

        return false;
    }

    /**
     * Write occurred error to logs.
     *
     * @param  Exception $e
     * @param  string $message
     * @param  array $context
     * @return void
     */
    protected function logError(Exception $e, $message = '', $context = [])
    {
        $this->logger->error($message, $context);
        $this->logger->error($e);
    }

    /**
     * Commit the active database transaction.
     *
     * @return void
     */
    protected function commit()
    {
        $this->databaseManager->commit();
    }

    /**
     * Set error for user.
     * For example, can be used in controllers.
     *
     * @param  string  $error
     */
    protected function error($error)
    {
        $this->logger->error($error);
        $this->error = $error;
    }

    /**
     * Get last error message.
     *
     * @return string
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * Set message.
     *
     * @param string $message
     */
    protected function message($message)
    {
        $this->logger->info('Added message', [
            'message' => $message,
        ]);
        $this->message = $message;
    }

    /**
     * Get message.
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }
}
