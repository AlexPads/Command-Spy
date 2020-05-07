<?php

namespace CommandSpy\TinyPixelDevz\AlexPads;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\Server;
use pocketmine\utils\TextFormat;
use pocketmine\event\player\PlayerCommandPreprocessEvent;

use function array_search;
use function in_array;

class EventListener implements Listener {

    public function onPlayerCommand(PlayerCommandPreprocessEvent $event) {
        foreach (Server::getInstance()->getOnlinePlayers() as $p) {
            if(in_array($p->getName(), Main::$commandspy)) {
                $message = $event->getMessage();
                $player = $event->getPlayer();
                $m = substr("$message", 0, 1);
                if ($m == '/') {
                    $p->sendMessage('§7[§9SS§7]§6 >§r ' . TextFormat::GRAY . TextFormat::ITALIC . $player->getName() . TextFormat::RESET . ": " . TextFormat::AQUA . $message);
                }
            }
        }
    }
}