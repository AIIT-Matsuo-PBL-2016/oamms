<?php
 App::uses('FormHelper', 'View/Helper');
  
 class AppFormHelper extends FormHelper
 {
	 /**
	  * �����ɋL�q�����L�[�� $options �ɂ������ꍇ�A
	  * �R�[���o�b�N�����s
	  *
	  * @var array
	  */
	 public $app_tags = array(
		 'help', 'helpText', 'helpList', 'example'
	 );
  
	 /**
	  * $options �� self::$app_tags �Œ�`���ꂽ�L�[���������ꍇ�A
	  * self::$key()�����s����
	  *
	  * @param string $fieldName
	  * @param array $options
	  * @return string
	  * @throws Exception
	  */
	 public function input($fieldName, $options = array())
	 {
		 foreach ($options as $key => $value) {
			 if (in_array($key, $this->app_tags)) {
				 if (method_exists($this, $key)) {
					 $options = call_user_func(array($this, $key), $options);
				 } else {
					 throw new Exception(sprintf('AppFormHelper::%s()������܂���B', $key));
				 }
			 }
		 }
		 
  
		 return parent::input($fieldName, $options);
	 }

	public function bs_input($fieldName, $options = array())
	{
		$options['label'] = false;
		
		return parent::input($fieldName, $options);
	}
	

	 /**
	  * �w���v�̏o��
	  *
	  * $options['help'] �� �z��̏ꍇ self::helpList()
	  * ����ȊO�̏ꍇ self::helpText() �����s����
	  *
	  * @param array $options
	  * @return array
	  */
	 protected function help(Array $options)
	 {
		 if (is_array($options['help'])) {
			 $options['helpList'] = $options['help'];
			 $options = $this->helpList($options);
		 } else {
			 $options['helpText'] = $options['help'];
			 $options = $this->helpText($options);
		 }
		 unset($options['help']);
  
		 return $options;
	 }
	 /**
	  * ���͂ɂ��Ă̒��ӎ���
	  *
	  * $options['helpText']�̓��e�� p�^�O�Ń��b�v����
	  * after �ɓ���ւ���
	  *
	  * @param array $options
	  * @return array
	  */
	 protected function helpText(Array $options)
	 {
		 $helptext = String::insert('<p class="help-text">:helptext</p>', array('helptext' => $options['helpText']));
		 if (array_key_exists('after', $options)) {
			 $options['after'] .= $helptext;
		 } else {
			 $options['after'] = $helptext;
		 }
		 unset($options['helpText']);
  
		 return $options;
	 }
  
	 /**
	  * ���͂ɂ��Ă̒��ӎ��� ����
	  *
	  * $options['helpText']�̓��e�� ul�^�O�Ń��b�v����
	  * after �ɓ���ւ���
	  *
	  * @param array $options
	  * @return array
	  */
	 protected function helpList(Array $options)
	 {
  
		 $ul = $this->Html->nestedList($options['helpList'], array('class' => 'help-list'));
  
		 if (array_key_exists('after', $options)) {
			 $options['after'] .= $ul;
		 } else {
			 $options['after'] = $ul;
		 }
		 unset($options['helpList']);
  
		 return $options;
	 }
  
	 /**
	  * ���͗��ǉ�
	  *
	  * $options['example']�̓��e�� p�^�O�Ń��b�v����
	  * after �ɓ���ւ���Binput�^�O�̒���ɕ\�������B
	  *
	  * @param array $options
	  * @return array
	  */
	 protected function example(Array $options)
	 {
		 $text = String::insert('<p class="example">���͗�) :text</p>', array('text' => $options['example']));
		 if (array_key_exists('after', $options)) {
			 // ���͗��input�̒���ɕ\��
			 $options['after'] = $text . $options['after'];
		 } else {
			 $options['after'] = $text;
		 }
		 unset($options['example']);
  
		 return $options;
	 }
 }
 ?>