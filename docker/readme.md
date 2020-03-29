**Quick guide how to deploy application from Docker.**

0) add 172.17.0.1 weetest.local to /etc/hosts

1. Move into docker folder
2. Run build.sh (bash ./build.sh)

3. After successful built and started container run **deploy-doctrine-inside-php-con.sh** (bash ./deploy-doctrine-inside-php-con.sh) - it config doctrine

n) For stops containers run destroy.sh (.destroy.sh)