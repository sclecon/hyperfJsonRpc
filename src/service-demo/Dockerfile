# 服务端Dockerfile镜像文件

# 构建镜像
# docker build -t xzcgroup/rpcservice:v1 ./src/service-demo
# 创建容器
# docker run -itd --name service-demo xzcgroup/rpcservice:v1 /bin/bash
# 进入容器
# docker exec -it service-demo /bin/bash
# 容器内启动php程序
# php /data/project/service-demo/bin/hyperf.php start

FROM hyperf/hyperf:7.4-alpine-v3.11-swoole
MAINTAINER sclecon<27941662@qq.com>
WORKDIR /data/project
EXPOSE 9501
RUN cd /data/project \
&& git clone https://gitee.com/XzcGroup/hyperf-json-rpc.git \
&& mv hyperf-json-rpc/src/service-demo service-demo \
&& cd service-demo \
&& rm -rf composer.lock \
&& composer config -g repo.packagist composer https://mirrors.aliyun.com/composer \
&& composer install
CMD ["php", "/data/project/service-demo/bin/hyperf.php", "start"]
