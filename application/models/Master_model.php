<?php

class Master_model extends CI_Model {

    function getQualification($edu_id = 0, $spec1_id = 0) {
        $qualification = '<select class="form-control" name="qualification[]" id = "categories">';
        $specialization = '<select class="form-control" name="specialization[]" id ="subcats">';
        $script = '';
        $caseCondition = '';

        $result = $this->listQualification();

        foreach ($result as $item) {
            if ($item->edu_id == $edu_id) {
                $qualification .= '<option value = "' . $item->edu_id . '" selected >' . $item->qualification . '</option>';
            } else {
                $qualification .= '<option value = "' . $item->edu_id . '" >' . $item->qualification . '</option>';
            }


            $spec_id = explode(",", $item->spec_id);
            $specializearray = explode(",", $item->specialization);

            $script .= ' var _' . $item->edu_id . ' = [ ';
            $caseCondition .= 'case "_' . $item->edu_id . '" : list(_' . $item->edu_id . '); break;';


            for ($i = 0; $i < count($spec_id); $i++) {
                if ($spec1_id == $spec_id[$i]) {
                    $specialization .= '<option value = "' . $spec_id[$i] . '" selected>' . $specializearray[$i] . '</option>';
                } else {
                    $specialization .= '<option value = "' . $spec_id[$i] . '" >' . $specializearray[$i] . '</option>';
                }

                $script .= '{display: "' . $specializearray[$i] . '", value: "' . $spec_id[$i] . '" },';
            }

            $script .= '];';
        }
        $specialization .= '</select>';
        $qualification.= '</select>';


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

    public function listQualification() {
        $sql = "SELECT e.`edu_id`,e.`qualification`,GROUP_CONCAT(sp.`spec_id`) AS spec_id,GROUP_CONCAT(`specialization`) AS specialization FROM `education_master` e INNER JOIN `specialization_master` sp
                ON e.`edu_id` = sp.`edu_id` GROUP BY `qualification`";
        $query = $this->db->query($sql);
        return $query->result();
    }

    function listLocation() {
        $query = $this->db->get('location_master');
        return $query->result();
    }

    function listSkills() {
        $query = $this->db->get('skill_master');
        return $query->result();
    }

    function listLocation2() {

        $query = "SELECT DISTINCT location FROM `location_master`
                    WHERE location IN ('mumbai', 'delhi','Bengaluru/ Bangalore','pune')";
        $query = $this->db->query($query);

        return $query->result();
    }

    public function institute() {
        $query = $this->db->get('institute_master');
        return $query->result();
    }

    public function listIndustry() {
        $query = $this->db->get('industry_master');
        return $query->result();
    }

    public function listIndustry2() {
        $query = "SELECT * FROM `industry_master`
 LIMIT 5";
        $query = $this->db->query($query);
        return $query->result();
    }

    public function listFunctionalArea() {
        $query = $this->db->get('functional_area');
        return $query->result();
    }

    public function getLocation($loc_id = 0) {
        $location = '<option value = "" >Select Location</option>';
        $result = $this->listLocation();

        if (!empty($result)) {
            foreach ($result as $loc) {
                if ($loc_id == $loc->loc_id) {
                    $location .= '<option value="' . $loc->location . '" selected>' . $loc->location . '</option>';
                } else {
                    $location .= '<option value="' . $loc->location . '" >' . $loc->location . '</option>';
                }
            }
        }
        return $location;
    }

    public function getWorkExperience($value = -1) {
        $experience = '<option value = "" >Select Experience</option>';
        for ($i = 0; $i < 30; $i++) {
            if ($value == $i) {
                $experience .= '<option value="' . $i . '" selected>' . $i . '</option>';
            } else {
                $experience .= '<option value="' . $i . '">' . $i . '</option>';
            }
        }

        return $experience;
    }

    function getIndustry($indus_id = -1) {
        $industry = '<option value = "" >Select Industry</option>';
        $result = $this->listIndustry();

        if (!empty($result)) {
            foreach ($result as $row) {
                if ($indus_id == $row->indus_id) {
                    $industry .= '<option value="' . $row->indus_id . '" selected>' . $row->industry . '</option>';
                } else {
                    $industry .= '<option value="' . $row->indus_id . '" >' . $row->industry . '</option>';
                }
            }
        }
        return $industry;
    }

    function getFunctionArea($fun_id = -1) {
        $area = '<option value = "" >Select Functional Area</option>';
        $result = $this->listFunctionalArea();

        if (!empty($result)) {
            foreach ($result as $row) {
                if ($fun_id == $row->fun_id) {
                    $area .= '<option value="' . $row->fun_id . '" selected>' . $row->fun_area . '</option>';
                } else {
                    $area .= '<option value="' . $row->fun_id . '" >' . $row->fun_area . '</option>';
                }
            }
        }
        return $area;
    }

    function getInstitute($id = -1) {
        $industry = '<option value = "" >Select Institute</option>';
        $result = $this->institute();

        if (!empty($result)) {
            foreach ($result as $row) {
                if ($id == $row->id) {
                    $industry .= '<option value="' . $row->id . '" selected>' . $row->institute . '</option>';
                } else {
                    $industry .= '<option value="' . $row->id . '" >' . $row->institute . '</option>';
                }
            }
        }
        return $industry;
    }

    function getUserSkill($conditions = array(), $conditions2 = array()) {
        $sql = "SELECT skm.*,sk.* FROM skill_master skm LEFT JOIN (SELECT * FROM skills ";
        if (!empty($conditions)) {
            $sql .= " WHERE " . join(" AND ", $conditions);
        }

        $sql .= "  ) AS sk ON skm.skm_id = sk.skill  ";
        if (!empty($conditions2)) {
            $sql .= " WHERE " . join(" AND ", $conditions2);
        }
        $query = $this->db->query($sql);
        return $query->result();
    }

    function getcomputerSkill($conditions = array()) {
        $sql = "SELECT * FROM computer_skill ";
        if (!empty($conditions)) {
            $sql .= " WHERE " . join(" AND ", $conditions);
        }

        $query = $this->db->query($sql);
        return $query->result();
    }

    function getlanguage($conditions = array()) {
        $sql = "SELECT * FROM language ";
        if (!empty($conditions)) {
            $sql .= " WHERE " . join(" AND ", $conditions);
        }

        $query = $this->db->query($sql);
        return $query->result();
    }

    function getlanguageMaster($conditions = array()) {
        $sql = "SELECT * FROM language_master ";
        if (!empty($conditions)) {
            $sql .= " WHERE " . join(" AND ", $conditions);
        }

        $query = $this->db->query($sql);
        return $query->result();
    }

    function generateDropdown($result, $fieldid, $fieldname, $id = 0, $custom_attribute = array()) {
        $dropdown = '';
        $custom_field = '';
        if (!empty($result)) {
            foreach ($result as $item) {
                if (!empty($custom_attribute)) {
                    foreach ($custom_attribute as $key => $value) {
                        $custom_field .= 'data-' . $key . '="' . $item->{$value} . '" ';
                    }
                    //echo $custom_field."<br/>";
                }
                if ($id === $item->{$fieldid}) {
                    $dropdown .= '<option value="' . $item->{$fieldid} . '" selected ' . $custom_field . ' >' . $item->{$fieldname} . '</option>';
                } else {
                    $dropdown .= '<option value="' . $item->{$fieldid} . '" ' . $custom_field . '>' . $item->{$fieldname} . '</option>';
                }

                $custom_field = '';
            }
        }

        $dropdown .= '';
        return $dropdown;
    }

}
