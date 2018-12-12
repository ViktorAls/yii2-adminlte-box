<?php
	/**
	 * Created by PhpStorm.
	 * User: vipvi_mc4
	 * Date: 12.12.2018
	 * Time: 10:45
	 */
	
	namespace common\widgets;
	
	
	use yii\helpers\Html;
	
	class Box extends \yii\bootstrap\Widget
	{
		const box_default = 'box-default';
		const box_primary = 'box-primary';
		const box_info = 'box-info';
		const box_warning = 'box-warning';
		const box_success = 'box-success';
		const box_danger = 'box-danger';
	
		public $boxType = 'box-default';
		public $boxClass;
		public $title = 'Box';
		private $headerLine = true;
		public $close = true;
		public $collapse = true;
		public $footer = true;
		public $contentFooter = 'footer';
		public $boxSolid =false;
		
		
		public function init()
		{
			parent::init();
			ob_start();
		}
		
		public function run()
		{
			$content = ob_get_clean();
			return $this->getBox($content);
		}
		
		public function getBox($content){
			if ($this->boxSolid){
			$box = Html::beginTag('div',['class'=>'box box-solid '.$this->boxType.' '.$this->boxClass,'data-widget'=>'box-widget']);
			}else {
				$box = Html::beginTag('div',['class'=>'box '.$this->boxType.' '.$this->boxClass,'data-widget'=>'box-widget']);
			}
			$box.=$this->getHeader();
			$box.=$this->getBody($content);
			if ($this->footer){
				$box.=$this->getFooter();
			}
			$box.=Html::endTag('div');
			return $box;
		}
		
		public function getHeader(){
			if ($this->headerLine){
				$header = Html::beginTag('div',['class'=>'box-header with-border']);
			} else {
				$header = Html::beginTag('div',['class'=>'box-header']);
			}
			$header.=Html::tag('n3',$this->title,['class'=>'box-title ']);
			if ($this->close || $this->collapse) {
				$header.=Html::beginTag('div',['class'=>'box-tools']);
				if ($this->close) {
					$header .= $this->getClose();
				}
				if ($this->collapse){
					$header.=$this->getCollapse();
				}
				$header.=Html::endTag('div');
			}
			$header.=Html::endTag('div');
			return $header;
		}
		
		public function getBody($content){
			$body = Html::beginTag('div',['class'=>'box-body']);
			$body.=$content;
			$body.=Html::endTag('div');
			return $body;
		}
		
		
		public function getClose(){
		 return Html::button('<i class="fa fa-times"></i>',['class'=>'btn btn-box-tool','data-widget'=>'remove','data-toggle'=>'tooltip','title'=>'Remove']);
		}
		
		public function getCollapse(){
			return Html::button('<i class="fa fa-minus"></i>',['class'=>'btn btn-box-tool','data-widget'=>'collapse','data-toggle'=>'tooltip','title'=>'Collapse']);
		}
		
		public function getFooter(){
			$footer = Html::beginTag('div',['class'=>'box-footer']);
			$footer.=$this->contentFooter;
			$footer.=Html::endTag('div');
			return $footer;
		}
	}