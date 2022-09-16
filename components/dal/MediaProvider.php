<?php 

namespace docotel\dcms\components\dal;


use Yii;
use docotel\dcms\models\DclMedia;
use docotel\dcms\models\searchs\DclMedia as DclMediaSearch;


class MediaProvider implements \docotel\dcms\components\dal\IMediaProvider
{
	/**
	 * [mediaSearchInstance description]
	 * @return [type] [description]
	 */
	public function mediaSearchInstance()
	{
		return new DclMediaSearch();
	}

	/**
	 * [getAllMedia description]
	 * @param  string $order [description]
	 * @return [type]        [description]
	 */
	public function getAllMedia($order = 'media_id')
	{
		return DclMedia::find()->orderBy($order)->all();
	}
}