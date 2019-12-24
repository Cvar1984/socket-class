<?php
namespace Cvar1984\Socket;

class Server
{
    function __construct($time)
    {
        set_time_limit($time);
    }
    public function createConnection(string $host = '127.0.0.1', int $port)
    {
        $sock = socket_create(AF_INET, SOCK_STREAM, 0);
        $result = socket_bind($sock, $host, $port);
        $result = socket_listen($sock, 3);
        $spawn = socket_accept($sock);
        return socket_read($spawn, 1024);
        socket_write($spawn, $output, strlen($output));
        socket_close($spawn);
        socket_close($socket);
    }
}
try {
    $host = readline('Host : ');
    $port = readline('Port : ');
    $connection = new Server(0);
    echo $connection->createConnection($host, $port);
} catch (Exception $e) {
    fprintf(STDERR, '%s%s', $e->getMessage(), PHP_EOL);
    exit(1);
}
