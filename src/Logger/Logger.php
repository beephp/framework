<?php

namespace Beephp\Framework\Logger;

use Monolog\Logger as MonologLogger;
use Monolog\Handler\StreamHandler;

class Logger
{
    private MonologLogger $logger;

    /**
     * Logger constructor.
     *
     * @param string $name The name of the log channel.
     * @param string $logFile The path to the log file.
     * @throws \RuntimeException If the log directory cannot be created.
     */
    public function __construct(string $name = 'app', string $logFile = __DIR__ . '/../../../../../storage/logs/beephp.log')
    {
        $this->ensureLogDirectoryExists(dirname($logFile));

        // Create a log channel
        $this->logger = new MonologLogger($name);

        // Create a handler that writes log messages to a file
        $this->logger->pushHandler(new StreamHandler($logFile, MonologLogger::DEBUG));
    }

    /**
     * Ensure that the log directory exists; create it if it does not.
     *
     * @param string $logDir The directory path for the log file.
     * @throws \RuntimeException If the directory cannot be created.
     */
    private function ensureLogDirectoryExists(string $logDir): void
    {
        if (!is_dir($logDir)) {
            if (!mkdir($logDir, 0755, true) && !is_dir($logDir)) {
                throw new \RuntimeException("Unable to create log directory: $logDir");
            }
        }
    }

    /**
     * Log an info message.
     *
     * @param string $message The message to log.
     * @param array $context Additional context for the log message.
     */
    public function info(string $message, array $context = []): void
    {
        $this->logger->info($message, $context);
    }

    /**
     * Log a warning message.
     *
     * @param string $message The message to log.
     * @param array $context Additional context for the log message.
     */
    public function warning(string $message, array $context = []): void
    {
        $this->logger->warning($message, $context);
    }

    /**
     * Log an error message.
     *
     * @param string $message The message to log.
     * @param array $context Additional context for the log message.
     */
    public function error(string $message, array $context = []): void
    {
        $this->logger->error($message, $context);
    }

    /**
     * Log a critical message.
     *
     * @param string $message The message to log.
     * @param array $context Additional context for the log message.
     */
    public function critical(string $message, array $context = []): void
    {
        $this->logger->critical($message, $context);
    }

    /**
     * Log a debug message.
     *
     * @param string $message The message to log.
     * @param array $context Additional context for the log message.
     */
    public function debug(string $message, array $context = []): void
    {
        $this->logger->debug($message, $context);
    }

    /**
     * Log a notice message.
     *
     * @param string $message The message to log.
     * @param array $context Additional context for the log message.
     */
    public function notice(string $message, array $context = []): void
    {
        $this->logger->notice($message, $context);
    }

    /**
     * Log an alert message.
     *
     * @param string $message The message to log.
     * @param array $context Additional context for the log message.
     */
    public function alert(string $message, array $context = []): void
    {
        $this->logger->alert($message, $context);
    }
}
