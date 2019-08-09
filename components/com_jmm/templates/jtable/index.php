<?php
/**
 * @package    JMM
 * @link    http://adidac.github.com/jmm/index.html
 * @license    GNU/GPL
 * @copyright  Biswarup Adhikari
*/
defined('_JEXEC') or die('Restricted access');
$document=JFactory::getDocument();
$jtable_theme=$params->get('jtable_theme');
$document->addStyleSheet($this->curThemeURL.DS.'jtable'.DS.'themes'.DS.$jtable_theme);
$document->addStyleSheet($this->curThemeURL.DS.'css'.DS.'ui-themes'.DS.'redmond'.DS.'jquery-ui-1.8.16.custom.css');
//$document->addScript($this->curThemeURL.DS.'js'.DS.'jquery-1.9.1.min.js');
//$document->addScript($this->curThemeURL.DS.'js'.DS.'jquery-ui-1.9.2.min.js');
//$document->addScript($this->curThemeURL.DS.'jtable'.DS.'jquery.jtable.min.js');
$siteTableId=(int)$this->params->get('site_table_id');
$no_record_per_page=(int) $params->get('no_record_per_page');
$fields=array();
foreach($this->columns as $col){
  $fields[$col]=array('title'=>ucfirst($col),'list'=>'true');
}
$this->defaultPagination=false;
?>
<div id="JTableContainer" style="width:100%;"></div>
<script type="text/javascript" src="<?php echo $this->curThemeURL.DS.'js'.DS.'jquery-ui-1.9.2.min.js';?>"></script>
<script type="text/javascript" src="<?php echo $this->curThemeURL.DS.'jtable'.DS.'jquery.jtable.min.js';?>"></script>
<script type="text/javascript">
var JQ=jQuery.noConflict();
  JQ(document).ready(function() {
    JQ('#JTableContainer').jtable({
      title : '<?php echo $this->siteTableDetails->title;?>',
      paging : true, //Enable paging
      pageSize : <?php echo $no_record_per_page;?>, //Set page size (default: 10)
      sorting : true, //Enable sorting
      multiSorting:true,
      selecting:true,
      defaultSorting : '<?php echo $this->columns[0];?> ASC', //Set default sorting
      actions : {
        listAction : 'index.php?option=com_jmm&task=getItems&site_table_id=<?php echo $siteTableId;?>',
      },
      fields : <?php echo json_encode($fields);?>
    });
    JQ('#JTableContainer').jtable('load');
  });
</script>
