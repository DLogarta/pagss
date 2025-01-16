# PAGSS Dev Guide

## For Logging Into SSH

- ssh -p 65002 u828233268@153.92.11.213

## Learning Laravel

1. Go to domains directory
2. do "git clone https://github.com/DLogarta/pagss.git darkblue-pig-858589.hostingersite.com"

## For Updating/Refresh from MAIN Branch

- git pull

## For Setting .env File from .env.production

1. do "cp .env.production .env"
2. do "php artisan config:cache"

## FOR USING PHP COMMANDS IN SSH

- php artisan serve

## Creating Symlink for public_html from public dir

1. do "pwd" to verify path
2. do "ln -s /path/to/website/public public_html"
