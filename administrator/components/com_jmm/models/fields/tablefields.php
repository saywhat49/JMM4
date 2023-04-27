<?php
/**
 * @package     JMM
 * @link        http://adidac.github.com/jmm/index.html
 * @license     GNU/GPL
 * @copyright   Biswarup Adhikari
*/
// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted access');
 
jimport('joomla.form.formfield');
 
class JFormFieldTableFields extends JFormField {
 		
        protected $type = 'TableFields';
        protected $formData='';
 
        public function getInput() {
        	$table=JRequest::getVar('tbl');
        	$dbname=JRequest::getVar('dbname');
        	$tableFields=JMMCommon::showTableStructure($table);
        	for($i=0;$i<count($tableFields);$i++){
        		$field=$tableFields[$i];
        		$tmp=explode('(',$field['Type']);
        		$name=$field['Field'];
        		$type=$tmp[0];
        		$length=(int)str_replace(')', '', $tmp[1]);
        		$length+=1;
        		$id='jform_'.$name;
        		$label_name=ucwords($name).' ('.$type.')';
        		$label_id='jform_'.$name.'-lbl';
        		$this->drawForm("jform[$name]",$type,$id,$label_name,$label_id,$length);
        	}
        		return $this->formData;

        }

        function drawForm($name,$type,$id,$label_name,$label_id,$length){
        	$elementFun=str_replace(' ',_,'draw'.$type.'Element');
            if(!method_exists($this,$elementFun))
            {
               $elementFun='drawinputElement'; 
            }
            $this->formData.=$this->$elementFun($name,$type,$id,$label_name,$label_id,$length);
        	
        }

        /**
         * Draw Int Box
         */
        function drawinputElement($name,$type,$id,$label_name,$label_id,$length){
            $element='<div class="control-group">';
            $element.='<div class="control-label id="'.$label_id.'" for="'.$id.'">';
            $element.=$label_name;
            $element.='</div>';
            $element.='<div class="controls">';
            $element.='<input type="text" name="'.$name.'" id="'.$id.'" value="" size="'.$length.'" class="'.$type.'">';            
            $element.='</div>';
            $element.='</div>';
            return $element;
        }

        /**
         * Draw Int Box
         */
        function drawintElement($name,$type,$id,$label_name,$label_id,$length){
            $element='<div class="control-group">';
            $element.='<div class="control-label id="'.$label_id.'" for="'.$id.'">';
            $element.=$label_name;
            $element.='</div>';
            $element.='<div class="controls">';
            $element.='<input type="text" name="'.$name.'" id="'.$id.'" value="" size="'.$length.'" class="'.$type.'">';            
            $element.='</div>';
            $element.='</div>';
            return $element;
        }

        /**
         * Function Display Decimal 
         */
        function drawdecimalElement($name,$type,$id,$label_name,$label_id,$length){
        	$element='<div class="control-group">';
            $element.='<div class="control-label id="'.$label_id.'" for="'.$id.'">';
        	$element.=$label_name;
            $element.='</div>';
            $element.='<div class="controls">';
        	$element.='<input type="text" name="'.$name.'" id="'.$id.'" value="" size="'.$length.'" class="'.$type.'">';        	
        	$element.='</div>';
            $element.='</div>';
        	return $element;
        }

        /**
         * Draw Char Box
         */
        function drawcharElement($name,$type,$id,$label_name,$label_id,$length){
        	$element='<div class="control-group">';
            $element.='<div class="control-label id="'.$label_id.'" for="'.$id.'">';
        	$element.=$label_name;
            $element.='</div>';
            $element.='<div class="controls">';
        	$element.='<input type="text" name="'.$name.'" id="'.$id.'" value="" size="'.$length.'" class="'.$type.'">';        	
        	$element.='</div>';
            $element.='</div>';
        	return $element;
        }

        /**
         * Draw Varchar Box
         */
        function drawvarcharElement($name,$type,$id,$label_name,$label_id,$length){
        	$element='<div class="control-group">';
            $element.='<div class="control-label id="'.$label_id.'" for="'.$id.'">';
        	$element.=$label_name;
            $element.='</div>';
            $element.='<div class="controls">';
        	$element.='<input type="text" name="'.$name.'" id="'.$id.'" value="" style="width:394px;" class="'.$type.'">';
        	$element.='</div>';
            $element.='</div>';
        	return $element;
        }

        /**
         * Draw Tiny Element
         */
        function drawtinyintElement($name,$type,$id,$label_name,$label_id,$length){
        	$element='<div class="control-group">';
            $element.='<div class="control-label id="'.$label_id.'" for="'.$id.'">';
        	$element.=$label_name;
            $element.='</div>';
            $element.='<div class="controls">';
        	$element.='<input type="text" name="'.$name.'" id="'.$id.'" value="" size="'.$length.'" class="'.$type.'">';
        	$element.='</div>';
            $element.='</div>';
        	return $element;
        }
        /**
         * Draw Bigint Element
         */
        function drawbigintElement($name,$type,$id,$label_name,$label_id,$length){
        	$element='<div class="control-group">';
            $element.='<div class="control-label id="'.$label_id.'" for="'.$id.'">';
        	$element.=$label_name;
            $element.='</div>';
            $element.='<div class="controls">';
        	$element.='<input type="text" name="'.$name.'" id="'.$id.'" value="" size="'.$length.'" class="'.$type.'">';
        	$element.='</div>';
            $element.='</div>';
        	return $element;
        }




