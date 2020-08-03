<?php

declare(strict_types=1);

namespace superbobby2000\CommandDisabler;

use pocketmine\plugin\PluginBase;

class Main extends PluginBase{

    public function onEnable() {
        @mkdir($this->getDataFolder());
        $this->saveDefaultConfig();
        foreach ($this->getConfig()->get("Disabled-Commands") as $command) {
            $commandMap = $this->getServer()->getCommandMap();
            $cmd = $commandMap->getCommand($command);
            if ($cmd == null) {
                $this->getLogger()->error("Command /" . $command . " not found");
            }else{
                $commandMap->unregister($cmd);
            }
        }
    }
}