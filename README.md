# 本项目实现功能
 - 基于`docker`实现项目分布部署
 - 实现`jsonrpc-http`协议通过`node`和`consul`进行服务注册与调用
 - 实现`jsonrpc`协议通过`node`和`consul`进行服务注册与调用

# 通过Docker-compose运行
### 启动服务
 ```shell script
# 拉取代码
git clone https://gitee.com/XzcGroup/hyperf-json-rpc 
# 启动服务
docker-compose up -d
```
### 查看效果
##### Consul控制台
```shell script
http://127.0.0.1:8500/ui/dc1/nodes/1/health-checks
```
##### 查看运行效果
```shell script
curl http://127.0.0.1:9501/index/user?user_id=2
```

# 通过Dockerfile运行
 ### 准备工作
  ##### 拉取代码
 ```shell script
git clone https://gitee.com/XzcGroup/hyperf-json-rpc 
```
 ##### 创建Docker容器域网
 ```shell script 
docker network create -d bridge demo 
```
 ##### 创建consul容器
 ```shell script
docker run -d -p 8600:8500 --restart=always --name=consul --network=demo consul agent -server -bootstrap -ui -node=1 -client='0.0.0.0'
```
 ### 基于Dockerfile启动Rpc服务端
 ```shell script
# 构建镜像
docker build -t xzcgroup/rpcservice:v1 ./src/service-demo
# 创建容器
docker run -itd --name service-demo xzcgroup/rpcservice:v1 /bin/bash
# 进入容器
docker exec -it service-demo /bin/bash
# 容器内启动php服务端
php /data/project/service-demo/bin/hyperf.php start
```
 ### 基于Dockerfile启动Rpc客户端
```shell script
# 构建镜像
docker build -t xzcgroup/spcclient:v1 ./src/web-client
# 创建容器
docker run -itd --name web-client xzcgroup/spcclient:v1 /bin/bash
# 进入容器
docker exec -it web-client /bin/bash
# 容器内启动php客户端
php /data/project/web-client/bin/hyperf.php start
```

### 查看运行效果
```shell script
curl http://127.0.0.1:9501/index/user?user_id=2
```