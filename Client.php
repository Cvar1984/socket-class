<?php
namespace Cvar1984\Socket;

class Client
{
    protected static $input = 'Hello world';
    public static function setMessage(string $message)
    {
        self::$input = $message;
    }

    public static function listenConnection(string $host = '127.0.0.1', int $port)
    {
        $sock = socket_create(AF_INET, SOCK_STREAM, 0);
        $result = socket_connect($sock, $host, $port);
        socket_write($sock, self::$input, strlen(self::$input));
        return socket_read($sock, 1024);
        socket_close($sock);
    }
}
try {
    $message = readline('Message : ');
    Client::setMessage($message);
    echo Client::listenConnection('127.0.0.1', 40141);
} catch (Exception $e) {
    fprintf(STDERR, '%s%s', $e->getMessage(), PHP_EOL);
    exit(1);
}
