**Quick guide how to deploy application from Docker.**
0) add 172.17.0.1 weetest.local to /etc/hosts


1. Move into .docker folder
2. Run build.sh (bash ./build.sh)

3. After message on the screen “Containers successful built”
Run deploy-fixture-inside-php_con.sh (bash ./deploy-fixture-inside-php_con.sh)


n) For stops containers run destroy.sh (.destroy.sh)