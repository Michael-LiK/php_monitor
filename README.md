<div align="center">
<img src="http://cdn.chinanalan.com/mini-logo.jpg" width=50% height=50%/>
</div>
<h1 align="center"> mini-monitor </h1>

<p align="center"> A monitor php </p>

[![Build Status](https://travis-ci.org/Michael-LiK/php_monitor.svg?branch=master)](https://travis-ci.org/Michael-LiK/php_monitor)
[![Latest Stable Version](https://poser.pugx.org/mini-monitor/php_monitor/v/stable)](https://packagist.org/packages/mini-monitor/php_monitor)
[![Total Downloads](https://poser.pugx.org/mini-monitor/php_monitor/downloads)](https://packagist.org/packages/mini-monitor/php_monitor)
[![Latest Unstable Version](https://poser.pugx.org/mini-monitor/php_monitor/v/unstable)](https://packagist.org/packages/mini-monitor/php_monitor)
[![License](https://poser.pugx.org/mini-monitor/php_monitor/license)](https://packagist.org/packages/mini-monitor/php_monitor)


-----------------------------------------------------------------------------------
中文文档

## 项目背景
目前市面上大多数监控是针对服务器的CPU、内存占用率、网络流量等，这一些都是偏运维层面的监控。对开发人员来说，大家更关注自己的服务是否有挂、业务被调用的次数，如果是有条件的调用还需要关注调用的返回值统计、成功和失败的次数等。
现有的成熟解决方案主要有两种，一是通过日志分析，在服务中进行埋点，后期进行日志分析。第二种是通过业务调用时进行上报。
这两种方案都可以满足需求，但同时也存在着各自的不足，日志分析的方式较难配置。第二种业务上报模式多是通过每次调用时进行上报，这也占用了大量的带宽资源，当访问量过大时，这样的上报对监控收集端来说相对于巨大的DDOS攻击，简直堪比灾难。



## 安装

```shell
$ composer require mini-monitor/php_monitor dev-master
```

## 使用方式

这里有三种功能你可以使用。

例子:

1.为上报数据加一
```shell 
add($key) 
```  
2.为上报数据增加指定值
```shell 
addValue($key,$value)
```
3.为上报数据设置指定值
```shell 
set($key,$value)  
```

##接下来要做的是
1.增加服务端进行数据收集。



## 一起创造

你可以通过一下几种方式进行代码贡献。

1. 通过这个链接提交问题 [issue tracker](https://github.com/monitor/php/issues).
2. 帮助解答已存在的相应问题 [issue tracker](https://github.com/monitor/php/issues).
3. 提交新的功能并更新文档.


## 协议
本开源项目遵守MIT协议

-----------------------------------------------------------------------------------
English Doc
## Installing

```shell
$ composer require mini-monitor/php_monitor dev-master
```

## Usage

There are three functions you can use .

example:

Add one to on the key
```shell 
add($key) 
```  
To add a value of key
```shell 
addValue($key,$value)
```

To set a value of key
```shell 
set($key,$value)  
```

##TODO LISTS



## Contributing

You can contribute in one of three ways:

1. File bug reports using the [issue tracker](https://github.com/monitor/php/issues).
2. Answer questions or fix bugs on the [issue tracker](https://github.com/monitor/php/issues).
3. Contribute new features or update the wiki.


## License

MIT
