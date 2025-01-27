# PAGSS Dev Guide

## For Logging Into SSH

- ssh -p 65002 u828233268@153.92.11.213

## Learning Laravel

1. Go to domains directory
2. do "git clone https://github.com/DLogarta/pagss.git pagss.tprod.site"

## For Updating/Refresh from MAIN Branch

- git pull

## For Setting .env File from .env.production

1. do "cp .env.production .env"
2. do "php artisan config:cache"

## Update php to 8.2 (Hostinger only!)

1. do nano ~/.bashrc
2. type "export PATH=/opt/cloudlinux/alt-php82/root/usr/bin:$PATH" and save
3. do source ~/.bashrc

## FOR USING PHP COMMANDS IN SSH

- php artisan serve

## Creating Symlink for public_html from public dir

1. go to web dir and do "pwd" to verify path
2. do "ln -s /path/to/website/public public_html"

## For complete refresh (INSTRUCTION ONLY FOR HOSTINGER)

1. login to ssh
2. go to website dir
3. do "rm -rf *"
4. do "rm -rf .*"
5. Go to domains directory 
6. do "git clone https://github.com/DLogarta/pagss.git pagss.tprod.site"
7. do "ls" to verify 
8. do "cp .env.production .env"
9. do "php artisan config:cache"
10. do "pwd" and copy path 
11. do "ln -s /path/to/website/public public_html"
