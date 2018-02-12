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

使用[`catfan/medoo`](https://github.com/catfan/Medoo)插件作为数据库框架，提升开发效率

# 更新记录
### v1.1
* 重构入口文件index.php、start.php
* 仿造TP5的入口文件写法
* 重构Route类，支持使用"?"附带GET请求参数