<?php

namespace Jason8831\GameMode;

use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;

class Main extends PluginBase implements Listener
{

    public Config $config;

    /**
     * @var Main
     */
    private static $instance;

    public function onEnable(): void
    {
        self::$instance = $this;
        $this->getLogger()->info("§f[§l§4GameMode§r§f]: activée");
        $this->saveResource("config.yml");

        $this->getServer()->getCommandMap()->registerAll("AllCommands", [
            new Commands\GMA(name: "gma", description: "permet de ce mettre en Gamemode aventure", usageMessage: "gma", aliases: ["gm2"]),
            new Commands\GMC(name: "gmc", description: "permet de ce mettre en Gamemode créative", usageMessage: "gmc", aliases: ["gm1"]),
            new Commands\GMS(name: "gms", description: "permet de ce mettre en Gamemode survival", usageMessage: "gms", aliases: ["gm0"]),
            new Commands\GMSP(name: "gmsp", description: "permet de ce mettre en Gamemode spectateur", usageMessage: "gmsp", aliases: ["gm3"])
        ]);
    }

    public static function getInstance(): self{
        return self::$instance;
    }
}