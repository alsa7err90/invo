<?php

use App\Models\Group;

function getNameGroupById($id){
    return Group::whereId($id)->first()->name;
}

