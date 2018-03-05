<?php
namespace Home\Controller;
use Think\Controller;
use Think\Exception;
use Think\Think;

class IndexController extends CommonController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index($type = '')
    {
        try {
            $webInfo = D('Basic')->getInfo(C('BASIC_INFO'));
            if ($webInfo === false) {
                return show(0, '获取站点信息失败');
            }
            $banner_news = D('PositionContent')->getContentsByPositionId(1);
            if ($banner_news === false) {
                return show(0, '获取大图推荐失败');
            }
            $small_banner_news = D('PositionContent')->getContentsByPositionId(2);
            if ($small_banner_news === false) {
                return show(0, '获取小图推荐失败');
            }
            $page_list = D('News')->getAllNews();
            if ($page_list === false) {
                return show(0, '获取列表失败');
            }
        } catch (Exception $err) {
            return show(0, '异常' . $err->getMessage());
        }

        $this->assign('web_info', $webInfo);
        $this->assign('banner_news', $banner_news);
//        print_r($banner_news);exit;
        $this->assign('small_banner_news', $small_banner_news);
        $this->assign('page_list', $page_list);
        if ($type === true) {
            return $this->buildHtml('index', HTML_PATH, 'Index/index');
        } else {
            $this->display();
        }
    }

    public function build_html()
    {
        $content = $this->index(true);
        if ($content) {
            return show(1, '更新缓存成功');
        } else {
            return show(0, '更新缓存失败');
        }
    }

    public function crontab_build_html(){
        $result = D("Basic")->getInfo(C('BASIC_INFO'));
        echo $result['cacheindex'];
        /*if(APP_CRONTAB != 1) {
            die("the_file_must_exec_crontab");
        }
        $result = D("Basic")->getInfo(C('BASIC_INFO'));
        if(!$result['cacheindex']) {
            die('系统没有设置开启自动生成首页缓存的内容');
        }
        $this->index(true);*/
    }

    public function getCount()
    {
        if ($_POST) {
//            print_r($_POST);exit;
            $newsIds = array_unique($_POST);
            try {
                $news = D('News')->findNewsByIds($newsIds);
                if ($news === false) {
                    return show(0, '没有数据');
                }
                $data = array();
                foreach ($news as $value) {
                    $data[$value['news_id']] = $value['count'];
                }
                return show(1,'成功', $data);
            } catch (Exception $err) {
                return show(0, '异常' . $err->getMessage());
            }

        } else {
            return show(0, '没有内容');
        }
    }

}