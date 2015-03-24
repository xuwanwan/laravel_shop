<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>
            @section('title')
            @show{{-- 页面标题 --}}
        </title>
        <meta name="description" content="@yield('description')">{{-- 页面描述 --}}
        <meta name="keywords" content="@yield('keywords')" />    {{-- 页面关键词 --}}
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @section('beforeStyle')
        @show{{-- 页面内联样式之前 --}}
        @section('style')
        @show{{-- 累加的页面内联样式 --}}
        @section('afterStyle')
        @show{{-- 页面内联样式之后 --}}
        <script type="text/javascript">

        ddsmoothmenu.init({
            mainmenuid: "top_nav", //menu DIV id
            orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
            classname: 'ddsmoothmenu', //class added to menu's outer DIV
            //customtheme: ["#1c5a80", "#18374a"],
            contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
        })

    </script>
    </head>
    <body>
        
        @yield('body')
        
        @section('end')
        @show{{-- 页面主体之后 --}}

    </body>
</html>