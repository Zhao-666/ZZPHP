# ZZPHP

[![Build Status](https://travis-ci.org/top-think/framework.svg?branch=master)](https://travis-ci.org/top-think/framework)
[![Total Downloads](https://poser.pugx.org/topthink/framework/downloads)](https://packagist.org/packages/topthink/framework)
[![Latest Stable Version](https://poser.pugx.org/topthink/framework/v/stable)](https://packagist.org/packages/topthink/framework)
[![License](https://poser.pugx.org/topthink/framework/license)](https://packagist.org/packages/topthink/framework)

PHP写的web框架~

只是用来学习下框架的写法，虽然不及ThinkPHP、Laravel之类框架的皮毛

支持 `composer` `命名空间`机制

使用[`filp/whoops`](https://github.com/filp/whoops)插件提升代码错误的提示效果

使用[`symfony/var-dumper`](https://github.com/symfony/var-dumper)插件提升变量输出的效果

使用[`catfan/medoo`](https://github.com/catfan/Medoo)插件作为数据库框架

使用[`twigphp/Twig`](https://github.com/twigphp/Twig)插件作为模版引擎

# 更新记录
### v1.1
* 重构入口文件index.php、start.php
* 仿造TP5的入口文件写法
* 重构Route类，支持使用"?"附带GET请求参数
### v1.2
* 重构Conf类，优化部分细节
* 新增config助手函数，可以使用字符串或者数组获取配置项
### v1.2.1
* 增加空控制器配置项，当找不到控制器时则重定向到配置的控制器
* 增加空操作捕获，当访问的方法不存在时重定向到_empty方法
### v1.3
* 仿造TP框架构建Controller基类，封装控制器通用方法
* 重构日志记录Log类
### v1.4
* 增加Mysql日志驱动，通过在log.php文件中配置日志记录类型为mysql即可将日志数据保存在数据库中
* 优化日志记录Log类
### v1.4.1
* Log类新增info、debug、sql等静态方法，优化Log类
### v1.4.2
* 重构配置文件，将框架大部分配置都放在config.php文件夹中
* 新版本日志将保存在 项目根目录/runtime/log文件夹中
* 修复了config助手函数的Bug