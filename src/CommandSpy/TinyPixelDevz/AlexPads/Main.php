<?php

namespace CommandSpy\TinyPixelDevz\AlexPads;

use pocketmine\plugin\PluginBase;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\Server;
use pocketmine\event\Listener;
use pocketmine\Player;
use pocketmine\utils\TextFormat;
use pocketmine\level\Position;
use pocketmine\level\Level;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\event\player\PlayerMoveEvent;
use pocketmine\event\player\PlayerCommandPreprocessEvent;
use pocketmine\utils\TextFormat as C;

use function in_array;
use function strtolower;
use function array_search;

class Main extends PluginBase {

    public const PREFIX = "§7[§9SS§7]§6 >§r ";

    public static $commandspy = [];

    protected static $main;

    public function onEnable() {
        self::$main = $this;
        $this->getServer()->getPluginManager()->registerEvents(new EventListener(), $this);
    }

    public static function getMain(): self {
        return self::$main;
    }

    public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args): bool {
        $name = $sender->getName();
        switch(strtolower($cmd->getName())) {
            case "socialspy":
            case "ss":
                if (!$sender instanceof Player) {
                    $sender->sendMessage(self::PREFIX . C::DARK_RED . "Use this command InGame.");
                    return false;
                }
        }
        if(!$sender->hasPermission("socialspy.command")){
            $sender->sendMessage(self::PREFIX . C::DARK_RED . "You do not have permission to use this command");
            return false;
        }

        if(!in_array($name, self::$commandspy)) {
            self::$commandspy[] = $name;
            $sender->sendMessage(self::PREFIX . C::GREEN . "You have enabled SocialSpy");
        }else{
            unset(self::$commandspy[array_search($name, self::$commandspy)]);
            $sender->sendMessage(self::PREFIX . C::DARK_RED . "You have disabled SocialSpy");
        }
        return true;
    }
}
