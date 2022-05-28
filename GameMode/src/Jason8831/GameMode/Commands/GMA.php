<?php

namespace Jason8831\GameMode\Commands;

use Jason8831\GameMode\Main;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\lang\Translatable;
use pocketmine\player\GameMode;
use pocketmine\player\Player;
use pocketmine\utils\Config;

class GMA extends Command
{
    public function __construct(string $name, Translatable|string $description = "", Translatable|string|null $usageMessage = null, array $aliases = [])
    {
        parent::__construct($name, $description, $usageMessage, $aliases);
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {

        $config = new Config(Main::getInstance()->getDataFolder() . "config.yml", Config::YAML);

        if($sender instanceof Player){
            if($sender->hasPermission("gma.use")){
                $sender->setGamemode(GameMode::ADVENTURE());
                $sender->sendMessage($config->get("msgGMA"));
            }else{
                $sender->sendMessage($config->get("msgNoPerm"));
            }
        }else{
            $sender->sendMessage("§f[§l§4ERROR§r§f]: vous ne pouvez pas éxécuter cette commande");
        }
    }
}