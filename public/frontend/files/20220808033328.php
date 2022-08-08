<?php

require_once dirname(__FILE__).'/baseActions.class.php';

/**
 * profile actions.
 *
 */
class profileActions extends profileBaseActions
{
  public function executeShow(sfWebRequest $request)
  {
    $this->viewer_id = $this->getUser()->getId();

    $owner = null;
    if ($request->hasParameter('person_id')) {
      $owner = Doctrine::getTable('cmPerson')->findOneById($request->getParameter('person_id'));
    } else {
      $owner = Doctrine::getTable('cmPerson')->findOneByLocalId($request->getParameter('local_id'));
    }

    $this->owner = $owner;
    $this->forward404Unless($owner);

    $viewer_kengen = $this->getUser()->getKengen();

    if (!$this->getUser()->isMe($owner->getId()) && 'admin' !== $viewer_kengen) {
      if (('member' === $owner->getKengen() && 'member' === $viewer_kengen)) {
        $this->redirect('@homepage');
      }elseif (('partner' === $owner->getKengen() && 'partner' === $viewer_kengen)) {
        $this->redirect('@homepage');
      }
    }
    
    if (!$this->getUser()->isAuthenticated() && 'member' === $owner->getKengen() && 'partner' === $owner->getKengen()) {
     $this->redirect('@homepage');
    }

    // json形式判定
    if ('json' === $request->getRequestFormat()) {
      /**
       * 開発メモ
       * ここを修正したら、cmUtil::setAccessControlAllowHeaderForMase()も同様に修正する必要あり。
       * ※最終的には、cmUtil::setAccessControlAllowHeaderForMase()を利用する方向で修正する必要あり。
       */
      if (1 !== preg_match('#^(https?)://([^/]+)#', cmConfig::get('MASE_URL'), $match1)) {
        $this->forward404();
      }
      $host = $match1[2];

      $scheme = '';
      $referer = $request->getReferer();
      if ('' === $referer || 1 !== preg_match('#^(https?)://([^/]+)#', $referer, $match2)) {
        $scheme = $request->isSecure() ? 'https' : 'http';
      } else {
        $scheme = $match2[1];
      }

      $response = $this->getResponse();
      $response->setHttpHeader('Access-Control-Allow-Origin', $scheme . '://' . $host);
      $response->setHttpHeader('Access-Control-Allow-Credentials', 'true');
    } else {
      //アクセスログ
      if($this->owner->getId() != $this->viewer_id){
        Doctrine::getTable('cmAshiatoLog')->registerLog($this->owner, $this->getUser());
      }
    }

    //最新のブログ
    $blog_sql = Doctrine_Query::create()
            ->from('cmBlogEntry be')
            ->innerJoin('be.blog b')
            ->innerJoin('be.Translation betr WITH betr.lang=?',$this->getUser()->getCulture())
            ->where('be.owner_id = ?', $this->owner->getId())
            ->andWhere('be.approved_at IS NOT NULL')
            ->andWhere('be.published_at <= ?', $GLOBALS['CM_DB_SEARCH_TIME']);
    cmUtil::add_entry_open_range($blog_sql, 'b', 'be', $this->owner, $this->getUser());
    $blog_sql->addOrderBy('be.published_at DESC')
             ->limit(cmConfig::get('PROFILE_SHOW_BLOG',5));

    $this->blog_entries = $blog_sql->execute();
    /*
    //最新のアイテム
    $item_sql = Doctrine_Query::create()
                  ->from('cmAlbumEntry ae')
                  ->innerJoin('ae.album a')
                  ->where('a.owner_id = ?',$this->owner->getId())
                  ->addOrderBy('ae.created_at DESC')
                  ->limit(cmConfig::get('PROFILE_SHOW_ITEM',5));
    cmUtil::add_entry_open_range($item_sql, 'a', 'ae', $this->owner, $this->getUser());

    $this->items = $item_sql->execute();*/

    //ページタイトル設定
    cmUtil::setPageTitle(sprintf(cmConfig::get('PAGE_TITLE_FORMAT'),
                         cmConfig::get('SITE_NAME'),cmUtil::__('%owner%さんのプロフィール',array('%owner%'=>$this->owner))));

    $header_info = array();
    foreach ($this->owner->getNarrowUserProfile() as $key => $item) {
      $header_info['PROFILE_ITEM_'.strtoupper($key)] = $item->getProfileValue();
    }
    foreach ($this->owner->getWideUserProfile() as $key => $item) {
      $header_info['PROFILE_ITEM_'.strtoupper($key)] = mb_strimwidth(str_replace(array("\r", "\n"), '', $item->getProfileValue()), 0, 128);
    }
    sfContext::getInstance()->getConfiguration()->loadHelpers('Image');
    $header_info['PROFILE_ITEM_PIC'] = (empty($_SERVER["HTTPS"]) ? "http://" : "https://") . $_SERVER["HTTP_HOST"] . person_image_url_for($owner, $size_out);
    cmUtil::setVariableMetaDatas($header_info);

    // 権限別プロフィール表示
    $file = sfConfig::get('sf_app_dir').'/modules/profile/templates/show'.ucfirst($this->owner->kengen).'.php';
    if(is_readable($file)){
      return ucfirst($this->owner->kengen);
    }
  }
}
