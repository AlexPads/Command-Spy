<?php
namespace AlexPads\CommandSpy\Commands;
use pocketmine\command\CommandSender;
use pocketmine\utils\TextFormat as Text;
use pocketmine\Player;
use SocialSpy\Main;
use SocialSpy\BaseCommand;
class CommandSpy extends BaseCommand {
	public function __construct(Main $plugin){
        parent::__construct($plugin, "commandspy", "Spy on others commands!", "/commandspy", ['cmdspy']);
        $this->setPermission("socialspy.commandspy");
    }
	public function execute(CommandSender $sender, string $label, array $args): bool{
		if(!$this->testPermission($sender)){
			$sender->sendMessage($this->prefix . "§cYou don't have permission for that!");
			return true;
		}
		
		if ($this->getPlugin()->hasCommandSpy($sender)) {
			$sender->sendMessage($this->prefix . "You have disabled Command Spy");
			$this->getPlugin()->removeCommandSpy($sender);
			return true;
		} else {
			$sender->sendMessage($this->prefix . "You have enabled Command Spy");
			$this->getPlugin()->enableCommandSpy($sender);
			return true;
		}
	}
}
