<?php


namespace src\Entities\Match\Timeline\Events;


class TimelineEvent
{
    const CHAMPION_KILL = "CHAMPION_KILL";
    const WARD_PLACED = "WARD_PLACED";
    const WARD_KILL = "WARD_KILL";
    const BUILDING_KILL = "BUILDING_KILL";
    const ELITE_MONSTER_KILL = "ELITE_MONSTER_KILL";
    const ITEM_PURCHASED = "ITEM_PURCHASED";
    const ITEM_SOLD = "ITEM_SOLD";
    const ITEM_DESTROYED = "ITEM_DESTROYED";
    const ITEM_UNDO = "ITEM_UNDO";
    const SKILL_LEVEL_UP = "SKILL_LEVEL_UP";
    const ASCENDED_EVENT = "ASCENDED_EVENT";
    const CAPTURE_POINT = "CAPTURE_POINT";
    const PORO_KING_SUMMON = "PORO_KING_SUMMON";
}