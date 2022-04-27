<?php
namespace app\admin\controller;

use app\BaseController;
use Mpdf\Mpdf;

class Index extends BaseController
{
    public function index()
    {
        return "admin";
    }

    public function hello($name = 'ThinkPHP6')
    {
        return 'hello,' . $name;
    }

    //创建pdf文件
    public function makePdf() {
        $id=time();
        //用html形式生成pdf

        //tempDir指定临时文件目录，需要有可写入的权限，否则会报错
        $mpdf = new Mpdf(['mode'=>'utf-8',
            'format' => 'A4',
        ]);
        // 文件属性
        $mpdf -> SetTitle('标题');
        $mpdf -> SetAuthor('作者');

        // 自动匹配语言字体
        $mpdf -> autoLangToFont = true;
        $mpdf -> autoScriptToLang = true;

        // 水印相关
//        $mpdf -> showWatermarkText = true; // 开启水印
        $mpdf -> SetWatermarkText('水印', 0.1); // 设置文本及透明度
        $mpdf -> watermark_font = 'GB'; // 中文支持
        $mpdf -> watermarkAngle = '22'; // 倾斜角度

        $mpdf->SetDisplayMode('fullpage');

        // 设置页眉
        $header = <<<xmsb
    <div style="width: 100%; font-size: 12px; text-align: right;">
        {DATE Y年m月j日}
    </div>
    <hr />
xmsb;
        $mpdf -> SetHTMLHeader($header);

        // 设置页脚
        $footer = <<<xmsb
    <hr />
    <div style="width: 100%; font-size: 12px; text-align: center;">
        第 {PAGENO} / {nb} 页
    </div>
xmsb;
        $mpdf -> SetHTMLFooter($footer);

        //文章pdf文件存储路径
        $fileUrl = $id.".pdf";
        //以html为标准分析写入内容
        $html = file_get_contents("https://sungoalweb.sciconf.cn/main-web/brand");
        $mpdf->WriteHTML($html);

        // 插入分页
        $mpdf -> AddPage();

        //生成文件
        $mpdf->Output($fileUrl);
        //判断是否生成文件成功
        if (is_file($fileUrl)){
            return json_encode("success");
        } else {
            return json_encode("failed");
        }
    }

    //下载pdf文件
    public function downPdf() {
        $id=123;
        $fileUrl = "/var/www/html/pdf/article_".$id.".pdf";
        return download($fileUrl,"article_".$id.".pdf");
    }
}
