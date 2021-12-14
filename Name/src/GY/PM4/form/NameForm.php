<?php
declare(strict_types= 1);

namespace GY\PM4\form;

use pocketmine\form\Form;
use pocketmine\player\Player;
use pocketmine\Server;

class NameForm implements Form {
    public function jsonSerialize() : array
    {
        return [
            "type" =>"custom_form",
            "title" => "GYo.O",
            "content" => [
                [
                    "type" => "input",
                    "text" => "§l§a✔ §f원하시는 아이템 이름을 적어주세요."
                ]
            ]
        ];
    }
    public function handleResponse(Player $player, $data): void
    {
        if ($data === null) {
            $player->sendMessage("§l§7[ §f이름 §7] 정보를 입력해주세요.");
        }else{
            $item = $player->getInventory()->getItemInHand();
                        if ($item->isNull()) {
                $player->sendMessage("§l§7[ §f이름 §7] §f손에 아이템을 들어주세요.");
                }
            $In = "§r".$data[0];
            $item->setCustomName($In);
            $player->getInventory()->setItemInHand($item);
            $player->sendMessage("§l§7[ §f이름 §7] §f성공적으로 아이템의 이름을 변경했습니다.");
        }
    }
}