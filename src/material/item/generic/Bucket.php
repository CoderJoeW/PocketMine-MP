<?php

/*

           -
         /   \
      /         \
   /   PocketMine  \
/          MP         \
|\     @shoghicp     /|
|.   \           /   .|
| ..     \   /     .. |
|    ..    |    ..    |
|       .. | ..       |
\          |          /
   \       |       /
      \    |    /
         \ | /

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU Lesser General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.


*/

class BucketItem extends Item{
	public function __construct($meta = 0, $count = 1){
		parent::__construct(BUCKET, 0, $count, "Bucket");
		$this->meta = $meta;
		$this->isActivable = true;
		$this->maxStackSize = 1;
	}
	
	public function onActivate(Level $level, Player $player, Block $block, Block $target, $face, $fx, $fy, $fz){
		if($this->meta === AIR){
			if($block->getID() === STILL_WATER or $block->getID() === STILL_LAVA){
				$level->setBlock($block, new AirBlock());
				$this->meta = $block->getID();
				return true;
			}
		}elseif($this->meta === STILL_WATER){
			//if($block->getID() === AIR){
				$level->setBlock($block, new StillWaterBLock());
				$this->meta = 0;
				return true;
			//}
		}elseif($this->meta === STILL_LAVA){
			if($block->getID() === AIR){
				$level->setBlock($block, new StillLavaBlock());
				$this->meta = 0;
				return true;
			}
		}
		return false;
	}
}