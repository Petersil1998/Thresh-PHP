<?php

namespace Thresh\Entities\Match\Timeline\Events;

/**
 * This Class represents a list of all Timeline Events.<br>
 * *ASCENDED_EVENT, CAPTURE_POINT and PORO_KING_SUMMON are currently NOT SUPPORTED*
 * @package Thresh\Entities\Match\Timeline\Events
 */
class TimelineEvents
{
    const CHAMPION_KILL = 'CHAMPION_KILL';
    const WARD_PLACED = 'WARD_PLACED';
    const WARD_KILL = 'WARD_KILL';
    const BUILDING_KILL = 'BUILDING_KILL';
    const ELITE_MONSTER_KILL = 'ELITE_MONSTER_KILL';
    const ITEM_PURCHASED = 'ITEM_PURCHASED';
    const ITEM_SOLD = 'ITEM_SOLD';
    const ITEM_DESTROYED = 'ITEM_DESTROYED';
    const ITEM_UNDO = 'ITEM_UNDO';
    const SKILL_LEVEL_UP = 'SKILL_LEVEL_UP';
    const ASCENDED_EVENT = 'ASCENDED_EVENT';
    const CAPTURE_POINT = 'CAPTURE_POINT';
    const PORO_KING_SUMMON = 'PORO_KING_SUMMON';
    const PAUSE_END = 'PAUSE_END';
    const LEVEL_UP = 'LEVEL_UP';
    const GAME_END = 'GAME_END';
    const CHAMPION_SPECIAL_KILL = 'CHAMPION_SPECIAL_KILL';
    const TURRET_PLATE_DESTROYED = 'TURRET_PLATE_DESTROYED';
    const DRAGON_SOUL_GIVEN = 'DRAGON_SOUL_GIVEN';
}