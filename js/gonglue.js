/**
 * www.kong-qi.com
 * author:kongqi
 * 2015-4-20
 * 
 * 
**/
(function($) {
    $.fn.roll = function(options) {
        var defaults = {
            'findtype': 'children', //找出子事件
            'subbox': '.subul',//EXP:UL滚动
            'subclass': '.item',//exp: li元素
            'auto': true,//是否自动滚动
            'arrows': true,//是否使用箭头切换
            'page': 1,//开始位置,默认第一张
            'pageli': 1,//一次切换要多少张
            'customnum': '',//自定义总数量
            'customon': '',//自定义选中的开始
            'time': 3000,//滚动时间
            'nextid': '.next',//切换的class id
            'previd': '.prev',//
            'leftsize':0,
            'slide': true,//是否生产子切换
            'slidehtml': 'li',
            'slide_a': 'slide_a',
            'slideid': '.sublibanner',
            'slideon': 'on'
        }
        var self = {
            timer: ''
        }
        var opts = $.extend(defaults, options);
        var page = opts.page;
        var objthis = $(this);
        //初始化
        if (opts.findtype == 'children') {
            item_cout = $(opts.subbox).children(opts.subclass).size();
        } else {
            item_cout = $(opts.subbox).find(opts.subclass).size();
        }
        var item_w = opts.pageli * $(opts.subbox).find(opts.subclass).width()+opts.leftsize; //EXP li width
        var subbox_w = item_cout * item_w;
        var page_cout = Math.ceil(item_cout / opts.pageli);
        //如果客户端自定义总数量
        if (opts.customnum) {
            page_cout = opts.customnum;
        }
        //设置boxul宽度
        $(opts.subbox).css('width', subbox_w + "px");
        //选中不滚
        _hover = function(id) {
            if(opts.auto){
              $(id).hover(function() {
                  clearInterval(timerID);
              }, function() {
                  timerID = setTimeout("_roll()", opts.time);
              });
            }
        };
        _roll = function() {
            if (page < page_cout) {
                left_v = -page * item_w;
                $(opts.subbox).stop().animate({
                    "left": left_v + "px"
                });
                page++;
            } else {
                left_v = 0;
                $(opts.subbox).stop().animate({
                    "left": left_v + "px"
                });
                page = 1;
            }
            //选中子状态
            if (opts.slide) {
                _slideon("." + opts.slide_a, page);
            }
            timerID = setTimeout("_roll()", opts.time);
        };
        _slideon = function(classid, i) {
            $(classid).eq(i - 1).addClass(opts.slideon);
            size = $(classid + ':not(:eq(' + (i - 1) + '))').removeClass(opts.slideon);
        };
        _slide = function(i) {
                left_v = -(i - 1) * item_w;
                $(opts.subbox).stop().animate({
                    "left": left_v + "px"
                });
                page = i;
            }
            //是否子选择切换
        if (opts.slide) {
            slidestr = '<ul>';
            for (var i = 0; i < page_cout; i++) {
                slidestr += '<' + opts.slidehtml + '>' + '<a href="javascript:void(0)" class="' + opts.slide_a + '" page="' + (i + 1) + '" >' + (i + 1) + '</a>' + '</' + opts.slidehtml + '>';
            };
            slidestr += '</ul>';
            $(opts.slideid).append(slidestr);
            $("." + opts.slide_a).on('click', function(event) {
                var i = $(this).attr('page');
                _slide(i);
                page = i;
                _slideon("." + opts.slide_a, page);
            });
            _hover("." + opts.slide_a);
            //初始选中状态
            if (opts.customon) {
                _slideon("." + opts.slide_a, opts.customon);
            } else {
                _slideon("." + opts.slide_a, page);
            }
        };
        //是否自动滚动
        if (opts.auto) {
            timerID = setTimeout("_roll()", opts.time);
        };
        //是否开启左右节点
        if (opts.arrows) {
            $(document).on('click', opts.nextid, function(event) {
                if (page == page_cout) {
                    left_v = 0;
                    $(opts.subbox).stop().animate({
                        "left": left_v + "px"
                    });
                    page = 1;
                } else {
                    left_v = -page * item_w;
                    $(opts.subbox).stop().animate({
                        "left": left_v + "px"
                    });
                    page++;
                }
                //选中子状态
                if (opts.slide) {
                    _slideon("." + opts.slide_a, page);
                }
            });
            $(document).on('click', opts.previd, function(event) {
                if (page == 1) {
                    left_v = -(page_cout - 1) * item_w;
                    $(opts.subbox).stop().animate({
                        "left": left_v + "px"
                    });
                    page = page_cout;
                } else {
                    left_v = -(page - 2) * item_w;
                    $(opts.subbox).stop().animate({
                        "left": left_v + "px"
                    });
                    page--;
                }
                //选中子状态
                if (opts.slide) {
                    _slideon("." + opts.slide_a, page);
                }
            });
            _hover(opts.nextid);
            _hover(opts.previd);
        };
    };
})(jQuery);
