<?php

class Master_model extends CI_Model {

    function getQualification() {
        $qualification = '<select class="form-control" name="qualification" id = "categories">';
        $specialization = '<select class="form-control" name="specialization" id ="subcats">';
        $script = '';
        $caseCondition = '';

        $sql = "SELECT e.`edu_id`,e.`qualification`,GROUP_CONCAT(sp.`spec_id`) AS spec_id,GROUP_CONCAT(`specialization`) AS specialization FROM `education_master` e INNER JOIN `specialization_master` sp
                ON e.`edu_id` = sp.`edu_id` GROUP BY `qualification`";
        $query = $this->db->query($sql);
        if ($query) {

            $result = $query->result();

            foreach ($result as $item) {
                $qualification .= '
                        <option value = "' . $item->edu_id . '" >' . $item->qualification . '</option>';

                $spec_id = explode(",", $item->spec_id);
                $specializearray = explode(",", $item->specialization);

                $script .= ' var _' . $item->edu_id . ' = [ ';
                $caseCondition .= 'case "_' . $item->edu_id . '" : list(_' . $item->edu_id . '); break;';


                for ($i = 0; $i < count($spec_id); $i++) {
                    $specialization .= '<option value = "' . $spec_id[$i] . '" >' . $specializearray[$i] . '</option>';
                    $script .= '{display: "' . $specializearray[$i] . '", value: "' . $spec_id[$i] . '" },';
                }

                $script .= '];';
            }
            $specialization .= '</select>';
            $qualification.= '</select>';
        }

        $script .= '$("#categories").change(function() {
   					 var parent = "_" + $(this).val();
						switch(parent){
							' . $caseCondition . '            
                                                            default: //default child option is blank
								$("#subcats").html("");  
								break;
							   }
				});
				function list(array_list)
				{
					$("#subcats").html(""); //reset child options
					$(array_list).each(function (i) { //populate child options
					$("#subcats").append("<option value=\""+array_list[i].value+"\">"+array_list[i].display+"</option>");
					});
				}';

        return array($qualification, $specialization, $script);
    }

    public function institute() {
        $query = $this->db->get('institute_master');
        return $query->result();
    }

    public function getLocation($loc_id = 0) {
        $location = '';
        $query = $this->db->get('institute_master');
        $result = $query->result();
        if (!empty($result)) {
            foreach ($result as $location) {
                if ($loc_id == $location->loc_id) {
                    $location .= '<option value="' . $location->loc_id . '" selected>' . $location->location . '</option>';
                } else {
                    $location .= '<option value="' . $location->loc_id . '" >' . $location->location . '</option>';
                }
            }
        }
        return $location;
    }

}
