<?php

namespace App\Enums;

enum PostStatus: string
{
    case Draft = 'draft';
    case Public = 'public';
    case Private = 'private';
}