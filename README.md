bookshop
========

基于ThinkPHP的简易的网上书城系统
url路由模式为兼容模式，nginx配置如下
server {
    listen 80;
    server_name book.phpstudylab.cn;
    index index.html index.htm index.php;
    root  /opt/phpstudylab/www/bookshop/;
    access_log   /var/phpstudylab/logs/access.log;
    location / {
         if (!-e $request_filename) {
                rewrite  /index.php/(.*)$  /index.php?s=$1  last;
                rewrite /admin.php/(.*)$  /admin.php?s=$1  last;
                break;
         }
    }
    location ~ \.php$ {
        include /etc/nginx/conf.d/fastcgi.conf;
        fastcgi_buffer_size 32k;
        fastcgi_buffers 8 32k;
        fastcgi_pass 127.0.0.1:9000;
    }
}
 
