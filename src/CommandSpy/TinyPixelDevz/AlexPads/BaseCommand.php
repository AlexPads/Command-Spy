<?php
namespace CommandSpy\TinyPixelDevz\AlexPads;
use pocketmine\command\Command;
use pocketmine\command\PluginIdentifiableCommand;
use CommandSpy\Main;
abstract class BaseCommand extends Command implements PluginIdentifiableCommand {
    public $prefix = "§8[§aVM§8]§6 ";
	private $plugin;
	public function __construct(Main $plugin, string $name, string $desc = "", string $usage, array $aliases = []){
		parent::__construct($name, $desc, $usage, $aliases);
		$this->plugin = $plugin;	
       }
	public function getPlugin($plugin){ 
		return $this->plugin;
	}
}
