<?php 
namespace docotel\dcms\components\bll;

use Yii;

class MediaService implements \docotel\dcms\components\bll\IMediaService
{

    private $mediaProvider;

    public function __construct()
    {
    	Yii::$container->setSingleton('docotel\dcms\components\dal\IMediaProvider',
    		'docotel\dcms\components\dal\MediaProvider');

    	$this->mediaProvider = Yii::$container->get('docotel\dcms\components\dal\IMediaProvider');
    }


    /**
     * [mediaSearchInstance description]
     * @return [type] [description]
     */
    public function mediaSearchInstance()
    {
        return $this->mediaProvider->mediaSearchInstance();
    }


    public function getAllMedia($order = 'media_id')
	{
		return $this->mediaProvider->getAllMedia($order);
	}
}
