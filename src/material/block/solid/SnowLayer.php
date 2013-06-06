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

class SnowLayerBlock extends FlowableBlock{
	public function __construct($meta = 0){
		parent::__construct(SNOW_LAYER, $meta, "Snow Layer");
		$this->isReplaceable = true;
		$this->isSolid = false;
	}
	
	public function getDrops(Item $item, Player $player){
		if($item->isShovel() !== false){
			return array(
				array(SNOWBALL, 0, 1),
			);
		}
	}
}