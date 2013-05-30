<?php
class Zend_View_Helper_ViewMenu
{
	protected $_view;

	protected $_headMenuItems = array(
			array(
				'name' => 'Настройки',
				'link' => 'options',
				'id' => 'options',
				'items' => array(
					array(
						'link'=>"nominals",
						'name'=>'Номиналы',
                        'id'=>"nominals",
                    ),
					array(
						'link'=>"operators",
						'name'=>'Операторы',
                        'id'=>"operators",
                    ),
					array(
						'link'=>"locations",
						'name'=>'Страны',
                        'id'=>"locations",
                    ),
					array(
						'link'=>"serialgroups",
						'name'=>'Группы серийников',
                        'id'=>"serialgroups",
                    ),
					array(
						'link'=>"buttonpresets",
						'name'=>'Кнопки',
                        'id'=>"buttonpresets",
                    ),
					array(
						'link'=>"queries",
						'name'=>'Запросы',
                        'id'=>"queries",
                    ),
					array(
						'link'=>"users",
						'name'=>'Пользователи',
                        'id'=>"users",
                    ),
					array(
						'link'=>"aclprofiles",
						'name'=>'Профили',
                        'id'=>"aclprofiles",
                    ),
					array(
						'link'=>"carderrors",
						'name'=>'Зависшие линки',
                        'id'=>"carderrors",
                    ),
					array(
						'link'=>"cardsync",
						'name'=>'Синхронизация карт',
                        'id'=>"cardsync",
                    ),
					array(
						'link'=>"messages/generator",
						'name'=>'Генератор сообщений',
                        'id'=>"messagesgenerator",
                    ),
					array(
						'link'=>"admin/fieldsview",
						'name'=>'Вывод полей',
                        'id'=>"adminfieldsview",
                    ),
					array(
						'link'=>"admin/gateflags",
						'name'=>'Действия на гейтах',
                        'id'=>"admingateflags",
                    ),
					array(
						'link'=>"refills/onlineaccounts",
						'name'=>'Аккаунты пополнений',
                        'id'=>"refillsonlineaccounts",
                    ),
					array(
						'link'=>"refills/online/articles",
						'name'=>'Ставки пополнений',
                        'id'=>"rrefillsonlinearticles",
                    ),
					array(
						'link'=>"codeeditor",
						'name'=>'Редактор кода',
                        'id'=>"codeeditor",
                    ),
					array(
						'link'=>"logic/filters",
						'name'=>'Фильтры логики',
                        'id'=>"logicfilters",
                    ),
					array(
						'link'=>"admin/fieldtranslates",
						'name'=>'Переводы полей',
                        'id'=>"adminfieldtranslates",
                    ),
					array(
						'link'=>"admin/chat/chat_groups",
						'name'=>'Группы чата',
                        'id'=>"adminchatchat_groups",
                    ),
				),
			),
			array(
				'name' => 'Клиенты',
				'link' => 'clients',
				'id' => 'clients',
			),
			array(
				'name' => 'Симсервера',
				'link' => 'simservers',
				'id' => 'simservers',
			),
		);

	function setView($view)
	{
	$this->_view = $view;
	}

	function viewMenu()
	{
		$selected = $this->_view->menuId;
		$selectdSub = $this->_view->subMenuId;
		$title = '';
		$result = array();
		$string = '<ul>';

		for ($i=0; $i < count($this->_headMenuItems) ; $i++) { 
	 		if ($this->_headMenuItems[$i]['id'] == $selected){
	 			$string .= '<li class=selected><a href="#" onClick="addItemToTabs(' . "'" . $this->_headMenuItems[$i]['id'] . "', '" . $this->_headMenuItems[$i]['name'] ."'".  ');" > ' . $this->_headMenuItems[$i]['name'] . '</a></li>';
	 			$subMenu = $this->_headMenuItems[$i]['items'];
	 			$title = $this->_headMenuItems[$i]['name'];
	 			$id_main = $this->_headMenuItems[$i]['id'];
	 		} else {
	 			$string .= '<li><a href="#" onClick="addItemToTabs(' . "'" . $this->_headMenuItems[$i]['id'] . "', '" . $this->_headMenuItems[$i]['name'] ."'" . ');" > ' . $this->_headMenuItems[$i]['name'] . '</a></li>';
	 		}
		}
		$string .= '</ul>';

		$result[] = $string;

		$string = '<ul>';

		if ($subMenu){

			for ($i=0; $i < count($subMenu) ; $i++) { 
		 		if ($subMenu[$i]['id'] == $selectdSub){
	 				$string .= '<li class=selected><a href="#" id="link-'."$id_main-".$subMenu[$i]['id'].'" onClick="showContent('."'$id_main',"."'".$this->_view->base_url . $subMenu[$i]['link']."'".');" > ' . $subMenu[$i]['name'] . '</a></li>';
	 				$title = $subMenu[$i]['name'];
		 		} else {
		 			$string .= '<li><a href="#" id="link-'."$id_main-".$subMenu[$i]['id'].'"  onClick="showContent('."'$id_main',"."'".$this->_view->base_url . $subMenu[$i]['link']."'".');" > ' . $subMenu[$i]['name'] . '</a></li>';
	 			}
			}
			$string .= '</ul>';
		}

		$result[] = $string;
		$result[] = $title;

		return $result;
	}
}