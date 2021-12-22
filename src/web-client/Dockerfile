# 客户端Dockerfile镜像文件

# 构建镜像
# docker build -t xzcgroup/spcclient:v1 ./src/web-client
# 创建容器
# docker run -itd --name web-client xzcgroup/spcclient:v1 /bin/bash
# 进入容器
# docker exec -it web-client /bin/bash
# 容器内启动php程序
# php /data/project/web-client/bin/hyperf.php start

FROM hyperf/hyperf:7.4-alpine-v3.11-swoole
MAINTAINER sclecon<27941662@qq.com>
WORKDIR /data/project
EXPOSE 9501
RUN cd /data/project \
&& git clone https://gitee.com/XzcGroup/hyperf-json-rpc.git \
&& mv hyperf-json-rpc/src/web-client web-client \
&& cd web-client \
&& rm -rf composer.lock \
&& composer config -g repo.packagist composer https://mirrors.aliyun.com/composer \
&& composer install
CMD ["php", "/data/project/web-client/bin/hyperf.php", "start"]