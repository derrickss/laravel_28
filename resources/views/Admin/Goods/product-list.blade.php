﻿<!DOCTYPE HTML>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="renderer" content="webkit|ie-comp|ie-stand">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"
        />
        <meta http-equiv="Cache-Control" content="no-siteapp" />
        <!--[if lt IE 9]>
            <script type="text/javascript" src="lib/html5shiv.js">
            </script>
            <script type="text/javascript" src="lib/respond.min.js">
            </script>
        <![endif]-->
        <link rel="stylesheet" type="text/css" href="static/h-ui/css/H-ui.min.css"
        />
        <link rel="stylesheet" type="text/css" href="static/h-ui.admin/css/H-ui.admin.css"
        />
        <link rel="stylesheet" type="text/css" href="lib/Hui-iconfont/1.0.8/iconfont.css"
        />
        <link rel="stylesheet" type="text/css" href="static/h-ui.admin/skin/default/skin.css"
        id="skin" />
        <link rel="stylesheet" type="text/css" href="static/h-ui.admin/css/style.css"
        />
        <!--[if IE 6]>
            <script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js">
            </script>
            <script>
                DD_belatedPNG.fix('*');
            </script>
        <![endif]-->
        <title>
            建材列表
        </title>
        <link rel="stylesheet" href="lib/zTree/v3/css/zTreeStyle/zTreeStyle.css"
        type="text/css">
        <style>
            .dataTables_paginate{
                display: none;
            }

            .page{
                position: relative;
            }
            .pagination{
                position: absolute;
                top:10px;
                right:10px;
            }
            .pagination li{
                border:1px solid #ccc;cursor:pointer;display:inline-block;margin-left:2px;text-align:center;text-decoration:none;color:#666;height:26px;line-height:26px;text-decoration:none;margin:0 0 6px 6px;padding:0 10px;font-size:14px
            }
            .pagination li a{

                text-decoration: none;
            }
            .disabled,.active{border:1px solid #ccc;cursor:pointer;display:inline-block;margin-left:2px;text-align:center;text-decoration:none;color:#fff;height:26px;line-height:26px;text-decoration:none;margin:0 0 6px 6px;padding:0 10px;font-size:14px}
            .active{
                background: #5a98de;
                color: #fff;
            }
            .active span{
                font-size:20px;
            }
            .disabled:hover{
                background: #5a98de;
                color: #fff;
            }
            .pagination li:hover{
                background: #5a98de;
                color: #fff;
            }

        </style>
    </head>

    <body class="pos-r">
        <div class="pos-a" style="width:200px;left:0;top:0; bottom:0; height:100%; border-right:1px solid #e5e5e5; background-color:#f5f5f5; overflow:auto;">
            <ul id="treeDemo" class="ztree">
            </ul>
        </div>
        <div style="margin-left:200px;">
            <nav class="breadcrumb">
                <i class="Hui-iconfont">
                    &#xe67f;
                </i>
                首页
                <span class="c-gray en">
                    &gt;
                </span>
                产品管理
                <span class="c-gray en">
                    &gt;
                </span>
                产品列表
                <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px"
                href="javascript:location.replace(location.href);" title="刷新">
                    <i class="Hui-iconfont">
                        &#xe68f;
                    </i>
                </a>
            </nav>
            <div class="page-container">
            <form action="/product-list" method="get">
                <div class="text-c">
                    日期范围：
                    <input type="text" onfocus="WdatePicker({ maxDate:'#F{$dp.$D(\'logmax\')||\'%y-%M-%d\'}' })"
                    id="logmin" class="input-text Wdate" style="width:120px;">
                    -
                    <input type="text" onfocus="WdatePicker({ minDate:'#F{$dp.$D(\'logmin\')}',maxDate:'%y-%M-%d' })"
                    id="logmax" class="input-text Wdate" style="width:120px;">
                    <input type="text" name="KeyWord" id="" placeholder=" 产品名称" style="width:250px"
                    class="input-text">
                    <button name="" id="" class="btn btn-success" type="submit">
                        <i class="Hui-iconfont">
                            &#xe665;
                        </i>
                        搜产品
                    </button>
                </div>
            </form>
                <div class="cl pd-5 bg-1 bk-gray mt-20">
                    <span class="l">
                        <a href="javascript:;" onclick="datadel()" class="btn btn-danger radius">
                            <i class="Hui-iconfont">
                                &#xe6e2;
                            </i>
                            批量删除
                        </a>
                        <a class="btn btn-primary radius" onclick="product_add('添加产品','/product-list/create')"
                        href="javascript:;">
                            <i class="Hui-iconfont">
                                &#xe600;
                            </i>
                            添加产品
                        </a>
                    </span>
                    <span class="r count">
                        共有数据：<strong>{{$count}}</strong>条
                    </span>
                </div>
                <div class="mt-20">
                    <table class="table table-border table-bordered table-bg table-hover table-sort">
                        <thead>
                            <tr class="text-c">
                                <th width="40">
                                    <input name="" type="checkbox" value="">
                                </th>
                                <th width="40">
                                    ID
                                </th>
                                <th width="60">
                                    缩略图
                                </th>
                                <th width="100">
                                    产品名称
                                </th>
                                <th>
                                    描述
                                </th>
                                <th width="100">
                                    单价
                                </th>
                                <th width="60">
                                    发布状态
                                </th>
                                <th width="100">
                                    操作
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                         @foreach($page as $row)
                            <tr class="text-c va-m">
                                <td>
                                    <input name="" type="checkbox" value="">
                                </td>
                                <td>{{$row->id}}</td>
                                <td>
                                    <a onClick="product_show('商品名','/product-list/{{$row->id}}','10001')" href="javascript:;">
                                        <img width="60" class="product-thumb" src="{{$row->g_pic}}">
                                    </a>
                                </td>
                                <td class="text-l">
                                    <a style="text-decoration:none" onClick="product_show('商品名','/product-list/{{$row->id}}','10001')"
                                    href="javascript:;">
                                        <!-- <img title="国内品牌" src="static/h-ui.admin/images/cn.gif"> -->
                                        <b class="text-success">
                                        </b>
                                        {{$row->name}}
                                    </a>
                                </td>
                                <td class="text-l">
                                    {{$row->g_desc}}
                                </td>
                                <td>
                                    <span class="price">
                                       {{$row->price}}
                                    </span>
                                    元
                                </td>
                                <td class="td-status">
                                    @if($row->display)
                                     <span class="label label-success radius">
                                       已发布
                                    @else
                                     <span class="label label-disabled radius">
                                       已下架
                                    @endif
                                    </span>
                                </td>
                                <td class="td-manage">
                                     @if($row->display)
                                    <a style="text-decoration:none" onClick="product_stop(this,{{$row->id}})" href="javascript:;"
                                    title="下架">
                                        <i class="Hui-iconfont status">
                                            &#xe6de;
                                        @else
                                     <a style="text-decoration:none" onClick="product_start(this,{{$row->id}})" href="javascript:;"
                                    title="上架">
                                        <i class="Hui-iconfont status">
                                            &#xe6dc;
                                        @endif
                                        </i>
                                    </a>
                                    <a style="text-decoration:none" class="ml-5" onClick="product_edit('产品编辑','product-list/{{$row->id}}/edit','10001')"
                                    href="javascript:;" title="编辑">
                                        <i class="Hui-iconfont">
                                            &#xe6df;
                                        </i>
                                    </a>
                                    <a style="text-decoration:none" class="ml-5" onClick="product_del(this,'{{$row->id}}')"
                                    href="javascript:;" title="删除">
                                        <i class="Hui-iconfont">
                                            &#xe6e2;
                                        </i>
                                    </a>
                                </td>
                            </tr>
                             @endforeach
                        </tbody>

                    </table>
                    <div class="page">{{$page->appends($request)->render()}}</div>
                </div>
            </div>
        </div>
        <!--_footer 作为公共模版分离出去-->
        <script type="text/javascript" src="lib/jquery/1.9.1/jquery.min.js">
        </script>
        <script type="text/javascript" src="lib/layer/2.4/layer.js">
        </script>
        <script type="text/javascript" src="static/h-ui/js/H-ui.min.js">
        </script>
        <script type="text/javascript" src="static/h-ui.admin/js/H-ui.admin.js">
        </script>
        <!--/_footer 作为公共模版分离出去-->
        <!--请在下方写此页面业务相关的脚本-->
        <script type="text/javascript" src="lib/zTree/v3/js/jquery.ztree.all-3.5.min.js">
        </script>
        <script type="text/javascript" src="lib/My97DatePicker/4.8/WdatePicker.js">
        </script>
        <script type="text/javascript" src="lib/datatables/1.10.0/jquery.dataTables.min.js">
        </script>
        <script type="text/javascript" src="lib/laypage/1.2/laypage.js">
        </script>
        <script type="text/javascript">
            var setting = {
                view: {
                    dblClickExpand: false,
                    showLine: false,
                    selectedMulti: false
                },
                data: {
                    simpleData: {
                        enable: true,
                        idKey: "id",
                        pIdKey: "pId",
                        rootPId: ""
                    }
                },
                callback: {
                    beforeClick: function(treeId, treeNode) {
                        var zTree = $.fn.zTree.getZTreeObj("tree");
                        if (treeNode.isParent) {
                            zTree.expandNode(treeNode);
                            return false;
                        } else {
                            //demoIframe.attr("src",treeNode.file + ".html");
                            return true;
                        }
                    }
                }
            };
                var zNodes = [
            @foreach ($cates as $row)
            {
                 id:{{ $row->id }},
                 pId:{{ $row->pid }},
                 name: "{{$row->name}}",
                },
            @endforeach

            ];

            $(document).ready(function() {
                var t = $("#treeDemo");
                t = $.fn.zTree.init(t, setting, zNodes);
                //demoIframe = $("#testIframe");
                //demoIframe.on("load", loadReady);
                var zTree = $.fn.zTree.getZTreeObj("tree");
                //zTree.selectNode(zTree.getNodeByParam("id",'11'));
            });

            $('.table-sort').dataTable({
                "aaSorting": [[1, "desc"]],
                //默认第几个排序
                "bStateSave": true,
                //状态保存
                "aoColumnDefs": [{
                    "orderable": false,
                    "aTargets": [0, 7]
                } // 制定列不参与排序
                ]
            });
            /*产品-添加*/
            function product_add(title, url) {
                var index = layer.open({
                    type: 2,
                    title: title,
                    content: url
                });
                layer.full(index);


            }
            /*产品-查看*/
            function product_show(title, url, id) {
                var index = layer.open({
                    type: 2,
                    title: title,
                    content: url
                });
                layer.full(index);
            }
            /*产品-审核*/
            function product_shenhe(obj, id) {
                layer.confirm('审核文章？', {
                    btn: ['通过', '不通过'],
                    shade: false
                },
                function() {
                    $(obj).parents("tr").find(".td-manage").prepend('<a class="c-primary" onClick="product_start(this,id)" href="javascript:;" title="申请上线">申请上线</a>');
                    $(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已发布</span>');
                    $(obj).remove();
                    layer.msg('已发布', {
                        icon: 6,
                        time: 1000
                    });
                },
                function() {
                    $(obj).parents("tr").find(".td-manage").prepend('<a class="c-primary" onClick="product_shenqing(this,id)" href="javascript:;" title="申请上线">申请上线</a>');
                    $(obj).parents("tr").find(".td-status").html('<span class="label label-danger radius">未通过</span>');
                    $(obj).remove();
                    layer.msg('未通过', {
                        icon: 5,
                        time: 1000
                    });
                });
            }
            // /*产品-下架*/
            // function product_stop(obj, id) {
            //     layer.confirm('确认要下架吗？',
            //     function(index) {
            //         $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="product_start(this,id)" href="javascript:;" title="发布"><i class="Hui-iconfont">&#xe6dc;</i></a>');
            //         $(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">已下架</span>');
            //         $(obj).remove();
            //         layer.msg('已下架!', {
            //             icon: 5,
            //             time: 1000
            //         });
            //     });
            // }

            // /*产品-发布*/
            // function product_start(obj, id) {
            //     layer.confirm('确认要发布吗？',
            //     function(index) {
            //         $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="product_stop(this,id)" href="javascript:;" title="下架"><i class="Hui-iconfont">&#xe6de;</i></a>');
            //         $(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已发布</span>');
            //         $(obj).remove();
            //         layer.msg('已发布!', {
            //             icon: 6,
            //             time: 1000
            //         });
            //     });
            // }
            /*用户-停用*/
            function product_stop(obj,id){
                layer.confirm('确认要下架吗？',function(index){
                    $.ajax({
                        type: 'GET',
                        url: "/product-stop/"+id,
                        dataType: 'json',
                        success: function(data){
                            // alert(data);
                            $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="product_start(this,'+id+')" href="javascript:;" title="发布"><i class="Hui-iconfont">&#xe6dc;</i></a>');
                            $(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">已下架</span>');
                            $(obj).remove();
                            layer.msg('已下架!',{icon: 5,time:1000});
                        },
                        error:function(data) {
                            console.log(data.msg);
                        },
                    });
                });
            }

            /*用户-启用*/
            function product_start(obj,id){
                layer.confirm('确认要发布吗？',function(index){
                    $.ajax({
                        type: 'GET',
                        url: "/product-start/"+id,
                        dataType: 'json',
                        success: function(data){
                            // alert(data);
                            $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="product_stop(this,id)" href="javascript:;" title="下架"><i class="Hui-iconfont">&#xe6de;</i></a>');
                            $(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已发布</span>');
                            $(obj).remove();
                            layer.msg('已发布!',{icon: 6,time:1000});
                        },
                        error:function(data) {
                            console.log(data.msg);
                        },
                    });
                });
            }
            /*产品-申请上线*/
            function product_shenqing(obj, id) {
                $(obj).parents("tr").find(".td-status").html('<span class="label label-default radius">待审核</span>');
                $(obj).parents("tr").find(".td-manage").html("");
                layer.msg('已提交申请，耐心等待审核!', {
                    icon: 1,
                    time: 2000
                });
            }

            /*产品-编辑*/
            function product_edit(title, url, id) {
                var index = layer.open({
                    type: 2,
                    title: title,
                    content: url
                });
                layer.full(index);
            }

            /*产品-删除*/
            function product_del(obj, id) {
                layer.confirm('确认要删除吗？',
                function(index) {
                    $.ajax({
                        type: 'get',
                        url: '/product-lists/'+id,
                        dataType: 'json',
                        success: function(data) {
                            $(obj).parents("tr").remove();
                            layer.msg('已删除!', {
                                icon: 1,
                                time: 1000
                            });
                           $('.count').html('共有数据：<strong>{{$count-1}}</strong>条');;
                        },
                        error: function(data) {
                            console.log(data.msg);
                        },
                    });
                });


            }

        </script>
        <script>
            @if(session('success')==1)
                    var index = parent.layer.getFrameIndex(window.name);
                    window.parent.location.reload();
                    // parent.$('.btn-refresh').click();
                    parent.layer.msg('操作成功');
                    // parent.layer.close(index);
                    // parent.location.replace(location.href);
           
            @endif
        </script>
    </body>
</html>