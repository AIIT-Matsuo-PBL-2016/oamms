<?php
/**
 * OCoMMS Project
 *
 * @author        Kotaro Miura
 * @copyright     2016 Advanced Institute of Industrial Technology
 * @link          http://aiit.ac.jp/
 * @license       http://www.gnu.org/licenses/gpl-3.0.en.html GPL License
 */

App::uses('AppController', 'Controller');
/**
 * Settings Controller
 *
 * @property Setting $Setting
 * @property PaginatorComponent $Paginator
 */
class SettingsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

	public function admin_index()
	{
		if ($this->request->is(array('post', 'put')))
		{
			//debug($this->request->data);
			
			$this->Setting->setSettings($this->request->data['Setting']);
			
			foreach ($this->request->data['Setting'] as $key => $value)
			{
				$this->Session->Write('Setting.'.$key, $value);
			}
		}
		
		$color = $this->Session->read('Setting.color');
		
		//debug($color);
		
		$this->Setting->recursive = 0;
		$this->set('settings',		$this->Paginator->paginate());
		$this->set('colors',		Configure::read('theme_colors'));
		$this->set('color',			$color);
	}
}