        /**
         * Draw Unsigned Float Element
         */
        function drawfloat_unsignedElement($name,$type,$id,$label_name,$label_id,$length){
        	$element='<div class="control-group">';
            $element.='<div class="control-label id="'.$label_id.'" for="'.$id.'">';
        	$element.=$label_name;
            $element.='</div>';
            $element.='<div class="controls">';
        	$element.='<input type="text" name="'.$name.'" id="'.$id.'" value="" size="'.$length.'" class="'.$type.'">';
        	$element.='</div>';
            $element.='</div>';
        	return $element;
        }



        /**
         * Draw unsignedElement Element
         */
        function drawdouble_unsignedElement($name,$type,$id,$label_name,$label_id,$length){
        	$element='<div class="control-group">';
            $element.='<div class="control-label id="'.$label_id.'" for="'.$id.'">';
        	$element.=$label_name;
            $element.='</div>';
            $element.='<div class="controls">';
        	$element.='<input type="text" name="'.$name.'" id="'.$id.'" value="" size="'.$length.'" class="'.$type.'">';
        	$element.='</div>';
            $element.='</div>';
        	return $element;
        }



        /**
         * Draw DateTimeElement
         */
        function drawdatetimeElement($name,$type,$id,$label_name,$label_id,$length){
        	$element='<div class="control-group">';
            $element.='<div class="control-label id="'.$label_id.'" for="'.$id.'">';
        	$element.=$label_name;
            $element.='</div>';
            $element.='<div class="controls">';
        	$element.='<input type="text" name="'.$name.'" id="'.$id.'" value="" class="'.$type.'">';
        	$element.='</div>';
            $element.='</div>';
        	return $element;
        }

        /**
         * Draw Timestamp
         */
        function drawtimestampElement($name,$type,$id,$label_name,$label_id,$length){
        	return $this->drawdatetimeElement($name,$type,$id,$label_name,$label_id,$length);
        }

        /**
         * Draw Text Field
         */
        function drawtextElement($name,$type,$id,$label_name,$label_id,$length){
            return $this->getWYSIWYGEditor($name,$type,$id,$label_name,$label_id,$length);
        	$element='<div class="control-group">';
            $element.='<div class="control-label id="'.$label_id.'" for="'.$id.'">';
        	$element.=$label_name;
            $element.='</div>';
            $element.='<div class="controls">';
        	$element.='<textarea name="'.$name.'" id="'.$id.'" style="margin: 5px 5px 5px 0px; width: 394px; height: 132px;" class="'.$type.'"></textarea>';
        	$element.='</div>';
            $element.='</div>';
        	return $element;
        }
        /**
         * Draw Medium Text Field
         */
        function drawmediumtextElement($name,$type,$id,$label_name,$label_id,$length){
            return $this->getWYSIWYGEditor($name,$type,$id,$label_name,$label_id,$length);
        	$element='<div class="control-group">';
            $element.='<div class="control-label id="'.$label_id.'" for="'.$id.'">';
        	$element.=$label_name;
            $element.='</div>';
            $element.='<div class="controls">';
        	$element.='<textarea name="'.$name.'" id="'.$id.'" style="margin: 5px 5px 5px 0px; width: 394px; height: 132px;" class="'.$type.'"></textarea>';
        	$element.='</div>';
            $element.='</div>';
        	return $element;
        }
        /**
         * Draw Long Text Field
         */
        function drawlongtextElement($name,$type,$id,$label_name,$label_id,$length){
            return $this->getWYSIWYGEditor($name,$type,$id,$label_name,$label_id,$length);
        	$element='<div class="control-group">';
            $element.='<div class="control-label id="'.$label_id.'" for="'.$id.'">';
        	$element.=$label_name;
            $element.='</div>';
            $element.='<div class="controls">';
        	$element.='<textarea name="'.$name.'" id="'.$id.'" style="margin: 5px 5px 5px 0px; width: 394px; height: 132px;" class="'.$type.'"></textarea>';
        	$element.='</div>';
            $element.='</div>';
        	return $element;
        }
        /**
         * Draw Medium Blob Field
         */
        function drawmediumblobElement($name,$type,$id,$label_name,$label_id,$length){
        	$element='<div class="control-group">';
            $element.='<div class="control-label id="'.$label_id.'" for="'.$id.'">';
        	$element.=$label_name;
            $element.='</div>';
            $element.='<div class="controls">';
        	$element.='<textarea name="'.$name.'" id="'.$id.'" style="margin: 5px 5px 5px 0px; width: 394px; height: 132px;" class="'.$type.'"></textarea>';
        	$element.='</div>';
            $element.='</div>';
        	return $element;
        }

        /**
         * Get UI Editor
         */
        function getWYSIWYGEditor($name,$type,$id,$label_name,$label_id,$length){
            $editor =JFactory::getEditor();
            $element='<div class="control-group">';
            $element.='<div class="control-label id="'.$label_id.'" for="'.$id.'">';
            $element.=$label_name;
            $element.='</div>';
            $element.='<div class="controls">';
            $element.=$editor->display($name, null, '800', '300', '60', '20', true);
            $element.='</div>';
            $element.='</div>';
            return $element;

        }





        


}